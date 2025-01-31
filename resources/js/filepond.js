
// Core and Plugins
import * as FilePond from 'filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

// File Pond Css
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'

// Helpers
import { deleteTempURL, getCsrfToken, storeTempURL } from './_helpers';

// Register FilePond plugins
FilePond.registerPlugin(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginFileValidateSize
);

// Declaring the file input element for FilePond.
export let uploadImageElement = document.querySelector('input[name="image"]');

// Global function to initialize FilePond on a given element.
export const initializeFilePond = (uploadImageElement, existingImage = null) => {
    if (!uploadImageElement) {
        console.error("File input element not found!");
        return; // Exit early if element is not found
    }

    const options = {
        allowMultiple: false,               // Only one image allowed
        maxFileSize: '5MB',                 // Max file size is 5MB
        acceptedFileTypes: ['image/*'],     // Accept only image files
        allowImagePreview: true,            // Show image previews
        allowImageFilter: true,             // Allow image filters
        allowFileTypeValidation: true,      // Validate file types
        allowRevert: true,                  // Allow files to be reverted/removed
        credits: false,                     // Hide FilePond credits

        server: {
            headers: {
                'X-CSRF-TOKEN': getCsrfToken(),     // CSRF protection
            },
            process: {
                url: storeTempURL,
                onload: (response) => {
                    let parsedResponse = JSON.parse(response);
                    return parsedResponse.filename; // Return uploaded file path
                },
                onerror: (response) => {
                    let parsedResponse = JSON.parse(response);
                    return parsedResponse.message || 'Upload Failed';
                },
            },
            revert: async (file, load, error) => {
                const URL = deleteTempURL;
                try {
                    let response = await fetch(URL, {
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': getCsrfToken(),
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            filename: file
                        })
                    });

                    if (!response.ok) {
                        // Handle the error response
                        const errorData = await response.json();
                        console.error('Error deleting file:', errorData);
                        throw new Error(errorData.message || 'Failed to delete the file');
                    } else {
                        const data = await response.json(); // Parse the response if successful
                        // console.log('File deleted successfully:', data);
                    }
                } catch (err) {
                    console.error('Delete request failed:', err);
                    error('Failed to delete the file');
                }
            }
        }
    }

    // Create the FilePond instance
    const pondInstance = FilePond.create(uploadImageElement);
    pondInstance.setOptions(options);

    if (existingImage) {
        const ImageData = getExistingImage(existingImage.url, existingImage.fileName, existingImage.fileSize, existingImage.fileType);

        // Set the existing image
        pondInstance.setOptions({
            files: ImageData
        });
    }

    return pondInstance;
}

// get the existing image for the specific model
export const getExistingImage = (url, fileName, fileSize, fileType) => {
    return [{
        source: url,
        options: {
            type: 'local',
            file: {
                name: fileName,
                size: fileSize,
                type: fileType
            },
            metadata: {
                poster: url,
            }
        }
    }];
}

// Auto-initialize FilePond
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input[type="file"]').forEach(input => {
        const existingImage = window.filepondData?.[input.name] || null;
        initializeFilePond(input, existingImage);
    });
});

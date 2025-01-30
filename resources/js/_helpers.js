import { DOC } from "./app";

// Routes
export const storeTempURL = 'temp-upload';
export const deleteTempURL = 'temp-delete';

// Function to get the CSRF token from the meta tag
export function getCsrfToken() {
    return DOC.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

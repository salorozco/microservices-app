// app/ClientProvider.js

"use client"; // This ensures it's a Client Component

import { Provider } from 'react-redux';
import store from './store'; // Adjust the path according to your structure

export default function ClientProvider({ children }) {
    return <Provider store={store}>{children}</Provider>;
}

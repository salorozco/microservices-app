// app/store.js
import { configureStore } from '@reduxjs/toolkit';
import userReducer from './users/slice/userSlice';

const store = configureStore({
    reducer: {
        users: userReducer,
    },
});

export default store;

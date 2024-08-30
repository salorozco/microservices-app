// app/slices/userSlice.js

import { createAsyncThunk, createSlice } from '@reduxjs/toolkit';
import { fetchUserById as apiFetchUserById, fetchUsers as apiFetchUsers } from '../services/userService';

// Thunk to fetch all users
export const fetchUsers = createAsyncThunk('users/fetchUsers', async () => {
    return await apiFetchUsers(); // Make sure this function returns the correct data
});

// Thunk to fetch a user by ID
export const fetchUserById = createAsyncThunk('users/fetchUserById', async (id) => {
    return await apiFetchUserById(id); // Make sure this function returns the correct data
});

const userSlice = createSlice({
    name: 'users',
    initialState: {
        users: [],
        user: null,
        loading: false,
        error: null,
    },
    reducers: {}, // Add any synchronous reducers if needed
    extraReducers: (builder) => {
        builder
            .addCase(fetchUsers.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(fetchUsers.fulfilled, (state, action) => {
                state.loading = false;
                state.users = action.payload;
            })
            .addCase(fetchUsers.rejected, (state, action) => {
                state.loading = false;
                state.error = action.error.message;
            })
            .addCase(fetchUserById.pending, (state) => {
                state.loading = true;
                state.error = null;
            })
            .addCase(fetchUserById.fulfilled, (state, action) => {
                state.loading = false;
                state.user = action.payload;
            })
            .addCase(fetchUserById.rejected, (state, action) => {
                state.loading = false;
                state.error = action.error.message;
            });
    },
});

export default userSlice.reducer;

import apiClient from './apiClient';

export default {
    getUsers() {
        return apiClient.get('/users');
    },
    getUserById(id) {
        return apiClient.get(`/users/${id}`);
    },
    getProfileByUserId(id) {
        return apiClient.get(`/profile/${id}`);
    },
};

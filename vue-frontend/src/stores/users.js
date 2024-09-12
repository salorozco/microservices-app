import { defineStore } from 'pinia';
import UserService from '../services/UserService';

export const useUserStore = defineStore('users', {
    state: () => ({
        users: [],
        user: null,
        isLoading: false,
        error: null,
    }),
    getters: {
        getUserById: (state) => {
            return (id) => {
                const normalizedId = Number(id); // Convert the id to a number
                return state.users.find(user => user.id === normalizedId);
            };
        },
    },
    actions: {
        async fetchUsers() {
            this.isLoading = true;
            this.error = null;
            try {
                const response = await UserService.getUsers();
                this.users = response.data;  // Ensure response.data is an array
            } catch (error) {
                this.error = 'Error fetching users';
            } finally {
                this.isLoading = false;
            }
        },
        async fetchUserById(id) {
            this.isLoading = true;
            this.error = null;
            const user = this.getUserById(id);

            if (user) {
                this.user = user;
                this.isLoading = false;
            } else {
                try {
                    const response = await UserService.getUserById(id);
                    this.user = response.data;
                    this.users.push(response.data);  // Add the user to the users array
                } catch (error) {
                    this.error = `Error fetching user with ID ${id}`;
                    console.error(`Error fetching user with ID ${id}:`, error);
                } finally {
                    this.isLoading = false;
                }
            }
        },
        async fetchUserProfile(id) {
            this.isLoading = true;
            this.error = null;
            try {
                const response = await UserService.getProfileByUserId(id);
                const { user, posts } = response.data;

                this.user = {
                    ...user,  // Spread the user properties
                    posts    // Add posts as a new property on the user object
                };

            } catch (error) {
                this.error = `Error fetching profile for user with ID ${id}`;
                console.error(`Error fetching profile for user with ID ${id}:`, error);
            } finally {
                this.isLoading = false;
            }
        }
    },
});

import axios from 'axios';

const apiClient = axios.create({
    baseURL: 'http://localhost',
    withCredentials: false,
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    },
});

// Add a request interceptor if neede
apiClient.interceptors.request.use(config => {
    console.log(`Making request to: ${config.baseURL}${config.url}`);
    config.headers['Access-Control-Allow-Origin'] = '*';
    return config;
});

export default apiClient;

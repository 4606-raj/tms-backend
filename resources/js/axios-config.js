import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const baseUrl = import.meta.env.VITE_API_BASE_URL;

const instance = axios.create({
  baseURL: baseUrl, // Replace this with your base URL
  timeout: 1000,
  headers: {'X-Custom-Header': 'foobar'}
});

const notifyError = (error) => {
  console.log(error, 'api-error');

  let message = error.response?.data?.message? error?.response?.data?.message: error.response?.data?.errors[0].detail
  
  toast(message, {
    autoClose: 2000,
    "theme": "colored",
    "type": "error",
    "dangerouslyHTMLString": true,
    "hideProgressBar": true,
  });
}

const notifySuccess = (message = 'Success') => {  
  toast(message, {
    autoClose: 2000,
    "theme": "colored",
    "type": "success",
    "dangerouslyHTMLString": true,
    "hideProgressBar": true,
    "transition": "flip",
  });
}

// Request interceptor
instance.interceptors.request.use(
  config => {
    // You can modify the request config here (e.g., add headers)
    return config;
  },
  error => {
    notifyError(error);

    return Promise.reject(error);
  }
);

// Response interceptor
instance.interceptors.response.use(
  response => {
    // You can modify the response data here
    // notifySuccess(response.data.message);

    return response;
  },
  error => {
    // Handle errors globally
    
    notifyError(error);
    
    return Promise.reject(error);
  }
);

export default instance;

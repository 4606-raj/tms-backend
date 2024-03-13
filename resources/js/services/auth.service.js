import axios from "../axios-config";
import authHeader from "./auth-header";

// const API_URL = process.env.VUE_APP_API_BASE_URL + '/';
// const API_URL = 'http://127.0.0.1:8001/api/';

export default {
  async login(user) {
    const response = await axios.post("/login", user);
    if (response.data.access_token) {
      localStorage.setItem("userF", JSON.stringify(response.data.access_token));
    }
  },

  async logout() {
    try {
      await axios.post("/logout", {}, { headers: authHeader() });
    } finally {
      localStorage.removeItem("userF");
    }
  },

  async register(user) {
    const response = await axios.post("/register", user);
    if (response.data.access_token) {
      localStorage.setItem("userF", JSON.stringify(response.data.access_token));
    }
  },
};

import axios from "@/axios-config";

export default {
  async fetchAll(payload) {
    const page = payload.page != undefined? payload.page: 1;
    const response = await axios.get(`/users?page=${page}`);
    if (response.status == 200) {
      return response.data.data;
    }
  },
  async search(payload) {
    const response = await axios.get(`/users/search`);
    if (response.status == 200) {
      return response.data.data;
    }
  },
};

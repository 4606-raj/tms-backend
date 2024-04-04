import axios from "../axios-config";

export default {
  async fetchAll() {
    const response = await axios.get("/district");
    if (response.status == 200) {
      return response.data.data;
    }
  },
};

import axios from "../axios-config";

export default {
  async fetchAll() {
    const response = await axios.get("/authorities");
    console.log(response.data.data);
    if (response.status == 200) {
      return response.data.data;
    }
  },
};

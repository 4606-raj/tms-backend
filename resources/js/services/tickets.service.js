import axios from "../axios-config";

export default {
  async fetchAll() {
    const response = await axios.get("/tickets");
    if (response.status == 200) {
      return response.data.data;
    }
  },
  async createTicket(ticket) {
    const response = await axios.post("/tickets", ticket);
    if (response.status == 200) {
      return response.data.data;
    }
    return false;
  },
};

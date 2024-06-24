import axios from "../axios-config";

export default {
  async fetchAll(payload) {
    const page = payload.page != undefined? payload.page: 1;
    const response = await axios.get(`/tickets?page=${page}`);
    if (response.status == 200) {
      return response.data.data;
    }
  },
  async fetchOne(payload) {
    const ticketNumber = payload.ticketNumber;
    const response = await axios.get(`/tickets/${ticketNumber}`);
    if (response.status == 200) {
      return response.data.data;
    }
  },
  async search(searchParams) {
    const response = await axios.post(`/tickets/search-ticket`, searchParams);
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

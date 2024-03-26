import axios from "../axios-config";
import authHeader from "./auth-header";
import Jsona from "jsona";
const dataFormatter = new Jsona();

export default {
  async getProfile() {
    const response = await axios.get("me", {
      headers: authHeader(),
    });
    return dataFormatter.deserialize(response.data);
  },

  async uploadPic(object) {
    let formData = new FormData();
    formData.append("attachment", object.pic);
    const response = await axios.post(
      "uploads/users/" + object.id + "/profile-image",
      formData,
      {
        headers: { "Content-Type": "multipart/form-data" },
      }
    );
    return response.data.url;
  },

  async updateProfile(profile) {
    profile.type = "profile";
    delete profile.links;
    const response = await axios.patch(
      "me",
      dataFormatter.serialize({ stuff: profile }),
      {
        headers: authHeader(),
      }
    );
    return dataFormatter.deserialize(response.data);
  },
};

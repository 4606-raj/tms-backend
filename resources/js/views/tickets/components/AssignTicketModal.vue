<template>
  <div v-if="isVisible" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Assign Ticket</h5>
          <button type="button" class="close" @click="closeModal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="assignTicket">
            <div class="mb-3">
              <label class="form-label">Level</label>
              <select class="form-select" v-model="formData.level" required>
                <option disabled value="">Please select a level</option>
                <option value="1">Level 1</option>
                <option value="2">Level 2</option>
                <option value="3">Level 3</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">User</label>
              <select class="form-select" v-model="formData.user" required>
                <option disabled value="">Please select a user</option>
                <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Remark</label>
              <textarea class="form-control" v-model="formData.remark" placeholder="Add remarks" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Attachment</label>
              <input type="file" class="form-control" @change="handleFileUpload" multiple>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>
              <button type="submit" class="btn btn-primary">Assign</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AssignTicketModal",
  props: {
    isVisible: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      formData: {
        level: "",
        user: "",
        remark: "",
        attachments: []
      },
      users: [] 
    };
  },
  mounted() {
    this.fetchUsers();
  },
  methods: {
    closeModal() {
      this.$emit("close");
    },
    handleFileUpload(event) {
      this.formData.attachments = Array.from(event.target.files);
    },
    async fetchUsers() {
      try {
        const response = await fetch("http://127.0.0.1:8001/users"); 
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        this.users = await response.json();
      } catch (error) {
        console.error("There was a problem with the fetch operation:", error);
      }
    },
    assignTicket() {
      console.log("Ticket assigned with data:", this.formData);
      this.closeModal();
    }
  }
};
</script>

<style scoped>
.modal {
  background: rgba(0, 0, 0, 0.5);
}
.modal-dialog {
  max-width: 500px;
  margin: 1.75rem auto;
}
</style>

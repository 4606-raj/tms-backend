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
              <label class="form-label">Assign Role</label>
              <select class="form-select" name="assignRole"  v-model="formData.assignRole" @change="fetchUsersWithRole">
              <option disabled selected value="">Please select one</option>
              <option v-for="item in roles" :value="item.name" :key="item.id">{{ toUpperCase(item.name) }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">User</label>
              <select class="form-select" v-model="formData.user" required>
                <option disabled value="">Please select a user</option>
                <option v-for="user in filteredUsers" :key="user.id" :value="user.id">{{ user.name }}</option>
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
        assignRole: '',
        user: '',
        remark: "",
        attachments: []
      },
      roles: [],
      users: [],
      filteredUsers: []
    };
  },
  mounted() {
    //this.fetchUsers();
  },
  computed: {
    roles() {
      return this.$store.getters["auth/getRoles"];
    },
    users() {
      return this.$store.getters["users/getAll"];
    }
  },
  methods: {
    toUpperCase(value) {
      return value.toUpperCase();
    },
    closeModal() {
      this.$emit("close");
    },
    handleFileUpload(event) {
      this.formData.attachments = Array.from(event.target.files);
    },
    async fetchUsers() {
      try {
        const response = await fetch("http://127.0.0.1:8001/api/v1/users"); 
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
    },
    fetchUsersWithRole() {
      const selectedRole = this.formData.assignRole;
      if (selectedRole) {
        const allUsers = this.users;
        const res = allUsers.filter(user => user.profile == this.formData.assignRole);
        this.filteredUsers = res;
      
      } else {
        this.filteredUsers = [];
      }
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

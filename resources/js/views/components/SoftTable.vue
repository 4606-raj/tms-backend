<template>
  <div class="card mb-4">
    <div class="card-header pb-0">
      <h6>Ticket List</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th v-for="header in headers" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                {{ header }}
              </th>
              
              <!-- <th class="text-secondary opacity-7"></th> -->
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in data">
              <td v-for="value in item">
                <p class="text-xs font-weight-bold mb-0">{{ value }}</p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import SoftAvatar from "@/components/SoftAvatar.vue";
import SoftBadge from "@/components/SoftBadge.vue";
import img1 from "../../assets/img/team-2.jpg";

export default {
  name: "soft-table",
  data() {
    return {
      img1,
    };
  },
  components: {
    SoftAvatar,
    SoftBadge,
  },

  props: {
    headers: {
      type: Array,
      required: true
    },
    data: {
      type: Array,
      required: true
    },
  },
  mounted() {
    // console.log(this.data);
  }
  
};
</script>

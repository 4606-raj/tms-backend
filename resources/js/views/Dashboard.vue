<template>
  <div class="py-4 container-fluid">
    <div class="d-flex justify-content-center bg-gradient-info">
      <h3>Ticking Tool Dashboard</h3>
    </div>
    
    <div class="row my-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <projects-card />
      </div>
      <div class="col-lg-4 col-md-6">
        <timeline-list
          class="h-100"
          title="All Ticket overview"
          description="<i class='fa fa-arrow-up text-success' aria-hidden='true'></i>
            <span class='font-weight-bold'>24%</span> this month"
        >
          <timeline-item
            color="info"
            icon="check-bold"
            title="Total Tickets"
            date-time="50000"
          />
          <timeline-item
            color="success"
            icon="check-bold"
            title="Resolved Tickets"
            date-time="25000"
          />
          <timeline-item
            color="danger"
            icon="check-bold"
            title="Pending Tickets"
            date-time="20000"
          />
          <timeline-item
            color="dark"
            icon="check-bold"
            title="Closed Tickets"
            date-time="5000"
          />
        </timeline-list>
      </div>
    </div>
    <!-- start -->
    <div class="row">
      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="TOTAL TICKETS"
          value="53,000"
          :percentage="{
            value: '+505%',
            color: 'text-info',
          }"
          :icon="{
            component: 'ni ni-money-coins',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="TOTAL RESOLVED"
          value="2,300"
          :percentage="{
            value: '+3%',
            color: 'text-success',
          }"
          :icon="{
            component: ' ni ni-world',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="PENDING TICKETS"
          value="+3,462"
          :percentage="{
            value: '-2%',
            color: 'text-danger',
          }"
          :icon="{
            component: 'ni ni-paper-diploma',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="TOTAL DCRIM"
          value="53,000"
          :percentage="{
            value: '+505%',
            color: 'text-info',
          }"
          :icon="{
            component: 'ni ni-money-coins',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="RESOLVED  DCRIM"
          value="2,300"
          :percentage="{
            value: '+3%',
            color: 'text-success',
          }"
          :icon="{
            component: ' ni ni-world',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="PENDING DCRIM"
          value="+3,462"
          :percentage="{
            value: '-2%',
            color: 'text-danger',
          }"
          :icon="{
            component: 'ni ni-paper-diploma',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
    </div>
    <!---second row-->
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="Total Tickets ON PROCESS"
          value="53,000"
          :percentage="{
            value: '+505%',
            color: 'text-success',
          }"
          :icon="{
            component: 'ni ni-money-coins',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="RESOLVED TICKETS ON PROCESS"
          value="2,300"
          :percentage="{
            value: '+3%',
            color: 'text-success',
          }"
          :icon="{
            component: ' ni ni-world',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="PENDING TICKET ON PROCESS"
          value="+3,462"
          :percentage="{
            value: '-2%',
            color: 'text-danger',
          }"
          :icon="{
            component: 'ni ni-paper-diploma',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
    </div>
    <!--third row-->
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="Total Tickets ON TECHNICAL"
          value="53,000"
          :percentage="{
            value: '+505%',
            color: 'text-success',
          }"
          :icon="{
            component: 'ni ni-money-coins',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="RESOLVED TICKETS ON TECHNICAL"
          value="2,300"
          :percentage="{
            value: '+3%',
            color: 'text-success',
          }"
          :icon="{
            component: ' ni ni-world',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="PENDING TICKET ON TECHNICAL"
          value="+3,462"
          :percentage="{
            value: '-2%',
            color: 'text-danger',
          }"
          :icon="{
            component: 'ni ni-paper-diploma',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
    </div>
    <!---end third row-->
    <!---4th row start-->
    <div class="row">
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="Total Tickets ON ZCRIM"
          value="53,000"
          :percentage="{
            value: '+505%',
            color: 'text-success',
          }"
          :icon="{
            component: 'ni ni-money-coins',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="RESOLVED TICKETS ON ZCRIM"
          value="2,300"
          :percentage="{
            value: '+3%',
            color: 'text-success',a
          }"
          :icon="{
            component: ' ni ni-world',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
      <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <mini-statistics-card
          title="PENDING TICKET ON ZCRIM"
          value="+3,462"
          :percentage="{
            value: '-2%',
            color: 'text-danger',
          }"
          :icon="{
            component: 'ni ni-paper-diploma',
            background: iconBackground,
          }"
          direction-reverse
        />
      </div>
    </div>
    <!---end 4th row-->
    <!-- start tab -->
  
    <div id="app" class="row">
      <div class="col-12">
        <div class="tabs">
          <ul class="nav nav-tabs">
            <li v-for="(tab, index) in tabs" :key="index" :class="['nav-item', { active: activeTab === index }]">
              <a class="nav-link" @click="activeTab = index">{{ tab.name }}</a>
            </li>
          </ul>
        </div>
        <div class="tab-content">
          <div v-for="(tab, index) in tabs" :key="index" v-show="activeTab === index" class="tab-pane">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, idx) in tab.tableData" :key="idx">
                  <td>{{ idx + 1 }}</td>
                  <td>{{ item.name }}</td>
                  <td>{{ item.status }}</td>
                  <td>{{ item.details }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <!---end-->
    
  </div>
</template>

<script>
import MiniStatisticsCard from "@/examples/Cards/MiniStatisticsCard.vue";
import TimelineList from "./components/TimelineList.vue";
import TimelineItem from "./components/TimelineItem.vue";
import ProjectsCard from "./components/ProjectsCard.vue";

import {
  faHandPointer,
  faUsers,
  faCreditCard,
  faScrewdriverWrench,
} from "@fortawesome/free-solid-svg-icons";

export default {
  name: "dashboard-default",
  el: '#app',
  data() {
    return {
      activeTab: 0,
      tabs: [
        { name: 'DCRIM DASHBOARD', content: 'Content DCRIM DASHBOARD', tableData: [
          { name: 'Task 1', status: 'Completed', details: 'Details of Task 1' },
          { name: 'Task 2', status: 'Pending', details: 'Details of Task 2' },
        ] },
        { name: 'PROCESS DASHBOARD', content: 'Content PROCESS DASHBOARD', tableData: [
          { name: 'Task 3', status: 'Completed', details: 'Details of Task 3' },
          { name: 'Task 4', status: 'Pending', details: 'Details of Task 4' },
        ] },
        { name: 'TECHNICAL DASHBOARD', content: 'Content TECHNICAL DASHBOARD', tableData: [
          { name: 'Task 5', status: 'Completed', details: 'Details of Task 5' },
          { name: 'Task 6', status: 'Pending', details: 'Details of Task 6' },
        ] },
        { name: 'ZCRIM DASHBOARD', content: 'Content ZCRIM DASHBOARD', tableData: [
          { name: 'Task 7', status: 'Completed', details: 'Details of Task 7' },
          { name: 'Task 8', status: 'Pending', details: 'Details of Task 8' },
        ] },
      ],
      
      iconBackground: "bg-gradient-success",
      faCreditCard,
      faScrewdriverWrench,
      faUsers,
      faHandPointer,
    };
  },
  components: {
    MiniStatisticsCard,
    ProjectsCard,
    TimelineList,
    TimelineItem,
  },
};
</script>
<style scoped>
  .nav-tabs {
    border-bottom: 1px solid #dddddd;
  }
  .nav-item {
    margin-bottom: -1px;
  }
  .nav-link {
    cursor: pointer;
  }
  .nav-link.active {
    background-color: #ff7300;
    color: white;
  }
  .table {
    margin-top: 20px;
  }
</style>

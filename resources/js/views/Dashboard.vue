<template>
  <div class="py-4 container-fluid">
    <div class="d-flex justify-content-center bg-gradient-info" ><h3>Ticking Tool Dashboard</h3></div>
    
    <div class="row my-4">
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <projects-card />
      </div>
      <div class="col-lg-4 col-md-6">
        <timeline-list
          class="h-100"
          title="All Ticket overview"
          description="<i class='fa fa-arrow-up text-success' aria-hidden='true'></i>
        <span class='font-weight-bold'>24%</span> this month" >
          <timeline-item
            color="info"
            icon="check-bold"
            title="Total Tickets"
            date-time="50000"
          />
          <TimelineItem
            color="success"
            icon="check-bold"
            title="Resolved Tickets"
            date-time="25000"
          />
          <TimelineItem
            color="danger"
            icon="check-bold"
            title="Pending Tickets"
            date-time="20000"
          />
          <TimelineItem
            color="dark"
            icon="check-bold"
            title="Closed Tickets"
            date-time="5000"
          />
          
          
        </timeline-list>
      </div>
    </div>
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
    <div class ="row">
    <div class="tabs">
      <ul>
        <li v-for="(tab, index) in tabs" :key="index" :class="{ 'is-active': activeTab === index }">
          <a @click="activeTab = index">{{ tab.name }}</a>
        </li>
      </ul>
    </div>
    <div class="tab-content">
      <div v-for="(tab, index) in tabs" :key="index" v-show="activeTab === index">
        {{ tab.content }}
      </div>
    </div>
  </div>
   
    
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
  data() {
    return {
      activeTab: 0,
      tabs: [
        { name: 'DCRIM DASHBOARD', content: 'Content DCRIM DASHBOARD' },
        { name: 'PROCESS DASHBOARD', content: 'Content PROCESS DASHBOARD' },
        { name: 'TECHNICAL DASHBOARD', content: 'Content TECHNICAL DASHBOARD' },
        { name: 'ZCRIM DASHBOARD', content: 'Content ZCRIM' },

      ],
      
      iconBackground: "bg-gradient-success",
      faCreditCard,
      faScrewdriverWrench,
      faUsers,
      faHandPointer,
      
    };
  },
  mounted() {
    // fetch('http://127.0.0.1:8001/api/test');
  },
  components: {
    MiniStatisticsCard,
    ProjectsCard,
    TimelineList,
    TimelineItem,
  },
  
};
</script>

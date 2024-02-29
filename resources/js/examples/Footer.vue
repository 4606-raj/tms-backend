<template>
  <footer class="py-3 footer">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-center">
        <div class="col-lg-12">
          <div  class="text-sm text-center"
            >
            Content Owned by Mera Parivar Pehchan Authority (MPPA), service for Haryana.
          </div>
        </div>
      </div>
      <div class="row align-items-left justify-content-lg-between">
        <div class="mb-4 col-lg-4 mb-lg-0">
          <div
            class="text-sm text-left copyright text-muted"
            :class="this.$store.state.isRTL ? 'text-sm-end' : 'text-sm-start'"
          >
            ©
            {{ new Date().getFullYear() }}
            <a
              href="#"
              class="font-weight-bold"
              target="_blank"
              >Ticket Tool</a
            >
            All rights reserved.
            
          </div>
        </div>
        <div class="col-lg-8">
          <ul
            class="nav nav-footer justify-content-end justify-content-lg-end"
          >
            <li class="nav-item">
              <img
                      src="../assets/img/logos/swaran.png"
                      class="avatar avatar-sm rounded-circle me-2"
                      alt="spotify"
                    />
            </li>
            <li class="nav-item">
              <img
                      src="../assets/img/logos/swachh-bharat-abhiyan-logo-vector-file.png"
                      class="avatar avatar-sm rounded-circle me-2"
                      alt="spotify"
                    />
            </li>
            <li class="nav-item">
              <img
                      src="../assets/img/logos/beti.png"
                      class="avatar avatar-sm rounded-circle me-2"
                      alt="spotify"
                    />
            </li>
          </ul> 
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "app-footer",
};
</script>

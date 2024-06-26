import Swal from "sweetalert2";

export default {
  methods: {
    showSwal(options) {
      new Swal({
        toast: true,
        position: "top-right",
        iconColor: "white",
        width: options.width ? options.width : 300,
        text: options.message,
        customClass: {
          popup: options.type === "error" ? "bg-danger" : "bg-primary",
          htmlContainer: "text-white",
        },
        showConfirmButton: false,
        showCloseButton: true,
        timer: 2000,
        timerProgressBar: true,
      });
    },
  },
};

<template>
    <div>
      <CKEditor  :editor="editor" :config="editorConfig"></CKEditor >
    </div>
  </template>
  
  <script>
 import CKEditor  from "@/components/SoftCkeditor.vue";
  
  export default {
    name: "SoftCkeditor",
    components: {
       // CKEditor : CKEditor.component
    },
    props: {
      id: {
        type: String,
        required: true,
      },
      placeholder: {
        type: String,
        default: "Your text here...",
      },
    },
    data() {
      return {
        editor: null, // Initialize editor as null
        editorConfig: {
          // CKEditor configuration options
          toolbar: [ ['Bold', 'Italic', 'Underline'] ]
        }
      };
    }
  };
  </script>
  
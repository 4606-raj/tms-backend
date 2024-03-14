import router from "../router";
export default function auth({ next, store }) {
    if (!store.getters["auth/loggedIn"]) {
    // next();

      // return next({
      //   name: "sign-in",
      // });

      router.push({ path: 'sign-in' })
    } 
    next();
}
  
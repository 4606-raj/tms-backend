import router from "../router";
export default function auth({ next, store }) {
  console.log(store.getters["auth/loggedIn"]);
    if (!store.getters["auth/loggedIn"]) {
    // next();

      // return next({
      //   name: "sign-in",
      // });

      router.push({ path: 'sign-in' })
    } 
    next();
}
  
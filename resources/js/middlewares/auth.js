export default function auth({ next, store }) {
    if (!store.getters["auth/loggedIn"]) {
    next();

      return next({
        name: "Login",
      });
    } 
    next();
}
  
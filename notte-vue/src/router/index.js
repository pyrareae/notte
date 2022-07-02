import { createRouter, createWebHistory } from 'vue-router'
import { useSessionStore } from '../stores/session';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      redirect: "/notes",
    },
    // {
    //   path: "/notes",
    //   name: "Notes",
    //   component: () => import("../views/NotesView.vue"),
    //   children: [
    //     {
    //       path: "/:id",
    //       name: "Note",
    //       component: () => import("../views/NoteView.vue"),
    //     },
    //     {
    //       path: "/new",
    //       name: "New Note",
    //       component: () => import("../views/NewNoteView.vue"),
    //     },
    //   ]
    // },
    {
      path: "/notes",
      name: "Notes",
      component: () => import("../views/NotesView.vue"),
    },
    {
      path: "/notes/:id",
      name: "Note",
      component: () => import("../views/NoteView.vue"),
    },
    {
      path: "/log_in",
      name: "Log In",
      component: () => import("../views/LogInView.vue"),
    },
    {
      path: "/sign_up",
      name: "Sign Up",
      component: () => import("../views/SignUpView.vue"),
    },
  ],
});

router.beforeEach((to, from) => {
  const sessionStore = useSessionStore()
  const sessionPaths = ["/log_in", "/sign_up"]
  if (!sessionStore.isLoggedIn && !sessionPaths.includes(to.path)) {
    return { name: "Log In" };
  }
  if (sessionStore.isLoggedIn && sessionPaths.includes(to.path)) {
    return { name: "Notes" };
  }
})

export default router

(() => {
  if (!location.pathname.toLowerCase().endsWith(".html") && !document.querySelector("[data-static-router]")) {
    return;
  }

  const routes = {
    "/home.php": "public/home.html",
    "/index.php": "public/access-portal.html",
    "/admin-feed.php": "public/admin-feed.html",
    "/accessibility.php": "public/accessibility.html",
    "/author-guidelines.php": "public/author-guidelines.html",
    "/contact.php": "public/contact.html",
    "/help-center.php": "public/help-center.html",
    "/privacy-policy.php": "public/privacy-policy.html",
    "/report-policy.php": "public/report-policy.html",
    "/terms.php": "public/terms.html",
    "/account.php": "user/account.html",
    "/archives.php": "user/archives.html",
    "/author-request.php": "user/author-request.html",
    "/change-password.php": "user/change-password.html",
    "/messages.php": "user/messages.html",
    "/settings.php": "user/settings.html",
    "/admin-dashboard.php": "admin/dashboard.html",
    "/admin-users.php": "admin/users.html",
    "/admin-authors.php": "admin/authors.html",
    "/admin-resource-management.php": "admin/resource-management.html",
    "/admin-reports.php": "admin/reports.html",
    "/admin-messages.php": "admin/messages.html",
    "/admin-author-requests.php": "admin/author-requests.html",
    "/admin-create-feed.php": "admin/create-feed.html",
    "/logout.php": "public/access-portal.html"
  };

  const section = () => {
    const path = location.pathname.toLowerCase();
    if (path.includes("/admin/")) return "admin";
    if (path.includes("/author/")) return "author";
    if (path.includes("/user/")) return "user";
    return "public";
  };

  const rootPrefix = () => (["admin", "author", "public", "user"].includes(section()) ? "../" : "");

  const routeFor = (href) => {
    const url = new URL(href, location.href);
    const path = url.pathname.toLowerCase();

    if (path === "/index.php" && url.searchParams.get("demo")) {
      const role = url.searchParams.get("demo");
      if (role === "admin") return "admin/dashboard.html";
      if (role === "author") return "author/dashboard.html";
      return "user/browse.html";
    }

    if (path === "/browse.php") {
      return section() === "author" ? "author/browse.html" : "user/browse.html";
    }

    if (path === "/content.php") {
      return section() === "author" ? "author/content-1.html" : "user/content-1.html";
    }

    if (path === "/role-switch.php") {
      return null;
    }

    return routes[path] || null;
  };

  const openRoute = (target) => {
    location.href = rootPrefix() + target;
  };

  document.addEventListener("click", (event) => {
    const link = event.target.closest("a[href]");
    if (!link || event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;

    const target = routeFor(link.getAttribute("href"));
    if (!target) return;

    event.preventDefault();
    openRoute(target);
  });

  document.addEventListener("submit", (event) => {
    const form = event.target;
    if (!(form instanceof HTMLFormElement)) return;

    const action = form.getAttribute("action") || location.pathname;
    const actionRoute = routeFor(action);
    const role = form.querySelector("[name='role']")?.value;

    if (role) {
      event.preventDefault();
      openRoute(role === "admin" ? "admin/dashboard.html" : role === "author" ? "author/dashboard.html" : "user/browse.html");
      return;
    }

    if (actionRoute || location.pathname.toLowerCase().endsWith("/access-portal.html")) {
      event.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
      }
      openRoute(actionRoute || "user/browse.html");
    }
  });
})();

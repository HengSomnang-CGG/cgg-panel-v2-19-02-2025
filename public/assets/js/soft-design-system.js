"use strict";

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')),
    popoverList = popoverTriggerList.map((function (e) {
        return new bootstrap.Popover(e)
    })),
    tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')),
    tooltipList = tooltipTriggerList.map((function (e) {
        return new bootstrap.Tooltip(e)
    }));
if (document.addEventListener("DOMContentLoaded", (function () {
    [].slice.call(document.querySelectorAll(".toast")).map((function (e) {
        return new bootstrap.Toast(e)
    }));
    [].slice.call(document.querySelectorAll(".toast-btn")).map((function (e) {
        e.addEventListener("click", (function () {
            var t = document.getElementById(e.dataset.target);
            t && bootstrap.Toast.getInstance(t).show()
        }))
    }))
})), document.querySelector('[data-toggle="widget-calendar"]')) {
    var calendarEl = document.querySelector('[data-toggle="widget-calendar"]'),
        today = new Date,
        mYear = today.getFullYear(),
        weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        mDay = weekday[today.getDay()],
        m = today.getMonth(),
        d = today.getDate();
    document.getElementsByClassName("widget-calendar-year")[0].innerHTML = mYear, document.getElementsByClassName(
        "widget-calendar-day")[0].innerHTML = mDay;
    var calendar = new FullCalendar.Calendar(calendarEl, {
        contentHeight: "auto",
        initialView: "dayGridMonth",
        selectable: !0,
        initialDate: "2020-12-01",
        editable: !0,
        headerToolbar: !1,
        events: [{
            title: "Call with Dave",
            start: "2020-11-18",
            end: "2020-11-18",
            className: "bg-gradient-danger"
        }, {
            title: "Lunch meeting",
            start: "2020-11-21",
            end: "2020-11-22",
            className: "bg-gradient-warning"
        }, {
            title: "All day conference",
            start: "2020-11-29",
            end: "2020-11-29",
            className: "bg-gradient-success"
        }, {
            title: "Meeting with Mary",
            start: "2020-12-01",
            end: "2020-12-01",
            className: "bg-gradient-info"
        }, {
            title: "Winter Hackaton",
            start: "2020-12-03",
            end: "2020-12-03",
            className: "bg-gradient-danger"
        }, {
            title: "Digital event",
            start: "2020-12-07",
            end: "2020-12-09",
            className: "bg-gradient-warning"
        }, {
            title: "Marketing event",
            start: "2020-12-10",
            end: "2020-12-10",
            className: "bg-gradient-primary"
        }, {
            title: "Dinner with Family",
            start: "2020-12-19",
            end: "2020-12-19",
            className: "bg-gradient-danger"
        }, {
            title: "Black Friday",
            start: "2020-12-23",
            end: "2020-12-23",
            className: "bg-gradient-info"
        }, {
            title: "Cyber Week",
            start: "2020-12-02",
            end: "2020-12-02",
            className: "bg-gradient-warning"
        }]
    });
    calendar.render()
}

function focused(e) {
    e.parentElement.classList.contains("input-group") && e.parentElement.classList.add("focused")
}

function defocused(e) {
    e.parentElement.classList.contains("input-group") && e.parentElement.classList.remove("focused")
}

function setAttributes(e, t) {
    Object.keys(t).forEach((function (a) {
        e.setAttribute(a, t[a])
    }))
}
if (0 != document.querySelectorAll(".input-group").length) {
    var allInputs = document.querySelectorAll("input.form-control");
    allInputs.forEach((e => setAttributes(e, {
        onfocus: "focused(this)",
        onfocusout: "defocused(this)"
    })))
}

function dropDown(e) {
    if (!document.querySelector(".dropdown-hover")) {
        event.stopPropagation(), event.preventDefault();
        for (var t = e.parentElement.parentElement.children, a = 0; a < t.length; a++) t[a].lastElementChild != e
            .parentElement.lastElementChild && t[a].lastElementChild.classList.remove("show");
        e.nextElementSibling.classList.contains("show") ? e.nextElementSibling.classList.remove("show") : e
            .nextElementSibling.classList.add("show")
    }
}
if (document.querySelector(".fixed-plugin")) {
    var fixedPlugin = document.querySelector(".fixed-plugin"),
        fixedPluginButton = document.querySelector(".fixed-plugin-button"),
        fixedPluginButtonNav = document.querySelector(".fixed-plugin-button-nav"),
        fixedPluginCard = document.querySelector(".fixed-plugin .card"),
        fixedPluginCloseButton = document.querySelectorAll(".fixed-plugin-close-button"),
        navbar = document.getElementById("navbarBlur"),
        buttonNavbarFixed = document.getElementById("navbarFixed");
    fixedPluginButton && (fixedPluginButton.onclick = function () {
        fixedPlugin.classList.contains("show") ? fixedPlugin.classList.remove("show") : fixedPlugin
            .classList.add("show")
    }), fixedPluginButtonNav && (fixedPluginButtonNav.onclick = function () {
        fixedPlugin.classList.contains("show") ? fixedPlugin.classList.remove("show") : fixedPlugin
            .classList.add("show")
    }), fixedPluginCloseButton.forEach((function (e) {
        e.onclick = function () {
            fixedPlugin.classList.remove("show")
        }
    })), document.querySelector("body").onclick = function (e) {
        e.target != fixedPluginButton && e.target != fixedPluginButtonNav && e.target.closest(
            ".fixed-plugin .card") != fixedPluginCard && fixedPlugin.classList.remove("show")
    }, navbar && "true" == navbar.getAttribute("data-scroll") && buttonNavbarFixed && buttonNavbarFixed
        .setAttribute("checked", "true")
}

function sidebarColor(e) {
    for (var t = e.parentElement.children, a = e.getAttribute("data-color"), n = 0; n < t.length; n++) t[n]
        .classList.remove("active");
    if (e.classList.contains("active") ? e.classList.remove("active") : e.classList.add("active"), document
        .querySelector(".sidenav").setAttribute("data-color", a), document.querySelector("#sidenavCard")) {
        var i = document.querySelector("#sidenavCard");
        let e = ["card", "card-background", "shadow-none", "card-background-mask-" + a];
        i.className = "", i.classList.add(...e);
        var l = document.querySelector("#sidenavCardIcon");
        let t = ["ni", "ni-diamond", "text-gradient", "text-lg", "top-0", "text-" + a];
        l.className = "", l.classList.add(...t)
    }
}

function sidebarType(e) {
    for (var t = e.parentElement.children, a = e.getAttribute("data-class"), n = [], i = 0; i < t.length; i++) t[i]
        .classList.remove("active"), n.push(t[i].getAttribute("data-class"));
    e.classList.contains("active") ? e.classList.remove("active") : e.classList.add("active");
    var l = document.querySelector(".sidenav");
    for (i = 0; i < n.length; i++) l.classList.remove(n[i]);
    l.classList.add(a)
}

function navbarFixed(e) {
    let t = ["position-sticky", "blur", "shadow-blur", "mt-4", "left-auto", "top-1", "z-index-sticky"];
    const a = document.getElementById("navbarBlur");
    e.getAttribute("checked") ? (a.classList.remove(...t), a.setAttribute("data-scroll", "false"),
        navbarBlurOnScroll("navbarBlur"), e.removeAttribute("checked")) : (a.classList.add(...t), a
            .setAttribute("data-scroll", "true"), navbarBlurOnScroll("navbarBlur"), e.setAttribute("checked",
                "true"))
}

function navbarMinimize(e) {
    var t = document.getElementsByClassName("g-sidenav-show")[0];
    e.getAttribute("checked") ? (t.classList.remove("g-sidenav-hidden"), t.classList.add("g-sidenav-pinned"), e
        .removeAttribute("checked")) : (t.classList.remove("g-sidenav-pinned"), t.classList.add(
            "g-sidenav-hidden"), e.setAttribute("checked", "true"))
}

function navbarBlurOnScroll(e) {
    const t = document.getElementById(e);
    let a = !!t && t.getAttribute("data-scroll"),
        n = ["blur", "shadow-blur", "left-auto"],
        i = ["shadow-none"];
    if (window.onscroll = debounce("true" == a ? function () {
        window.scrollY > 5 ? o() : r()
    } : function () {
        r()
    }, 10), navigator.platform.indexOf("Win") > -1) {
        var l = document.querySelector(".main-content");
        "true" == a ? l.addEventListener("ps-scroll-y", debounce((function () {
            l.scrollTop > 5 ? o() : r()
        }), 10)) : l.addEventListener("ps-scroll-y", debounce((function () {
            r()
        }), 10))
    }

    function o() {
        t.classList.add(...n), t.classList.remove(...i), s("blur")
    }

    function r() {
        t.classList.remove(...n), t.classList.add(...i), s("transparent")
    }

    function s(e) {
        let t = document.querySelectorAll(".navbar-main .nav-link"),
            a = document.querySelectorAll(".navbar-main .sidenav-toggler-line");
        "blur" === e ? (t.forEach((e => {
            e.classList.remove("text-body")
        })), a.forEach((e => {
            e.classList.add("bg-dark")
        }))) : "transparent" === e && (t.forEach((e => {
            e.classList.add("text-body")
        })), a.forEach((e => {
            e.classList.remove("bg-dark")
        })))
    }
}

function debounce(e, t, a) {
    var n;
    return function () {
        var i = this,
            l = arguments,
            o = function () {
                n = null, a || e.apply(i, l)
            },
            r = a && !n;
        clearTimeout(n), n = setTimeout(o, t), r && e.apply(i, l)
    }
}
var total = document.querySelectorAll(".nav-pills");

function initNavs() {
    total.forEach((function (e, t) {
        var a = document.createElement("div"),
            n = e.querySelector("li:first-child .nav-link").cloneNode();
        n.innerHTML = "-", a.classList.add("moving-tab", "position-absolute", "nav-link"), a
            .appendChild(n), e.appendChild(a);
        e.getElementsByTagName("li").length;
        a.style.padding = "0px", a.style.width = e.querySelector("li:nth-child(1)").offsetWidth + "px",
            a.style.transform = "translate3d(0px, 0px, 0px)", a.style.transition = ".5s ease", e
                .onmouseover = function (t) {
                    let n = getEventTarget(t).closest("li");
                    if (n) {
                        let t = Array.from(n.closest("ul").children),
                            i = t.indexOf(n) + 1;
                        e.querySelector("li:nth-child(" + i + ") .nav-link").onclick = function () {
                            a = e.querySelector(".moving-tab");
                            let l = 0;
                            if (e.classList.contains("flex-column")) {
                                for (var o = 1; o <= t.indexOf(n); o++) l += e.querySelector(
                                    "li:nth-child(" + o + ")").offsetHeight;
                                a.style.transform = "translate3d(0px," + l + "px, 0px)", a.style
                                    .height = e.querySelector("li:nth-child(" + o + ")").offsetHeight
                            } else {
                                for (o = 1; o <= t.indexOf(n); o++) l += e.querySelector(
                                    "li:nth-child(" + o + ")").offsetWidth;
                                a.style.transform = "translate3d(" + l + "px, 0px, 0px)", a.style
                                    .width = e.querySelector("li:nth-child(" + i + ")").offsetWidth +
                                    "px"
                            }
                        }
                    }
                }
    }))
}

function getEventTarget(e) {
    return (e = e || window.event).target || e.srcElement
}
if (setTimeout((function () {
    initNavs()
}), 100), window.addEventListener("resize", (function (e) {
    total.forEach((function (e, t) {
        e.querySelector(".moving-tab").remove();
        var a = document.createElement("div"),
            n = e.querySelector(".nav-link.active").cloneNode();
        n.innerHTML = "-", a.classList.add("moving-tab", "position-absolute", "nav-link"), a
            .appendChild(n), e.appendChild(a), a.style.padding = "0px", a.style.transition =
            ".5s ease";
        let i = e.querySelector(".nav-link.active").parentElement;
        if (i) {
            let t = Array.from(i.closest("ul").children),
                n = t.indexOf(i) + 1,
                o = 0;
            if (e.classList.contains("flex-column")) {
                for (var l = 1; l <= t.indexOf(i); l++) o += e.querySelector(
                    "li:nth-child(" + l + ")").offsetHeight;
                a.style.transform = "translate3d(0px," + o + "px, 0px)", a.style.width = e
                    .querySelector("li:nth-child(" + n + ")").offsetWidth + "px", a.style
                        .height = e.querySelector("li:nth-child(" + l + ")").offsetHeight
            } else {
                for (l = 1; l <= t.indexOf(i); l++) o += e.querySelector("li:nth-child(" +
                    l + ")").offsetWidth;
                a.style.transform = "translate3d(" + o + "px, 0px, 0px)", a.style.width = e
                    .querySelector("li:nth-child(" + n + ")").offsetWidth + "px"
            }
        }
    })), window.innerWidth < 991 ? total.forEach((function (e, t) {
        if (!e.classList.contains("flex-column")) {
            e.classList.remove("flex-row"), e.classList.add("flex-column", "on-resize");
            let t = e.querySelector(".nav-link.active").parentElement,
                i = Array.from(t.closest("ul").children),
                l = (i.indexOf(t), 0);
            for (var a = 1; a <= i.indexOf(t); a++) l += e.querySelector("li:nth-child(" +
                a + ")").offsetHeight;
            var n = document.querySelector(".moving-tab");
            n.style.width = e.querySelector("li:nth-child(1)").offsetWidth + "px", n.style
                .transform = "translate3d(0px," + l + "px, 0px)"
        }
    })) : total.forEach((function (e, t) {
        if (e.classList.contains("on-resize")) {
            e.classList.remove("flex-column", "on-resize"), e.classList.add("flex-row");
            let t = e.querySelector(".nav-link.active").parentElement,
                i = Array.from(t.closest("ul").children),
                l = i.indexOf(t) + 1,
                o = 0;
            for (var a = 1; a <= i.indexOf(t); a++) o += e.querySelector("li:nth-child(" +
                a + ")").offsetWidth;
            var n = document.querySelector(".moving-tab");
            n.style.transform = "translate3d(" + o + "px, 0px, 0px)", n.style.width = e
                .querySelector("li:nth-child(" + l + ")").offsetWidth + "px"
        }
    }))
})), window.innerWidth < 991 && total.forEach((function (e, t) {
    e.classList.contains("flex-row") && (e.classList.remove("flex-row"), e.classList.add("flex-column",
        "on-resize"))
})), document.querySelector(".sidenav-toggler")) {
    var sidenavToggler = document.getElementsByClassName("sidenav-toggler")[0],
        sidenavShow = document.getElementsByClassName("g-sidenav-show")[0],
        toggleNavbarMinimize = document.getElementById("navbarMinimize");
    sidenavShow && (sidenavToggler.onclick = function () {
        sidenavShow.classList.contains("g-sidenav-hidden") ? (sidenavShow.classList.remove(
            "g-sidenav-hidden"), sidenavShow.classList.add("g-sidenav-pinned"),
            toggleNavbarMinimize && (toggleNavbarMinimize.click(), toggleNavbarMinimize.removeAttribute(
                "checked"))) : (sidenavShow.classList.remove("g-sidenav-pinned"), sidenavShow.classList
                    .add("g-sidenav-hidden"), toggleNavbarMinimize && (toggleNavbarMinimize.click(),
                        toggleNavbarMinimize.setAttribute("checked", "true")))
    })
}
const iconNavbarSidenav = document.getElementById("iconNavbarSidenav"),
    iconSidenav = document.getElementById("iconSidenav"),
    sidenav = document.getElementById("sidenav-main");
let body = document.getElementsByTagName("body")[0],
    className = "g-sidenav-pinned";

function toggleSidenav() {
    const body = document.body;
    const sidenav = document.getElementById("sidenav-main");
    if (!sidenav) {
        console.error("Sidenav element not found");
        return;
    }

    const className = "g-sidenav-pinned";
    if (body.classList.contains(className)) {
        body.classList.remove(className);
        setTimeout(() => sidenav.classList.remove("bg-white"), 100);
        sidenav.classList.remove("bg-transparent");
    } else {
        body.classList.add(className);
        sidenav.classList.add("bg-white");
        sidenav.classList.remove("bg-transparent");
    }
}
iconNavbarSidenav && iconNavbarSidenav.addEventListener("click", toggleSidenav), iconSidenav && iconSidenav
    .addEventListener("click", toggleSidenav);
let referenceButtons = document.querySelector("[data-class]");

function navbarColorOnResize() {
    const sidenav = document.getElementById("sidenav-main");
    const referenceButtons = document.querySelector("[data-class]");

    // Check if elements exist before accessing their properties
    if (sidenav && referenceButtons) {
        if (window.innerWidth > 1200) {
            if (referenceButtons.classList.contains("active") && referenceButtons.getAttribute("data-class") === "bg-transparent") {
                sidenav.classList.remove("bg-white");
            } else {
                sidenav.classList.add("bg-white");
            }
        } else {
            sidenav.classList.add("bg-white");
            sidenav.classList.remove("bg-transparent");
        }
    } else {
        // console.warn("Required elements for navbarColorOnResize not found.");
    }
}


function sidenavTypeOnResize() {
    let e = document.querySelectorAll('[onclick="sidebarType(this)"]');
    window.innerWidth < 1200 ? e.forEach((function (e) {
        e.classList.add("disabled")
    })) : e.forEach((function (e) {
        e.classList.remove("disabled")
    }))
}

function notify(e) {
    var t = document.querySelector("body"),
        a = document.createElement("div");
    a.classList.add("alert", "position-absolute", "top-0", "border-0", "text-white", "w-50", "end-0", "start-0",
        "mt-2", "mx-auto", "py-2"), a.classList.add("alert-" + e.getAttribute("data-type")), a.style.transform =
        "translate3d(0px, 0px, 0px)", a.style.opacity = "0", a.style.transition = ".35s ease", setTimeout((
            function () {
                a.style.transform = "translate3d(0px, 20px, 0px)", a.style.setProperty("opacity", "1",
                    "important")
            }), 100), a.innerHTML = '<div class="d-flex mb-1"><div class="alert-icon me-1"><i class="' + e
                .getAttribute(
                    "data-icon") + ' mt-1"></i></div><span class="alert-text"><strong>' + e.getAttribute("data-title") +
            '</strong></span></div><span class="text-sm">' + e.getAttribute("data-content") + "</span>", t.appendChild(
                a), setTimeout((function () {
                    a.style.transform = "translate3d(0px, 0px, 0px)", a.style.setProperty("opacity", "0",
                        "important")
                }), 4e3), setTimeout((function () {
                    e.parentElement.querySelector(".alert").remove()
                }), 4500)
}
window.addEventListener("resize", navbarColorOnResize), window.addEventListener("resize", sidenavTypeOnResize),
    window.addEventListener("load", sidenavTypeOnResize);
var soft = {
    initFullCalendar: function () {
        document.addEventListener("DOMContentLoaded", (function () {
            var e = document.getElementById("fullCalendar"),
                t = new Date,
                a = t.getFullYear(),
                n = t.getMonth(),
                i = t.getDate(),
                l = new FullCalendar.Calendar(e, {
                    initialView: "dayGridMonth",
                    selectable: !0,
                    headerToolbar: {
                        left: "title",
                        center: "dayGridMonth,timeGridWeek,timeGridDay",
                        right: "prev,next today"
                    },
                    select: function (e) {
                        Swal.fire({
                            title: "Create an Event",
                            html: '<div class="form-group"><input class="form-control text-default" placeholder="Event Title" id="input-field"></div>',
                            showCancelButton: !0,
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-danger"
                            },
                            buttonsStyling: !1
                        }).then((function (t) {
                            var a, n = document.getElementById(
                                "input-field").value;
                            n && (a = {
                                title: n,
                                start: e.startStr,
                                end: e.endStr
                            }, l.addEvent(a))
                        }))
                    },
                    editable: !0,
                    events: [{
                        title: "All Day Event",
                        start: new Date(a, n, 1),
                        className: "event-default"
                    }, {
                        id: 999,
                        title: "Repeating Event",
                        start: new Date(a, n, i - 4, 6, 0),
                        allDay: !1,
                        className: "event-rose"
                    }, {
                        id: 999,
                        title: "Repeating Event",
                        start: new Date(a, n, i + 3, 6, 0),
                        allDay: !1,
                        className: "event-rose"
                    }, {
                        title: "Meeting",
                        start: new Date(a, n, i - 1, 10, 30),
                        allDay: !1,
                        className: "event-green"
                    }, {
                        title: "Lunch",
                        start: new Date(a, n, i + 7, 12, 0),
                        end: new Date(a, n, i + 7, 14, 0),
                        allDay: !1,
                        className: "event-red"
                    }, {
                        title: "Md-pro Launch",
                        start: new Date(a, n, i - 2, 12, 0),
                        allDay: !0,
                        className: "event-azure"
                    }, {
                        title: "Birthday Party",
                        start: new Date(a, n, i + 1, 19, 0),
                        end: new Date(a, n, i + 1, 22, 30),
                        allDay: !1,
                        className: "event-azure"
                    }, {
                        title: "Click for Creative Tim",
                        start: new Date(a, n, 21),
                        end: new Date(a, n, 22),
                        url: "http://www.creative-tim.com/",
                        className: "event-orange"
                    }, {
                        title: "Click for Google",
                        start: new Date(a, n, 23),
                        end: new Date(a, n, 23),
                        url: "http://www.creative-tim.com/",
                        className: "event-orange"
                    }]
                });
            l.render()
        }))
    },
    datatableSimple: function () {
        var e = {
            columnDefs: [{
                field: "athlete",
                minWidth: 150,
                sortable: !0,
                filter: !0
            }, {
                field: "age",
                maxWidth: 90,
                sortable: !0,
                filter: !0
            }, {
                field: "country",
                minWidth: 150,
                sortable: !0,
                filter: !0
            }, {
                field: "year",
                maxWidth: 90,
                sortable: !0,
                filter: !0
            }, {
                field: "date",
                minWidth: 150,
                sortable: !0,
                filter: !0
            }, {
                field: "sport",
                minWidth: 150,
                sortable: !0,
                filter: !0
            }, {
                field: "gold"
            }, {
                field: "silver"
            }, {
                field: "bronze"
            }, {
                field: "total"
            }],
            rowSelection: "multiple",
            rowMultiSelectWithClick: !0,
            rowData: [{
                athlete: "Ronald Valencia",
                age: 23,
                country: "United States",
                year: 2008,
                date: "24/08/2008",
                sport: "Swimming",
                gold: 8,
                silver: 0,
                bronze: 0,
                total: 8
            }, {
                athlete: "Lorand Frentz",
                age: 19,
                country: "United States",
                year: 2004,
                date: "29/08/2004",
                sport: "Swimming",
                gold: 6,
                silver: 0,
                bronze: 2,
                total: 8
            }, {
                athlete: "Michael Phelps",
                age: 27,
                country: "United States",
                year: 2012,
                date: "12/08/2012",
                sport: "Swimming",
                gold: 4,
                silver: 2,
                bronze: 0,
                total: 6
            }, {
                athlete: "Natalie Coughlin",
                age: 25,
                country: "United States",
                year: 2008,
                date: "24/08/2008",
                sport: "Swimming",
                gold: 1,
                silver: 2,
                bronze: 3,
                total: 6
            }, {
                athlete: "Aleksey Nemov",
                age: 24,
                country: "Russia",
                year: 2e3,
                date: "01/10/2000",
                sport: "Gymnastics",
                gold: 2,
                silver: 1,
                bronze: 3,
                total: 6
            }, {
                athlete: "Alicia Coutts",
                age: 24,
                country: "Australia",
                year: 2012,
                date: "12/08/2012",
                sport: "Swimming",
                gold: 1,
                silver: 3,
                bronze: 1,
                total: 5
            }, {
                athlete: "Missy Franklin",
                age: 17,
                country: "United States",
                year: 2012,
                date: "12/08/2012",
                sport: "Swimming",
                gold: 4,
                silver: 0,
                bronze: 1,
                total: 5
            }, {
                athlete: "Ryan Lochte",
                age: 27,
                country: "United States",
                year: 2012,
                date: "12/08/2012",
                sport: "Swimming",
                gold: 2,
                silver: 2,
                bronze: 1,
                total: 5
            }, {
                athlete: "Allison Schmitt",
                age: 22,
                country: "United States",
                year: 2012,
                date: "12/08/2012",
                sport: "Swimming",
                gold: 3,
                silver: 1,
                bronze: 1,
                total: 5
            }, {
                athlete: "Natalie Coughlin",
                age: 21,
                country: "United States",
                year: 2004,
                date: "29/08/2004",
                sport: "Swimming",
                gold: 2,
                silver: 2,
                bronze: 1,
                total: 5
            }, {
                athlete: "Ian Thorpe",
                age: 17,
                country: "Australia",
                year: 2e3,
                date: "01/10/2000",
                sport: "Swimming",
                gold: 3,
                silver: 2,
                bronze: 0,
                total: 5
            }, {
                athlete: "Dara Torres",
                age: 33,
                country: "United States",
                year: 2e3,
                date: "01/10/2000",
                sport: "Swimming",
                gold: 2,
                silver: 0,
                bronze: 3,
                total: 5
            }, {
                athlete: "Cindy Klassen",
                age: 26,
                country: "Canada",
                year: 2006,
                date: "26/02/2006",
                sport: "Speed Skating",
                gold: 1,
                silver: 2,
                bronze: 2,
                total: 5
            }, {
                athlete: "Nastia Liukin",
                age: 18,
                country: "United States",
                year: 2008,
                date: "24/08/2008",
                sport: "Gymnastics",
                gold: 1,
                silver: 3,
                bronze: 1,
                total: 5
            }, {
                athlete: "Marit Bjørgen",
                age: 29,
                country: "Norway",
                year: 2010,
                date: "28/02/2010",
                sport: "Cross Country Skiing",
                gold: 3,
                silver: 1,
                bronze: 1,
                total: 5
            }, {
                athlete: "Sun Yang",
                age: 20,
                country: "China",
                year: 2012,
                date: "12/08/2012",
                sport: "Swimming",
                gold: 2,
                silver: 1,
                bronze: 1,
                total: 4
            }]
        };
        document.addEventListener("DOMContentLoaded", (function () {
            var t = document.querySelector("#datatableSimple");
            new agGrid.Grid(t, e)
        }))
    },
    initVectorMap: function () {
        am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("chartdiv", am4maps.MapChart);
            e.geodata = am4geodata_worldLow, e.projection = new am4maps.projections.Miller;
            var t = e.series.push(new am4maps.MapPolygonSeries);
            t.exclude = ["AQ"], t.useGeodata = !0;
            var a = t.mapPolygons.template;
            a.tooltipText = "{name}", a.polygon.fillOpacity = .6, a.states.create("hover")
                .properties.fill = e.colors.getIndex(0);
            var n = e.series.push(new am4maps.MapImageSeries);
            n.mapImages.template.propertyFields.longitude = "longitude", n.mapImages.template
                .propertyFields.latitude = "latitude", n.mapImages.template.tooltipText =
                "{title}", n.mapImages.template.propertyFields.url = "url";
            var i = n.mapImages.template.createChild(am4core.Circle);
            i.radius = 3, i.propertyFields.fill = "color";
            var l = n.mapImages.template.createChild(am4core.Circle);

            function o(e) {
                e.animate([{
                    property: "scale",
                    from: 1,
                    to: 5
                }, {
                    property: "opacity",
                    from: 1,
                    to: 0
                }], 1e3, am4core.ease.circleOut).events.on("animationended", (function (e) {
                    o(e.target.object)
                }))
            }
            l.radius = 3, l.propertyFields.fill = "color", l.events.on("inited", (function (e) {
                o(e.target)
            }));
            var r = new am4core.ColorSet;
            n.data = [{
                title: "Brussels",
                latitude: 50.8371,
                longitude: 4.3676,
                color: r.next()
            }, {
                title: "Copenhagen",
                latitude: 55.6763,
                longitude: 12.5681,
                color: r.next()
            }, {
                title: "Paris",
                latitude: 48.8567,
                longitude: 2.351,
                color: r.next()
            }, {
                title: "Reykjavik",
                latitude: 64.1353,
                longitude: -21.8952,
                color: r.next()
            }, {
                title: "Moscow",
                latitude: 55.7558,
                longitude: 37.6176,
                color: r.next()
            }, {
                title: "Madrid",
                latitude: 40.4167,
                longitude: -3.7033,
                color: r.next()
            }, {
                title: "London",
                latitude: 51.5002,
                longitude: -.1262,
                url: "http://www.google.co.uk",
                color: r.next()
            }, {
                title: "Peking",
                latitude: 39.9056,
                longitude: 116.3958,
                color: r.next()
            }, {
                title: "New Delhi",
                latitude: 28.6353,
                longitude: 77.225,
                color: r.next()
            }, {
                title: "Tokyo",
                latitude: 35.6785,
                longitude: 139.6823,
                url: "http://www.google.co.jp",
                color: r.next()
            }, {
                title: "Ankara",
                latitude: 39.9439,
                longitude: 32.856,
                color: r.next()
            }, {
                title: "Buenos Aires",
                latitude: -34.6118,
                longitude: -58.4173,
                color: r.next()
            }, {
                title: "Brasilia",
                latitude: -15.7801,
                longitude: -47.9292,
                color: r.next()
            }, {
                title: "Ottawa",
                latitude: 45.4235,
                longitude: -75.6979,
                color: r.next()
            }, {
                title: "Washington",
                latitude: 38.8921,
                longitude: -77.0241,
                color: r.next()
            }, {
                title: "Kinshasa",
                latitude: -4.3369,
                longitude: 15.3271,
                color: r.next()
            }, {
                title: "Cairo",
                latitude: 30.0571,
                longitude: 31.2272,
                color: r.next()
            }, {
                title: "Pretoria",
                latitude: -25.7463,
                longitude: 28.1876,
                color: r.next()
            }]
        }))
    },
    showSwal: function (e) {
        if ("basic" == e) Swal.fire("Any fool can use a computer");
        else if ("title-and-text" == e) {
            Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger"
                }
            }).fire({
                title: "Sweet!",
                text: "Modal with a custom image.",
                imageUrl: "https://unsplash.it/400/200",
                imageWidth: 400,
                imageAlt: "Custom image"
            })
        } else if ("success-message" == e) Swal.fire("Good job!", "You clicked the button!", "success");
        else if ("warning-message-and-confirmation" == e) {
            const e = Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger"
                },
                buttonsStyling: !1
            });
            e.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: !0
            }).then((t => {
                t.value ? e.fire("Deleted!", "Your file has been deleted.", "success") : t
                    .dismiss === Swal.DismissReason.cancel && e.fire("Cancelled",
                        "Your imaginary file is safe :)", "error")
            }))
        } else if ("warning-message-and-cancel" == e) {
            Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger"
                },
                buttonsStyling: !1
            }).fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!"
            }).then((e => {
                e.isConfirmed && Swal.fire("Deleted!", "Your file has been deleted.", "success")
            }))
        } else if ("custom-html" == e) {
            Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger"
                },
                buttonsStyling: !1
            }).fire({
                title: "<strong>HTML <u>example</u></strong>",
                icon: "info",
                html: 'You can use <b>bold text</b>, <a href="//sweetalert2.github.io">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                focusConfirm: !1,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                confirmButtonAriaLabel: "Thumbs up, great!",
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                cancelButtonAriaLabel: "Thumbs down"
            })
        } else if ("rtl-language" == e) {
            Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger"
                },
                buttonsStyling: !1
            }).fire({
                title: "هل تريد الاستمرار؟",
                icon: "question",
                iconHtml: "؟",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                showCancelButton: !0,
                showCloseButton: !0
            })
        } else if ("auto-close" == e) {
            let e;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <b></b> milliseconds.",
                timer: 2e3,
                timerProgressBar: !0,
                didOpen: () => {
                    Swal.showLoading(), e = setInterval((() => {
                        const e = Swal.getHtmlContainer();
                        if (e) {
                            const t = e.querySelector("b");
                            t && (t.textContent = Swal.getTimerLeft())
                        }
                    }), 100)
                },
                willClose: () => {
                    clearInterval(e)
                }
            }).then((e => {
                e.dismiss, Swal.DismissReason.timer
            }))
        } else if ("input-field" == e) {
            Swal.mixin({
                customClass: {
                    confirmButton: "btn bg-gradient-success",
                    cancelButton: "btn bg-gradient-danger"
                },
                buttonsStyling: !1
            }).fire({
                title: "Submit your Github username",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: !0,
                confirmButtonText: "Look up",
                showLoaderOnConfirm: !0,
                preConfirm: e => fetch(`//api.github.com/users/${e}`).then((e => {
                    if (!e.ok) throw new Error(e.statusText);
                    return e.json()
                })).catch((e => {
                    Swal.showValidationMessage(`Request failed: ${e}`)
                })),
                allowOutsideClick: () => !Swal.isLoading()
            }).then((e => {
                e.isConfirmed && Swal.fire({
                    title: `${e.value.login}'s avatar`,
                    imageUrl: e.value.avatar_url
                })
            }))
        }
    }
};

function defineSequence(a, b) {
    "use strict";
    var c = [],
        d = 0,
        e = function (e, f) {
            function p(a) {
                return "[object Array]" === Object.prototype.toString.call(a);
            }
            function q(a, b) {
                for (var c in b) a[c] = b[c];
                return a;
            }
            function r(a, b) {
                var c;
                return a.currentStyle ? (c = a.currentStyle[b]) : document.defaultView && document.defaultView.getComputedStyle && (c = document.defaultView.getComputedStyle(a, "")[b]), c;
            }
            function s(a, b, c) {
                if (a.addEventListener) return a.addEventListener(b, c, !1), c;
                if (a.attachEvent) {
                    var d = function () {
                        c.call(a);
                    };
                    return a.attachEvent("on" + b, d), d;
                }
            }
            function t(a, b, c) {
                a.addEventListener ? a.removeEventListener(b, c, !1) : a.detachEvent && a.detachEvent("on" + b, c);
            }
            function u(a) {
                var b, c;
                return (c = a.indexOf("ms") > -1 ? 1 : 1e3), (b = "0s" == a ? 0 : parseFloat(a.replace("s", "")) * c);
            }
            function v(a, b) {
                if (void 0 !== a) return new RegExp("(\\s|^)" + b + "(\\s|$)").test(a.className);
            }
            function w(a, b) {
                var c, d, e;
                for (p(a) === !1 && ((d = 1), (a = [a])), d = a.length, e = 0; e < d; e++) (c = a[e]), v(c, b) === !1 && (c.className += (c.className ? " " : "") + b);
            }
            function x(a, b) {
                var c, d, e;
                for (p(a) === !1 ? ((d = 1), (a = [a])) : (d = a.length), e = 0; e < d; e++) (c = a[e]), v(c, b) === !0 && (c.className = c.className.replace(new RegExp("(\\s|^)" + b + "(\\s|$)"), " ").replace(/^\s+|\s+$/g, ""));
            }
            function y(a, b) {
                var c = a.getBoundingClientRect(),
                    d = !1;
                return b.clientX >= c.left && b.clientX <= c.right && b.clientY >= c.top && b.clientY <= c.bottom && (d = !0), d;
            }
            function z(a, b, c) {
                if ("BODY" === b.nodeName) return !1;
                if (a !== b) return (c = b), z(a, b.parentNode, c);
                if (void 0 !== c) for (var d = c, e = a.getElementsByTagName(d.nodeName), f = e.length; f--; ) if (d === e[f]) return f + 1;
            }
            function A(a) {
                var c = 0,
                    d = b.DIRECTION_NONE;
                return (
                    (void 0 === a.left && void 0 === a.right) || (c += 1),
                    (void 0 === a.up && void 0 === a.down) || (c += 2),
                    1 === c ? (d = b.DIRECTION_HORIZONTAL) : 2 === c ? (d = b.DIRECTION_VERTICAL) : 3 === c && (d = b.DIRECTION_ALL),
                    d
                );
            }
            function B(a, b) {
                var c = "seq-",
                    d = "no-touch";
                b.touch === !0 && (d = "touch"), w(a, c + d);
            }
            var g = e.getAttribute("data-seq-enabled");
            if (null !== g) return c[g];
            e.setAttribute("data-seq-enabled", d), d++;
            var h = {
                    startingStepId: 1,
                    startingStepAnimatesIn: !1,
                    cycle: !0,
                    phaseThreshold: !0,
                    reverseWhenNavigatingBackwards: !1,
                    moveActiveStepToTop: !0,
                    animateCanvas: !0,
                    animateCanvasDuration: 250,
                    autoPlay: !0,
                    autoPlayInterval: 2e3,
                    autoPlayDelay: null,
                    autoPlayDirection: 1,
                    autoPlayButton: !0,
                    autoPlayPauseOnHover: !0,
                    navigationSkip: !0,
                    navigationSkipThreshold: 250,
                    fadeStepWhenSkipped: !0,
                    fadeStepTime: 500,
                    ignorePhaseThresholdWhenSkipped: !1,
                    preventReverseSkipping: !1,
                    nextButton: !0,
                    prevButton: !0,
                    pagination: !0,
                    preloader: !1,
                    preloadTheseSteps: [1],
                    preloadTheseImages: [],
                    hideStepsUntilPreloaded: !1,
                    pausePreloader: !1,
                    keyNavigation: !1,
                    numericKeysGoToSteps: !1,
                    keyEvents: {
                        left: function (a) {
                            a.prev();
                        },
                        right: function (a) {
                            a.next();
                        },
                    },
                    swipeNavigation: !0,
                    swipeEvents: {
                        left: function (a) {
                            a.next();
                        },
                        right: function (a) {
                            a.prev();
                        },
                        up: void 0,
                        down: void 0,
                    },
                    swipeHammerOptions: {},
                    hashTags: !1,
                    hashDataAttribute: !1,
                    hashChangesOnFirstStep: !1,
                    fallback: { speed: 500 },
                },
                j = 50,
                k = 100,
                l = { animation: { WebkitAnimation: "-webkit-", animation: "" } },
                m = (function (a, b, c) {
                    function d(a) {
                        p.cssText = a;
                    }
                    function f(a, b) {
                        return typeof a === b;
                    }
                    function g(a, b) {
                        return !!~("" + a).indexOf(b);
                    }
                    function h(a, b) {
                        for (var d in a) {
                            var e = a[d];
                            if (!g(e, "-") && p[e] !== c) return "pfx" != b || e;
                        }
                        return !1;
                    }
                    function i(a, b, d) {
                        for (var e in a) {
                            var g = b[a[e]];
                            if (g !== c) return d === !1 ? a[e] : f(g, "function") ? g.bind(d || b) : g;
                        }
                        return !1;
                    }
                    function j(a, b, c) {
                        var d = a.charAt(0).toUpperCase() + a.slice(1),
                            e = (a + " " + u.join(d + " ") + d).split(" ");
                        return f(b, "string") || f(b, "undefined") ? h(e, b) : ((e = (a + " " + v.join(d + " ") + d).split(" ")), i(e, b, c));
                    }
                    var q,
                        C,
                        F,
                        k = "2.8.3",
                        l = {},
                        m = b.documentElement,
                        n = "modernizr",
                        o = b.createElement(n),
                        p = o.style,
                        s = ({}.toString, " -webkit- -moz- -o- -ms- ".split(" ")),
                        t = "Webkit Moz O ms",
                        u = t.split(" "),
                        v = t.toLowerCase().split(" "),
                        w = { svg: "http://www.w3.org/2000/svg" },
                        x = {},
                        A = [],
                        B = A.slice,
                        D = function (a, c, d, e) {
                            var f,
                                g,
                                h,
                                i,
                                j = b.createElement("div"),
                                k = b.body,
                                l = k || b.createElement("body");
                            if (parseInt(d, 10)) for (; d--; ) (h = b.createElement("div")), (h.id = e ? e[d] : n + (d + 1)), j.appendChild(h);
                            return (
                                (f = ["&#173;", '<style id="s', n, '">', a, "</style>"].join("")),
                                (j.id = n),
                                ((k ? j : l).innerHTML += f),
                                l.appendChild(j),
                                k || ((l.style.background = ""), (l.style.overflow = "hidden"), (i = m.style.overflow), (m.style.overflow = "hidden"), m.appendChild(l)),
                                (g = c(j, a)),
                                k ? j.parentNode.removeChild(j) : (l.parentNode.removeChild(l), (m.style.overflow = i)),
                                !!g
                            );
                        },
                        E = {}.hasOwnProperty;
                    (F =
                        f(E, "undefined") || f(E.call, "undefined")
                            ? function (a, b) {
                                  return b in a && f(a.constructor.prototype[b], "undefined");
                              }
                            : function (a, b) {
                                  return E.call(a, b);
                              }),
                        Function.prototype.bind ||
                            (Function.prototype.bind = function (a) {
                                var b = this;
                                if ("function" != typeof b) throw new TypeError();
                                var c = B.call(arguments, 1),
                                    d = function () {
                                        if (this instanceof d) {
                                            var e = function () {};
                                            e.prototype = b.prototype;
                                            var f = new e(),
                                                g = b.apply(f, c.concat(B.call(arguments)));
                                            return Object(g) === g ? g : f;
                                        }
                                        return b.apply(a, c.concat(B.call(arguments)));
                                    };
                                return d;
                            }),
                        (x.touch = function () {
                            var c;
                            return (
                                "ontouchstart" in a || (a.DocumentTouch && b instanceof DocumentTouch)
                                    ? (c = !0)
                                    : D(["@media (", s.join("touch-enabled),("), n, ")", "{#modernizr{top:9px;position:absolute}}"].join(""), function (a) {
                                          c = 9 === a.offsetTop;
                                      }),
                                c
                            );
                        }),
                        (x.cssanimations = function () {
                            return j("animationName");
                        }),
                        (x.csstransforms = function () {
                            return !!j("transform");
                        }),
                        (x.csstransitions = function () {
                            return j("transition");
                        }),
                        (x.svg = function () {
                            return !!b.createElementNS && !!b.createElementNS(w.svg, "svg").createSVGRect;
                        });
                    for (var G in x) F(x, G) && ((C = G.toLowerCase()), (l[C] = x[G]()), A.push((l[C] ? "" : "no-") + C));
                    return (
                        (l.addTest = function (a, b) {
                            if ("object" == typeof a) for (var d in a) F(a, d) && l.addTest(d, a[d]);
                            else {
                                if (((a = a.toLowerCase()), l[a] !== c)) return l;
                                (b = "function" == typeof b ? b() : b), "undefined" != typeof enableClasses && enableClasses && (m.className += " " + (b ? "" : "no-") + a), (l[a] = b);
                            }
                            return l;
                        }),
                        d(""),
                        (o = q = null),
                        (l._version = k),
                        (l._prefixes = s),
                        (l._domPrefixes = v),
                        (l._cssomPrefixes = u),
                        (l.testProp = function (a) {
                            return h([a]);
                        }),
                        (l.testAllProps = j),
                        (l.testStyles = D),
                        (l.prefixed = function (a, b, c) {
                            return b ? j(a, b, c) : j(a, "pfx");
                        }),
                        l
                    );
                })(window, window.document);
            Array.prototype.indexOf ||
                (Array.prototype.indexOf = function (a, b) {
                    if (void 0 === this || null === this) throw new TypeError('"this" is null or not defined');
                    var c = this.length >>> 0;
                    for (b = +b || 0, Math.abs(b) === 1 / 0 && (b = 0), b < 0 && ((b += c), b < 0 && (b = 0)); b < c; b++) if (this[b] === a) return b;
                    return -1;
                });
            var n, o;
            "undefined" != typeof document.hidden
                ? ((n = "hidden"), (o = "visibilitychange"))
                : "undefined" != typeof document.mozHidden
                ? ((n = "mozHidden"), (o = "mozvisibilitychange"))
                : "undefined" != typeof document.msHidden
                ? ((n = "msHidden"), (o = "msvisibilitychange"))
                : "undefined" != typeof document.webkitHidden && ((n = "webkitHidden"), (o = "webkitvisibilitychange"));
            var C = { modernizr: m };
            return (
                (C.ui = {
                    defaultElements: { nextButton: "seq-next", prevButton: "seq-prev", autoPlayButton: "seq-autoplay", pagination: "seq-pagination", preloader: "seq-preloader" },
                    getElements: function (a, b) {
                        var c,
                            d,
                            e,
                            g,
                            h,
                            f = [];
                        for (d = b === !0 ? document.querySelectorAll("." + this.defaultElements[a]) : document.querySelectorAll(b), e = d.length, h = 0; h < e; h++)
                            (c = d[h]), (g = c.getAttribute("rel")), (null !== g && g !== C.$container.getAttribute("id")) || f.push(c);
                        return f;
                    },
                    show: function (a, b) {
                        C.propertySupport.transitions === !0
                            ? ((a.style[m.prefixed("transitionDuration")] = b + "ms"), (a.style[m.prefixed("transitionProperty")] = "opacity, " + m.prefixed("transform")), (a.style.opacity = 1))
                            : C.animationFallback.animate(a, "opacity", "", 0, 1, b);
                    },
                    hide: function (a, b, c) {
                        C.propertySupport.transitions === !0
                            ? ((a.style[m.prefixed("transitionDuration")] = b + "ms"), (a.style[m.prefixed("transitionProperty")] = "opacity, " + m.prefixed("transform")), (a.style.opacity = 0))
                            : C.animationFallback.animate(a, "opacity", "", 1, 0, b),
                            void 0 !== c &&
                                (C.hideTimer = setTimeout(function () {
                                    c();
                                }, b));
                    },
                }),
                (C.autoPlay = {
                    init: function () {
                        (C.isAutoPlayPaused = !1), (C.isAutoPlaying = !1);
                    },
                    getDelay: function (a, b, c) {
                        switch (a) {
                            case !0:
                                a = null === b ? c : b;
                                break;
                            case !1:
                            case void 0:
                                a = 0;
                        }
                        return a;
                    },
                    start: function (a, b) {
                        if (C.isAutoPlaying === !0 || C.isReady === !1) return !1;
                        var c = C.options;
                        return (
                            (a = this.getDelay(a, c.autoPlayDelay, c.autoPlayInterval)),
                            void 0 === b && C.started(C),
                            w(C.$container, "seq-autoplaying"),
                            w(C.$autoPlay, "seq-autoplaying"),
                            (c.autoPlay = !0),
                            (C.isAutoPlaying = !0),
                            C.isAnimating === !1 &&
                                (C.autoPlayTimer = setTimeout(function () {
                                    1 === c.autoPlayDirection ? C.next() : C.prev();
                                }, a)),
                            !0
                        );
                    },
                    stop: function () {
                        return (
                            C.options.autoPlay === !0 &&
                            C.isAutoPlaying === !0 &&
                            ((C.options.autoPlay = !1), (C.isAutoPlaying = !1), clearTimeout(C.autoPlayTimer), x(C.$container, "seq-autoplaying"), x(C.$autoPlay, "seq-autoplaying"), C.stopped(C), !0)
                        );
                    },
                    unpause: function () {
                        return C.isAutoPlayPaused === !0 && ((C.isAutoPlayPaused = !1), this.start(!0), !0);
                    },
                    pause: function () {
                        return C.options.autoPlay === !0 && ((C.isAutoPlayPaused = !0), this.stop(), !0);
                    },
                }),
                (C.canvas = {
                    init: function (a) {
                        void 0 !== C.$screen && ((C.$screen.style.height = "100%"), (C.$screen.style.width = "100%")), C.canvas.getTransformProperties();
                    },
                    getSteps: function (a) {
                        var c,
                            d,
                            g,
                            b = [],
                            e = a.children,
                            f = e.length;
                        for (C.stepProperties = {}, g = 0; g < f; g++) (d = e[g]), (c = g + 1), b.push(d), (C.stepProperties[c] = {}), (C.stepProperties[c].isActive = !1);
                        return b;
                    },
                    getTransformProperties: function () {
                        var a, b, c, d;
                        for (a = 0; a < C.noOfSteps; a++) (b = C.$steps[a]), (c = a + 1), (d = { seqX: 0, seqY: 0, seqZ: 0 }), (d.seqX += b.offsetLeft * -1), (d.seqY += b.offsetTop * -1), (C.stepProperties[c].canvasTransform = d);
                    },
                    move: function (a, b) {
                        if (C.options.animateCanvas === !0) {
                            var d,
                                c = 0;
                            return (
                                b === !0 && C.firstRun === !1 && (c = C.options.animateCanvasDuration),
                                C.isFallbackMode === !1 &&
                                    ((d = C.stepProperties[a].canvasTransform),
                                    (C.$canvas.style[m.prefixed("transitionDuration")] = c + "ms"),
                                    (C.$canvas.style[m.prefixed("transform")] = "translateX(" + d.seqX + "px) translateY(" + d.seqY + "px) translateZ(" + d.seqZ + "px) ")),
                                !0
                            );
                        }
                        return !1;
                    },
                    removeNoJsClass: function () {
                        if (C.isFallbackMode !== !0)
                            for (var a = 0; a < C.$steps.length; a++) {
                                var b = C.$steps[a];
                                if (v(b, "seq-in") === !0) {
                                    var c = a + 1;
                                    C.animation.resetInheritedSpeed(c), x(b, "seq-in");
                                }
                            }
                    },
                }),
                (C.animation = {
                    getPhaseProperties: function (a) {
                        var f,
                            g,
                            o,
                            p,
                            b = C.$steps[a - 1],
                            c = b.querySelectorAll("*[data-seq]"),
                            d = b.querySelectorAll("*"),
                            e = d.length,
                            h = [],
                            i = [],
                            j = [],
                            k = [],
                            l = [],
                            n = [];
                        for (g = 0; g < e; g++)
                            (f = d[g]),
                                (o = u(r(f, m.prefixed("transitionDuration")))),
                                (p = u(r(f, m.prefixed("transitionDelay")))),
                                k.push(o),
                                l.push(p),
                                n.push(o + p),
                                null !== f.getAttribute("data-seq") && (h.push(o), i.push(p), j.push(o + p));
                        var q = Math.max.apply(Math, k),
                            s = Math.max.apply(Math, l),
                            t = Math.max.apply(Math, n),
                            v = Math.max.apply(Math, h),
                            w = Math.max.apply(Math, i),
                            x = Math.max.apply(Math, j);
                        return { stepId: a, stepElement: b, children: d, animatedChildren: c, watchedTimings: { maxDuration: v, maxDelay: w, maxTotal: x }, timings: { maxDuration: q, maxDelay: s, maxTotal: t } };
                    },
                    getPhaseThreshold: function (a, b, c, d) {
                        var e = 0;
                        return c === !0 && C.options.ignorePhaseThresholdWhenSkipped === !0 && (a = !0), void 0 === a && (b === !0 ? (e = d) : b !== !1 && (e = b)), e;
                    },
                    getReversePhaseDelay: function (a, b, c, d, e) {
                        var f = 0,
                            g = 0,
                            h = 0;
                        return c === !0 || (d !== !1 && e !== !1) || ((f = a - b), f > 0 ? (h = f) : f < 0 && (g = Math.abs(f))), { next: h, current: g };
                    },
                    moveActiveStepToTop: function (a, b) {
                        if (C.options.moveActiveStepToTop === !0) {
                            var c = C.$steps[C.prevStepId - 1],
                                d = C.noOfSteps - 1;
                            (c.style.zIndex = 1), (a.style.zIndex = d), (b.style.zIndex = C.noOfSteps);
                        }
                        return null;
                    },
                    manageNavigationSkip: function (a, b) {
                        if (C.isFallbackMode !== !0) {
                            var c, d, e, f, g;
                            if ((C.ui.show(b, 0), C.options.navigationSkip === !0)) {
                                if (((C.navigationSkipThresholdActive = !0), 0 !== C.phasesAnimating && (clearTimeout(C.phaseThresholdTimer), clearTimeout(C.nextPhaseStartedTimer), C.options.fadeStepWhenSkipped === !0)))
                                    for (c = 1; c <= C.noOfSteps; c++)
                                        (d = C.stepProperties[c]), d.isActive === !0 && c !== a && ((e = C.$steps[c - 1]), (f = c), (g = {}), (g.id = f), (g.element = e), C.phasesSkipped.push(g), C.animation.stepSkipped(e));
                                C.navigationSkipThresholdTimer = setTimeout(function () {
                                    C.navigationSkipThresholdActive = !1;
                                }, C.options.navigationSkipThreshold);
                            }
                        }
                    },
                    stepSkipped: function (a) {
                        C.ui.hide(a, C.options.fadeStepTime, function () {});
                    },
                    changeStep: function (a) {
                        var b = "seq-step" + a;
                        if (void 0 !== C.currentStepId) {
                            var c = "seq-step" + C.currentStepId;
                            w(C.$container, b), x(C.$container, c);
                        } else w(C.$container, b);
                    },
                    reverseProperties: function (a, b, c, d) {
                        var i,
                            j,
                            k,
                            l,
                            n,
                            o,
                            p,
                            q,
                            s,
                            e = this,
                            f = a.children,
                            g = f.length,
                            h = a.timings,
                            t = [],
                            v = [];
                        for (j = 0; j < g; j++)
                            (i = f[j]),
                                (n = u(r(i, m.prefixed("transitionDuration")))),
                                (o = u(r(i, m.prefixed("transitionDelay")))),
                                (p = n + o),
                                (o = h.maxTotal - p),
                                d !== !0 && (o += b),
                                (p = n + o),
                                t.push(p),
                                null !== i.getAttribute("data-seq") && v.push(p),
                                (k = r(i, m.prefixed("transitionTimingFunction"))),
                                (l = e.reverseTimingFunction(k)),
                                (i.style[m.prefixed("transition")] = n + "ms " + o + "ms " + l);
                        return (
                            (q = Math.max.apply(Math, t)),
                            (s = Math.max.apply(Math, v)),
                            setTimeout(function () {
                                e.domDelay(function () {
                                    for (j = 0; j < g; j++) (i = f[j]), (i.style[m.prefixed("transition")] = "");
                                });
                            }, q + c),
                            s
                        );
                    },
                    forward: function (a, b, c, d, e) {
                        var g,
                            h,
                            i,
                            f = this;
                        C.firstRun === !1 && f.currentPhaseStarted(C.currentStepId),
                            x(c, "seq-out"),
                            f.domDelay(function () {
                                (g = f.startAnimateOut(C.currentStepId, b, 1)),
                                    (h = g.watchedTimings.maxTotal),
                                    (i = f.getPhaseThreshold(d, C.options.phaseThreshold, C.isAnimating, h)),
                                    (C.isAnimating = !0),
                                    f.startAnimateIn(a, h, c, i, e);
                            });
                    },
                    reverse: function (a, b, c, d, e) {
                        var h,
                            j,
                            k,
                            l,
                            m,
                            f = this,
                            i = 0;
                        w(c, "seq-out"),
                            f.domDelay(function () {
                                (j = f.getPhaseProperties(C.currentStepId, "current")),
                                    (k = f.getPhaseProperties(a, "next")),
                                    (i = f.getPhaseThreshold(d, C.options.phaseThreshold, C.isAnimating, j.timings.maxTotal)),
                                    (h = f.getReversePhaseDelay(j.timings.maxTotal, k.timings.maxTotal, C.options.phaseThreshold, C.options.ignorePhaseThresholdWhenSkipped, C.isAnimating)),
                                    (l = f.reverseProperties(j, h.current, 0, d)),
                                    (m = f.reverseProperties(k, h.next, i, d)),
                                    f.startAnimateOut(C.currentStepId, b, -1, l),
                                    (C.isAnimating = !0),
                                    C.firstRun === !1 && f.currentPhaseStarted(C.currentStepId),
                                    f.startAnimateIn(a, l, c, i, e, m);
                            });
                    },
                    startAnimateIn: function (a, b, c, d, e, f) {
                        var h,
                            i,
                            g = this;
                        (C.prevStepId = C.currentStepId),
                            (C.currentStepId = a),
                            C.firstRun === !0 && C.pagination.update(),
                            C.firstRun === !1 || C.options.startingStepAnimatesIn === !0
                                ? ((C.stepProperties[a].isActive = !0),
                                  (C.nextPhaseStartedTimer = setTimeout(function () {
                                      g.nextPhaseStarted(a, e);
                                  }, d)),
                                  (C.phaseThresholdTimer = setTimeout(function () {
                                      w(c, "seq-in"),
                                          x(c, "seq-out"),
                                          void 0 === f && ((h = C.animation.getPhaseProperties(a, "next")), (f = h.watchedTimings.maxTotal)),
                                          g.phaseEnded(a, "next", f, g.nextPhaseEnded),
                                          (i = g.getStepDuration(b, f, C.options.phaseThreshold)),
                                          (C.stepEndedTimer = setTimeout(function () {
                                              C.animation.stepEnded(a);
                                          }, i));
                                  }, d)))
                                : (g.resetInheritedSpeed(a), (C.phasesAnimating = 0), (C.isAnimating = !1), C.options.autoPlay === !0 && C.autoPlay.start(!0), w(c, "seq-in"), x(c, "seq-out")),
                            (C.firstRun = !1);
                    },
                    startAnimateOut: function (a, b, c, d) {
                        var f,
                            e = this;
                        return (
                            1 === c ? (x(b, "seq-in"), w(b, "seq-out"), (f = e.getPhaseProperties(a, "current")), (d = f.watchedTimings.maxTotal)) : x(b, "seq-in"),
                            C.firstRun === !1 && ((C.stepProperties[a].isActive = !0), e.phaseEnded(a, "current", d, e.currentPhaseEnded)),
                            f
                        );
                    },
                    getStepDuration: function (a, b, c) {
                        var d;
                        switch (c) {
                            case !0:
                                d = b;
                                break;
                            case !1:
                                d = a >= b ? a : b;
                                break;
                            default:
                                d = a >= b + c ? a - c : b;
                        }
                        return d;
                    },
                    currentPhaseStarted: function (a) {
                        C.phasesAnimating++, C.currentPhaseStarted(a, C);
                    },
                    currentPhaseEnded: function (a) {
                        C.currentPhaseEnded(a, C);
                    },
                    nextPhaseStarted: function (a, b) {
                        C.phasesAnimating++, void 0 === b && C.hashTags.update(), C.pagination.update(), C.nextPhaseStarted(a, C);
                    },
                    nextPhaseEnded: function (a) {
                        C.nextPhaseEnded(a, C);
                    },
                    phaseEnded: function (a, b, c, d) {
                        var f;
                        (f = function (a) {
                            (C.stepProperties[a].isActive = !1), C.phasesAnimating--, d(a);
                        }),
                            "current" === b
                                ? (C.currentPhaseEndedTimer = setTimeout(function () {
                                      f(a);
                                  }, c))
                                : (C.nextPhaseEndedTimer = setTimeout(function () {
                                      f(a);
                                  }, c));
                    },
                    stepEnded: function (a) {
                        (C.isAnimating = !1), (C.isAutoPlaying = !1), C.options.autoPlay === !0 && C.autoPlay.start(!0, !0), C.animationEnded(a, C);
                    },
                    reversePhase: function (a) {
                        var b = { "seq-out": "seq-in", "seq-in": "seq-out" };
                        return b[a];
                    },
                    domDelay: function (a) {
                        setTimeout(function () {
                            a();
                        }, j);
                    },
                    reverseTimingFunction: function (a) {
                        if ("" === a || void 0 === a) return a;
                        var c,
                            d,
                            e,
                            f,
                            b = {
                                linear: "cubic-bezier(0.0,0.0,1.0,1.0)",
                                ease: "cubic-bezier(0.25, 0.1, 0.25, 1.0)",
                                "ease-in": "cubic-bezier(0.42, 0.0, 1.0, 1.0)",
                                "ease-in-out": "cubic-bezier(0.42, 0.0, 0.58, 1.0)",
                                "ease-out": "cubic-bezier(0.0, 0.0, 0.58, 1.0)",
                            };
                        for (a.indexOf("cubic-bezier") < 0 && ((a = a.split(",")[0]), (a = b[a])), c = a.replace("cubic-bezier(", "").replace(")", "").split(","), d = c.length, f = 0; f < d; f++) c[f] = parseFloat(c[f]);
                        return (e = [1 - c[2], 1 - c[3], 1 - c[0], 1 - c[1]]), (a = "cubic-bezier(" + e + ")");
                    },
                    resetInheritedSpeed: function (a) {
                        if (C.isFallbackMode !== !0) {
                            var c,
                                d,
                                e = C.$steps[a - 1].querySelectorAll("*"),
                                f = e.length;
                            for (d = 0; d < f; d++) (c = e[d]), (c.style[m.prefixed("transition")] = "0ms 0ms");
                            C.animation.domDelay(function () {
                                for (d = 0; d < f; d++) (c = e[d]), (c.style[m.prefixed("transition")] = "");
                            });
                        }
                    },
                    getDirection: function (a, b, c, d, e, f, g) {
                        var i = 1;
                        return (i = void 0 !== b ? b : f === !0 || e === !0 ? (g === !0 && 1 === a && c === d ? 1 : a < c ? -1 : 1) : 1);
                    },
                    requiresFallbackMode: function (a) {
                        var b = a.transitions,
                            c = !1;
                        return b === !1 && (c = !0), c;
                    },
                    getPropertySupport: function (a) {
                        var b = !1,
                            c = !1;
                        return m.csstransitions === !0 && (b = !0), m.cssanimations === !0 && (c = !0), { transitions: b, animations: c };
                    },
                }),
                (C.animationFallback = {
                    animate: function (a, b, c, d, e, f, g) {
                        if (a !== !1) {
                            var h = new Date().getTime(),
                                i = setInterval(function () {
                                    var j = Math.min(1, (new Date().getTime() - h) / f);
                                    (a.style[b] = d + j * (e - d) + c), 1 === j && (void 0 !== g && g(), clearInterval(i));
                                }, 25);
                            a.style[b] = d + c;
                        }
                    },
                    setupCanvas: function (a) {
                        var b, c, d;
                        if (C.isFallbackMode === !0)
                            for (
                                w(C.$container, "seq-fallback"),
                                    void 0 !== C.$screen && ((C.$screen.style.overflow = "hidden"), (C.$screen.style.width = "100%"), (C.$screen.style.height = "100%")),
                                    C.$canvas.style.width = "100%",
                                    C.$canvas.style.height = "100%",
                                    this.canvasWidth = C.$canvas.offsetWidth,
                                    b = 0;
                                b < C.noOfSteps;
                                b++
                            )
                                (c = C.$steps[b]), (d = b + 1), w(c, "seq-in"), (c.style.width = "100%"), (c.style.height = "100%"), (c.style.position = "absolute"), (c.style.whiteSpace = "normal"), (c.style.left = "100%");
                    },
                    moveCanvas: function (a, b, c, d) {
                        if (d === !0) {
                            var e = 0,
                                f = -100,
                                g = 100,
                                h = 0;
                            c === -1 && ((f = 100), (g = -100)), this.animate(b, "left", "%", e, f, C.options.fallback.speed), this.animate(a, "left", "%", g, h, C.options.fallback.speed);
                        } else (b.style.left = "-100%"), (a.style.left = "0");
                    },
                    goTo: function (a, b, c, d, e, f, g) {
                        (C.prevStepId = C.currentStepId),
                            (C.currentStepId = a),
                            void 0 === g && C.hashTags.update(),
                            C.pagination.update(),
                            C.firstRun === !1
                                ? (this.moveCanvas(e, c, f, !0),
                                  (C.isAnimating = !0),
                                  C.animationStarted(C.currentStepId, C),
                                  (C.stepEndedTimer = setTimeout(function () {
                                      C.animation.stepEnded(C.currentStepId);
                                  }, C.options.fallback.speed)))
                                : (this.moveCanvas(e, c, f, !1), (C.firstRun = !1), C.options.autoPlay === !0 && C.autoPlay.start(!0));
                    },
                }),
                (C.pagination = {
                    getLinks: function (a, b) {
                        var c,
                            g,
                            d = a.childNodes,
                            e = d.length,
                            f = [];
                        for (g = 0; g < e; g++) (c = d[g]), 1 === c.nodeType && f.push(c);
                        return f;
                    },
                    update: function () {
                        if (void 0 !== C.$pagination.elements) {
                            var a,
                                b,
                                d,
                                e,
                                c = C.currentStepId - 1,
                                f = C.$pagination.elements.length;
                            if (void 0 !== C.$pagination.currentLinks) for (e = C.$pagination.currentLinks.length, a = 0; a < e; a++) (d = C.$pagination.currentLinks[a]), x(d, "seq-current");
                            for (C.$pagination.currentLinks = [], b = 0; b < f; b++) (d = C.$pagination.links[b][c]), C.$pagination.currentLinks.push(d), w(d, "seq-current");
                        }
                        return C.$pagination.currentLinks;
                    },
                }),
                (C.hashTags = {
                    init: function (a) {
                        if (C.options.hashTags === !0) {
                            var b, c;
                            (C.hasPushstate = !(!window.history || !history.pushState)),
                                (c = location.hash.replace("#!", "")),
                                (C.stepHashTags = this.getStepHashTags()),
                                "" !== c && ((C.currentHashTag = c), (b = this.hasCorrespondingStep(C.currentHashTag)), b > -1 && (a = b + 1));
                        }
                        return a;
                    },
                    hasCorrespondingStep: function (a) {
                        var b = -1,
                            c = C.stepHashTags.indexOf(a);
                        return c > -1 && (b = c), b;
                    },
                    getStepHashTags: function () {
                        var a,
                            b,
                            c = [];
                        for (a = 0; a < C.noOfSteps; a++) (b = C.options.hashDataAttribute === !1 ? C.$steps[a].id : C.$steps[a].getAttribute("data-seq-hashtag")), c.push(b);
                        return c;
                    },
                    update: function () {
                        if ((C.options.hashTags === !0 && C.firstRun === !1) || (C.options.hashTags === !0 && C.firstRun === !0 && C.options.hashChangesOnFirstStep === !0)) {
                            var a = C.currentStepId - 1;
                            (C.currentHashTag = C.stepHashTags[a]), "" !== C.currentHashtag && (C.hasPushstate === !0 ? history.pushState(null, null, "#!" + C.currentHashTag) : (location.hash = "#!" + C.currentHashTag));
                        }
                    },
                    setupEvent: function () {
                        if ("onhashchange" in window) {
                            if (window.addEventListener)
                                return (
                                    (window.addHashChange = function (a, b) {
                                        window.addEventListener("hashchange", a, b);
                                    }),
                                    void (window.removeHashChange = function (a) {
                                        window.removeEventListener("hashchange", a);
                                    })
                                );
                            if (window.attachEvent)
                                return (
                                    (window.addHashChange = function (a) {
                                        window.attachEvent("onhashchange", a);
                                    }),
                                    void (window.removeHashChange = function (a) {
                                        window.detachEvent("onhashchange", a);
                                    })
                                );
                        }
                        var a = [],
                            b = location.href;
                        (window.addHashChange = function (b, c) {
                            "function" == typeof b && a[c ? "unshift" : "push"](b);
                        }),
                            (window.removeHashChange = function (b) {
                                for (var c = a.length - 1; c >= 0; c--) a[c] === b && a.splice(c, 1);
                            }),
                            setInterval(function () {
                                var c = location.href;
                                if (b !== c) {
                                    var d = b;
                                    b = c;
                                    for (var e = 0; e < a.length; e++) a[e].call(window, { type: "hashchange", newURL: c, oldURL: d });
                                }
                            }, 100);
                    },
                }),
                (C.preload = {
                    defaultHtml:
                        '<svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><title>Sequence.js Preloading Indicator</title><desc>Three orange dots increasing in size from left to right</desc><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>',
                    fallbackHtml:
                        '<div class="seq-preload-indicator seq-preload-indicator-fallback"><div class="seq-preload-circle seq-preload-circle-1"></div><div class="seq-preload-circle seq-preload-circle-2"></div><div class="seq-preload-circle seq-preload-circle-3"></div></div>',
                    defaultStyles:
                        "@" +
                        l.animation[m.prefixed("animation")] +
                        "keyframes seq-preloader {50% {opacity: 1;}100% {opacity: 0;}}.seq-preloader {background: white;visibility: visible;opacity: 1;position: absolute;z-index: 9999;height: 100%;width: 100%;top: 0;left: 0;right: 0;bottom: 0;} .seq-preloader.seq-preloaded {opacity: 0;visibility: hidden;" +
                        m.prefixed("transition") +
                        ": visibility 0s .5s, opacity .5s;}.seq-preload-indicator {overflow: visible;position: relative;top: 50%;left: 50%;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);}.seq-preload-circle {display: inline-block;height: 12px;width: 12px;fill: #F96D38;opacity: 0;" +
                        l.animation[m.prefixed("animation")] +
                        "animation: seq-preloader 1.25s infinite;}.seq-preload-circle-2 {" +
                        l.animation[m.prefixed("animation")] +
                        "animation-delay: .15s;}.seq-preload-circle-3 {" +
                        l.animation[m.prefixed("animation")] +
                        "animation-delay: .3s;}.seq-preload-indicator-fallback{width: 42px;margin-left: -21px;overflow: visible;}.seq-preload-indicator-fallback .seq-preload-circle {width: 8px; height:8px;background-color: #F96D38;border-radius: 100%; opacity: 1;display: inline-block; vertical-align: middle;}.seq-preload-indicator-fallback .seq-preload-circle-2{margin-left: 3px; margin-right: 3px; width: 12px; height: 12px;}.seq-preload-indicator-fallback .seq-preload-circle-3{width: 16px; height: 16px;}",
                    init: function (b) {
                        if (C.options.preloader !== !1) {
                            var d,
                                e,
                                f,
                                g,
                                h,
                                i,
                                c = this;
                            return (
                                w(C.$container, "seq-preloading"),
                                (C.$preloader = C.ui.getElements("preloader", C.options.preloader)),
                                c.append(),
                                c.addStyles(),
                                c.toggleStepsVisibility("hide"),
                                (d = c.getImagesToPreload(C.options.preloadTheseSteps)),
                                (e = c.getImagesToPreload(C.options.preloadTheseImages, !0)),
                                (f = d.concat(e)),
                                (g = a(f)),
                                g.on("always", function (a) {
                                    c.complete(b);
                                }),
                                (h = 1),
                                g.on("progress", function (a, b) {
                                    (i = b.isLoaded ? "loaded" : "broken"), C.preloadProgress(i, b.img.src, h++, f.length, C);
                                }),
                                !0
                            );
                        }
                        return !1;
                    },
                    complete: function (a) {
                        C.preloaded(C),
                            C.options.pausePreloader !== !0 &&
                                (this.toggleStepsVisibility("show"),
                                x(C.$container, "seq-preloading"),
                                w(C.$container, "seq-preloaded"),
                                w(C.$preloader[0], "seq-preloaded"),
                                void 0 !== this.preloadIndicatorTimer && clearInterval(this.preloadIndicatorTimer),
                                (m.prefixed("animation") !== !1 && m.svg !== !1) || (C.$preloader[0].style.display = "none"),
                                void 0 !== a && a());
                    },
                    addStyles: function () {
                        if (C.options.preloader === !0) {
                            var a = document.head || document.getElementsByTagName("head")[0];
                            if (
                                ((this.styleElement = document.createElement("style")),
                                (this.styleElement.type = "text/css"),
                                this.styleElement.styleSheet ? (this.styleElement.styleSheet.cssText = this.defaultStyles) : this.styleElement.appendChild(document.createTextNode(this.defaultStyles)),
                                a.appendChild(this.styleElement),
                                m.prefixed("animation") === !1 || m.svg === !1)
                            ) {
                                var b = C.$preloader[0].firstChild,
                                    c = function () {
                                        (b.style.visibility = "hidden"),
                                            (preloadFlashTime = 1e3),
                                            setTimeout(function () {
                                                b.style.visibility = "visible";
                                            }, 500);
                                    };
                                c(),
                                    (this.preloadIndicatorTimer = setInterval(function () {
                                        c();
                                    }, 1e3));
                            }
                            return !0;
                        }
                        return !1;
                    },
                    removeStyles: function () {
                        this.styleElement.parentNode.removeChild(this.styleElement);
                    },
                    getImagesToPreload: function (a, b) {
                        var c = [];
                        if (p(a) === !0) {
                            var d,
                                e,
                                g,
                                h,
                                i,
                                j,
                                k,
                                l,
                                f = a.length;
                            if (b !== !0) for (d = 0; d < f; d++) for (g = C.$steps[d], h = g.getElementsByTagName("img"), i = h.length, e = 0; e < i; e++) (j = h[e]), c.push(j);
                            else for (k = [], d = 0; d < f; d++) (l = a[d]), (k[d] = new Image()), (k[d].src = l), c.push(k[d]);
                        }
                        return c;
                    },
                    append: function () {
                        return (
                            C.options.preloader === !0 &&
                            ((C.$preloader = document.createElement("div")),
                            (C.$preloader.className = "seq-preloader"),
                            (C.$preloader = [C.$preloader]),
                            m.prefixed("animation") !== !1 && m.svg === !0 ? (C.$preloader[0].innerHTML = C.preload.defaultHtml) : (C.$preloader[0].innerHTML = C.preload.fallbackHtml),
                            C.$container.insertBefore(C.$preloader[0], null),
                            !0)
                        );
                    },
                    toggleStepsVisibility: function (a) {
                        if (C.options.hideStepsUntilPreloaded === !0) {
                            var b, c;
                            for (b = 0; b < C.noOfSteps; b++) (c = C.$steps[b]), "hide" === a ? C.ui.hide(c, 0) : C.ui.show(c, 0);
                            return !0;
                        }
                        return !1;
                    },
                }),
                (C.manageEvents = {
                    list: { load: [], click: [], touchstart: [], mousemove: [], mouseleave: [], hammer: [], keyup: [], hashchange: [], resize: [] },
                    init: function () {
                        return (
                            (C.manageEvents.list[o] = []),
                            C.options.hashTags === !0 && this.add.hashChange(),
                            C.options.swipeNavigation === !0 ? this.add.swipeNavigation() : (C.hammerTime = !1),
                            C.options.keyNavigation === !0 && this.add.keyNavigation(),
                            this.add.resizeThrottle(),
                            this.add.pageVisibility(),
                            C.options.nextButton !== !1 && ((C.$next = C.ui.getElements("nextButton", C.options.nextButton)), this.add.button(C.$next, "nav", C.next)),
                            C.options.prevButton !== !1 && ((C.$prev = C.ui.getElements("prevButton", C.options.prevButton)), this.add.button(C.$prev, "nav", C.prev)),
                            C.options.autoPlayButton !== !1 && ((C.$autoPlay = C.ui.getElements("autoPlayButton", C.options.autoPlayButton)), this.add.button(C.$autoPlay, "nav", C.toggleAutoPlay)),
                            this.add.stopOnHover(),
                            C.options.pagination !== !1 &&
                                ((C.$pagination = {}),
                                (C.$pagination.relatedElementId = d),
                                (C.$pagination.links = []),
                                (C.$pagination.elements = C.ui.getElements("pagination", C.options.pagination)),
                                this.add.button(C.$pagination.elements, "pagination")),
                            null
                        );
                    },
                    removeAll: function (a) {
                        var b, c;
                        for (b in a) a.hasOwnProperty(b) === !0 && ((c = a[b]), this.remove(b));
                        return null;
                    },
                    remove: function (a) {
                        var b = C.manageEvents.list[a],
                            c = b.length;
                        switch (a) {
                            case "hashchange":
                                C.options.hashTags === !0 && removeHashChange(b[0].handler);
                                break;
                            case "hammer":
                                if (C.manageEvents.list.hammer.length > 0 && void 0 !== document.querySelectorAll) {
                                    var d = C.manageEvents.list.hammer[0].handler;
                                    C.hammerTime.off("swipe", [d]);
                                }
                                break;
                            default:
                                for (var e = 0; e < c; e++) {
                                    var f = b[e];
                                    t(f.element, a, f.handler);
                                }
                        }
                    },
                    add: {
                        hashChange: function () {
                            C.hashTags.setupEvent();
                            var a = function (a) {
                                var b, c;
                                (b = a.newURL || location.href), (b = b.split("#!")[1]), C.currentHashTag !== b && ((c = C.stepHashTags.indexOf(b) + 1), (C.currentHashTag = b), C.goTo(c, void 0, void 0, !0));
                            };
                            return addHashChange(a), C.manageEvents.list.hashchange.push({ element: window, handler: a }), C.manageEvents.list.hashchange;
                        },
                        button: function (a, b, c) {
                            var e,
                                f,
                                h,
                                i,
                                j,
                                k,
                                l,
                                d = a.length;
                            switch (b) {
                                case "nav":
                                    h = function (a) {
                                        e = s(a, "click", function (a) {
                                            a || (a = window.event), a.preventDefault ? a.preventDefault() : (a.returnValue = !1), c();
                                        });
                                    };
                                    break;
                                case "pagination":
                                    h = function (a, b) {
                                        (e = s(a, "click", function (a, b) {
                                            a || (a = window.event), a.preventDefault ? a.preventDefault() : (a.returnValue = !1);
                                            var c = a.target || a.srcElement;
                                            (i = this), (k = z(i, c)), C.goTo(k);
                                        })),
                                            C.$pagination.links.push(C.pagination.getLinks(a, b));
                                    };
                            }
                            for (l = 0; l < d; l++)
                                (f = a[l]),
                                    (j = f.getAttribute("rel")),
                                    j === C.$container.id && null === f.getAttribute("data-seq-button") ? (f.setAttribute("data-seq-button", !0), h(f, j)) : null === j && null === f.getAttribute("data-seq-button") && h(f, j),
                                    C.manageEvents.list.click.push({ element: f, handler: e });
                            return C.manageEvents.list.click;
                        },
                        stopOnHover: function () {
                            var b, c;
                            return (
                                (C.isMouseOver = !1),
                                (b = s(C.$container, "touchstart", function (a) {
                                    C.isTouched = !0;
                                })),
                                C.manageEvents.list.touchstart.push({ element: C.$container, handler: b }),
                                (c = s(C.$container, "mousemove", function (a) {
                                    return (
                                        (a = a || window.event),
                                        C.isTouched === !0
                                            ? void (C.isTouched = !1)
                                            : void (y(C.$container, a) === !0
                                                  ? (C.options.autoPlayPauseOnHover === !0 && C.isMouseOver === !1 && C.autoPlay.pause(), (C.isMouseOver = !0))
                                                  : (C.options.autoPlayPauseOnHover === !0 && C.isMouseOver === !0 && C.autoPlay.unpause(), (C.isMouseOver = !1)))
                                    );
                                })),
                                C.manageEvents.list.mousemove.push({ element: C.$container, handler: c }),
                                (c = s(C.$container, "mouseleave", function (a) {
                                    C.options.autoPlayPauseOnHover === !0 && C.autoPlay.unpause(), (C.isMouseOver = !1);
                                })),
                                C.manageEvents.list.mouseleave.push({ element: C.$container, handler: c }),
                                null
                            );
                        },
                        swipeNavigation: function () {
                            if (void 0 === window.addEventListener) return void (C.hammerTime = !1);
                            var a, c;
                            "function" == typeof b &&
                                ((c = function (a) {
                                    switch (a.direction) {
                                        case 2:
                                            C.options.swipeEvents.left(C);
                                            break;
                                        case 4:
                                            C.options.swipeEvents.right(C);
                                            break;
                                        case 8:
                                            C.options.swipeEvents.up(C);
                                            break;
                                        case 16:
                                            C.options.swipeEvents.down(C);
                                    }
                                }),
                                (C.hammerTime = new b(C.$container).on("swipe", c)),
                                C.hammerTime.get("swipe").set(C.options.swipeHammerOptions),
                                (a = A(C.options.swipeEvents)),
                                C.hammerTime.get("swipe").set({ direction: a }),
                                C.manageEvents.list.hammer.push({ element: C.$container, handler: c }));
                        },
                        keyNavigation: function () {
                            var a = s(document, "keyup", function (a) {
                                a || (a = window.event);
                                var b = parseInt(String.fromCharCode(a.keyCode));
                                switch ((b > 0 && b <= C.noOfSteps && C.options.numericKeysGoToSteps && C.goTo(b), a.keyCode)) {
                                    case 37:
                                        C.options.keyEvents.left(C);
                                        break;
                                    case 39:
                                        C.options.keyEvents.right(C);
                                }
                            });
                            C.manageEvents.list.keyup.push({ element: document, handler: a });
                        },
                        resizeThrottle: function () {
                            function a() {
                                setTimeout(function () {
                                    C.canvas.getTransformProperties(), C.propertySupport.transitions === !0 && C.canvas.move(C.currentStepId, !1);
                                }, 500),
                                    C.throttledResize(C);
                            }
                            var b, c;
                            (c = s(window, "resize", function (c) {
                                clearTimeout(b), (b = setTimeout(a, k));
                            })),
                                C.manageEvents.list.resize.push({ element: window, handler: c });
                        },
                        pageVisibility: function () {
                            var a = s(
                                document,
                                o,
                                function () {
                                    document[n] ? C.autoPlay.pause() : C.autoPlay.unpause();
                                },
                                !1
                            );
                            C.manageEvents.list[o].push({ element: document, handler: a });
                        },
                    },
                }),
                (C.init = function (b) {
                    var c, d, e, i;
                    (C.options = q(h, f)),
                        (C.isAnimating = !1),
                        (C.isReady = !1),
                        (C.$container = b),
                        (C.$screen = C.$container.querySelectorAll(".seq-screen")[0]),
                        (C.$canvas = C.$container.querySelectorAll(".seq-canvas")[0]),
                        (C.$steps = C.canvas.getSteps(C.$canvas)),
                        (C.noOfSteps = C.$steps.length),
                        (C.phasesAnimating = 0),
                        (C.phasesSkipped = []),
                        B(C.$container, m),
                        (c = C.options.startingStepId),
                        w(C.$container, "seq-active"),
                        (C.propertySupport = C.animation.getPropertySupport()),
                        (C.isFallbackMode = C.animation.requiresFallbackMode(C.propertySupport)),
                        C.canvas.init(c),
                        C.canvas.removeNoJsClass(C),
                        C.manageEvents.init(),
                        C.autoPlay.init(),
                        (C.firstRun = !0),
                        (c = C.hashTags.init(c)),
                        1 === C.options.autoPlayDirection ? ((e = c - 1), (C.prevStepId = e < 1 ? C.noOfSteps : e)) : ((e = c + 1), (C.prevStepId = e > C.noOfSteps ? 1 : e)),
                        (C.currentStepId = C.prevStepId),
                        (d = C.prevStepId),
                        C.animationFallback.setupCanvas(c),
                        (i = function () {
                            C.animation.domDelay(function () {
                                C.animation.domDelay(function () {
                                    C.animation.resetInheritedSpeed(d);
                                }),
                                    (C.isReady = !0),
                                    C.ready(C),
                                    C.goTo(c, C.options.autoPlayDirection, !0);
                            });
                        }),
                        C.options.preloader !== !1 && void 0 !== document.querySelectorAll && "function" == typeof a
                            ? C.preload.init(function () {
                                  i();
                              })
                            : i();
                }),
                (C.destroy = function () {
                    var a, b, c;
                    for (
                        C.autoPlay.stop(),
                            clearTimeout(C.autoPlayTimer),
                            clearTimeout(C.phaseThresholdTimer),
                            clearTimeout(C.stepEndedTimer),
                            clearTimeout(C.currentPhaseEndedTimer),
                            clearTimeout(C.nextPhaseStartedTimer),
                            clearTimeout(C.nextPhaseEndedTimer),
                            clearTimeout(C.fadeStepTimer),
                            clearTimeout(C.hideTimer),
                            clearTimeout(C.navigationSkipThresholdTimer),
                            C.manageEvents.removeAll(C.manageEvents.list),
                            x(C.$pagination.currentLinks, "seq-current"),
                            x(C.$container, "seq-step" + C.currentStepId),
                            x(C.$container, "seq-active"),
                            C.$container.removeAttribute("style"),
                            void 0 !== C.$screen && C.$screen.removeAttribute("style"),
                            C.$canvas.removeAttribute("style"),
                            a = 0;
                        a < C.noOfSteps;
                        a++
                    )
                        (b = C.$steps[a]), b.removeAttribute("style"), C.animation.resetInheritedSpeed(a + 1), x(b, "seq-in"), x(b, "seq-out");
                    return (c = C.$steps[C.options.startingStepId - 1]), C.animation.resetInheritedSpeed(C.options.startingStepId), w(c, "seq-in"), e.removeAttribute("data-seq-enabled"), C.destroyed(C), (C = null);
                }),
                (C.next = function () {
                    var a = C.currentStepId + 1;
                    return !(a > C.noOfSteps && C.options.cycle === !1) && (a > C.noOfSteps && (a = 1), C.goTo(a), a);
                }),
                (C.prev = function () {
                    var b,
                        a = C.currentStepId - 1;
                    return !(a < 1 && C.options.cycle === !1) && (a < 1 && (a = C.noOfSteps), C.options.reverseWhenNavigatingBackwards === !0 && (b = -1), C.goTo(a, b), a);
                }),
                (C.toggleAutoPlay = function (a) {
                    return C.isAutoPlaying === !1 ? C.start(a) : C.stop(), C.isAutoPlaying;
                }),
                (C.stop = function () {
                    C.autoPlay.stop();
                }),
                (C.start = function (a) {
                    C.autoPlay.start(a);
                }),
                (C.goTo = function (a, b, c, d) {
                    if (
                        ((b = C.animation.getDirection(a, b, C.currentStepId, C.noOfSteps, C.isFallbackMode, C.options.reverseWhenNavigatingBackwards, C.options.cycle)),
                        void 0 === a ||
                            a < 1 ||
                            a > C.noOfSteps ||
                            a === C.currentStepId ||
                            (C.options.navigationSkip === !1 && C.isAnimating === !0) ||
                            (C.options.navigationSkip === !0 && C.navigationSkipThresholdActive === !0 && void 0 === d) ||
                            (C.isFallbackMode === !0 && C.isAnimating === !0 && void 0 === d) ||
                            (C.options.preventReverseSkipping === !0 && C.direction !== b && C.isAnimating === !0))
                    )
                        return !1;
                    var e, f;
                    return (
                        clearTimeout(C.autoPlayTimer),
                        (C.direction = b),
                        1 === b ? x(C.$container, "seq-reversed") : w(C.$container, "seq-reversed"),
                        (e = C.$steps[C.currentStepId - 1]),
                        (f = C.$steps[a - 1]),
                        C.animation.moveActiveStepToTop(e, f),
                        C.animation.changeStep(a),
                        C.isFallbackMode === !1
                            ? (C.animation.resetInheritedSpeed(a),
                              (C.firstRun === !1 || (C.firstRun === !0 && C.options.startingStepAnimatesIn === !0)) && C.animationStarted(a, C),
                              C.canvas.move(a, !0),
                              C.animation.manageNavigationSkip(a, f),
                              1 === b ? C.animation.forward(a, e, f, c, d) : C.animation.reverse(a, e, f, c, d))
                            : C.animationFallback.goTo(a, C.currentStepId, e, a, f, b, d),
                        !0
                    );
                }),
                (C.started = function (a) {}),
                (C.stopped = function (a) {}),
                (C.animationStarted = function (a, b) {}),
                (C.animationEnded = function (a, b) {}),
                (C.currentPhaseStarted = function (a, b) {}),
                (C.currentPhaseEnded = function (a, b) {}),
                (C.nextPhaseStarted = function (a, b) {}),
                (C.nextPhaseEnded = function (a, b) {}),
                (C.throttledResize = function (a) {}),
                (C.preloaded = function (a) {}),
                (C.preloadProgress = function (a, b, c, d, e) {}),
                (C.ready = function (a) {}),
                (C.destroyed = function (a) {}),
                (C.utils = { addClass: w, removeClass: x, addEvent: s, removeEvent: t }),
                C.init(e),
                c.push(C),
                C
            );
        };
    return e;
}
if ("function" == typeof define && define.amd) define(["imagesLoaded", "Hammer"], defineSequence);
else {
    (Hammer = "function" != typeof Hammer ? null : Hammer), (imagesLoaded = "function" != typeof imagesLoaded ? null : imagesLoaded);
    var sequence = defineSequence(imagesLoaded, Hammer);
}

<<<<<<< HEAD
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109915445-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

=======

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109915445-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    gtag('js', new Date());

    gtag('config', 'UA-109915445-1');
</script>

<link rel="icon" href="{{URL::asset('images/fav.png')}}" type="image/png"/>
<<<<<<< HEAD
<meta name="csrf-token" content="{{ csrf_token() }}"/>
<meta name="viewport" content="width=device-width"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<script>
    if (function (t, e) {
        "use strict";
        "object" == typeof module && "object" == typeof module.exports ? module.exports = t.document ? e(t, !0) : function (t) {
            if (!t.document) throw new Error("jQuery requires a window with a document");
            return e(t)
        } : e(t)
    }("undefined" != typeof window ? window : this, function (t, e) {
        "use strict";
        var n = [], i = t.document, o = Object.getPrototypeOf, r = n.slice, s = n.concat, a = n.push, l = n.indexOf,
            u = {}, c = u.toString, f = u.hasOwnProperty, p = f.toString, d = p.call(Object), h = {};

        function g(t, e) {
            var n = (e = e || i).createElement("script");
            n.text = t, e.head.appendChild(n).parentNode.removeChild(n)
        }

        var v = "3.2.1", m = function (t, e) {
            return new m.fn.init(t, e)
        }, y = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, b = /^-ms-/, x = /-([a-z])/g, w = function (t, e) {
            return e.toUpperCase()
        };

        function T(t) {
            var e = !!t && "length" in t && t.length, n = m.type(t);
            return "function" !== n && !m.isWindow(t) && ("array" === n || 0 === e || "number" == typeof e && e > 0 && e - 1 in t)
        }

        m.fn = m.prototype = {
            jquery: v, constructor: m, length: 0, toArray: function () {
                return r.call(this)
            }, get: function (t) {
                return null == t ? r.call(this) : t < 0 ? this[t + this.length] : this[t]
            }, pushStack: function (t) {
                var e = m.merge(this.constructor(), t);
                return e.prevObject = this, e
            }, each: function (t) {
                return m.each(this, t)
            }, map: function (t) {
                return this.pushStack(m.map(this, function (e, n) {
                    return t.call(e, n, e)
                }))
            }, slice: function () {
                return this.pushStack(r.apply(this, arguments))
            }, first: function () {
                return this.eq(0)
            }, last: function () {
                return this.eq(-1)
            }, eq: function (t) {
                var e = this.length, n = +t + (t < 0 ? e : 0);
                return this.pushStack(n >= 0 && n < e ? [this[n]] : [])
            }, end: function () {
                return this.prevObject || this.constructor()
            }, push: a, sort: n.sort, splice: n.splice
        }, m.extend = m.fn.extend = function () {
            var t, e, n, i, o, r, s = arguments[0] || {}, a = 1, l = arguments.length, u = !1;
            for ("boolean" == typeof s && (u = s, s = arguments[a] || {}, a++), "object" == typeof s || m.isFunction(s) || (s = {}), a === l && (s = this, a--); a < l; a++) if (null != (t = arguments[a])) for (e in t) n = s[e], i = t[e], s !== i && (u && i && (m.isPlainObject(i) || (o = Array.isArray(i))) ? (o ? (o = !1, r = n && Array.isArray(n) ? n : []) : r = n && m.isPlainObject(n) ? n : {}, s[e] = m.extend(u, r, i)) : void 0 !== i && (s[e] = i));
            return s
        }, m.extend({
            expando: "jQuery" + (v + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (t) {
                throw new Error(t)
            }, noop: function () {
            }, isFunction: function (t) {
                return "function" === m.type(t)
            }, isWindow: function (t) {
                return null != t && t === t.window
            }, isNumeric: function (t) {
                var e = m.type(t);
                return ("number" === e || "string" === e) && !isNaN(t - parseFloat(t))
            }, isPlainObject: function (t) {
                var e, n;
                return !(!t || "[object Object]" !== c.call(t) || (e = o(t)) && (n = f.call(e, "constructor") && e.constructor, "function" != typeof n || p.call(n) !== d))
            }, isEmptyObject: function (t) {
                var e;
                for (e in t) return !1;
                return !0
            }, type: function (t) {
                return null == t ? t + "" : "object" == typeof t || "function" == typeof t ? u[c.call(t)] || "object" : typeof t
            }, globalEval: function (t) {
                g(t)
            }, camelCase: function (t) {
                return t.replace(b, "ms-").replace(x, w)
            }, each: function (t, e) {
                var n, i = 0;
                if (T(t)) for (n = t.length; i < n && !1 !== e.call(t[i], i, t[i]); i++) ; else for (i in t) if (!1 === e.call(t[i], i, t[i])) break;
                return t
            }, trim: function (t) {
                return null == t ? "" : (t + "").replace(y, "")
            }, makeArray: function (t, e) {
                var n = e || [];
                return null != t && (T(Object(t)) ? m.merge(n, "string" == typeof t ? [t] : t) : a.call(n, t)), n
            }, inArray: function (t, e, n) {
                return null == e ? -1 : l.call(e, t, n)
            }, merge: function (t, e) {
                for (var n = +e.length, i = 0, o = t.length; i < n; i++) t[o++] = e[i];
                return t.length = o, t
            }, grep: function (t, e, n) {
                for (var i, o = [], r = 0, s = t.length, a = !n; r < s; r++) i = !e(t[r], r), i !== a && o.push(t[r]);
                return o
            }, map: function (t, e, n) {
                var i, o, r = 0, a = [];
                if (T(t)) for (i = t.length; r < i; r++) o = e(t[r], r, n), null != o && a.push(o); else for (r in t) o = e(t[r], r, n), null != o && a.push(o);
                return s.apply([], a)
            }, guid: 1, proxy: function (t, e) {
                var n, i, o;
                if ("string" == typeof e && (n = t[e], e = t, t = n), m.isFunction(t)) return i = r.call(arguments, 2), o = function () {
                    return t.apply(e || this, i.concat(r.call(arguments)))
                }, o.guid = t.guid = t.guid || m.guid++, o
            }, now: Date.now, support: h
        }), "function" == typeof Symbol && (m.fn[Symbol.iterator] = n[Symbol.iterator]), m.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (t, e) {
            u["[object " + e + "]"] = e.toLowerCase()
        });
        var C = function (t) {
            var e, n, i, o, r, s, a, l, u, c, f, p, d, h, g, v, m, y, b, x = "sizzle" + 1 * new Date, w = t.document,
                T = 0, C = 0, E = st(), S = st(), $ = st(), k = function (t, e) {
                    return t === e && (f = !0), 0
                }, D = {}.hasOwnProperty, N = [], A = N.pop, j = N.push, O = N.push, I = N.slice, L = function (t, e) {
                    for (var n = 0, i = t.length; n < i; n++) if (t[n] === e) return n;
                    return -1
                },
                R = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                q = "[\\x20\\t\\r\\n\\f]", P = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
                H = "\\[" + q + "*(" + P + ")(?:" + q + "*([*^$|!~]?=)" + q + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + P + "))|)" + q + "*\\]",
                F = ":(" + P + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + H + ")*)|.*)\\)|)",
                W = new RegExp(q + "+", "g"), M = new RegExp("^" + q + "+|((?:^|[^\\\\])(?:\\\\.)*)" + q + "+$", "g"),
                B = new RegExp("^" + q + "*," + q + "*"), U = new RegExp("^" + q + "*([>+~]|" + q + ")" + q + "*"),
                _ = new RegExp("=" + q + "*([^\\]'\"]*?)" + q + "*\\]", "g"), z = new RegExp(F),
                V = new RegExp("^" + P + "$"), Q = {
                    ID: new RegExp("^#(" + P + ")"),
                    CLASS: new RegExp("^\\.(" + P + ")"),
                    TAG: new RegExp("^(" + P + "|[*])"),
                    ATTR: new RegExp("^" + H),
                    PSEUDO: new RegExp("^" + F),
                    CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + q + "*(even|odd|(([+-]|)(\\d*)n|)" + q + "*(?:([+-]|)" + q + "*(\\d+)|))" + q + "*\\)|)", "i"),
                    bool: new RegExp("^(?:" + R + ")$", "i"),
                    needsContext: new RegExp("^" + q + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + q + "*((?:-\\d)?\\d*)" + q + "*\\)|)(?=[^-]|$)", "i")
                }, X = /^(?:input|select|textarea|button)$/i, G = /^h\d$/i, Y = /^[^{]+\{\s*\[native \w/,
                J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, K = /[+~]/,
                Z = new RegExp("\\\\([\\da-f]{1,6}" + q + "?|(" + q + ")|.)", "ig"), tt = function (t, e, n) {
                    var i = "0x" + e - 65536;
                    return i != i || n ? e : i < 0 ? String.fromCharCode(i + 65536) : String.fromCharCode(i >> 10 | 55296, 1023 & i | 56320)
                }, et = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, nt = function (t, e) {
                    return e ? "\0" === t ? "�" : t.slice(0, -1) + "\\" + t.charCodeAt(t.length - 1).toString(16) + " " : "\\" + t
                }, it = function () {
                    p()
                }, ot = yt(function (t) {
                    return !0 === t.disabled && ("form" in t || "label" in t)
                }, {dir: "parentNode", next: "legend"});
            try {
                O.apply(N = I.call(w.childNodes), w.childNodes), N[w.childNodes.length].nodeType
            } catch (t) {
                O = {
                    apply: N.length ? function (t, e) {
                        j.apply(t, I.call(e))
                    } : function (t, e) {
                        for (var n = t.length, i = 0; t[n++] = e[i++];) ;
                        t.length = n - 1
                    }
                }
            }

            function rt(t, e, i, o) {
                var r, a, u, c, f, h, m, y = e && e.ownerDocument, T = e ? e.nodeType : 9;
                if (i = i || [], "string" != typeof t || !t || 1 !== T && 9 !== T && 11 !== T) return i;
                if (!o && ((e ? e.ownerDocument || e : w) !== d && p(e), e = e || d, g)) {
                    if (11 !== T && (f = J.exec(t))) if (r = f[1]) {
                        if (9 === T) {
                            if (!(u = e.getElementById(r))) return i;
                            if (u.id === r) return i.push(u), i
                        } else if (y && (u = y.getElementById(r)) && b(e, u) && u.id === r) return i.push(u), i
                    } else {
                        if (f[2]) return O.apply(i, e.getElementsByTagName(t)), i;
                        if ((r = f[3]) && n.getElementsByClassName && e.getElementsByClassName) return O.apply(i, e.getElementsByClassName(r)), i
                    }
                    if (n.qsa && !$[t + " "] && (!v || !v.test(t))) {
                        if (1 !== T) y = e, m = t; else if ("object" !== e.nodeName.toLowerCase()) {
                            for ((c = e.getAttribute("id")) ? c = c.replace(et, nt) : e.setAttribute("id", c = x), a = (h = s(t)).length; a--;) h[a] = "#" + c + " " + mt(h[a]);
                            m = h.join(","), y = K.test(t) && gt(e.parentNode) || e
                        }
                        if (m) try {
                            return O.apply(i, y.querySelectorAll(m)), i
                        } catch (t) {
                        } finally {
                            c === x && e.removeAttribute("id")
                        }
                    }
                }
                return l(t.replace(M, "$1"), e, i, o)
            }

            function st() {
                var t = [];
                return function e(n, o) {
                    return t.push(n + " ") > i.cacheLength && delete e[t.shift()], e[n + " "] = o
                }
            }

            function at(t) {
                return t[x] = !0, t
            }

            function lt(t) {
                var e = d.createElement("fieldset");
                try {
                    return !!t(e)
                } catch (t) {
                    return !1
                } finally {
                    e.parentNode && e.parentNode.removeChild(e), e = null
                }
            }

            function ut(t, e) {
                for (var n = t.split("|"), o = n.length; o--;) i.attrHandle[n[o]] = e
            }

            function ct(t, e) {
                var n = e && t, i = n && 1 === t.nodeType && 1 === e.nodeType && t.sourceIndex - e.sourceIndex;
                if (i) return i;
                if (n) for (; n = n.nextSibling;) if (n === e) return -1;
                return t ? 1 : -1
            }

            function ft(t) {
                return function (e) {
                    return "input" === e.nodeName.toLowerCase() && e.type === t
                }
            }

            function pt(t) {
                return function (e) {
                    var n = e.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && e.type === t
                }
            }

            function dt(t) {
                return function (e) {
                    return "form" in e ? e.parentNode && !1 === e.disabled ? "label" in e ? "label" in e.parentNode ? e.parentNode.disabled === t : e.disabled === t : e.isDisabled === t || e.isDisabled !== !t && ot(e) === t : e.disabled === t : "label" in e && e.disabled === t
                }
            }

            function ht(t) {
                return at(function (e) {
                    return e = +e, at(function (n, i) {
                        for (var o, r = t([], n.length, e), s = r.length; s--;) n[o = r[s]] && (n[o] = !(i[o] = n[o]))
                    })
                })
            }

            function gt(t) {
                return t && void 0 !== t.getElementsByTagName && t
            }

            n = rt.support = {}, r = rt.isXML = function (t) {
                var e = t && (t.ownerDocument || t).documentElement;
                return !!e && "HTML" !== e.nodeName
            }, p = rt.setDocument = function (t) {
                var e, o, s = t ? t.ownerDocument || t : w;
                return s !== d && 9 === s.nodeType && s.documentElement ? (h = (d = s).documentElement, g = !r(d), w !== d && (o = d.defaultView) && o.top !== o && (o.addEventListener ? o.addEventListener("unload", it, !1) : o.attachEvent && o.attachEvent("onunload", it)), n.attributes = lt(function (t) {
                    return t.className = "i", !t.getAttribute("className")
                }), n.getElementsByTagName = lt(function (t) {
                    return t.appendChild(d.createComment("")), !t.getElementsByTagName("*").length
                }), n.getElementsByClassName = Y.test(d.getElementsByClassName), n.getById = lt(function (t) {
                    return h.appendChild(t).id = x, !d.getElementsByName || !d.getElementsByName(x).length
                }), n.getById ? (i.filter.ID = function (t) {
                    var e = t.replace(Z, tt);
                    return function (t) {
                        return t.getAttribute("id") === e
                    }
                }, i.find.ID = function (t, e) {
                    if (void 0 !== e.getElementById && g) {
                        var n = e.getElementById(t);
                        return n ? [n] : []
                    }
                }) : (i.filter.ID = function (t) {
                    var e = t.replace(Z, tt);
                    return function (t) {
                        var n = void 0 !== t.getAttributeNode && t.getAttributeNode("id");
                        return n && n.value === e
                    }
                }, i.find.ID = function (t, e) {
                    if (void 0 !== e.getElementById && g) {
                        var n, i, o, r = e.getElementById(t);
                        if (r) {
                            if ((n = r.getAttributeNode("id")) && n.value === t) return [r];
                            for (o = e.getElementsByName(t), i = 0; r = o[i++];) if (n = r.getAttributeNode("id"), n && n.value === t) return [r]
                        }
                        return []
                    }
                }), i.find.TAG = n.getElementsByTagName ? function (t, e) {
                    return void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t) : n.qsa ? e.querySelectorAll(t) : void 0
                } : function (t, e) {
                    var n, i = [], o = 0, r = e.getElementsByTagName(t);
                    if ("*" === t) {
                        for (; n = r[o++];) 1 === n.nodeType && i.push(n);
                        return i
                    }
                    return r
                }, i.find.CLASS = n.getElementsByClassName && function (t, e) {
                    if (void 0 !== e.getElementsByClassName && g) return e.getElementsByClassName(t)
                }, m = [], v = [], (n.qsa = Y.test(d.querySelectorAll)) && (lt(function (t) {
                    h.appendChild(t).innerHTML = "<a id='" + x + "'></a><select id='" + x + "-\r\\' msallowcapture=''><option selected=''></option></select>", t.querySelectorAll("[msallowcapture^='']").length && v.push("[*^$]=" + q + "*(?:''|\"\")"), t.querySelectorAll("[selected]").length || v.push("\\[" + q + "*(?:value|" + R + ")"), t.querySelectorAll("[id~=" + x + "-]").length || v.push("~="), t.querySelectorAll(":checked").length || v.push(":checked"), t.querySelectorAll("a#" + x + "+*").length || v.push(".#.+[+~]")
                }), lt(function (t) {
                    t.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                    var e = d.createElement("input");
                    e.setAttribute("type", "hidden"), t.appendChild(e).setAttribute("name", "D"), t.querySelectorAll("[name=d]").length && v.push("name" + q + "*[*^$|!~]?="), 2 !== t.querySelectorAll(":enabled").length && v.push(":enabled", ":disabled"), h.appendChild(t).disabled = !0, 2 !== t.querySelectorAll(":disabled").length && v.push(":enabled", ":disabled"), t.querySelectorAll("*,:x"), v.push(",.*:")
                })), (n.matchesSelector = Y.test(y = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && lt(function (t) {
                    n.disconnectedMatch = y.call(t, "*"), y.call(t, "[s!='']:x"), m.push("!=", F)
                }), v = v.length && new RegExp(v.join("|")), m = m.length && new RegExp(m.join("|")), e = Y.test(h.compareDocumentPosition), b = e || Y.test(h.contains) ? function (t, e) {
                    var n = 9 === t.nodeType ? t.documentElement : t, i = e && e.parentNode;
                    return t === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : t.compareDocumentPosition && 16 & t.compareDocumentPosition(i)))
                } : function (t, e) {
                    if (e) for (; e = e.parentNode;) if (e === t) return !0;
                    return !1
                }, k = e ? function (t, e) {
                    if (t === e) return f = !0, 0;
                    var i = !t.compareDocumentPosition - !e.compareDocumentPosition;
                    return i || (1 & (i = (t.ownerDocument || t) === (e.ownerDocument || e) ? t.compareDocumentPosition(e) : 1) || !n.sortDetached && e.compareDocumentPosition(t) === i ? t === d || t.ownerDocument === w && b(w, t) ? -1 : e === d || e.ownerDocument === w && b(w, e) ? 1 : c ? L(c, t) - L(c, e) : 0 : 4 & i ? -1 : 1)
                } : function (t, e) {
                    if (t === e) return f = !0, 0;
                    var n, i = 0, o = t.parentNode, r = e.parentNode, s = [t], a = [e];
                    if (!o || !r) return t === d ? -1 : e === d ? 1 : o ? -1 : r ? 1 : c ? L(c, t) - L(c, e) : 0;
                    if (o === r) return ct(t, e);
                    for (n = t; n = n.parentNode;) s.unshift(n);
                    for (n = e; n = n.parentNode;) a.unshift(n);
                    for (; s[i] === a[i];) i++;
                    return i ? ct(s[i], a[i]) : s[i] === w ? -1 : a[i] === w ? 1 : 0
                }, d) : d
            }, rt.matches = function (t, e) {
                return rt(t, null, null, e)
            }, rt.matchesSelector = function (t, e) {
                if ((t.ownerDocument || t) !== d && p(t), e = e.replace(_, "='$1']"), n.matchesSelector && g && !$[e + " "] && (!m || !m.test(e)) && (!v || !v.test(e))) try {
                    var i = y.call(t, e);
                    if (i || n.disconnectedMatch || t.document && 11 !== t.document.nodeType) return i
                } catch (t) {
                }
                return rt(e, d, null, [t]).length > 0
            }, rt.contains = function (t, e) {
                return (t.ownerDocument || t) !== d && p(t), b(t, e)
            }, rt.attr = function (t, e) {
                (t.ownerDocument || t) !== d && p(t);
                var o = i.attrHandle[e.toLowerCase()],
                    r = o && D.call(i.attrHandle, e.toLowerCase()) ? o(t, e, !g) : void 0;
                return void 0 !== r ? r : n.attributes || !g ? t.getAttribute(e) : (r = t.getAttributeNode(e)) && r.specified ? r.value : null
            }, rt.escape = function (t) {
                return (t + "").replace(et, nt)
            }, rt.error = function (t) {
                throw new Error("Syntax error, unrecognized expression: " + t)
            }, rt.uniqueSort = function (t) {
                var e, i = [], o = 0, r = 0;
                if (f = !n.detectDuplicates, c = !n.sortStable && t.slice(0), t.sort(k), f) {
                    for (; e = t[r++];) e === t[r] && (o = i.push(r));
                    for (; o--;) t.splice(i[o], 1)
                }
                return c = null, t
            }, o = rt.getText = function (t) {
                var e, n = "", i = 0, r = t.nodeType;
                if (r) {
                    if (1 === r || 9 === r || 11 === r) {
                        if ("string" == typeof t.textContent) return t.textContent;
                        for (t = t.firstChild; t; t = t.nextSibling) n += o(t)
                    } else if (3 === r || 4 === r) return t.nodeValue
                } else for (; e = t[i++];) n += o(e);
                return n
            }, (i = rt.selectors = {
                cacheLength: 50,
                createPseudo: at,
                match: Q,
                attrHandle: {},
                find: {},
                relative: {
                    ">": {dir: "parentNode", first: !0},
                    " ": {dir: "parentNode"},
                    "+": {dir: "previousSibling", first: !0},
                    "~": {dir: "previousSibling"}
                },
                preFilter: {
                    ATTR: function (t) {
                        return t[1] = t[1].replace(Z, tt), t[3] = (t[3] || t[4] || t[5] || "").replace(Z, tt), "~=" === t[2] && (t[3] = " " + t[3] + " "), t.slice(0, 4)
                    }, CHILD: function (t) {
                        return t[1] = t[1].toLowerCase(), "nth" === t[1].slice(0, 3) ? (t[3] || rt.error(t[0]), t[4] = +(t[4] ? t[5] + (t[6] || 1) : 2 * ("even" === t[3] || "odd" === t[3])), t[5] = +(t[7] + t[8] || "odd" === t[3])) : t[3] && rt.error(t[0]), t
                    }, PSEUDO: function (t) {
                        var e, n = !t[6] && t[2];
                        return Q.CHILD.test(t[0]) ? null : (t[3] ? t[2] = t[4] || t[5] || "" : n && z.test(n) && (e = s(n, !0)) && (e = n.indexOf(")", n.length - e) - n.length) && (t[0] = t[0].slice(0, e), t[2] = n.slice(0, e)), t.slice(0, 3))
                    }
                },
                filter: {
                    TAG: function (t) {
                        var e = t.replace(Z, tt).toLowerCase();
                        return "*" === t ? function () {
                            return !0
                        } : function (t) {
                            return t.nodeName && t.nodeName.toLowerCase() === e
                        }
                    }, CLASS: function (t) {
                        var e = E[t + " "];
                        return e || (e = new RegExp("(^|" + q + ")" + t + "(" + q + "|$)")) && E(t, function (t) {
                            return e.test("string" == typeof t.className && t.className || void 0 !== t.getAttribute && t.getAttribute("class") || "")
                        })
                    }, ATTR: function (t, e, n) {
                        return function (i) {
                            var o = rt.attr(i, t);
                            return null == o ? "!=" === e : !e || (o += "", "=" === e ? o === n : "!=" === e ? o !== n : "^=" === e ? n && 0 === o.indexOf(n) : "*=" === e ? n && o.indexOf(n) > -1 : "$=" === e ? n && o.slice(-n.length) === n : "~=" === e ? (" " + o.replace(W, " ") + " ").indexOf(n) > -1 : "|=" === e && (o === n || o.slice(0, n.length + 1) === n + "-"))
                        }
                    }, CHILD: function (t, e, n, i, o) {
                        var r = "nth" !== t.slice(0, 3), s = "last" !== t.slice(-4), a = "of-type" === e;
                        return 1 === i && 0 === o ? function (t) {
                            return !!t.parentNode
                        } : function (e, n, l) {
                            var u, c, f, p, d, h, g = r !== s ? "nextSibling" : "previousSibling", v = e.parentNode,
                                m = a && e.nodeName.toLowerCase(), y = !l && !a, b = !1;
                            if (v) {
                                if (r) {
                                    for (; g;) {
                                        for (p = e; p = p[g];) if (a ? p.nodeName.toLowerCase() === m : 1 === p.nodeType) return !1;
                                        h = g = "only" === t && !h && "nextSibling"
                                    }
                                    return !0
                                }
                                if (h = [s ? v.firstChild : v.lastChild], s && y) {
                                    for (b = (d = (u = (c = (f = (p = v)[x] || (p[x] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[t] || [])[0] === T && u[1]) && u[2], p = d && v.childNodes[d]; p = ++d && p && p[g] || (b = d = 0) || h.pop();) if (1 === p.nodeType && ++b && p === e) {
                                        c[t] = [T, d, b];
                                        break
                                    }
                                } else if (y && (p = e, f = p[x] || (p[x] = {}), c = f[p.uniqueID] || (f[p.uniqueID] = {}), u = c[t] || [], d = u[0] === T && u[1], b = d), !1 === b) for (; (p = ++d && p && p[g] || (b = d = 0) || h.pop()) && ((a ? p.nodeName.toLowerCase() !== m : 1 !== p.nodeType) || !++b || (y && (f = p[x] || (p[x] = {}), c = f[p.uniqueID] || (f[p.uniqueID] = {}), c[t] = [T, b]), p !== e));) ;
                                return (b -= o) === i || b % i == 0 && b / i >= 0
                            }
                        }
                    }, PSEUDO: function (t, e) {
                        var n,
                            o = i.pseudos[t] || i.setFilters[t.toLowerCase()] || rt.error("unsupported pseudo: " + t);
                        return o[x] ? o(e) : o.length > 1 ? (n = [t, t, "", e], i.setFilters.hasOwnProperty(t.toLowerCase()) ? at(function (t, n) {
                            for (var i, r = o(t, e), s = r.length; s--;) i = L(t, r[s]), t[i] = !(n[i] = r[s])
                        }) : function (t) {
                            return o(t, 0, n)
                        }) : o
                    }
                },
                pseudos: {
                    not: at(function (t) {
                        var e = [], n = [], i = a(t.replace(M, "$1"));
                        return i[x] ? at(function (t, e, n, o) {
                            for (var r, s = i(t, null, o, []), a = t.length; a--;) (r = s[a]) && (t[a] = !(e[a] = r))
                        }) : function (t, o, r) {
                            return e[0] = t, i(e, null, r, n), e[0] = null, !n.pop()
                        }
                    }), has: at(function (t) {
                        return function (e) {
                            return rt(t, e).length > 0
                        }
                    }), contains: at(function (t) {
                        return t = t.replace(Z, tt), function (e) {
                            return (e.textContent || e.innerText || o(e)).indexOf(t) > -1
                        }
                    }), lang: at(function (t) {
                        return V.test(t || "") || rt.error("unsupported lang: " + t), t = t.replace(Z, tt).toLowerCase(), function (e) {
                            var n;
                            do {
                                if (n = g ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang")) return n = n.toLowerCase(), n === t || 0 === n.indexOf(t + "-")
                            } while ((e = e.parentNode) && 1 === e.nodeType);
                            return !1
                        }
                    }), target: function (e) {
                        var n = t.location && t.location.hash;
                        return n && n.slice(1) === e.id
                    }, root: function (t) {
                        return t === h
                    }, focus: function (t) {
                        return t === d.activeElement && (!d.hasFocus || d.hasFocus()) && !!(t.type || t.href || ~t.tabIndex)
                    }, enabled: dt(!1), disabled: dt(!0), checked: function (t) {
                        var e = t.nodeName.toLowerCase();
                        return "input" === e && !!t.checked || "option" === e && !!t.selected
                    }, selected: function (t) {
                        return t.parentNode && t.parentNode.selectedIndex, !0 === t.selected
                    }, empty: function (t) {
                        for (t = t.firstChild; t; t = t.nextSibling) if (t.nodeType < 6) return !1;
                        return !0
                    }, parent: function (t) {
                        return !i.pseudos.empty(t)
                    }, header: function (t) {
                        return G.test(t.nodeName)
                    }, input: function (t) {
                        return X.test(t.nodeName)
                    }, button: function (t) {
                        var e = t.nodeName.toLowerCase();
                        return "input" === e && "button" === t.type || "button" === e
                    }, text: function (t) {
                        var e;
                        return "input" === t.nodeName.toLowerCase() && "text" === t.type && (null == (e = t.getAttribute("type")) || "text" === e.toLowerCase())
                    }, first: ht(function () {
                        return [0]
                    }), last: ht(function (t, e) {
                        return [e - 1]
                    }), eq: ht(function (t, e, n) {
                        return [n < 0 ? n + e : n]
                    }), even: ht(function (t, e) {
                        for (var n = 0; n < e; n += 2) t.push(n);
                        return t
                    }), odd: ht(function (t, e) {
                        for (var n = 1; n < e; n += 2) t.push(n);
                        return t
                    }), lt: ht(function (t, e, n) {
                        for (var i = n < 0 ? n + e : n; --i >= 0;) t.push(i);
                        return t
                    }), gt: ht(function (t, e, n) {
                        for (var i = n < 0 ? n + e : n; ++i < e;) t.push(i);
                        return t
                    })
                }
            }).pseudos.nth = i.pseudos.eq;
            for (e in {radio: !0, checkbox: !0, file: !0, password: !0, image: !0}) i.pseudos[e] = ft(e);
            for (e in {submit: !0, reset: !0}) i.pseudos[e] = pt(e);

            function vt() {
            }

            function mt(t) {
                for (var e = 0, n = t.length, i = ""; e < n; e++) i += t[e].value;
                return i
            }

            function yt(t, e, n) {
                var i = e.dir, o = e.next, r = o || i, s = n && "parentNode" === r, a = C++;
                return e.first ? function (e, n, o) {
                    for (; e = e[i];) if (1 === e.nodeType || s) return t(e, n, o);
                    return !1
                } : function (e, n, l) {
                    var u, c, f, p = [T, a];
                    if (l) {
                        for (; e = e[i];) if ((1 === e.nodeType || s) && t(e, n, l)) return !0
                    } else for (; e = e[i];) if (1 === e.nodeType || s) if (f = e[x] || (e[x] = {}), c = f[e.uniqueID] || (f[e.uniqueID] = {}), o && o === e.nodeName.toLowerCase()) e = e[i] || e; else {
                        if ((u = c[r]) && u[0] === T && u[1] === a) return p[2] = u[2];
                        if (c[r] = p, p[2] = t(e, n, l)) return !0
                    }
                    return !1
                }
            }

            function bt(t) {
                return t.length > 1 ? function (e, n, i) {
                    for (var o = t.length; o--;) if (!t[o](e, n, i)) return !1;
                    return !0
                } : t[0]
            }

            function xt(t, e, n, i, o) {
                for (var r, s = [], a = 0, l = t.length, u = null != e; a < l; a++) (r = t[a]) && (n && !n(r, i, o) || (s.push(r), u && e.push(a)));
                return s
            }

            function wt(t, e, n, i, o, r) {
                return i && !i[x] && (i = wt(i)), o && !o[x] && (o = wt(o, r)), at(function (r, s, a, l) {
                    var u, c, f, p = [], d = [], h = s.length, g = r || function (t, e, n) {
                            for (var i = 0, o = e.length; i < o; i++) rt(t, e[i], n);
                            return n
                        }(e || "*", a.nodeType ? [a] : a, []), v = !t || !r && e ? g : xt(g, p, t, a, l),
                        m = n ? o || (r ? t : h || i) ? [] : s : v;
                    if (n && n(v, m, a, l), i) for (u = xt(m, d), i(u, [], a, l), c = u.length; c--;) (f = u[c]) && (m[d[c]] = !(v[d[c]] = f));
                    if (r) {
                        if (o || t) {
                            if (o) {
                                for (u = [], c = m.length; c--;) (f = m[c]) && u.push(v[c] = f);
                                o(null, m = [], u, l)
                            }
                            for (c = m.length; c--;) (f = m[c]) && (u = o ? L(r, f) : p[c]) > -1 && (r[u] = !(s[u] = f))
                        }
                    } else m = xt(m === s ? m.splice(h, m.length) : m), o ? o(null, s, m, l) : O.apply(s, m)
                })
            }

            function Tt(t) {
                for (var e, n, o, r = t.length, s = i.relative[t[0].type], a = s || i.relative[" "], l = s ? 1 : 0, c = yt(function (t) {
                    return t === e
                }, a, !0), f = yt(function (t) {
                    return L(e, t) > -1
                }, a, !0), p = [function (t, n, i) {
                    var o = !s && (i || n !== u) || ((e = n).nodeType ? c(t, n, i) : f(t, n, i));
                    return e = null, o
                }]; l < r; l++) if (n = i.relative[t[l].type]) p = [yt(bt(p), n)]; else {
                    if ((n = i.filter[t[l].type].apply(null, t[l].matches))[x]) {
                        for (o = ++l; o < r && !i.relative[t[o].type]; o++) ;
                        return wt(l > 1 && bt(p), l > 1 && mt(t.slice(0, l - 1).concat({value: " " === t[l - 2].type ? "*" : ""})).replace(M, "$1"), n, l < o && Tt(t.slice(l, o)), o < r && Tt(t = t.slice(o)), o < r && mt(t))
                    }
                    p.push(n)
                }
                return bt(p)
            }

            return vt.prototype = i.filters = i.pseudos, i.setFilters = new vt, s = rt.tokenize = function (t, e) {
                var n, o, r, s, a, l, u, c = S[t + " "];
                if (c) return e ? 0 : c.slice(0);
                for (a = t, l = [], u = i.preFilter; a;) {
                    n && !(o = B.exec(a)) || (o && (a = a.slice(o[0].length) || a), l.push(r = [])), n = !1, (o = U.exec(a)) && (n = o.shift(), r.push({
                        value: n,
                        type: o[0].replace(M, " ")
                    }), a = a.slice(n.length));
                    for (s in i.filter) !(o = Q[s].exec(a)) || u[s] && !(o = u[s](o)) || (n = o.shift(), r.push({
                        value: n,
                        type: s,
                        matches: o
                    }), a = a.slice(n.length));
                    if (!n) break
                }
                return e ? a.length : a ? rt.error(t) : S(t, l).slice(0)
            }, a = rt.compile = function (t, e) {
                var n, o, r, a, l, c, f = [], h = [], v = $[t + " "];
                if (!v) {
                    for (e || (e = s(t)), n = e.length; n--;) v = Tt(e[n]), v[x] ? f.push(v) : h.push(v);
                    (v = $(t, (o = h, a = (r = f).length > 0, l = o.length > 0, c = function (t, e, n, s, c) {
                        var f, h, v, m = 0, y = "0", b = t && [], x = [], w = u, C = t || l && i.find.TAG("*", c),
                            E = T += null == w ? 1 : Math.random() || .1, S = C.length;
                        for (c && (u = e === d || e || c); y !== S && null != (f = C[y]); y++) {
                            if (l && f) {
                                for (h = 0, e || f.ownerDocument === d || (p(f), n = !g); v = o[h++];) if (v(f, e || d, n)) {
                                    s.push(f);
                                    break
                                }
                                c && (T = E)
                            }
                            a && ((f = !v && f) && m--, t && b.push(f))
                        }
                        if (m += y, a && y !== m) {
                            for (h = 0; v = r[h++];) v(b, x, e, n);
                            if (t) {
                                if (m > 0) for (; y--;) b[y] || x[y] || (x[y] = A.call(s));
                                x = xt(x)
                            }
                            O.apply(s, x), c && !t && x.length > 0 && m + r.length > 1 && rt.uniqueSort(s)
                        }
                        return c && (T = E, u = w), b
                    }, a ? at(c) : c))).selector = t
                }
                return v
            }, l = rt.select = function (t, e, n, o) {
                var r, l, u, c, f, p = "function" == typeof t && t, d = !o && s(t = p.selector || t);
                if (n = n || [], 1 === d.length) {
                    if ((l = d[0] = d[0].slice(0)).length > 2 && "ID" === (u = l[0]).type && 9 === e.nodeType && g && i.relative[l[1].type]) {
                        if (!(e = (i.find.ID(u.matches[0].replace(Z, tt), e) || [])[0])) return n;
                        p && (e = e.parentNode), t = t.slice(l.shift().value.length)
                    }
                    for (r = Q.needsContext.test(t) ? 0 : l.length; r-- && (u = l[r], !i.relative[c = u.type]);) if ((f = i.find[c]) && (o = f(u.matches[0].replace(Z, tt), K.test(l[0].type) && gt(e.parentNode) || e))) {
                        if (l.splice(r, 1), !(t = o.length && mt(l))) return O.apply(n, o), n;
                        break
                    }
                }
                return (p || a(t, d))(o, e, !g, n, !e || K.test(t) && gt(e.parentNode) || e), n
            }, n.sortStable = x.split("").sort(k).join("") === x, n.detectDuplicates = !!f, p(), n.sortDetached = lt(function (t) {
                return 1 & t.compareDocumentPosition(d.createElement("fieldset"))
            }), lt(function (t) {
                return t.innerHTML = "<a href='#'></a>", "#" === t.firstChild.getAttribute("href")
            }) || ut("type|href|height|width", function (t, e, n) {
                if (!n) return t.getAttribute(e, "type" === e.toLowerCase() ? 1 : 2)
            }), n.attributes && lt(function (t) {
                return t.innerHTML = "<input/>", t.firstChild.setAttribute("value", ""), "" === t.firstChild.getAttribute("value")
            }) || ut("value", function (t, e, n) {
                if (!n && "input" === t.nodeName.toLowerCase()) return t.defaultValue
            }), lt(function (t) {
                return null == t.getAttribute("disabled")
            }) || ut(R, function (t, e, n) {
                var i;
                if (!n) return !0 === t[e] ? e.toLowerCase() : (i = t.getAttributeNode(e)) && i.specified ? i.value : null
            }), rt
        }(t);
        m.find = C, m.expr = C.selectors, m.expr[":"] = m.expr.pseudos, m.uniqueSort = m.unique = C.uniqueSort, m.text = C.getText, m.isXMLDoc = C.isXML, m.contains = C.contains, m.escapeSelector = C.escape;
        var E = function (t, e, n) {
            for (var i = [], o = void 0 !== n; (t = t[e]) && 9 !== t.nodeType;) if (1 === t.nodeType) {
                if (o && m(t).is(n)) break;
                i.push(t)
            }
            return i
        }, S = function (t, e) {
            for (var n = []; t; t = t.nextSibling) 1 === t.nodeType && t !== e && n.push(t);
            return n
        }, $ = m.expr.match.needsContext;

        function k(t, e) {
            return t.nodeName && t.nodeName.toLowerCase() === e.toLowerCase()
        }

        var D = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i, N = /^.[^:#\[\.,]*$/;

        function A(t, e, n) {
            return m.isFunction(e) ? m.grep(t, function (t, i) {
                return !!e.call(t, i, t) !== n
            }) : e.nodeType ? m.grep(t, function (t) {
                return t === e !== n
            }) : "string" != typeof e ? m.grep(t, function (t) {
                return l.call(e, t) > -1 !== n
            }) : N.test(e) ? m.filter(e, t, n) : (e = m.filter(e, t), m.grep(t, function (t) {
                return l.call(e, t) > -1 !== n && 1 === t.nodeType
            }))
        }

        m.filter = function (t, e, n) {
            var i = e[0];
            return n && (t = ":not(" + t + ")"), 1 === e.length && 1 === i.nodeType ? m.find.matchesSelector(i, t) ? [i] : [] : m.find.matches(t, m.grep(e, function (t) {
                return 1 === t.nodeType
            }))
        }, m.fn.extend({
            find: function (t) {
                var e, n, i = this.length, o = this;
                if ("string" != typeof t) return this.pushStack(m(t).filter(function () {
                    for (e = 0; e < i; e++) if (m.contains(o[e], this)) return !0
                }));
                for (n = this.pushStack([]), e = 0; e < i; e++) m.find(t, o[e], n);
                return i > 1 ? m.uniqueSort(n) : n
            }, filter: function (t) {
                return this.pushStack(A(this, t || [], !1))
            }, not: function (t) {
                return this.pushStack(A(this, t || [], !0))
            }, is: function (t) {
                return !!A(this, "string" == typeof t && $.test(t) ? m(t) : t || [], !1).length
            }
        });
        var j, O = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
        (m.fn.init = function (t, e, n) {
            var o, r;
            if (!t) return this;
            if (n = n || j, "string" == typeof t) {
                if (!(o = "<" === t[0] && ">" === t[t.length - 1] && t.length >= 3 ? [null, t, null] : O.exec(t)) || !o[1] && e) return !e || e.jquery ? (e || n).find(t) : this.constructor(e).find(t);
                if (o[1]) {
                    if (e = e instanceof m ? e[0] : e, m.merge(this, m.parseHTML(o[1], e && e.nodeType ? e.ownerDocument || e : i, !0)), D.test(o[1]) && m.isPlainObject(e)) for (o in e) m.isFunction(this[o]) ? this[o](e[o]) : this.attr(o, e[o]);
                    return this
                }
                return (r = i.getElementById(o[2])) && (this[0] = r, this.length = 1), this
            }
            return t.nodeType ? (this[0] = t, this.length = 1, this) : m.isFunction(t) ? void 0 !== n.ready ? n.ready(t) : t(m) : m.makeArray(t, this)
        }).prototype = m.fn, j = m(i);
        var I = /^(?:parents|prev(?:Until|All))/, L = {children: !0, contents: !0, next: !0, prev: !0};

        function R(t, e) {
            for (; (t = t[e]) && 1 !== t.nodeType;) ;
            return t
        }

        m.fn.extend({
            has: function (t) {
                var e = m(t, this), n = e.length;
                return this.filter(function () {
                    for (var t = 0; t < n; t++) if (m.contains(this, e[t])) return !0
                })
            }, closest: function (t, e) {
                var n, i = 0, o = this.length, r = [], s = "string" != typeof t && m(t);
                if (!$.test(t)) for (; i < o; i++) for (n = this[i]; n && n !== e; n = n.parentNode) if (n.nodeType < 11 && (s ? s.index(n) > -1 : 1 === n.nodeType && m.find.matchesSelector(n, t))) {
                    r.push(n);
                    break
                }
                return this.pushStack(r.length > 1 ? m.uniqueSort(r) : r)
            }, index: function (t) {
                return t ? "string" == typeof t ? l.call(m(t), this[0]) : l.call(this, t.jquery ? t[0] : t) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
            }, add: function (t, e) {
                return this.pushStack(m.uniqueSort(m.merge(this.get(), m(t, e))))
            }, addBack: function (t) {
                return this.add(null == t ? this.prevObject : this.prevObject.filter(t))
            }
        }), m.each({
            parent: function (t) {
                var e = t.parentNode;
                return e && 11 !== e.nodeType ? e : null
            }, parents: function (t) {
                return E(t, "parentNode")
            }, parentsUntil: function (t, e, n) {
                return E(t, "parentNode", n)
            }, next: function (t) {
                return R(t, "nextSibling")
            }, prev: function (t) {
                return R(t, "previousSibling")
            }, nextAll: function (t) {
                return E(t, "nextSibling")
            }, prevAll: function (t) {
                return E(t, "previousSibling")
            }, nextUntil: function (t, e, n) {
                return E(t, "nextSibling", n)
            }, prevUntil: function (t, e, n) {
                return E(t, "previousSibling", n)
            }, siblings: function (t) {
                return S((t.parentNode || {}).firstChild, t)
            }, children: function (t) {
                return S(t.firstChild)
            }, contents: function (t) {
                return k(t, "iframe") ? t.contentDocument : (k(t, "template") && (t = t.content || t), m.merge([], t.childNodes))
            }
        }, function (t, e) {
            m.fn[t] = function (n, i) {
                var o = m.map(this, e, n);
                return "Until" !== t.slice(-5) && (i = n), i && "string" == typeof i && (o = m.filter(i, o)), this.length > 1 && (L[t] || m.uniqueSort(o), I.test(t) && o.reverse()), this.pushStack(o)
            }
        });
        var q = /[^\x20\t\r\n\f]+/g;

        function P(t) {
            return t
        }

        function H(t) {
            throw t
        }

        function F(t, e, n, i) {
            var o;
            try {
                t && m.isFunction(o = t.promise) ? o.call(t).done(e).fail(n) : t && m.isFunction(o = t.then) ? o.call(t, e, n) : e.apply(void 0, [t].slice(i))
            } catch (t) {
                n.apply(void 0, [t])
            }
        }

        m.Callbacks = function (t) {
            var e, n;
            t = "string" == typeof t ? (e = t, n = {}, m.each(e.match(q) || [], function (t, e) {
                n[e] = !0
            }), n) : m.extend({}, t);
            var i, o, r, s, a = [], l = [], u = -1, c = function () {
                for (s = s || t.once, r = i = !0; l.length; u = -1) for (o = l.shift(); ++u < a.length;) !1 === a[u].apply(o[0], o[1]) && t.stopOnFalse && (u = a.length, o = !1);
                t.memory || (o = !1), i = !1, s && (a = o ? [] : "")
            }, f = {
                add: function () {
                    return a && (o && !i && (u = a.length - 1, l.push(o)), function e(n) {
                        m.each(n, function (n, i) {
                            m.isFunction(i) ? t.unique && f.has(i) || a.push(i) : i && i.length && "string" !== m.type(i) && e(i)
                        })
                    }(arguments), o && !i && c()), this
                }, remove: function () {
                    return m.each(arguments, function (t, e) {
                        for (var n; (n = m.inArray(e, a, n)) > -1;) a.splice(n, 1), n <= u && u--
                    }), this
                }, has: function (t) {
                    return t ? m.inArray(t, a) > -1 : a.length > 0
                }, empty: function () {
                    return a && (a = []), this
                }, disable: function () {
                    return s = l = [], a = o = "", this
                }, disabled: function () {
                    return !a
                }, lock: function () {
                    return s = l = [], o || i || (a = o = ""), this
                }, locked: function () {
                    return !!s
                }, fireWith: function (t, e) {
                    return s || (e = [t, (e = e || []).slice ? e.slice() : e], l.push(e), i || c()), this
                }, fire: function () {
                    return f.fireWith(this, arguments), this
                }, fired: function () {
                    return !!r
                }
            };
            return f
        }, m.extend({
            Deferred: function (e) {
                var n = [["notify", "progress", m.Callbacks("memory"), m.Callbacks("memory"), 2], ["resolve", "done", m.Callbacks("once memory"), m.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", m.Callbacks("once memory"), m.Callbacks("once memory"), 1, "rejected"]],
                    i = "pending", o = {
                        state: function () {
                            return i
                        }, always: function () {
                            return r.done(arguments).fail(arguments), this
                        }, catch: function (t) {
                            return o.then(null, t)
                        }, pipe: function () {
                            var t = arguments;
                            return m.Deferred(function (e) {
                                m.each(n, function (n, i) {
                                    var o = m.isFunction(t[i[4]]) && t[i[4]];
                                    r[i[1]](function () {
                                        var t = o && o.apply(this, arguments);
                                        t && m.isFunction(t.promise) ? t.promise().progress(e.notify).done(e.resolve).fail(e.reject) : e[i[0] + "With"](this, o ? [t] : arguments)
                                    })
                                }), t = null
                            }).promise()
                        }, then: function (e, i, o) {
                            var r = 0;

                            function s(e, n, i, o) {
                                return function () {
                                    var a = this, l = arguments, u = function () {
                                        var t, u;
                                        if (!(e < r)) {
                                            if ((t = i.apply(a, l)) === n.promise()) throw new TypeError("Thenable self-resolution");
                                            u = t && ("object" == typeof t || "function" == typeof t) && t.then, m.isFunction(u) ? o ? u.call(t, s(r, n, P, o), s(r, n, H, o)) : (r++, u.call(t, s(r, n, P, o), s(r, n, H, o), s(r, n, P, n.notifyWith))) : (i !== P && (a = void 0, l = [t]), (o || n.resolveWith)(a, l))
                                        }
                                    }, c = o ? u : function () {
                                        try {
                                            u()
                                        } catch (t) {
                                            m.Deferred.exceptionHook && m.Deferred.exceptionHook(t, c.stackTrace), e + 1 >= r && (i !== H && (a = void 0, l = [t]), n.rejectWith(a, l))
                                        }
                                    };
                                    e ? c() : (m.Deferred.getStackHook && (c.stackTrace = m.Deferred.getStackHook()), t.setTimeout(c))
                                }
                            }

                            return m.Deferred(function (t) {
                                n[0][3].add(s(0, t, m.isFunction(o) ? o : P, t.notifyWith)), n[1][3].add(s(0, t, m.isFunction(e) ? e : P)), n[2][3].add(s(0, t, m.isFunction(i) ? i : H))
                            }).promise()
                        }, promise: function (t) {
                            return null != t ? m.extend(t, o) : o
                        }
                    }, r = {};
                return m.each(n, function (t, e) {
                    var s = e[2], a = e[5];
                    o[e[1]] = s.add, a && s.add(function () {
                        i = a
                    }, n[3 - t][2].disable, n[0][2].lock), s.add(e[3].fire), r[e[0]] = function () {
                        return r[e[0] + "With"](this === r ? void 0 : this, arguments), this
                    }, r[e[0] + "With"] = s.fireWith
                }), o.promise(r), e && e.call(r, r), r
            }, when: function (t) {
                var e = arguments.length, n = e, i = Array(n), o = r.call(arguments), s = m.Deferred(),
                    a = function (t) {
                        return function (n) {
                            i[t] = this, o[t] = arguments.length > 1 ? r.call(arguments) : n, --e || s.resolveWith(i, o)
                        }
                    };
                if (e <= 1 && (F(t, s.done(a(n)).resolve, s.reject, !e), "pending" === s.state() || m.isFunction(o[n] && o[n].then))) return s.then();
                for (; n--;) F(o[n], a(n), s.reject);
                return s.promise()
            }
        });
        var W = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
        m.Deferred.exceptionHook = function (e, n) {
            t.console && t.console.warn && e && W.test(e.name) && t.console.warn("jQuery.Deferred exception: " + e.message, e.stack, n)
        }, m.readyException = function (e) {
            t.setTimeout(function () {
                throw e
            })
        };
        var M = m.Deferred();

        function B() {
            i.removeEventListener("DOMContentLoaded", B), t.removeEventListener("load", B), m.ready()
        }

        m.fn.ready = function (t) {
            return M.then(t).catch(function (t) {
                m.readyException(t)
            }), this
        }, m.extend({
            isReady: !1, readyWait: 1, ready: function (t) {
                (!0 === t ? --m.readyWait : m.isReady) || (m.isReady = !0, !0 !== t && --m.readyWait > 0 || M.resolveWith(i, [m]))
            }
        }), m.ready.then = M.then, "complete" === i.readyState || "loading" !== i.readyState && !i.documentElement.doScroll ? t.setTimeout(m.ready) : (i.addEventListener("DOMContentLoaded", B), t.addEventListener("load", B));
        var U = function (t, e, n, i, o, r, s) {
            var a = 0, l = t.length, u = null == n;
            if ("object" === m.type(n)) {
                o = !0;
                for (a in n) U(t, e, a, n[a], !0, r, s)
            } else if (void 0 !== i && (o = !0, m.isFunction(i) || (s = !0), u && (s ? (e.call(t, i), e = null) : (u = e, e = function (t, e, n) {
                return u.call(m(t), n)
            })), e)) for (; a < l; a++) e(t[a], n, s ? i : i.call(t[a], a, e(t[a], n)));
            return o ? t : u ? e.call(t) : l ? e(t[0], n) : r
        }, _ = function (t) {
            return 1 === t.nodeType || 9 === t.nodeType || !+t.nodeType
        };

        function z() {
            this.expando = m.expando + z.uid++
        }

        z.uid = 1, z.prototype = {
            cache: function (t) {
                var e = t[this.expando];
                return e || (e = {}, _(t) && (t.nodeType ? t[this.expando] = e : Object.defineProperty(t, this.expando, {
                    value: e,
                    configurable: !0
                }))), e
            }, set: function (t, e, n) {
                var i, o = this.cache(t);
                if ("string" == typeof e) o[m.camelCase(e)] = n; else for (i in e) o[m.camelCase(i)] = e[i];
                return o
            }, get: function (t, e) {
                return void 0 === e ? this.cache(t) : t[this.expando] && t[this.expando][m.camelCase(e)]
            }, access: function (t, e, n) {
                return void 0 === e || e && "string" == typeof e && void 0 === n ? this.get(t, e) : (this.set(t, e, n), void 0 !== n ? n : e)
            }, remove: function (t, e) {
                var n, i = t[this.expando];
                if (void 0 !== i) {
                    if (void 0 !== e) {
                        Array.isArray(e) ? e = e.map(m.camelCase) : e = (e = m.camelCase(e)) in i ? [e] : e.match(q) || [], n = e.length;
                        for (; n--;) delete i[e[n]]
                    }
                    (void 0 === e || m.isEmptyObject(i)) && (t.nodeType ? t[this.expando] = void 0 : delete t[this.expando])
                }
            }, hasData: function (t) {
                var e = t[this.expando];
                return void 0 !== e && !m.isEmptyObject(e)
            }
        };
        var V = new z, Q = new z, X = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, G = /[A-Z]/g;

        function Y(t, e, n) {
            var i, o;
            if (void 0 === n && 1 === t.nodeType) if (i = "data-" + e.replace(G, "-$&").toLowerCase(), n = t.getAttribute(i), "string" == typeof n) {
                try {
                    n = "true" === (o = n) || "false" !== o && ("null" === o ? null : o === +o + "" ? +o : X.test(o) ? JSON.parse(o) : o)
                } catch (t) {
                }
                Q.set(t, e, n)
            } else n = void 0;
            return n
        }

        m.extend({
            hasData: function (t) {
                return Q.hasData(t) || V.hasData(t)
            }, data: function (t, e, n) {
                return Q.access(t, e, n)
            }, removeData: function (t, e) {
                Q.remove(t, e)
            }, _data: function (t, e, n) {
                return V.access(t, e, n)
            }, _removeData: function (t, e) {
                V.remove(t, e)
            }
        }), m.fn.extend({
            data: function (t, e) {
                var n, i, o, r = this[0], s = r && r.attributes;
                if (void 0 === t) {
                    if (this.length && (o = Q.get(r), 1 === r.nodeType && !V.get(r, "hasDataAttrs"))) {
                        for (n = s.length; n--;) s[n] && (i = s[n].name, 0 === i.indexOf("data-") && (i = m.camelCase(i.slice(5)), Y(r, i, o[i])));
                        V.set(r, "hasDataAttrs", !0)
                    }
                    return o
                }
                return "object" == typeof t ? this.each(function () {
                    Q.set(this, t)
                }) : U(this, function (e) {
                    var n;
                    if (r && void 0 === e) {
                        if (void 0 !== (n = Q.get(r, t))) return n;
                        if (void 0 !== (n = Y(r, t))) return n
                    } else this.each(function () {
                        Q.set(this, t, e)
                    })
                }, null, e, arguments.length > 1, null, !0)
            }, removeData: function (t) {
                return this.each(function () {
                    Q.remove(this, t)
                })
            }
        }), m.extend({
            queue: function (t, e, n) {
                var i;
                if (t) return e = (e || "fx") + "queue", i = V.get(t, e), n && (!i || Array.isArray(n) ? i = V.access(t, e, m.makeArray(n)) : i.push(n)), i || []
            }, dequeue: function (t, e) {
                e = e || "fx";
                var n = m.queue(t, e), i = n.length, o = n.shift(), r = m._queueHooks(t, e);
                "inprogress" === o && (o = n.shift(), i--), o && ("fx" === e && n.unshift("inprogress"), delete r.stop, o.call(t, function () {
                    m.dequeue(t, e)
                }, r)), !i && r && r.empty.fire()
            }, _queueHooks: function (t, e) {
                var n = e + "queueHooks";
                return V.get(t, n) || V.access(t, n, {
                    empty: m.Callbacks("once memory").add(function () {
                        V.remove(t, [e + "queue", n])
                    })
                })
            }
        }), m.fn.extend({
            queue: function (t, e) {
                var n = 2;
                return "string" != typeof t && (e = t, t = "fx", n--), arguments.length < n ? m.queue(this[0], t) : void 0 === e ? this : this.each(function () {
                    var n = m.queue(this, t, e);
                    m._queueHooks(this, t), "fx" === t && "inprogress" !== n[0] && m.dequeue(this, t)
                })
            }, dequeue: function (t) {
                return this.each(function () {
                    m.dequeue(this, t)
                })
            }, clearQueue: function (t) {
                return this.queue(t || "fx", [])
            }, promise: function (t, e) {
                var n, i = 1, o = m.Deferred(), r = this, s = this.length, a = function () {
                    --i || o.resolveWith(r, [r])
                };
                for ("string" != typeof t && (e = t, t = void 0), t = t || "fx"; s--;) n = V.get(r[s], t + "queueHooks"), n && n.empty && (i++, n.empty.add(a));
                return a(), o.promise(e)
            }
        });
        var J = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, K = new RegExp("^(?:([+-])=|)(" + J + ")([a-z%]*)$", "i"),
            Z = ["Top", "Right", "Bottom", "Left"], tt = function (t, e) {
                return "none" === (t = e || t).style.display || "" === t.style.display && m.contains(t.ownerDocument, t) && "none" === m.css(t, "display")
            }, et = function (t, e, n, i) {
                var o, r, s = {};
                for (r in e) s[r] = t.style[r], t.style[r] = e[r];
                o = n.apply(t, i || []);
                for (r in e) t.style[r] = s[r];
                return o
            };

        function nt(t, e, n, i) {
            var o, r = 1, s = 20, a = i ? function () {
                    return i.cur()
                } : function () {
                    return m.css(t, e, "")
                }, l = a(), u = n && n[3] || (m.cssNumber[e] ? "" : "px"),
                c = (m.cssNumber[e] || "px" !== u && +l) && K.exec(m.css(t, e));
            if (c && c[3] !== u) {
                u = u || c[3], n = n || [], c = +l || 1;
                do {
                    r = r || ".5", c /= r, m.style(t, e, c + u)
                } while (r !== (r = a() / l) && 1 !== r && --s)
            }
            return n && (c = +c || +l || 0, o = n[1] ? c + (n[1] + 1) * n[2] : +n[2], i && (i.unit = u, i.start = c, i.end = o)), o
        }

        var it = {};

        function ot(t, e) {
            for (var n, i, o = [], r = 0, s = t.length; r < s; r++) i = t[r], i.style && (n = i.style.display, e ? ("none" === n && (o[r] = V.get(i, "display") || null, o[r] || (i.style.display = "")), "" === i.style.display && tt(i) && (o[r] = (a = i, l = void 0, u = void 0, void 0, f = void 0, u = a.ownerDocument, c = a.nodeName, f = it[c], f || (l = u.body.appendChild(u.createElement(c)), f = m.css(l, "display"), l.parentNode.removeChild(l), "none" === f && (f = "block"), it[c] = f, f)))) : "none" !== n && (o[r] = "none", V.set(i, "display", n)));
            var a, l, u, c, f;
            for (r = 0; r < s; r++) null != o[r] && (t[r].style.display = o[r]);
            return t
        }

        m.fn.extend({
            show: function () {
                return ot(this, !0)
            }, hide: function () {
                return ot(this)
            }, toggle: function (t) {
                return "boolean" == typeof t ? t ? this.show() : this.hide() : this.each(function () {
                    tt(this) ? m(this).show() : m(this).hide()
                })
            }
        });
        var rt = /^(?:checkbox|radio)$/i, st = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i, at = /^$|\/(?:java|ecma)script/i,
            lt = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                thead: [1, "<table>", "</table>"],
                col: [2, "<table><colgroup>", "</colgroup></table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                _default: [0, "", ""]
            };

        function ut(t, e) {
            var n;
            return n = void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e || "*") : void 0 !== t.querySelectorAll ? t.querySelectorAll(e || "*") : [], void 0 === e || e && k(t, e) ? m.merge([t], n) : n
        }

        function ct(t, e) {
            for (var n = 0, i = t.length; n < i; n++) V.set(t[n], "globalEval", !e || V.get(e[n], "globalEval"))
        }

        lt.optgroup = lt.option, lt.tbody = lt.tfoot = lt.colgroup = lt.caption = lt.thead, lt.th = lt.td;
        var ft, pt, dt = /<|&#?\w+;/;

        function ht(t, e, n, i, o) {
            for (var r, s, a, l, u, c, f = e.createDocumentFragment(), p = [], d = 0, h = t.length; d < h; d++) if (r = t[d], r || 0 === r) if ("object" === m.type(r)) m.merge(p, r.nodeType ? [r] : r); else if (dt.test(r)) {
                for (s = s || f.appendChild(e.createElement("div")), a = (st.exec(r) || ["", ""])[1].toLowerCase(), l = lt[a] || lt._default, s.innerHTML = l[1] + m.htmlPrefilter(r) + l[2], c = l[0]; c--;) s = s.lastChild;
                m.merge(p, s.childNodes), (s = f.firstChild).textContent = ""
            } else p.push(e.createTextNode(r));
            for (f.textContent = "", d = 0; r = p[d++];) if (i && m.inArray(r, i) > -1) o && o.push(r); else if (u = m.contains(r.ownerDocument, r), s = ut(f.appendChild(r), "script"), u && ct(s), n) for (c = 0; r = s[c++];) at.test(r.type || "") && n.push(r);
            return f
        }

        ft = i.createDocumentFragment().appendChild(i.createElement("div")), (pt = i.createElement("input")).setAttribute("type", "radio"), pt.setAttribute("checked", "checked"), pt.setAttribute("name", "t"), ft.appendChild(pt), h.checkClone = ft.cloneNode(!0).cloneNode(!0).lastChild.checked, ft.innerHTML = "<textarea>x</textarea>", h.noCloneChecked = !!ft.cloneNode(!0).lastChild.defaultValue;
        var gt = i.documentElement, vt = /^key/, mt = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
            yt = /^([^.]*)(?:\.(.+)|)/;

        function bt() {
            return !0
        }

        function xt() {
            return !1
        }

        function wt() {
            try {
                return i.activeElement
            } catch (t) {
            }
        }

        function Tt(t, e, n, i, o, r) {
            var s, a;
            if ("object" == typeof e) {
                "string" != typeof n && (i = i || n, n = void 0);
                for (a in e) Tt(t, a, n, i, e[a], r);
                return t
            }
            if (null == i && null == o ? (o = n, i = n = void 0) : null == o && ("string" == typeof n ? (o = i, i = void 0) : (o = i, i = n, n = void 0)), !1 === o) o = xt; else if (!o) return t;
            return 1 === r && (s = o, (o = function (t) {
                return m().off(t), s.apply(this, arguments)
            }).guid = s.guid || (s.guid = m.guid++)), t.each(function () {
                m.event.add(this, e, o, i, n)
            })
        }

        m.event = {
            global: {}, add: function (t, e, n, i, o) {
                var r, s, a, l, u, c, f, p, d, h, g, v = V.get(t);
                if (v) for (n.handler && (n = (r = n).handler, o = r.selector), o && m.find.matchesSelector(gt, o), n.guid || (n.guid = m.guid++), (l = v.events) || (l = v.events = {}), (s = v.handle) || (s = v.handle = function (e) {
                    return void 0 !== m && m.event.triggered !== e.type ? m.event.dispatch.apply(t, arguments) : void 0
                }), u = (e = (e || "").match(q) || [""]).length; u--;) a = yt.exec(e[u]) || [], d = g = a[1], h = (a[2] || "").split(".").sort(), d && (f = m.event.special[d] || {}, d = (o ? f.delegateType : f.bindType) || d, f = m.event.special[d] || {}, c = m.extend({
                    type: d,
                    origType: g,
                    data: i,
                    handler: n,
                    guid: n.guid,
                    selector: o,
                    needsContext: o && m.expr.match.needsContext.test(o),
                    namespace: h.join(".")
                }, r), (p = l[d]) || (p = l[d] = [], p.delegateCount = 0, f.setup && !1 !== f.setup.call(t, i, h, s) || t.addEventListener && t.addEventListener(d, s)), f.add && (f.add.call(t, c), c.handler.guid || (c.handler.guid = n.guid)), o ? p.splice(p.delegateCount++, 0, c) : p.push(c), m.event.global[d] = !0)
            }, remove: function (t, e, n, i, o) {
                var r, s, a, l, u, c, f, p, d, h, g, v = V.hasData(t) && V.get(t);
                if (v && (l = v.events)) {
                    for (u = (e = (e || "").match(q) || [""]).length; u--;) if (a = yt.exec(e[u]) || [], d = g = a[1], h = (a[2] || "").split(".").sort(), d) {
                        for (f = m.event.special[d] || {}, p = l[d = (i ? f.delegateType : f.bindType) || d] || [], a = a[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = r = p.length; r--;) c = p[r], !o && g !== c.origType || n && n.guid !== c.guid || a && !a.test(c.namespace) || i && i !== c.selector && ("**" !== i || !c.selector) || (p.splice(r, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(t, c));
                        s && !p.length && (f.teardown && !1 !== f.teardown.call(t, h, v.handle) || m.removeEvent(t, d, v.handle), delete l[d])
                    } else for (d in l) m.event.remove(t, d + e[u], n, i, !0);
                    m.isEmptyObject(l) && V.remove(t, "handle events")
                }
            }, dispatch: function (t) {
                var e, n, i, o, r, s, a = m.event.fix(t), l = new Array(arguments.length),
                    u = (V.get(this, "events") || {})[a.type] || [], c = m.event.special[a.type] || {};
                for (l[0] = a, e = 1; e < arguments.length; e++) l[e] = arguments[e];
                if (a.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, a)) {
                    for (s = m.event.handlers.call(this, a, u), e = 0; (o = s[e++]) && !a.isPropagationStopped();) for (a.currentTarget = o.elem, n = 0; (r = o.handlers[n++]) && !a.isImmediatePropagationStopped();) a.rnamespace && !a.rnamespace.test(r.namespace) || (a.handleObj = r, a.data = r.data, i = ((m.event.special[r.origType] || {}).handle || r.handler).apply(o.elem, l), void 0 !== i && !1 === (a.result = i) && (a.preventDefault(), a.stopPropagation()));
                    return c.postDispatch && c.postDispatch.call(this, a), a.result
                }
            }, handlers: function (t, e) {
                var n, i, o, r, s, a = [], l = e.delegateCount, u = t.target;
                if (l && u.nodeType && !("click" === t.type && t.button >= 1)) for (; u !== this; u = u.parentNode || this) if (1 === u.nodeType && ("click" !== t.type || !0 !== u.disabled)) {
                    for (r = [], s = {}, n = 0; n < l; n++) i = e[n], o = i.selector + " ", void 0 === s[o] && (s[o] = i.needsContext ? m(o, this).index(u) > -1 : m.find(o, this, null, [u]).length), s[o] && r.push(i);
                    r.length && a.push({elem: u, handlers: r})
                }
                return u = this, l < e.length && a.push({elem: u, handlers: e.slice(l)}), a
            }, addProp: function (t, e) {
                Object.defineProperty(m.Event.prototype, t, {
                    enumerable: !0,
                    configurable: !0,
                    get: m.isFunction(e) ? function () {
                        if (this.originalEvent) return e(this.originalEvent)
                    } : function () {
                        if (this.originalEvent) return this.originalEvent[t]
                    },
                    set: function (e) {
                        Object.defineProperty(this, t, {enumerable: !0, configurable: !0, writable: !0, value: e})
                    }
                })
            }, fix: function (t) {
                return t[m.expando] ? t : new m.Event(t)
            }, special: {
                load: {noBubble: !0}, focus: {
                    trigger: function () {
                        if (this !== wt() && this.focus) return this.focus(), !1
                    }, delegateType: "focusin"
                }, blur: {
                    trigger: function () {
                        if (this === wt() && this.blur) return this.blur(), !1
                    }, delegateType: "focusout"
                }, click: {
                    trigger: function () {
                        if ("checkbox" === this.type && this.click && k(this, "input")) return this.click(), !1
                    }, _default: function (t) {
                        return k(t.target, "a")
                    }
                }, beforeunload: {
                    postDispatch: function (t) {
                        void 0 !== t.result && t.originalEvent && (t.originalEvent.returnValue = t.result)
                    }
                }
            }
        }, m.removeEvent = function (t, e, n) {
            t.removeEventListener && t.removeEventListener(e, n)
        }, m.Event = function (t, e) {
            return this instanceof m.Event ? (t && t.type ? (this.originalEvent = t, this.type = t.type, this.isDefaultPrevented = t.defaultPrevented || void 0 === t.defaultPrevented && !1 === t.returnValue ? bt : xt, this.target = t.target && 3 === t.target.nodeType ? t.target.parentNode : t.target, this.currentTarget = t.currentTarget, this.relatedTarget = t.relatedTarget) : this.type = t, e && m.extend(this, e), this.timeStamp = t && t.timeStamp || m.now(), void (this[m.expando] = !0)) : new m.Event(t, e)
        }, m.Event.prototype = {
            constructor: m.Event,
            isDefaultPrevented: xt,
            isPropagationStopped: xt,
            isImmediatePropagationStopped: xt,
            isSimulated: !1,
            preventDefault: function () {
                var t = this.originalEvent;
                this.isDefaultPrevented = bt, t && !this.isSimulated && t.preventDefault()
            },
            stopPropagation: function () {
                var t = this.originalEvent;
                this.isPropagationStopped = bt, t && !this.isSimulated && t.stopPropagation()
            },
            stopImmediatePropagation: function () {
                var t = this.originalEvent;
                this.isImmediatePropagationStopped = bt, t && !this.isSimulated && t.stopImmediatePropagation(), this.stopPropagation()
            }
        }, m.each({
            altKey: !0,
            bubbles: !0,
            cancelable: !0,
            changedTouches: !0,
            ctrlKey: !0,
            detail: !0,
            eventPhase: !0,
            metaKey: !0,
            pageX: !0,
            pageY: !0,
            shiftKey: !0,
            view: !0,
            char: !0,
            charCode: !0,
            key: !0,
            keyCode: !0,
            button: !0,
            buttons: !0,
            clientX: !0,
            clientY: !0,
            offsetX: !0,
            offsetY: !0,
            pointerId: !0,
            pointerType: !0,
            screenX: !0,
            screenY: !0,
            targetTouches: !0,
            toElement: !0,
            touches: !0,
            which: function (t) {
                var e = t.button;
                return null == t.which && vt.test(t.type) ? null != t.charCode ? t.charCode : t.keyCode : !t.which && void 0 !== e && mt.test(t.type) ? 1 & e ? 1 : 2 & e ? 3 : 4 & e ? 2 : 0 : t.which
            }
        }, m.event.addProp), m.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout",
            pointerenter: "pointerover",
            pointerleave: "pointerout"
        }, function (t, e) {
            m.event.special[t] = {
                delegateType: e, bindType: e, handle: function (t) {
                    var n, i = t.relatedTarget, o = t.handleObj;
                    return i && (i === this || m.contains(this, i)) || (t.type = o.origType, n = o.handler.apply(this, arguments), t.type = e), n
                }
            }
        }), m.fn.extend({
            on: function (t, e, n, i) {
                return Tt(this, t, e, n, i)
            }, one: function (t, e, n, i) {
                return Tt(this, t, e, n, i, 1)
            }, off: function (t, e, n) {
                var i, o;
                if (t && t.preventDefault && t.handleObj) return i = t.handleObj, m(t.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                if ("object" == typeof t) {
                    for (o in t) this.off(o, e, t[o]);
                    return this
                }
                return !1 !== e && "function" != typeof e || (n = e, e = void 0), !1 === n && (n = xt), this.each(function () {
                    m.event.remove(this, t, n, e)
                })
            }
        });
        var Ct = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
            Et = /<script|<style|<link/i, St = /checked\s*(?:[^=]|=\s*.checked.)/i, $t = /^true\/(.*)/,
            kt = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

        function Dt(t, e) {
            return k(t, "table") && k(11 !== e.nodeType ? e : e.firstChild, "tr") && m(">tbody", t)[0] || t
        }

        function Nt(t) {
            return t.type = (null !== t.getAttribute("type")) + "/" + t.type, t
        }

        function At(t) {
            var e = $t.exec(t.type);
            return e ? t.type = e[1] : t.removeAttribute("type"), t
        }

        function jt(t, e) {
            var n, i, o, r, s, a, l, u;
            if (1 === e.nodeType) {
                if (V.hasData(t) && (r = V.access(t), s = V.set(e, r), u = r.events)) {
                    delete s.handle, s.events = {};
                    for (o in u) for (n = 0, i = u[o].length; n < i; n++) m.event.add(e, o, u[o][n])
                }
                Q.hasData(t) && (a = Q.access(t), l = m.extend({}, a), Q.set(e, l))
            }
        }

        function Ot(t, e, n, i) {
            e = s.apply([], e);
            var o, r, a, l, u, c, f = 0, p = t.length, d = p - 1, v = e[0], y = m.isFunction(v);
            if (y || p > 1 && "string" == typeof v && !h.checkClone && St.test(v)) return t.each(function (o) {
                var r = t.eq(o);
                y && (e[0] = v.call(this, o, r.html())), Ot(r, e, n, i)
            });
            if (p && (r = (o = ht(e, t[0].ownerDocument, !1, t, i)).firstChild, 1 === o.childNodes.length && (o = r), r || i)) {
                for (l = (a = m.map(ut(o, "script"), Nt)).length; f < p; f++) u = o, f !== d && (u = m.clone(u, !0, !0), l && m.merge(a, ut(u, "script"))), n.call(t[f], u, f);
                if (l) for (c = a[a.length - 1].ownerDocument, m.map(a, At), f = 0; f < l; f++) u = a[f], at.test(u.type || "") && !V.access(u, "globalEval") && m.contains(c, u) && (u.src ? m._evalUrl && m._evalUrl(u.src) : g(u.textContent.replace(kt, ""), c))
            }
            return t
        }

        function It(t, e, n) {
            for (var i, o = e ? m.filter(e, t) : t, r = 0; null != (i = o[r]); r++) n || 1 !== i.nodeType || m.cleanData(ut(i)), i.parentNode && (n && m.contains(i.ownerDocument, i) && ct(ut(i, "script")), i.parentNode.removeChild(i));
            return t
        }

        m.extend({
            htmlPrefilter: function (t) {
                return t.replace(Ct, "<$1></$2>")
            }, clone: function (t, e, n) {
                var i, o, r, s, a, l, u, c = t.cloneNode(!0), f = m.contains(t.ownerDocument, t);
                if (!(h.noCloneChecked || 1 !== t.nodeType && 11 !== t.nodeType || m.isXMLDoc(t))) for (s = ut(c), r = ut(t), i = 0, o = r.length; i < o; i++) a = r[i], l = s[i], void 0, u = l.nodeName.toLowerCase(), "input" === u && rt.test(a.type) ? l.checked = a.checked : "input" !== u && "textarea" !== u || (l.defaultValue = a.defaultValue);
                if (e) if (n) for (r = r || ut(t), s = s || ut(c), i = 0, o = r.length; i < o; i++) jt(r[i], s[i]); else jt(t, c);
                return (s = ut(c, "script")).length > 0 && ct(s, !f && ut(t, "script")), c
            }, cleanData: function (t) {
                for (var e, n, i, o = m.event.special, r = 0; void 0 !== (n = t[r]); r++) if (_(n)) {
                    if (e = n[V.expando]) {
                        if (e.events) for (i in e.events) o[i] ? m.event.remove(n, i) : m.removeEvent(n, i, e.handle);
                        n[V.expando] = void 0
                    }
                    n[Q.expando] && (n[Q.expando] = void 0)
                }
            }
        }), m.fn.extend({
            detach: function (t) {
                return It(this, t, !0)
            }, remove: function (t) {
                return It(this, t)
            }, text: function (t) {
                return U(this, function (t) {
                    return void 0 === t ? m.text(this) : this.empty().each(function () {
                        1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = t)
                    })
                }, null, t, arguments.length)
            }, append: function () {
                return Ot(this, arguments, function (t) {
                    1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Dt(this, t).appendChild(t)
                })
            }, prepend: function () {
                return Ot(this, arguments, function (t) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var e = Dt(this, t);
                        e.insertBefore(t, e.firstChild)
                    }
                })
            }, before: function () {
                return Ot(this, arguments, function (t) {
                    this.parentNode && this.parentNode.insertBefore(t, this)
                })
            }, after: function () {
                return Ot(this, arguments, function (t) {
                    this.parentNode && this.parentNode.insertBefore(t, this.nextSibling)
                })
            }, empty: function () {
                for (var t, e = 0; null != (t = this[e]); e++) 1 === t.nodeType && (m.cleanData(ut(t, !1)), t.textContent = "");
                return this
            }, clone: function (t, e) {
                return t = null != t && t, e = null == e ? t : e, this.map(function () {
                    return m.clone(this, t, e)
                })
            }, html: function (t) {
                return U(this, function (t) {
                    var e = this[0] || {}, n = 0, i = this.length;
                    if (void 0 === t && 1 === e.nodeType) return e.innerHTML;
                    if ("string" == typeof t && !Et.test(t) && !lt[(st.exec(t) || ["", ""])[1].toLowerCase()]) {
                        t = m.htmlPrefilter(t);
                        try {
                            for (; n < i; n++) e = this[n] || {}, 1 === e.nodeType && (m.cleanData(ut(e, !1)), e.innerHTML = t);
                            e = 0
                        } catch (t) {
                        }
                    }
                    e && this.empty().append(t)
                }, null, t, arguments.length)
            }, replaceWith: function () {
                var t = [];
                return Ot(this, arguments, function (e) {
                    var n = this.parentNode;
                    m.inArray(this, t) < 0 && (m.cleanData(ut(this)), n && n.replaceChild(e, this))
                }, t)
            }
        }), m.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function (t, e) {
            m.fn[t] = function (t) {
                for (var n, i = [], o = m(t), r = o.length - 1, s = 0; s <= r; s++) n = s === r ? this : this.clone(!0), m(o[s])[e](n), a.apply(i, n.get());
                return this.pushStack(i)
            }
        });
        var Lt = /^margin/, Rt = new RegExp("^(" + J + ")(?!px)[a-z%]+$", "i"), qt = function (e) {
            var n = e.ownerDocument.defaultView;
            return n && n.opener || (n = t), n.getComputedStyle(e)
        };

        function Pt(t, e, n) {
            var i, o, r, s, a = t.style;
            return (n = n || qt(t)) && ("" !== (s = n.getPropertyValue(e) || n[e]) || m.contains(t.ownerDocument, t) || (s = m.style(t, e)), !h.pixelMarginRight() && Rt.test(s) && Lt.test(e) && (i = a.width, o = a.minWidth, r = a.maxWidth, a.minWidth = a.maxWidth = a.width = s, s = n.width, a.width = i, a.minWidth = o, a.maxWidth = r)), void 0 !== s ? s + "" : s
        }

        function Ht(t, e) {
            return {
                get: function () {
                    return t() ? void delete this.get : (this.get = e).apply(this, arguments)
                }
            }
        }

        !function () {
            function e() {
                if (l) {
                    l.style.cssText = "box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%", l.innerHTML = "", gt.appendChild(a);
                    var e = t.getComputedStyle(l);
                    n = "1%" !== e.top, s = "2px" === e.marginLeft, o = "4px" === e.width, l.style.marginRight = "50%", r = "4px" === e.marginRight, gt.removeChild(a), l = null
                }
            }

            var n, o, r, s, a = i.createElement("div"), l = i.createElement("div");
            l.style && (l.style.backgroundClip = "content-box", l.cloneNode(!0).style.backgroundClip = "", h.clearCloneStyle = "content-box" === l.style.backgroundClip, a.style.cssText = "border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute", a.appendChild(l), m.extend(h, {
                pixelPosition: function () {
                    return e(), n
                }, boxSizingReliable: function () {
                    return e(), o
                }, pixelMarginRight: function () {
                    return e(), r
                }, reliableMarginLeft: function () {
                    return e(), s
                }
            }))
        }();
        var Ft = /^(none|table(?!-c[ea]).+)/, Wt = /^--/,
            Mt = {position: "absolute", visibility: "hidden", display: "block"},
            Bt = {letterSpacing: "0", fontWeight: "400"}, Ut = ["Webkit", "Moz", "ms"],
            _t = i.createElement("div").style;

        function zt(t) {
            var e = m.cssProps[t];
            return e || (e = m.cssProps[t] = function (t) {
                if (t in _t) return t;
                for (var e = t[0].toUpperCase() + t.slice(1), n = Ut.length; n--;) if (t = Ut[n] + e, t in _t) return t
            }(t) || t), e
        }

        function Vt(t, e, n) {
            var i = K.exec(e);
            return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : e
        }

        function Qt(t, e, n, i, o) {
            var r, s = 0;
            for (r = n === (i ? "border" : "content") ? 4 : "width" === e ? 1 : 0; r < 4; r += 2) "margin" === n && (s += m.css(t, n + Z[r], !0, o)), i ? ("content" === n && (s -= m.css(t, "padding" + Z[r], !0, o)), "margin" !== n && (s -= m.css(t, "border" + Z[r] + "Width", !0, o))) : (s += m.css(t, "padding" + Z[r], !0, o), "padding" !== n && (s += m.css(t, "border" + Z[r] + "Width", !0, o)));
            return s
        }

        function Xt(t, e, n) {
            var i, o = qt(t), r = Pt(t, e, o), s = "border-box" === m.css(t, "boxSizing", !1, o);
            return Rt.test(r) ? r : (i = s && (h.boxSizingReliable() || r === t.style[e]), "auto" === r && (r = t["offset" + e[0].toUpperCase() + e.slice(1)]), (r = parseFloat(r) || 0) + Qt(t, e, n || (s ? "border" : "content"), i, o) + "px")
        }

        function Gt(t, e, n, i, o) {
            return new Gt.prototype.init(t, e, n, i, o)
        }

        m.extend({
            cssHooks: {
                opacity: {
                    get: function (t, e) {
                        if (e) {
                            var n = Pt(t, "opacity");
                            return "" === n ? "1" : n
                        }
                    }
                }
            },
            cssNumber: {
                animationIterationCount: !0,
                columnCount: !0,
                fillOpacity: !0,
                flexGrow: !0,
                flexShrink: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                order: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {float: "cssFloat"},
            style: function (t, e, n, i) {
                if (t && 3 !== t.nodeType && 8 !== t.nodeType && t.style) {
                    var o, r, s, a = m.camelCase(e), l = Wt.test(e), u = t.style;
                    return l || (e = zt(a)), s = m.cssHooks[e] || m.cssHooks[a], void 0 === n ? s && "get" in s && void 0 !== (o = s.get(t, !1, i)) ? o : u[e] : ("string" === (r = typeof n) && (o = K.exec(n)) && o[1] && (n = nt(t, e, o), r = "number"), void (null != n && n == n && ("number" === r && (n += o && o[3] || (m.cssNumber[a] ? "" : "px")), h.clearCloneStyle || "" !== n || 0 !== e.indexOf("background") || (u[e] = "inherit"), s && "set" in s && void 0 === (n = s.set(t, n, i)) || (l ? u.setProperty(e, n) : u[e] = n))))
                }
            },
            css: function (t, e, n, i) {
                var o, r, s, a = m.camelCase(e);
                return Wt.test(e) || (e = zt(a)), (s = m.cssHooks[e] || m.cssHooks[a]) && "get" in s && (o = s.get(t, !0, n)), void 0 === o && (o = Pt(t, e, i)), "normal" === o && e in Bt && (o = Bt[e]), "" === n || n ? (r = parseFloat(o), !0 === n || isFinite(r) ? r || 0 : o) : o
            }
        }), m.each(["height", "width"], function (t, e) {
            m.cssHooks[e] = {
                get: function (t, n, i) {
                    if (n) return !Ft.test(m.css(t, "display")) || t.getClientRects().length && t.getBoundingClientRect().width ? Xt(t, e, i) : et(t, Mt, function () {
                        return Xt(t, e, i)
                    })
                }, set: function (t, n, i) {
                    var o, r = i && qt(t), s = i && Qt(t, e, i, "border-box" === m.css(t, "boxSizing", !1, r), r);
                    return s && (o = K.exec(n)) && "px" !== (o[3] || "px") && (t.style[e] = n, n = m.css(t, e)), Vt(0, n, s)
                }
            }
        }), m.cssHooks.marginLeft = Ht(h.reliableMarginLeft, function (t, e) {
            if (e) return (parseFloat(Pt(t, "marginLeft")) || t.getBoundingClientRect().left - et(t, {marginLeft: 0}, function () {
                return t.getBoundingClientRect().left
            })) + "px"
        }), m.each({margin: "", padding: "", border: "Width"}, function (t, e) {
            m.cssHooks[t + e] = {
                expand: function (n) {
                    for (var i = 0, o = {}, r = "string" == typeof n ? n.split(" ") : [n]; i < 4; i++) o[t + Z[i] + e] = r[i] || r[i - 2] || r[0];
                    return o
                }
            }, Lt.test(t) || (m.cssHooks[t + e].set = Vt)
        }), m.fn.extend({
            css: function (t, e) {
                return U(this, function (t, e, n) {
                    var i, o, r = {}, s = 0;
                    if (Array.isArray(e)) {
                        for (i = qt(t), o = e.length; s < o; s++) r[e[s]] = m.css(t, e[s], !1, i);
                        return r
                    }
                    return void 0 !== n ? m.style(t, e, n) : m.css(t, e)
                }, t, e, arguments.length > 1)
            }
        }), m.Tween = Gt, Gt.prototype = {
            constructor: Gt, init: function (t, e, n, i, o, r) {
                this.elem = t, this.prop = n, this.easing = o || m.easing._default, this.options = e, this.start = this.now = this.cur(), this.end = i, this.unit = r || (m.cssNumber[n] ? "" : "px")
            }, cur: function () {
                var t = Gt.propHooks[this.prop];
                return t && t.get ? t.get(this) : Gt.propHooks._default.get(this)
            }, run: function (t) {
                var e, n = Gt.propHooks[this.prop];
                return this.options.duration ? this.pos = e = m.easing[this.easing](t, this.options.duration * t, 0, 1, this.options.duration) : this.pos = e = t, this.now = (this.end - this.start) * e + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Gt.propHooks._default.set(this), this
            }
        }, Gt.prototype.init.prototype = Gt.prototype, Gt.propHooks = {
            _default: {
                get: function (t) {
                    var e;
                    return 1 !== t.elem.nodeType || null != t.elem[t.prop] && null == t.elem.style[t.prop] ? t.elem[t.prop] : (e = m.css(t.elem, t.prop, "")) && "auto" !== e ? e : 0
                }, set: function (t) {
                    m.fx.step[t.prop] ? m.fx.step[t.prop](t) : 1 !== t.elem.nodeType || null == t.elem.style[m.cssProps[t.prop]] && !m.cssHooks[t.prop] ? t.elem[t.prop] = t.now : m.style(t.elem, t.prop, t.now + t.unit)
                }
            }
        }, Gt.propHooks.scrollTop = Gt.propHooks.scrollLeft = {
            set: function (t) {
                t.elem.nodeType && t.elem.parentNode && (t.elem[t.prop] = t.now)
            }
        }, m.easing = {
            linear: function (t) {
                return t
            }, swing: function (t) {
                return .5 - Math.cos(t * Math.PI) / 2
            }, _default: "swing"
        }, m.fx = Gt.prototype.init, m.fx.step = {};
        var Yt, Jt, Kt, Zt, te = /^(?:toggle|show|hide)$/, ee = /queueHooks$/;

        function ne() {
            Jt && (!1 === i.hidden && t.requestAnimationFrame ? t.requestAnimationFrame(ne) : t.setTimeout(ne, m.fx.interval), m.fx.tick())
        }

        function ie() {
            return t.setTimeout(function () {
                Yt = void 0
            }), Yt = m.now()
        }

        function oe(t, e) {
            var n, i = 0, o = {height: t};
            for (e = e ? 1 : 0; i < 4; i += 2 - e) n = Z[i], o["margin" + n] = o["padding" + n] = t;
            return e && (o.opacity = o.width = t), o
        }

        function re(t, e, n) {
            for (var i, o = (se.tweeners[e] || []).concat(se.tweeners["*"]), r = 0, s = o.length; r < s; r++) if (i = o[r].call(n, e, t)) return i
        }

        function se(t, e, n) {
            var i, o, r = 0, s = se.prefilters.length, a = m.Deferred().always(function () {
                delete l.elem
            }), l = function () {
                if (o) return !1;
                for (var e = Yt || ie(), n = Math.max(0, u.startTime + u.duration - e), i = 1 - (n / u.duration || 0), r = 0, s = u.tweens.length; r < s; r++) u.tweens[r].run(i);
                return a.notifyWith(t, [u, i, n]), i < 1 && s ? n : (s || a.notifyWith(t, [u, 1, 0]), a.resolveWith(t, [u]), !1)
            }, u = a.promise({
                elem: t,
                props: m.extend({}, e),
                opts: m.extend(!0, {specialEasing: {}, easing: m.easing._default}, n),
                originalProperties: e,
                originalOptions: n,
                startTime: Yt || ie(),
                duration: n.duration,
                tweens: [],
                createTween: function (e, n) {
                    var i = m.Tween(t, u.opts, e, n, u.opts.specialEasing[e] || u.opts.easing);
                    return u.tweens.push(i), i
                },
                stop: function (e) {
                    var n = 0, i = e ? u.tweens.length : 0;
                    if (o) return this;
                    for (o = !0; n < i; n++) u.tweens[n].run(1);
                    return e ? (a.notifyWith(t, [u, 1, 0]), a.resolveWith(t, [u, e])) : a.rejectWith(t, [u, e]), this
                }
            }), c = u.props;
            for (function (t, e) {
                var n, i, o, r, s;
                for (n in t) if (i = m.camelCase(n), o = e[i], r = t[n], Array.isArray(r) && (o = r[1], r = t[n] = r[0]), n !== i && (t[i] = r, delete t[n]), s = m.cssHooks[i], s && "expand" in s) {
                    r = s.expand(r), delete t[i];
                    for (n in r) n in t || (t[n] = r[n], e[n] = o)
                } else e[i] = o
            }(c, u.opts.specialEasing); r < s; r++) if (i = se.prefilters[r].call(u, t, c, u.opts)) return m.isFunction(i.stop) && (m._queueHooks(u.elem, u.opts.queue).stop = m.proxy(i.stop, i)), i;
            return m.map(c, re, u), m.isFunction(u.opts.start) && u.opts.start.call(t, u), u.progress(u.opts.progress).done(u.opts.done, u.opts.complete).fail(u.opts.fail).always(u.opts.always), m.fx.timer(m.extend(l, {
                elem: t,
                anim: u,
                queue: u.opts.queue
            })), u
        }

        m.Animation = m.extend(se, {
            tweeners: {
                "*": [function (t, e) {
                    var n = this.createTween(t, e);
                    return nt(n.elem, t, K.exec(e), n), n
                }]
            }, tweener: function (t, e) {
                m.isFunction(t) ? (e = t, t = ["*"]) : t = t.match(q);
                for (var n, i = 0, o = t.length; i < o; i++) n = t[i], se.tweeners[n] = se.tweeners[n] || [], se.tweeners[n].unshift(e)
            }, prefilters: [function (t, e, n) {
                var i, o, r, s, a, l, u, c, f = "width" in e || "height" in e, p = this, d = {}, h = t.style,
                    g = t.nodeType && tt(t), v = V.get(t, "fxshow");
                n.queue || (null == (s = m._queueHooks(t, "fx")).unqueued && (s.unqueued = 0, a = s.empty.fire, s.empty.fire = function () {
                    s.unqueued || a()
                }), s.unqueued++, p.always(function () {
                    p.always(function () {
                        s.unqueued--, m.queue(t, "fx").length || s.empty.fire()
                    })
                }));
                for (i in e) if (o = e[i], te.test(o)) {
                    if (delete e[i], r = r || "toggle" === o, o === (g ? "hide" : "show")) {
                        if ("show" !== o || !v || void 0 === v[i]) continue;
                        g = !0
                    }
                    d[i] = v && v[i] || m.style(t, i)
                }
                if ((l = !m.isEmptyObject(e)) || !m.isEmptyObject(d)) {
                    f && 1 === t.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY], null == (u = v && v.display) && (u = V.get(t, "display")), "none" === (c = m.css(t, "display")) && (u ? c = u : (ot([t], !0), u = t.style.display || u, c = m.css(t, "display"), ot([t]))), ("inline" === c || "inline-block" === c && null != u) && "none" === m.css(t, "float") && (l || (p.done(function () {
                        h.display = u
                    }), null == u && (c = h.display, u = "none" === c ? "" : c)), h.display = "inline-block")), n.overflow && (h.overflow = "hidden", p.always(function () {
                        h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
                    })), l = !1;
                    for (i in d) l || (v ? "hidden" in v && (g = v.hidden) : v = V.access(t, "fxshow", {display: u}), r && (v.hidden = !g), g && ot([t], !0), p.done(function () {
                        g || ot([t]), V.remove(t, "fxshow");
                        for (i in d) m.style(t, i, d[i])
                    })), l = re(g ? v[i] : 0, i, p), i in v || (v[i] = l.start, g && (l.end = l.start, l.start = 0))
                }
            }], prefilter: function (t, e) {
                e ? se.prefilters.unshift(t) : se.prefilters.push(t)
            }
        }), m.speed = function (t, e, n) {
            var i = t && "object" == typeof t ? m.extend({}, t) : {
                complete: n || !n && e || m.isFunction(t) && t,
                duration: t,
                easing: n && e || e && !m.isFunction(e) && e
            };
            return m.fx.off ? i.duration = 0 : "number" != typeof i.duration && (i.duration in m.fx.speeds ? i.duration = m.fx.speeds[i.duration] : i.duration = m.fx.speeds._default), null != i.queue && !0 !== i.queue || (i.queue = "fx"), i.old = i.complete, i.complete = function () {
                m.isFunction(i.old) && i.old.call(this), i.queue && m.dequeue(this, i.queue)
            }, i
        }, m.fn.extend({
            fadeTo: function (t, e, n, i) {
                return this.filter(tt).css("opacity", 0).show().end().animate({opacity: e}, t, n, i)
            }, animate: function (t, e, n, i) {
                var o = m.isEmptyObject(t), r = m.speed(e, n, i), s = function () {
                    var e = se(this, m.extend({}, t), r);
                    (o || V.get(this, "finish")) && e.stop(!0)
                };
                return s.finish = s, o || !1 === r.queue ? this.each(s) : this.queue(r.queue, s)
            }, stop: function (t, e, n) {
                var i = function (t) {
                    var e = t.stop;
                    delete t.stop, e(n)
                };
                return "string" != typeof t && (n = e, e = t, t = void 0), e && !1 !== t && this.queue(t || "fx", []), this.each(function () {
                    var e = !0, o = null != t && t + "queueHooks", r = m.timers, s = V.get(this);
                    if (o) s[o] && s[o].stop && i(s[o]); else for (o in s) s[o] && s[o].stop && ee.test(o) && i(s[o]);
                    for (o = r.length; o--;) r[o].elem !== this || null != t && r[o].queue !== t || (r[o].anim.stop(n), e = !1, r.splice(o, 1));
                    !e && n || m.dequeue(this, t)
                })
            }, finish: function (t) {
                return !1 !== t && (t = t || "fx"), this.each(function () {
                    var e, n = V.get(this), i = n[t + "queue"], o = n[t + "queueHooks"], r = m.timers,
                        s = i ? i.length : 0;
                    for (n.finish = !0, m.queue(this, t, []), o && o.stop && o.stop.call(this, !0), e = r.length; e--;) r[e].elem === this && r[e].queue === t && (r[e].anim.stop(!0), r.splice(e, 1));
                    for (e = 0; e < s; e++) i[e] && i[e].finish && i[e].finish.call(this);
                    delete n.finish
                })
            }
        }), m.each(["toggle", "show", "hide"], function (t, e) {
            var n = m.fn[e];
            m.fn[e] = function (t, i, o) {
                return null == t || "boolean" == typeof t ? n.apply(this, arguments) : this.animate(oe(e, !0), t, i, o)
            }
        }), m.each({
            slideDown: oe("show"),
            slideUp: oe("hide"),
            slideToggle: oe("toggle"),
            fadeIn: {opacity: "show"},
            fadeOut: {opacity: "hide"},
            fadeToggle: {opacity: "toggle"}
        }, function (t, e) {
            m.fn[t] = function (t, n, i) {
                return this.animate(e, t, n, i)
            }
        }), m.timers = [], m.fx.tick = function () {
            var t, e = 0, n = m.timers;
            for (Yt = m.now(); e < n.length; e++) t = n[e], t() || n[e] !== t || n.splice(e--, 1);
            n.length || m.fx.stop(), Yt = void 0
        }, m.fx.timer = function (t) {
            m.timers.push(t), m.fx.start()
        }, m.fx.interval = 13, m.fx.start = function () {
            Jt || (Jt = !0, ne())
        }, m.fx.stop = function () {
            Jt = null
        }, m.fx.speeds = {slow: 600, fast: 200, _default: 400}, m.fn.delay = function (e, n) {
            return e = m.fx && m.fx.speeds[e] || e, n = n || "fx", this.queue(n, function (n, i) {
                var o = t.setTimeout(n, e);
                i.stop = function () {
                    t.clearTimeout(o)
                }
            })
        }, Kt = i.createElement("input"), Zt = i.createElement("select").appendChild(i.createElement("option")), Kt.type = "checkbox", h.checkOn = "" !== Kt.value, h.optSelected = Zt.selected, (Kt = i.createElement("input")).value = "t", Kt.type = "radio", h.radioValue = "t" === Kt.value;
        var ae, le = m.expr.attrHandle;
        m.fn.extend({
            attr: function (t, e) {
                return U(this, m.attr, t, e, arguments.length > 1)
            }, removeAttr: function (t) {
                return this.each(function () {
                    m.removeAttr(this, t)
                })
            }
        }), m.extend({
            attr: function (t, e, n) {
                var i, o, r = t.nodeType;
                if (3 !== r && 8 !== r && 2 !== r) return void 0 === t.getAttribute ? m.prop(t, e, n) : (1 === r && m.isXMLDoc(t) || (o = m.attrHooks[e.toLowerCase()] || (m.expr.match.bool.test(e) ? ae : void 0)), void 0 !== n ? null === n ? void m.removeAttr(t, e) : o && "set" in o && void 0 !== (i = o.set(t, n, e)) ? i : (t.setAttribute(e, n + ""), n) : o && "get" in o && null !== (i = o.get(t, e)) ? i : (i = m.find.attr(t, e), null == i ? void 0 : i))
            }, attrHooks: {
                type: {
                    set: function (t, e) {
                        if (!h.radioValue && "radio" === e && k(t, "input")) {
                            var n = t.value;
                            return t.setAttribute("type", e), n && (t.value = n), e
                        }
                    }
                }
            }, removeAttr: function (t, e) {
                var n, i = 0, o = e && e.match(q);
                if (o && 1 === t.nodeType) for (; n = o[i++];) t.removeAttribute(n)
            }
        }), ae = {
            set: function (t, e, n) {
                return !1 === e ? m.removeAttr(t, n) : t.setAttribute(n, n), n
            }
        }, m.each(m.expr.match.bool.source.match(/\w+/g), function (t, e) {
            var n = le[e] || m.find.attr;
            le[e] = function (t, e, i) {
                var o, r, s = e.toLowerCase();
                return i || (r = le[s], le[s] = o, o = null != n(t, e, i) ? s : null, le[s] = r), o
            }
        });
        var ue = /^(?:input|select|textarea|button)$/i, ce = /^(?:a|area)$/i;

        function fe(t) {
            return (t.match(q) || []).join(" ")
        }

        function pe(t) {
            return t.getAttribute && t.getAttribute("class") || ""
        }

        m.fn.extend({
            prop: function (t, e) {
                return U(this, m.prop, t, e, arguments.length > 1)
            }, removeProp: function (t) {
                return this.each(function () {
                    delete this[m.propFix[t] || t]
                })
            }
        }), m.extend({
            prop: function (t, e, n) {
                var i, o, r = t.nodeType;
                if (3 !== r && 8 !== r && 2 !== r) return 1 === r && m.isXMLDoc(t) || (e = m.propFix[e] || e, o = m.propHooks[e]), void 0 !== n ? o && "set" in o && void 0 !== (i = o.set(t, n, e)) ? i : t[e] = n : o && "get" in o && null !== (i = o.get(t, e)) ? i : t[e]
            }, propHooks: {
                tabIndex: {
                    get: function (t) {
                        var e = m.find.attr(t, "tabindex");
                        return e ? parseInt(e, 10) : ue.test(t.nodeName) || ce.test(t.nodeName) && t.href ? 0 : -1
                    }
                }
            }, propFix: {for: "htmlFor", class: "className"}
        }), h.optSelected || (m.propHooks.selected = {
            get: function (t) {
                var e = t.parentNode;
                return e && e.parentNode && e.parentNode.selectedIndex, null
            }, set: function (t) {
                var e = t.parentNode;
                e && (e.selectedIndex, e.parentNode && e.parentNode.selectedIndex)
            }
        }), m.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
            m.propFix[this.toLowerCase()] = this
        }), m.fn.extend({
            addClass: function (t) {
                var e, n, i, o, r, s, a, l = 0;
                if (m.isFunction(t)) return this.each(function (e) {
                    m(this).addClass(t.call(this, e, pe(this)))
                });
                if ("string" == typeof t && t) for (e = t.match(q) || []; n = this[l++];) if (o = pe(n), i = 1 === n.nodeType && " " + fe(o) + " ") {
                    for (s = 0; r = e[s++];) i.indexOf(" " + r + " ") < 0 && (i += r + " ");
                    o !== (a = fe(i)) && n.setAttribute("class", a)
                }
                return this
            }, removeClass: function (t) {
                var e, n, i, o, r, s, a, l = 0;
                if (m.isFunction(t)) return this.each(function (e) {
                    m(this).removeClass(t.call(this, e, pe(this)))
                });
                if (!arguments.length) return this.attr("class", "");
                if ("string" == typeof t && t) for (e = t.match(q) || []; n = this[l++];) if (o = pe(n), i = 1 === n.nodeType && " " + fe(o) + " ") {
                    for (s = 0; r = e[s++];) for (; i.indexOf(" " + r + " ") > -1;) i = i.replace(" " + r + " ", " ");
                    o !== (a = fe(i)) && n.setAttribute("class", a)
                }
                return this
            }, toggleClass: function (t, e) {
                var n = typeof t;
                return "boolean" == typeof e && "string" === n ? e ? this.addClass(t) : this.removeClass(t) : m.isFunction(t) ? this.each(function (n) {
                    m(this).toggleClass(t.call(this, n, pe(this), e), e)
                }) : this.each(function () {
                    var e, i, o, r;
                    if ("string" === n) for (i = 0, o = m(this), r = t.match(q) || []; e = r[i++];) o.hasClass(e) ? o.removeClass(e) : o.addClass(e); else void 0 !== t && "boolean" !== n || (e = pe(this), e && V.set(this, "__className__", e), this.setAttribute && this.setAttribute("class", e || !1 === t ? "" : V.get(this, "__className__") || ""))
                })
            }, hasClass: function (t) {
                var e, n, i = 0;
                for (e = " " + t + " "; n = this[i++];) if (1 === n.nodeType && (" " + fe(pe(n)) + " ").indexOf(e) > -1) return !0;
                return !1
            }
        });
        var de = /\r/g;
        m.fn.extend({
            val: function (t) {
                var e, n, i, o = this[0];
                return arguments.length ? (i = m.isFunction(t), this.each(function (n) {
                    var o;
                    1 === this.nodeType && (null == (o = i ? t.call(this, n, m(this).val()) : t) ? o = "" : "number" == typeof o ? o += "" : Array.isArray(o) && (o = m.map(o, function (t) {
                        return null == t ? "" : t + ""
                    })), (e = m.valHooks[this.type] || m.valHooks[this.nodeName.toLowerCase()]) && "set" in e && void 0 !== e.set(this, o, "value") || (this.value = o))
                })) : o ? (e = m.valHooks[o.type] || m.valHooks[o.nodeName.toLowerCase()]) && "get" in e && void 0 !== (n = e.get(o, "value")) ? n : "string" == typeof (n = o.value) ? n.replace(de, "") : null == n ? "" : n : void 0
            }
        }), m.extend({
            valHooks: {
                option: {
                    get: function (t) {
                        var e = m.find.attr(t, "value");
                        return null != e ? e : fe(m.text(t))
                    }
                }, select: {
                    get: function (t) {
                        var e, n, i, o = t.options, r = t.selectedIndex, s = "select-one" === t.type, a = s ? null : [],
                            l = s ? r + 1 : o.length;
                        for (i = r < 0 ? l : s ? r : 0; i < l; i++) if (n = o[i], (n.selected || i === r) && !n.disabled && (!n.parentNode.disabled || !k(n.parentNode, "optgroup"))) {
                            if (e = m(n).val(), s) return e;
                            a.push(e)
                        }
                        return a
                    }, set: function (t, e) {
                        for (var n, i, o = t.options, r = m.makeArray(e), s = o.length; s--;) i = o[s], (i.selected = m.inArray(m.valHooks.option.get(i), r) > -1) && (n = !0);
                        return n || (t.selectedIndex = -1), r
                    }
                }
            }
        }), m.each(["radio", "checkbox"], function () {
            m.valHooks[this] = {
                set: function (t, e) {
                    if (Array.isArray(e)) return t.checked = m.inArray(m(t).val(), e) > -1
                }
            }, h.checkOn || (m.valHooks[this].get = function (t) {
                return null === t.getAttribute("value") ? "on" : t.value
            })
        });
        var he = /^(?:focusinfocus|focusoutblur)$/;
        m.extend(m.event, {
            trigger: function (e, n, o, r) {
                var s, a, l, u, c, p, d, h = [o || i], g = f.call(e, "type") ? e.type : e,
                    v = f.call(e, "namespace") ? e.namespace.split(".") : [];
                if (a = l = o = o || i, 3 !== o.nodeType && 8 !== o.nodeType && !he.test(g + m.event.triggered) && (g.indexOf(".") > -1 && (g = (v = g.split(".")).shift(), v.sort()), c = g.indexOf(":") < 0 && "on" + g, (e = e[m.expando] ? e : new m.Event(g, "object" == typeof e && e)).isTrigger = r ? 2 : 3, e.namespace = v.join("."), e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + v.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, e.result = void 0, e.target || (e.target = o), n = null == n ? [e] : m.makeArray(n, [e]), d = m.event.special[g] || {}, r || !d.trigger || !1 !== d.trigger.apply(o, n))) {
                    if (!r && !d.noBubble && !m.isWindow(o)) {
                        for (u = d.delegateType || g, he.test(u + g) || (a = a.parentNode); a; a = a.parentNode) h.push(a), l = a;
                        l === (o.ownerDocument || i) && h.push(l.defaultView || l.parentWindow || t)
                    }
                    for (s = 0; (a = h[s++]) && !e.isPropagationStopped();) e.type = s > 1 ? u : d.bindType || g, p = (V.get(a, "events") || {})[e.type] && V.get(a, "handle"), p && p.apply(a, n), p = c && a[c], p && p.apply && _(a) && (e.result = p.apply(a, n), !1 === e.result && e.preventDefault());
                    return e.type = g, r || e.isDefaultPrevented() || d._default && !1 !== d._default.apply(h.pop(), n) || !_(o) || c && m.isFunction(o[g]) && !m.isWindow(o) && ((l = o[c]) && (o[c] = null), m.event.triggered = g, o[g](), m.event.triggered = void 0, l && (o[c] = l)), e.result
                }
            }, simulate: function (t, e, n) {
                var i = m.extend(new m.Event, n, {type: t, isSimulated: !0});
                m.event.trigger(i, null, e)
            }
        }), m.fn.extend({
            trigger: function (t, e) {
                return this.each(function () {
                    m.event.trigger(t, e, this)
                })
            }, triggerHandler: function (t, e) {
                var n = this[0];
                if (n) return m.event.trigger(t, e, n, !0)
            }
        }), m.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (t, e) {
            m.fn[e] = function (t, n) {
                return arguments.length > 0 ? this.on(e, null, t, n) : this.trigger(e)
            }
        }), m.fn.extend({
            hover: function (t, e) {
                return this.mouseenter(t).mouseleave(e || t)
            }
        }), h.focusin = "onfocusin" in t, h.focusin || m.each({focus: "focusin", blur: "focusout"}, function (t, e) {
            var n = function (t) {
                m.event.simulate(e, t.target, m.event.fix(t))
            };
            m.event.special[e] = {
                setup: function () {
                    var i = this.ownerDocument || this, o = V.access(i, e);
                    o || i.addEventListener(t, n, !0), V.access(i, e, (o || 0) + 1)
                }, teardown: function () {
                    var i = this.ownerDocument || this, o = V.access(i, e) - 1;
                    o ? V.access(i, e, o) : (i.removeEventListener(t, n, !0), V.remove(i, e))
                }
            }
        });
        var ge = t.location, ve = m.now(), me = /\?/;
        m.parseXML = function (e) {
            var n;
            if (!e || "string" != typeof e) return null;
            try {
                n = (new t.DOMParser).parseFromString(e, "text/xml")
            } catch (t) {
                n = void 0
            }
            return n && !n.getElementsByTagName("parsererror").length || m.error("Invalid XML: " + e), n
        };
        var ye = /\[\]$/, be = /\r?\n/g, xe = /^(?:submit|button|image|reset|file)$/i,
            we = /^(?:input|select|textarea|keygen)/i;

        function Te(t, e, n, i) {
            var o;
            if (Array.isArray(e)) m.each(e, function (e, o) {
                n || ye.test(t) ? i(t, o) : Te(t + "[" + ("object" == typeof o && null != o ? e : "") + "]", o, n, i)
            }); else if (n || "object" !== m.type(e)) i(t, e); else for (o in e) Te(t + "[" + o + "]", e[o], n, i)
        }

        m.param = function (t, e) {
            var n, i = [], o = function (t, e) {
                var n = m.isFunction(e) ? e() : e;
                i[i.length] = encodeURIComponent(t) + "=" + encodeURIComponent(null == n ? "" : n)
            };
            if (Array.isArray(t) || t.jquery && !m.isPlainObject(t)) m.each(t, function () {
                o(this.name, this.value)
            }); else for (n in t) Te(n, t[n], e, o);
            return i.join("&")
        }, m.fn.extend({
            serialize: function () {
                return m.param(this.serializeArray())
            }, serializeArray: function () {
                return this.map(function () {
                    var t = m.prop(this, "elements");
                    return t ? m.makeArray(t) : this
                }).filter(function () {
                    var t = this.type;
                    return this.name && !m(this).is(":disabled") && we.test(this.nodeName) && !xe.test(t) && (this.checked || !rt.test(t))
                }).map(function (t, e) {
                    var n = m(this).val();
                    return null == n ? null : Array.isArray(n) ? m.map(n, function (t) {
                        return {name: e.name, value: t.replace(be, "\r\n")}
                    }) : {name: e.name, value: n.replace(be, "\r\n")}
                }).get()
            }
        });
        var Ce = /%20/g, Ee = /#.*$/, Se = /([?&])_=[^&]*/, $e = /^(.*?):[ \t]*([^\r\n]*)$/gm, ke = /^(?:GET|HEAD)$/,
            De = /^\/\//, Ne = {}, Ae = {}, je = "*/".concat("*"), Oe = i.createElement("a");

        function Ie(t) {
            return function (e, n) {
                "string" != typeof e && (n = e, e = "*");
                var i, o = 0, r = e.toLowerCase().match(q) || [];
                if (m.isFunction(n)) for (; i = r[o++];) "+" === i[0] ? (i = i.slice(1) || "*", (t[i] = t[i] || []).unshift(n)) : (t[i] = t[i] || []).push(n)
            }
        }

        function Le(t, e, n, i) {
            var o = {}, r = t === Ae;

            function s(a) {
                var l;
                return o[a] = !0, m.each(t[a] || [], function (t, a) {
                    var u = a(e, n, i);
                    return "string" != typeof u || r || o[u] ? r ? !(l = u) : void 0 : (e.dataTypes.unshift(u), s(u), !1)
                }), l
            }

            return s(e.dataTypes[0]) || !o["*"] && s("*")
        }

        function Re(t, e) {
            var n, i, o = m.ajaxSettings.flatOptions || {};
            for (n in e) void 0 !== e[n] && ((o[n] ? t : i || (i = {}))[n] = e[n]);
            return i && m.extend(!0, t, i), t
        }

        Oe.href = ge.href, m.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: ge.href,
                type: "GET",
                isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(ge.protocol),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": je,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                },
                contents: {xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/},
                responseFields: {xml: "responseXML", text: "responseText", json: "responseJSON"},
                converters: {"* text": String, "text html": !0, "text json": JSON.parse, "text xml": m.parseXML},
                flatOptions: {url: !0, context: !0}
            },
            ajaxSetup: function (t, e) {
                return e ? Re(Re(t, m.ajaxSettings), e) : Re(m.ajaxSettings, t)
            },
            ajaxPrefilter: Ie(Ne),
            ajaxTransport: Ie(Ae),
            ajax: function (e, n) {
                "object" == typeof e && (n = e, e = void 0), n = n || {};
                var o, r, s, a, l, u, c, f, p, d, h = m.ajaxSetup({}, n), g = h.context || h,
                    v = h.context && (g.nodeType || g.jquery) ? m(g) : m.event, y = m.Deferred(),
                    b = m.Callbacks("once memory"), x = h.statusCode || {}, w = {}, T = {}, C = "canceled", E = {
                        readyState: 0, getResponseHeader: function (t) {
                            var e;
                            if (c) {
                                if (!a) for (a = {}; e = $e.exec(s);) a[e[1].toLowerCase()] = e[2];
                                e = a[t.toLowerCase()]
                            }
                            return null == e ? null : e
                        }, getAllResponseHeaders: function () {
                            return c ? s : null
                        }, setRequestHeader: function (t, e) {
                            return null == c && (t = T[t.toLowerCase()] = T[t.toLowerCase()] || t, w[t] = e), this
                        }, overrideMimeType: function (t) {
                            return null == c && (h.mimeType = t), this
                        }, statusCode: function (t) {
                            var e;
                            if (t) if (c) E.always(t[E.status]); else for (e in t) x[e] = [x[e], t[e]];
                            return this
                        }, abort: function (t) {
                            var e = t || C;
                            return o && o.abort(e), S(0, e), this
                        }
                    };
                if (y.promise(E), h.url = ((e || h.url || ge.href) + "").replace(De, ge.protocol + "//"), h.type = n.method || n.type || h.method || h.type, h.dataTypes = (h.dataType || "*").toLowerCase().match(q) || [""], null == h.crossDomain) {
                    u = i.createElement("a");
                    try {
                        u.href = h.url, u.href = u.href, h.crossDomain = Oe.protocol + "//" + Oe.host != u.protocol + "//" + u.host
                    } catch (t) {
                        h.crossDomain = !0
                    }
                }
                if (h.data && h.processData && "string" != typeof h.data && (h.data = m.param(h.data, h.traditional)), Le(Ne, h, n, E), c) return E;
                (f = m.event && h.global) && 0 == m.active++ && m.event.trigger("ajaxStart"), h.type = h.type.toUpperCase(), h.hasContent = !ke.test(h.type), r = h.url.replace(Ee, ""), h.hasContent ? h.data && h.processData && 0 === (h.contentType || "").indexOf("application/x-www-form-urlencoded") && (h.data = h.data.replace(Ce, "+")) : (d = h.url.slice(r.length), h.data && (r += (me.test(r) ? "&" : "?") + h.data, delete h.data), !1 === h.cache && (r = r.replace(Se, "$1"), d = (me.test(r) ? "&" : "?") + "_=" + ve++ + d), h.url = r + d), h.ifModified && (m.lastModified[r] && E.setRequestHeader("If-Modified-Since", m.lastModified[r]), m.etag[r] && E.setRequestHeader("If-None-Match", m.etag[r])), (h.data && h.hasContent && !1 !== h.contentType || n.contentType) && E.setRequestHeader("Content-Type", h.contentType), E.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + je + "; q=0.01" : "") : h.accepts["*"]);
                for (p in h.headers) E.setRequestHeader(p, h.headers[p]);
                if (h.beforeSend && (!1 === h.beforeSend.call(g, E, h) || c)) return E.abort();
                if (C = "abort", b.add(h.complete), E.done(h.success), E.fail(h.error), o = Le(Ae, h, n, E)) {
                    if (E.readyState = 1, f && v.trigger("ajaxSend", [E, h]), c) return E;
                    h.async && h.timeout > 0 && (l = t.setTimeout(function () {
                        E.abort("timeout")
                    }, h.timeout));
                    try {
                        c = !1, o.send(w, S)
                    } catch (t) {
                        if (c) throw t;
                        S(-1, t)
                    }
                } else S(-1, "No Transport");

                function S(e, n, i, a) {
                    var u, p, d, w, T, C = n;
                    c || (c = !0, l && t.clearTimeout(l), o = void 0, s = a || "", E.readyState = e > 0 ? 4 : 0, u = e >= 200 && e < 300 || 304 === e, i && (w = function (t, e, n) {
                        for (var i, o, r, s, a = t.contents, l = t.dataTypes; "*" === l[0];) l.shift(), void 0 === i && (i = t.mimeType || e.getResponseHeader("Content-Type"));
                        if (i) for (o in a) if (a[o] && a[o].test(i)) {
                            l.unshift(o);
                            break
                        }
                        if (l[0] in n) r = l[0]; else {
                            for (o in n) {
                                if (!l[0] || t.converters[o + " " + l[0]]) {
                                    r = o;
                                    break
                                }
                                s || (s = o)
                            }
                            r = r || s
                        }
                        if (r) return r !== l[0] && l.unshift(r), n[r]
                    }(h, E, i)), w = function (t, e, n, i) {
                        var o, r, s, a, l, u = {}, c = t.dataTypes.slice();
                        if (c[1]) for (s in t.converters) u[s.toLowerCase()] = t.converters[s];
                        for (r = c.shift(); r;) if (t.responseFields[r] && (n[t.responseFields[r]] = e), !l && i && t.dataFilter && (e = t.dataFilter(e, t.dataType)), l = r, r = c.shift()) if ("*" === r) r = l; else if ("*" !== l && l !== r) {
                            if (!(s = u[l + " " + r] || u["* " + r])) for (o in u) if (a = o.split(" "), a[1] === r && (s = u[l + " " + a[0]] || u["* " + a[0]])) {
                                !0 === s ? s = u[o] : !0 !== u[o] && (r = a[0], c.unshift(a[1]));
                                break
                            }
                            if (!0 !== s) if (s && t.throws) e = s(e); else try {
                                e = s(e)
                            } catch (t) {
                                return {state: "parsererror", error: s ? t : "No conversion from " + l + " to " + r}
                            }
                        }
                        return {state: "success", data: e}
                    }(h, w, E, u), u ? (h.ifModified && ((T = E.getResponseHeader("Last-Modified")) && (m.lastModified[r] = T), (T = E.getResponseHeader("etag")) && (m.etag[r] = T)), 204 === e || "HEAD" === h.type ? C = "nocontent" : 304 === e ? C = "notmodified" : (C = w.state, p = w.data, u = !(d = w.error))) : (d = C, !e && C || (C = "error", e < 0 && (e = 0))), E.status = e, E.statusText = (n || C) + "", u ? y.resolveWith(g, [p, C, E]) : y.rejectWith(g, [E, C, d]), E.statusCode(x), x = void 0, f && v.trigger(u ? "ajaxSuccess" : "ajaxError", [E, h, u ? p : d]), b.fireWith(g, [E, C]), f && (v.trigger("ajaxComplete", [E, h]), --m.active || m.event.trigger("ajaxStop")))
                }

                return E
            },
            getJSON: function (t, e, n) {
                return m.get(t, e, n, "json")
            },
            getScript: function (t, e) {
                return m.get(t, void 0, e, "script")
            }
        }), m.each(["get", "post"], function (t, e) {
            m[e] = function (t, n, i, o) {
                return m.isFunction(n) && (o = o || i, i = n, n = void 0), m.ajax(m.extend({
                    url: t,
                    type: e,
                    dataType: o,
                    data: n,
                    success: i
                }, m.isPlainObject(t) && t))
            }
        }), m._evalUrl = function (t) {
            return m.ajax({url: t, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, throws: !0})
        }, m.fn.extend({
            wrapAll: function (t) {
                var e;
                return this[0] && (m.isFunction(t) && (t = t.call(this[0])), e = m(t, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && e.insertBefore(this[0]), e.map(function () {
                    for (var t = this; t.firstElementChild;) t = t.firstElementChild;
                    return t
                }).append(this)), this
            }, wrapInner: function (t) {
                return m.isFunction(t) ? this.each(function (e) {
                    m(this).wrapInner(t.call(this, e))
                }) : this.each(function () {
                    var e = m(this), n = e.contents();
                    n.length ? n.wrapAll(t) : e.append(t)
                })
            }, wrap: function (t) {
                var e = m.isFunction(t);
                return this.each(function (n) {
                    m(this).wrapAll(e ? t.call(this, n) : t)
                })
            }, unwrap: function (t) {
                return this.parent(t).not("body").each(function () {
                    m(this).replaceWith(this.childNodes)
                }), this
            }
        }), m.expr.pseudos.hidden = function (t) {
            return !m.expr.pseudos.visible(t)
        }, m.expr.pseudos.visible = function (t) {
            return !!(t.offsetWidth || t.offsetHeight || t.getClientRects().length)
        }, m.ajaxSettings.xhr = function () {
            try {
                return new t.XMLHttpRequest
            } catch (t) {
            }
        };
        var qe = {0: 200, 1223: 204}, Pe = m.ajaxSettings.xhr();
        h.cors = !!Pe && "withCredentials" in Pe, h.ajax = Pe = !!Pe, m.ajaxTransport(function (e) {
            var n, i;
            if (h.cors || Pe && !e.crossDomain) return {
                send: function (o, r) {
                    var s, a = e.xhr();
                    if (a.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields) for (s in e.xhrFields) a[s] = e.xhrFields[s];
                    e.mimeType && a.overrideMimeType && a.overrideMimeType(e.mimeType), e.crossDomain || o["X-Requested-With"] || (o["X-Requested-With"] = "XMLHttpRequest");
                    for (s in o) a.setRequestHeader(s, o[s]);
                    n = function (t) {
                        return function () {
                            n && (n = i = a.onload = a.onerror = a.onabort = a.onreadystatechange = null, "abort" === t ? a.abort() : "error" === t ? "number" != typeof a.status ? r(0, "error") : r(a.status, a.statusText) : r(qe[a.status] || a.status, a.statusText, "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? {binary: a.response} : {text: a.responseText}, a.getAllResponseHeaders()))
                        }
                    }, a.onload = n(), i = a.onerror = n("error"), void 0 !== a.onabort ? a.onabort = i : a.onreadystatechange = function () {
                        4 === a.readyState && t.setTimeout(function () {
                            n && i()
                        })
                    }, n = n("abort");
                    try {
                        a.send(e.hasContent && e.data || null)
                    } catch (t) {
                        if (n) throw t
                    }
                }, abort: function () {
                    n && n()
                }
            }
        }), m.ajaxPrefilter(function (t) {
            t.crossDomain && (t.contents.script = !1)
        }), m.ajaxSetup({
            accepts: {script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},
            contents: {script: /\b(?:java|ecma)script\b/},
            converters: {
                "text script": function (t) {
                    return m.globalEval(t), t
                }
            }
        }), m.ajaxPrefilter("script", function (t) {
            void 0 === t.cache && (t.cache = !1), t.crossDomain && (t.type = "GET")
        }), m.ajaxTransport("script", function (t) {
            var e, n;
            if (t.crossDomain) return {
                send: function (o, r) {
                    e = m("<script>").prop({charset: t.scriptCharset, src: t.url}).on("load error", n = function (t) {
                        e.remove(), n = null, t && r("error" === t.type ? 404 : 200, t.type)
                    }), i.head.appendChild(e[0])
                }, abort: function () {
                    n && n()
                }
            }
        });
        var He, Fe = [], We = /(=)\?(?=&|$)|\?\?/;
        m.ajaxSetup({
            jsonp: "callback", jsonpCallback: function () {
                var t = Fe.pop() || m.expando + "_" + ve++;
                return this[t] = !0, t
            }
        }), m.ajaxPrefilter("json jsonp", function (e, n, i) {
            var o, r, s,
                a = !1 !== e.jsonp && (We.test(e.url) ? "url" : "string" == typeof e.data && 0 === (e.contentType || "").indexOf("application/x-www-form-urlencoded") && We.test(e.data) && "data");
            if (a || "jsonp" === e.dataTypes[0]) return o = e.jsonpCallback = m.isFunction(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback, a ? e[a] = e[a].replace(We, "$1" + o) : !1 !== e.jsonp && (e.url += (me.test(e.url) ? "&" : "?") + e.jsonp + "=" + o), e.converters["script json"] = function () {
                return s || m.error(o + " was not called"), s[0]
            }, e.dataTypes[0] = "json", r = t[o], t[o] = function () {
                s = arguments
            }, i.always(function () {
                void 0 === r ? m(t).removeProp(o) : t[o] = r, e[o] && (e.jsonpCallback = n.jsonpCallback, Fe.push(o)), s && m.isFunction(r) && r(s[0]), s = r = void 0
            }), "script"
        }), h.createHTMLDocument = ((He = i.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>", 2 === He.childNodes.length), m.parseHTML = function (t, e, n) {
            return "string" != typeof t ? [] : ("boolean" == typeof e && (n = e, e = !1), e || (h.createHTMLDocument ? ((o = (e = i.implementation.createHTMLDocument("")).createElement("base")).href = i.location.href, e.head.appendChild(o)) : e = i), r = D.exec(t), s = !n && [], r ? [e.createElement(r[1])] : (r = ht([t], e, s), s && s.length && m(s).remove(), m.merge([], r.childNodes)));
            var o, r, s
        }, m.fn.load = function (t, e, n) {
            var i, o, r, s = this, a = t.indexOf(" ");
            return a > -1 && (i = fe(t.slice(a)), t = t.slice(0, a)), m.isFunction(e) ? (n = e, e = void 0) : e && "object" == typeof e && (o = "POST"), s.length > 0 && m.ajax({
                url: t,
                type: o || "GET",
                dataType: "html",
                data: e
            }).done(function (t) {
                r = arguments, s.html(i ? m("<div>").append(m.parseHTML(t)).find(i) : t)
            }).always(n && function (t, e) {
                s.each(function () {
                    n.apply(this, r || [t.responseText, e, t])
                })
            }), this
        }, m.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (t, e) {
            m.fn[e] = function (t) {
                return this.on(e, t)
            }
        }), m.expr.pseudos.animated = function (t) {
            return m.grep(m.timers, function (e) {
                return t === e.elem
            }).length
        }, m.offset = {
            setOffset: function (t, e, n) {
                var i, o, r, s, a, l, u = m.css(t, "position"), c = m(t), f = {};
                "static" === u && (t.style.position = "relative"), a = c.offset(), r = m.css(t, "top"), l = m.css(t, "left"), ("absolute" === u || "fixed" === u) && (r + l).indexOf("auto") > -1 ? (s = (i = c.position()).top, o = i.left) : (s = parseFloat(r) || 0, o = parseFloat(l) || 0), m.isFunction(e) && (e = e.call(t, n, m.extend({}, a))), null != e.top && (f.top = e.top - a.top + s), null != e.left && (f.left = e.left - a.left + o), "using" in e ? e.using.call(t, f) : c.css(f)
            }
        }, m.fn.extend({
            offset: function (t) {
                if (arguments.length) return void 0 === t ? this : this.each(function (e) {
                    m.offset.setOffset(this, t, e)
                });
                var e, n, i, o, r = this[0];
                return r ? r.getClientRects().length ? (i = r.getBoundingClientRect(), n = (e = r.ownerDocument).documentElement, o = e.defaultView, {
                    top: i.top + o.pageYOffset - n.clientTop,
                    left: i.left + o.pageXOffset - n.clientLeft
                }) : {top: 0, left: 0} : void 0
            }, position: function () {
                if (this[0]) {
                    var t, e, n = this[0], i = {top: 0, left: 0};
                    return "fixed" === m.css(n, "position") ? e = n.getBoundingClientRect() : (t = this.offsetParent(), e = this.offset(), k(t[0], "html") || (i = t.offset()), i = {
                        top: i.top + m.css(t[0], "borderTopWidth", !0),
                        left: i.left + m.css(t[0], "borderLeftWidth", !0)
                    }), {
                        top: e.top - i.top - m.css(n, "marginTop", !0),
                        left: e.left - i.left - m.css(n, "marginLeft", !0)
                    }
                }
            }, offsetParent: function () {
                return this.map(function () {
                    for (var t = this.offsetParent; t && "static" === m.css(t, "position");) t = t.offsetParent;
                    return t || gt
                })
            }
        }), m.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, function (t, e) {
            var n = "pageYOffset" === e;
            m.fn[t] = function (i) {
                return U(this, function (t, i, o) {
                    var r;
                    return m.isWindow(t) ? r = t : 9 === t.nodeType && (r = t.defaultView), void 0 === o ? r ? r[e] : t[i] : void (r ? r.scrollTo(n ? r.pageXOffset : o, n ? o : r.pageYOffset) : t[i] = o)
                }, t, i, arguments.length)
            }
        }), m.each(["top", "left"], function (t, e) {
            m.cssHooks[e] = Ht(h.pixelPosition, function (t, n) {
                if (n) return n = Pt(t, e), Rt.test(n) ? m(t).position()[e] + "px" : n
            })
        }), m.each({Height: "height", Width: "width"}, function (t, e) {
            m.each({padding: "inner" + t, content: e, "": "outer" + t}, function (n, i) {
                m.fn[i] = function (o, r) {
                    var s = arguments.length && (n || "boolean" != typeof o),
                        a = n || (!0 === o || !0 === r ? "margin" : "border");
                    return U(this, function (e, n, o) {
                        var r;
                        return m.isWindow(e) ? 0 === i.indexOf("outer") ? e["inner" + t] : e.document.documentElement["client" + t] : 9 === e.nodeType ? (r = e.documentElement, Math.max(e.body["scroll" + t], r["scroll" + t], e.body["offset" + t], r["offset" + t], r["client" + t])) : void 0 === o ? m.css(e, n, a) : m.style(e, n, o, a)
                    }, e, s ? o : void 0, s)
                }
            })
        }), m.fn.extend({
            bind: function (t, e, n) {
                return this.on(t, null, e, n)
            }, unbind: function (t, e) {
                return this.off(t, null, e)
            }, delegate: function (t, e, n, i) {
                return this.on(e, t, n, i)
            }, undelegate: function (t, e, n) {
                return 1 === arguments.length ? this.off(t, "**") : this.off(e, t || "**", n)
            }
        }), m.holdReady = function (t) {
            t ? m.readyWait++ : m.ready(!0)
        }, m.isArray = Array.isArray, m.parseJSON = JSON.parse, m.nodeName = k, "function" == typeof define && define.amd && define("jquery", [], function () {
            return m
        });
        var Me = t.jQuery, Be = t.$;
        return m.noConflict = function (e) {
            return t.$ === m && (t.$ = Be), e && t.jQuery === m && (t.jQuery = Me), m
        }, e || (t.jQuery = t.$ = m), m
    }), "undefined" == typeof jQuery) throw new Error("Bootstrap's JavaScript requires jQuery");
    !function (t) {
        "use strict";
        var e = t.fn.jquery.split(" ")[0].split(".");
        if (e[0] < 2 && e[1] < 9 || 1 == e[0] && 9 == e[1] && e[2] < 1 || e[0] > 3) throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")
    }(jQuery), function (t) {
        "use strict";
        t.fn.emulateTransitionEnd = function (e) {
            var n = !1, i = this;
            t(this).one("bsTransitionEnd", function () {
                n = !0
            });
            return setTimeout(function () {
                n || t(i).trigger(t.support.transition.end)
            }, e), this
        }, t(function () {
            t.support.transition = function () {
                var t = document.createElement("bootstrap"), e = {
                    WebkitTransition: "webkitTransitionEnd",
                    MozTransition: "transitionend",
                    OTransition: "oTransitionEnd otransitionend",
                    transition: "transitionend"
                };
                for (var n in e) if (void 0 !== t.style[n]) return {end: e[n]};
                return !1
            }(), t.support.transition && (t.event.special.bsTransitionEnd = {
                bindType: t.support.transition.end,
                delegateType: t.support.transition.end,
                handle: function (e) {
                    if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
                }
            })
        })
    }(jQuery), function (t) {
        "use strict";
        var e = '[data-dismiss="alert"]', n = function (n) {
            t(n).on("click", e, this.close)
        };
        n.VERSION = "3.3.7", n.TRANSITION_DURATION = 150, n.prototype.close = function (e) {
            function i() {
                s.detach().trigger("closed.bs.alert").remove()
            }

            var o = t(this), r = o.attr("data-target");
            r || (r = (r = o.attr("href")) && r.replace(/.*(?=#[^\s]*$)/, ""));
            var s = t("#" === r ? [] : r);
            e && e.preventDefault(), s.length || (s = o.closest(".alert")), s.trigger(e = t.Event("close.bs.alert")), e.isDefaultPrevented() || (s.removeClass("in"), t.support.transition && s.hasClass("fade") ? s.one("bsTransitionEnd", i).emulateTransitionEnd(n.TRANSITION_DURATION) : i())
        };
        var i = t.fn.alert;
        t.fn.alert = function (e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.alert");
                o || i.data("bs.alert", o = new n(this)), "string" == typeof e && o[e].call(i)
            })
        }, t.fn.alert.Constructor = n, t.fn.alert.noConflict = function () {
            return t.fn.alert = i, this
        }, t(document).on("click.bs.alert.data-api", e, n.prototype.close)
    }(jQuery), function (t) {
        "use strict";

        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.button"), r = "object" == typeof e && e;
                o || i.data("bs.button", o = new n(this, r)), "toggle" == e ? o.toggle() : e && o.setState(e)
            })
        }

        var n = function (e, i) {
            this.$element = t(e), this.options = t.extend({}, n.DEFAULTS, i), this.isLoading = !1
        };
        n.VERSION = "3.3.7", n.DEFAULTS = {loadingText: "loading..."}, n.prototype.setState = function (e) {
            var n = "disabled", i = this.$element, o = i.is("input") ? "val" : "html", r = i.data();
            e += "Text", null == r.resetText && i.data("resetText", i[o]()), setTimeout(t.proxy(function () {
                i[o](null == r[e] ? this.options[e] : r[e]), "loadingText" == e ? (this.isLoading = !0, i.addClass(n).attr(n, n).prop(n, !0)) : this.isLoading && (this.isLoading = !1, i.removeClass(n).removeAttr(n).prop(n, !1))
            }, this), 0)
        }, n.prototype.toggle = function () {
            var t = !0, e = this.$element.closest('[data-toggle="buttons"]');
            if (e.length) {
                var n = this.$element.find("input");
                "radio" == n.prop("type") ? (n.prop("checked") && (t = !1), e.find(".active").removeClass("active"), this.$element.addClass("active")) : "checkbox" == n.prop("type") && (n.prop("checked") !== this.$element.hasClass("active") && (t = !1), this.$element.toggleClass("active")), n.prop("checked", this.$element.hasClass("active")), t && n.trigger("change")
            } else this.$element.attr("aria-pressed", !this.$element.hasClass("active")), this.$element.toggleClass("active")
        };
        var i = t.fn.button;
        t.fn.button = e, t.fn.button.Constructor = n, t.fn.button.noConflict = function () {
            return t.fn.button = i, this
        }, t(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function (n) {
            var i = t(n.target).closest(".btn");
            e.call(i, "toggle"), t(n.target).is('input[type="radio"], input[type="checkbox"]') || (n.preventDefault(), i.is("input,button") ? i.trigger("focus") : i.find("input:visible,button:visible").first().trigger("focus"))
        }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function (e) {
            t(e.target).closest(".btn").toggleClass("focus", /^focus(in)?$/.test(e.type))
        })
    }(jQuery), function (t) {
        "use strict";

        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.carousel"),
                    r = t.extend({}, n.DEFAULTS, i.data(), "object" == typeof e && e),
                    s = "string" == typeof e ? e : r.slide;
                o || i.data("bs.carousel", o = new n(this, r)), "number" == typeof e ? o.to(e) : s ? o[s]() : r.interval && o.pause().cycle()
            })
        }

        var n = function (e, n) {
            this.$element = t(e), this.$indicators = this.$element.find(".carousel-indicators"), this.options = n, this.paused = null, this.sliding = null, this.interval = null, this.$active = null, this.$items = null, this.options.keyboard && this.$element.on("keydown.bs.carousel", t.proxy(this.keydown, this)), "hover" == this.options.pause && !("ontouchstart" in document.documentElement) && this.$element.on("mouseenter.bs.carousel", t.proxy(this.pause, this)).on("mouseleave.bs.carousel", t.proxy(this.cycle, this))
        };
        n.VERSION = "3.3.7", n.TRANSITION_DURATION = 600, n.DEFAULTS = {
            interval: 5e3,
            pause: "hover",
            wrap: !0,
            keyboard: !0
        }, n.prototype.keydown = function (t) {
            if (!/input|textarea/i.test(t.target.tagName)) {
                switch (t.which) {
                    case 37:
                        this.prev();
                        break;
                    case 39:
                        this.next();
                        break;
                    default:
                        return
                }
                t.preventDefault()
            }
        }, n.prototype.cycle = function (e) {
            return e || (this.paused = !1), this.interval && clearInterval(this.interval), this.options.interval && !this.paused && (this.interval = setInterval(t.proxy(this.next, this), this.options.interval)), this
        }, n.prototype.getItemIndex = function (t) {
            return this.$items = t.parent().children(".item"), this.$items.index(t || this.$active)
        }, n.prototype.getItemForDirection = function (t, e) {
            var n = this.getItemIndex(e);
            if (("prev" == t && 0 === n || "next" == t && n == this.$items.length - 1) && !this.options.wrap) return e;
            var i = (n + ("prev" == t ? -1 : 1)) % this.$items.length;
            return this.$items.eq(i)
        }, n.prototype.to = function (t) {
            var e = this, n = this.getItemIndex(this.$active = this.$element.find(".item.active"));
            if (!(t > this.$items.length - 1 || t < 0)) return this.sliding ? this.$element.one("slid.bs.carousel", function () {
                e.to(t)
            }) : n == t ? this.pause().cycle() : this.slide(t > n ? "next" : "prev", this.$items.eq(t))
        }, n.prototype.pause = function (e) {
            return e || (this.paused = !0), this.$element.find(".next, .prev").length && t.support.transition && (this.$element.trigger(t.support.transition.end), this.cycle(!0)), this.interval = clearInterval(this.interval), this
        }, n.prototype.next = function () {
            if (!this.sliding) return this.slide("next")
        }, n.prototype.prev = function () {
            if (!this.sliding) return this.slide("prev")
        }, n.prototype.slide = function (e, i) {
            var o = this.$element.find(".item.active"), r = i || this.getItemForDirection(e, o), s = this.interval,
                a = "next" == e ? "left" : "right", l = this;
            if (r.hasClass("active")) return this.sliding = !1;
            var u = r[0], c = t.Event("slide.bs.carousel", {relatedTarget: u, direction: a});
            if (this.$element.trigger(c), !c.isDefaultPrevented()) {
                if (this.sliding = !0, s && this.pause(), this.$indicators.length) {
                    this.$indicators.find(".active").removeClass("active");
                    var f = t(this.$indicators.children()[this.getItemIndex(r)]);
                    f && f.addClass("active")
                }
                var p = t.Event("slid.bs.carousel", {relatedTarget: u, direction: a});
                return t.support.transition && this.$element.hasClass("slide") ? (r.addClass(e), r[0].offsetWidth, o.addClass(a), r.addClass(a), o.one("bsTransitionEnd", function () {
                    r.removeClass([e, a].join(" ")).addClass("active"), o.removeClass(["active", a].join(" ")), l.sliding = !1, setTimeout(function () {
                        l.$element.trigger(p)
                    }, 0)
                }).emulateTransitionEnd(n.TRANSITION_DURATION)) : (o.removeClass("active"), r.addClass("active"), this.sliding = !1, this.$element.trigger(p)), s && this.cycle(), this
            }
        };
        var i = t.fn.carousel;
        t.fn.carousel = e, t.fn.carousel.Constructor = n, t.fn.carousel.noConflict = function () {
            return t.fn.carousel = i, this
        };
        var o = function (n) {
            var i, o = t(this), r = t(o.attr("data-target") || (i = o.attr("href")) && i.replace(/.*(?=#[^\s]+$)/, ""));
            if (r.hasClass("carousel")) {
                var s = t.extend({}, r.data(), o.data()), a = o.attr("data-slide-to");
                a && (s.interval = !1), e.call(r, s), a && r.data("bs.carousel").to(a), n.preventDefault()
            }
        };
        t(document).on("click.bs.carousel.data-api", "[data-slide]", o).on("click.bs.carousel.data-api", "[data-slide-to]", o), t(window).on("load", function () {
            t('[data-ride="carousel"]').each(function () {
                var n = t(this);
                e.call(n, n.data())
            })
        })
    }(jQuery), function (t) {
        "use strict";

        function e(e) {
            var n, i = e.attr("data-target") || (n = e.attr("href")) && n.replace(/.*(?=#[^\s]+$)/, "");
            return t(i)
        }

        function n(e) {
            return this.each(function () {
                var n = t(this), o = n.data("bs.collapse"),
                    r = t.extend({}, i.DEFAULTS, n.data(), "object" == typeof e && e);
                !o && r.toggle && /show|hide/.test(e) && (r.toggle = !1), o || n.data("bs.collapse", o = new i(this, r)), "string" == typeof e && o[e]()
            })
        }

        var i = function (e, n) {
            this.$element = t(e), this.options = t.extend({}, i.DEFAULTS, n), this.$trigger = t('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'), this.transitioning = null, this.options.parent ? this.$parent = this.getParent() : this.addAriaAndCollapsedClass(this.$element, this.$trigger), this.options.toggle && this.toggle()
        };
        i.VERSION = "3.3.7", i.TRANSITION_DURATION = 350, i.DEFAULTS = {toggle: !0}, i.prototype.dimension = function () {
            return this.$element.hasClass("width") ? "width" : "height"
        }, i.prototype.show = function () {
            if (!this.transitioning && !this.$element.hasClass("in")) {
                var e, o = this.$parent && this.$parent.children(".panel").children(".in, .collapsing");
                if (!(o && o.length && (e = o.data("bs.collapse"), e && e.transitioning))) {
                    var r = t.Event("show.bs.collapse");
                    if (this.$element.trigger(r), !r.isDefaultPrevented()) {
                        o && o.length && (n.call(o, "hide"), e || o.data("bs.collapse", null));
                        var s = this.dimension();
                        this.$element.removeClass("collapse").addClass("collapsing")[s](0).attr("aria-expanded", !0), this.$trigger.removeClass("collapsed").attr("aria-expanded", !0), this.transitioning = 1;
                        var a = function () {
                            this.$element.removeClass("collapsing").addClass("collapse in")[s](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                        };
                        if (!t.support.transition) return a.call(this);
                        var l = t.camelCase(["scroll", s].join("-"));
                        this.$element.one("bsTransitionEnd", t.proxy(a, this)).emulateTransitionEnd(i.TRANSITION_DURATION)[s](this.$element[0][l])
                    }
                }
            }
        }, i.prototype.hide = function () {
            if (!this.transitioning && this.$element.hasClass("in")) {
                var e = t.Event("hide.bs.collapse");
                if (this.$element.trigger(e), !e.isDefaultPrevented()) {
                    var n = this.dimension();
                    this.$element[n](this.$element[n]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded", !1), this.$trigger.addClass("collapsed").attr("aria-expanded", !1), this.transitioning = 1;
                    var o = function () {
                        this.transitioning = 0, this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")
                    };
                    return t.support.transition ? void this.$element[n](0).one("bsTransitionEnd", t.proxy(o, this)).emulateTransitionEnd(i.TRANSITION_DURATION) : o.call(this)
                }
            }
        }, i.prototype.toggle = function () {
            this[this.$element.hasClass("in") ? "hide" : "show"]()
        }, i.prototype.getParent = function () {
            return t(this.options.parent).find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]').each(t.proxy(function (n, i) {
                var o = t(i);
                this.addAriaAndCollapsedClass(e(o), o)
            }, this)).end()
        }, i.prototype.addAriaAndCollapsedClass = function (t, e) {
            var n = t.hasClass("in");
            t.attr("aria-expanded", n), e.toggleClass("collapsed", !n).attr("aria-expanded", n)
        };
        var o = t.fn.collapse;
        t.fn.collapse = n, t.fn.collapse.Constructor = i, t.fn.collapse.noConflict = function () {
            return t.fn.collapse = o, this
        }, t(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function (i) {
            var o = t(this);
            o.attr("data-target") || i.preventDefault();
            var r = e(o), s = r.data("bs.collapse") ? "toggle" : o.data();
            n.call(r, s)
        })
    }(jQuery), function (t) {
        "use strict";

        function e(e) {
            var n = e.attr("data-target");
            n || (n = (n = e.attr("href")) && /#[A-Za-z]/.test(n) && n.replace(/.*(?=#[^\s]*$)/, ""));
            var i = n && t(n);
            return i && i.length ? i : e.parent()
        }

        function n(n) {
            n && 3 === n.which || (t(i).remove(), t(o).each(function () {
                var i = t(this), o = e(i), r = {relatedTarget: this};
                o.hasClass("open") && (n && "click" == n.type && /input|textarea/i.test(n.target.tagName) && t.contains(o[0], n.target) || (o.trigger(n = t.Event("hide.bs.dropdown", r)), n.isDefaultPrevented() || (i.attr("aria-expanded", "false"), o.removeClass("open").trigger(t.Event("hidden.bs.dropdown", r)))))
            }))
        }

        var i = ".dropdown-backdrop", o = '[data-toggle="dropdown"]', r = function (e) {
            t(e).on("click.bs.dropdown", this.toggle)
        };
        r.VERSION = "3.3.7", r.prototype.toggle = function (i) {
            var o = t(this);
            if (!o.is(".disabled, :disabled")) {
                var r = e(o), s = r.hasClass("open");
                if (n(), !s) {
                    "ontouchstart" in document.documentElement && !r.closest(".navbar-nav").length && t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click", n);
                    var a = {relatedTarget: this};
                    if (r.trigger(i = t.Event("show.bs.dropdown", a)), i.isDefaultPrevented()) return;
                    o.trigger("focus").attr("aria-expanded", "true"), r.toggleClass("open").trigger(t.Event("shown.bs.dropdown", a))
                }
                return !1
            }
        }, r.prototype.keydown = function (n) {
            if (/(38|40|27|32)/.test(n.which) && !/input|textarea/i.test(n.target.tagName)) {
                var i = t(this);
                if (n.preventDefault(), n.stopPropagation(), !i.is(".disabled, :disabled")) {
                    var r = e(i), s = r.hasClass("open");
                    if (!s && 27 != n.which || s && 27 == n.which) return 27 == n.which && r.find(o).trigger("focus"), i.trigger("click");
                    var a = r.find(".dropdown-menu li:not(.disabled):visible a");
                    if (a.length) {
                        var l = a.index(n.target);
                        38 == n.which && l > 0 && l--, 40 == n.which && l < a.length - 1 && l++, ~l || (l = 0), a.eq(l).trigger("focus")
                    }
                }
            }
        };
        var s = t.fn.dropdown;
        t.fn.dropdown = function (e) {
            return this.each(function () {
                var n = t(this), i = n.data("bs.dropdown");
                i || n.data("bs.dropdown", i = new r(this)), "string" == typeof e && i[e].call(n)
            })
        }, t.fn.dropdown.Constructor = r, t.fn.dropdown.noConflict = function () {
            return t.fn.dropdown = s, this
        }, t(document).on("click.bs.dropdown.data-api", n).on("click.bs.dropdown.data-api", ".dropdown form", function (t) {
            t.stopPropagation()
        }).on("click.bs.dropdown.data-api", o, r.prototype.toggle).on("keydown.bs.dropdown.data-api", o, r.prototype.keydown).on("keydown.bs.dropdown.data-api", ".dropdown-menu", r.prototype.keydown)
    }(jQuery), function (t) {
        "use strict";

        function e(e, i) {
            return this.each(function () {
                var o = t(this), r = o.data("bs.modal"),
                    s = t.extend({}, n.DEFAULTS, o.data(), "object" == typeof e && e);
                r || o.data("bs.modal", r = new n(this, s)), "string" == typeof e ? r[e](i) : s.show && r.show(i)
            })
        }

        var n = function (e, n) {
            this.options = n, this.$body = t(document.body), this.$element = t(e), this.$dialog = this.$element.find(".modal-dialog"), this.$backdrop = null, this.isShown = null, this.originalBodyPad = null, this.scrollbarWidth = 0, this.ignoreBackdropClick = !1, this.options.remote && this.$element.find(".modal-content").load(this.options.remote, t.proxy(function () {
                this.$element.trigger("loaded.bs.modal")
            }, this))
        };
        n.VERSION = "3.3.7", n.TRANSITION_DURATION = 300, n.BACKDROP_TRANSITION_DURATION = 150, n.DEFAULTS = {
            backdrop: !0,
            keyboard: !0,
            show: !0
        }, n.prototype.toggle = function (t) {
            return this.isShown ? this.hide() : this.show(t)
        }, n.prototype.show = function (e) {
            var i = this, o = t.Event("show.bs.modal", {relatedTarget: e});
            this.$element.trigger(o), this.isShown || o.isDefaultPrevented() || (this.isShown = !0, this.checkScrollbar(), this.setScrollbar(), this.$body.addClass("modal-open"), this.escape(), this.resize(), this.$element.on("click.dismiss.bs.modal", '[data-dismiss="modal"]', t.proxy(this.hide, this)), this.$dialog.on("mousedown.dismiss.bs.modal", function () {
                i.$element.one("mouseup.dismiss.bs.modal", function (e) {
                    t(e.target).is(i.$element) && (i.ignoreBackdropClick = !0)
                })
            }), this.backdrop(function () {
                var o = t.support.transition && i.$element.hasClass("fade");
                i.$element.parent().length || i.$element.appendTo(i.$body), i.$element.show().scrollTop(0), i.adjustDialog(), o && i.$element[0].offsetWidth, i.$element.addClass("in"), i.enforceFocus();
                var r = t.Event("shown.bs.modal", {relatedTarget: e});
                o ? i.$dialog.one("bsTransitionEnd", function () {
                    i.$element.trigger("focus").trigger(r)
                }).emulateTransitionEnd(n.TRANSITION_DURATION) : i.$element.trigger("focus").trigger(r)
            }))
        }, n.prototype.hide = function (e) {
            e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented() && (this.isShown = !1, this.escape(), this.resize(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"), this.$dialog.off("mousedown.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(n.TRANSITION_DURATION) : this.hideModal())
        }, n.prototype.enforceFocus = function () {
            t(document).off("focusin.bs.modal").on("focusin.bs.modal", t.proxy(function (t) {
                document === t.target || this.$element[0] === t.target || this.$element.has(t.target).length || this.$element.trigger("focus")
            }, this))
        }, n.prototype.escape = function () {
            this.isShown && this.options.keyboard ? this.$element.on("keydown.dismiss.bs.modal", t.proxy(function (t) {
                27 == t.which && this.hide()
            }, this)) : this.isShown || this.$element.off("keydown.dismiss.bs.modal")
        }, n.prototype.resize = function () {
            this.isShown ? t(window).on("resize.bs.modal", t.proxy(this.handleUpdate, this)) : t(window).off("resize.bs.modal")
        }, n.prototype.hideModal = function () {
            var t = this;
            this.$element.hide(), this.backdrop(function () {
                t.$body.removeClass("modal-open"), t.resetAdjustments(), t.resetScrollbar(), t.$element.trigger("hidden.bs.modal")
            })
        }, n.prototype.removeBackdrop = function () {
            this.$backdrop && this.$backdrop.remove(), this.$backdrop = null
        }, n.prototype.backdrop = function (e) {
            var i = this, o = this.$element.hasClass("fade") ? "fade" : "";
            if (this.isShown && this.options.backdrop) {
                var r = t.support.transition && o;
                if (this.$backdrop = t(document.createElement("div")).addClass("modal-backdrop " + o).appendTo(this.$body), this.$element.on("click.dismiss.bs.modal", t.proxy(function (t) {
                    return this.ignoreBackdropClick ? void (this.ignoreBackdropClick = !1) : void (t.target === t.currentTarget && ("static" == this.options.backdrop ? this.$element[0].focus() : this.hide()))
                }, this)), r && this.$backdrop[0].offsetWidth, this.$backdrop.addClass("in"), !e) return;
                r ? this.$backdrop.one("bsTransitionEnd", e).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION) : e()
            } else if (!this.isShown && this.$backdrop) {
                this.$backdrop.removeClass("in");
                var s = function () {
                    i.removeBackdrop(), e && e()
                };
                t.support.transition && this.$element.hasClass("fade") ? this.$backdrop.one("bsTransitionEnd", s).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION) : s()
            } else e && e()
        }, n.prototype.handleUpdate = function () {
            this.adjustDialog()
        }, n.prototype.adjustDialog = function () {
            var t = this.$element[0].scrollHeight > document.documentElement.clientHeight;
            this.$element.css({
                paddingLeft: !this.bodyIsOverflowing && t ? this.scrollbarWidth : "",
                paddingRight: this.bodyIsOverflowing && !t ? this.scrollbarWidth : ""
            })
        }, n.prototype.resetAdjustments = function () {
            this.$element.css({paddingLeft: "", paddingRight: ""})
        }, n.prototype.checkScrollbar = function () {
            var t = window.innerWidth;
            if (!t) {
                var e = document.documentElement.getBoundingClientRect();
                t = e.right - Math.abs(e.left)
            }
            this.bodyIsOverflowing = document.body.clientWidth < t, this.scrollbarWidth = this.measureScrollbar()
        }, n.prototype.setScrollbar = function () {
            var t = parseInt(this.$body.css("padding-right") || 0, 10);
            this.originalBodyPad = document.body.style.paddingRight || "", this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
        }, n.prototype.resetScrollbar = function () {
            this.$body.css("padding-right", this.originalBodyPad)
        }, n.prototype.measureScrollbar = function () {
            var t = document.createElement("div");
            t.className = "modal-scrollbar-measure", this.$body.append(t);
            var e = t.offsetWidth - t.clientWidth;
            return this.$body[0].removeChild(t), e
        };
        var i = t.fn.modal;
        t.fn.modal = e, t.fn.modal.Constructor = n, t.fn.modal.noConflict = function () {
            return t.fn.modal = i, this
        }, t(document).on("click.bs.modal.data-api", '[data-toggle="modal"]', function (n) {
            var i = t(this), o = i.attr("href"), r = t(i.attr("data-target") || o && o.replace(/.*(?=#[^\s]+$)/, "")),
                s = r.data("bs.modal") ? "toggle" : t.extend({remote: !/#/.test(o) && o}, r.data(), i.data());
            i.is("a") && n.preventDefault(), r.one("show.bs.modal", function (t) {
                t.isDefaultPrevented() || r.one("hidden.bs.modal", function () {
                    i.is(":visible") && i.trigger("focus")
                })
            }), e.call(r, s, this)
        })
    }(jQuery), function (t) {
        "use strict";
        var e = function (t, e) {
            this.type = null, this.options = null, this.enabled = null, this.timeout = null, this.hoverState = null, this.$element = null, this.inState = null, this.init("tooltip", t, e)
        };
        e.VERSION = "3.3.7", e.TRANSITION_DURATION = 150, e.DEFAULTS = {
            animation: !0,
            placement: "top",
            selector: !1,
            template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            trigger: "hover focus",
            title: "",
            delay: 0,
            html: !1,
            container: !1,
            viewport: {selector: "body", padding: 0}
        }, e.prototype.init = function (e, n, i) {
            if (this.enabled = !0, this.type = e, this.$element = t(n), this.options = this.getOptions(i), this.$viewport = this.options.viewport && t(t.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : this.options.viewport.selector || this.options.viewport), this.inState = {
                click: !1,
                hover: !1,
                focus: !1
            }, this.$element[0] instanceof document.constructor && !this.options.selector) throw new Error("`selector` option must be specified when initializing " + this.type + " on the window.document object!");
            for (var o = this.options.trigger.split(" "), r = o.length; r--;) {
                var s = o[r];
                if ("click" == s) this.$element.on("click." + this.type, this.options.selector, t.proxy(this.toggle, this)); else if ("manual" != s) {
                    var a = "hover" == s ? "mouseenter" : "focusin", l = "hover" == s ? "mouseleave" : "focusout";
                    this.$element.on(a + "." + this.type, this.options.selector, t.proxy(this.enter, this)), this.$element.on(l + "." + this.type, this.options.selector, t.proxy(this.leave, this))
                }
            }
            this.options.selector ? this._options = t.extend({}, this.options, {
                trigger: "manual",
                selector: ""
            }) : this.fixTitle()
        }, e.prototype.getDefaults = function () {
            return e.DEFAULTS
        }, e.prototype.getOptions = function (e) {
            return (e = t.extend({}, this.getDefaults(), this.$element.data(), e)).delay && "number" == typeof e.delay && (e.delay = {
                show: e.delay,
                hide: e.delay
            }), e
        }, e.prototype.getDelegateOptions = function () {
            var e = {}, n = this.getDefaults();
            return this._options && t.each(this._options, function (t, i) {
                n[t] != i && (e[t] = i)
            }), e
        }, e.prototype.enter = function (e) {
            var n = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
            return n || (n = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, n)), e instanceof t.Event && (n.inState["focusin" == e.type ? "focus" : "hover"] = !0), n.tip().hasClass("in") || "in" == n.hoverState ? void (n.hoverState = "in") : (clearTimeout(n.timeout), n.hoverState = "in", n.options.delay && n.options.delay.show ? void (n.timeout = setTimeout(function () {
                "in" == n.hoverState && n.show()
            }, n.options.delay.show)) : n.show())
        }, e.prototype.isInStateTrue = function () {
            for (var t in this.inState) if (this.inState[t]) return !0;
            return !1
        }, e.prototype.leave = function (e) {
            var n = e instanceof this.constructor ? e : t(e.currentTarget).data("bs." + this.type);
            if (n || (n = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, n)), e instanceof t.Event && (n.inState["focusout" == e.type ? "focus" : "hover"] = !1), !n.isInStateTrue()) return clearTimeout(n.timeout), n.hoverState = "out", n.options.delay && n.options.delay.hide ? void (n.timeout = setTimeout(function () {
                "out" == n.hoverState && n.hide()
            }, n.options.delay.hide)) : n.hide()
        }, e.prototype.show = function () {
            var n = t.Event("show.bs." + this.type);
            if (this.hasContent() && this.enabled) {
                this.$element.trigger(n);
                var i = t.contains(this.$element[0].ownerDocument.documentElement, this.$element[0]);
                if (n.isDefaultPrevented() || !i) return;
                var o = this, r = this.tip(), s = this.getUID(this.type);
                this.setContent(), r.attr("id", s), this.$element.attr("aria-describedby", s), this.options.animation && r.addClass("fade");
                var a = "function" == typeof this.options.placement ? this.options.placement.call(this, r[0], this.$element[0]) : this.options.placement,
                    l = /\s?auto?\s?/i, u = l.test(a);
                u && (a = a.replace(l, "") || "top"), r.detach().css({
                    top: 0,
                    left: 0,
                    display: "block"
                }).addClass(a).data("bs." + this.type, this), this.options.container ? r.appendTo(this.options.container) : r.insertAfter(this.$element), this.$element.trigger("inserted.bs." + this.type);
                var c = this.getPosition(), f = r[0].offsetWidth, p = r[0].offsetHeight;
                if (u) {
                    var d = a, h = this.getPosition(this.$viewport);
                    a = "bottom" == a && c.bottom + p > h.bottom ? "top" : "top" == a && c.top - p < h.top ? "bottom" : "right" == a && c.right + f > h.width ? "left" : "left" == a && c.left - f < h.left ? "right" : a, r.removeClass(d).addClass(a)
                }
                var g = this.getCalculatedOffset(a, c, f, p);
                this.applyPlacement(g, a);
                var v = function () {
                    var t = o.hoverState;
                    o.$element.trigger("shown.bs." + o.type), o.hoverState = null, "out" == t && o.leave(o)
                };
                t.support.transition && this.$tip.hasClass("fade") ? r.one("bsTransitionEnd", v).emulateTransitionEnd(e.TRANSITION_DURATION) : v()
            }
        }, e.prototype.applyPlacement = function (e, n) {
            var i = this.tip(), o = i[0].offsetWidth, r = i[0].offsetHeight, s = parseInt(i.css("margin-top"), 10),
                a = parseInt(i.css("margin-left"), 10);
            isNaN(s) && (s = 0), isNaN(a) && (a = 0), e.top += s, e.left += a, t.offset.setOffset(i[0], t.extend({
                using: function (t) {
                    i.css({top: Math.round(t.top), left: Math.round(t.left)})
                }
            }, e), 0), i.addClass("in");
            var l = i[0].offsetWidth, u = i[0].offsetHeight;
            "top" == n && u != r && (e.top = e.top + r - u);
            var c = this.getViewportAdjustedDelta(n, e, l, u);
            c.left ? e.left += c.left : e.top += c.top;
            var f = /top|bottom/.test(n), p = f ? 2 * c.left - o + l : 2 * c.top - r + u,
                d = f ? "offsetWidth" : "offsetHeight";
            i.offset(e), this.replaceArrow(p, i[0][d], f)
        }, e.prototype.replaceArrow = function (t, e, n) {
            this.arrow().css(n ? "left" : "top", 50 * (1 - t / e) + "%").css(n ? "top" : "left", "")
        }, e.prototype.setContent = function () {
            var t = this.tip(), e = this.getTitle();
            t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e), t.removeClass("fade in top bottom left right")
        }, e.prototype.hide = function (n) {
            function i() {
                "in" != o.hoverState && r.detach(), o.$element && o.$element.removeAttr("aria-describedby").trigger("hidden.bs." + o.type), n && n()
            }

            var o = this, r = t(this.$tip), s = t.Event("hide.bs." + this.type);
            if (this.$element.trigger(s), !s.isDefaultPrevented()) return r.removeClass("in"), t.support.transition && r.hasClass("fade") ? r.one("bsTransitionEnd", i).emulateTransitionEnd(e.TRANSITION_DURATION) : i(), this.hoverState = null, this
        }, e.prototype.fixTitle = function () {
            var t = this.$element;
            (t.attr("title") || "string" != typeof t.attr("data-original-title")) && t.attr("data-original-title", t.attr("title") || "").attr("title", "")
        }, e.prototype.hasContent = function () {
            return this.getTitle()
        }, e.prototype.getPosition = function (e) {
            var n = (e = e || this.$element)[0], i = "BODY" == n.tagName, o = n.getBoundingClientRect();
            null == o.width && (o = t.extend({}, o, {width: o.right - o.left, height: o.bottom - o.top}));
            var r = window.SVGElement && n instanceof window.SVGElement,
                s = i ? {top: 0, left: 0} : r ? null : e.offset(),
                a = {scroll: i ? document.documentElement.scrollTop || document.body.scrollTop : e.scrollTop()},
                l = i ? {width: t(window).width(), height: t(window).height()} : null;
            return t.extend({}, o, a, l, s)
        }, e.prototype.getCalculatedOffset = function (t, e, n, i) {
            return "bottom" == t ? {
                top: e.top + e.height,
                left: e.left + e.width / 2 - n / 2
            } : "top" == t ? {
                top: e.top - i,
                left: e.left + e.width / 2 - n / 2
            } : "left" == t ? {
                top: e.top + e.height / 2 - i / 2,
                left: e.left - n
            } : {top: e.top + e.height / 2 - i / 2, left: e.left + e.width}
        }, e.prototype.getViewportAdjustedDelta = function (t, e, n, i) {
            var o = {top: 0, left: 0};
            if (!this.$viewport) return o;
            var r = this.options.viewport && this.options.viewport.padding || 0, s = this.getPosition(this.$viewport);
            if (/right|left/.test(t)) {
                var a = e.top - r - s.scroll, l = e.top + r - s.scroll + i;
                a < s.top ? o.top = s.top - a : l > s.top + s.height && (o.top = s.top + s.height - l)
            } else {
                var u = e.left - r, c = e.left + r + n;
                u < s.left ? o.left = s.left - u : c > s.right && (o.left = s.left + s.width - c)
            }
            return o
        }, e.prototype.getTitle = function () {
            var t = this.$element, e = this.options;
            return t.attr("data-original-title") || ("function" == typeof e.title ? e.title.call(t[0]) : e.title)
        }, e.prototype.getUID = function (t) {
            do {
                t += ~~(1e6 * Math.random())
            } while (document.getElementById(t));
            return t
        }, e.prototype.tip = function () {
            if (!this.$tip && (this.$tip = t(this.options.template), 1 != this.$tip.length)) throw new Error(this.type + " `template` option must consist of exactly 1 top-level element!");
            return this.$tip
        }, e.prototype.arrow = function () {
            return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
        }, e.prototype.enable = function () {
            this.enabled = !0
        }, e.prototype.disable = function () {
            this.enabled = !1
        }, e.prototype.toggleEnabled = function () {
            this.enabled = !this.enabled
        }, e.prototype.toggle = function (e) {
            var n = this;
            e && ((n = t(e.currentTarget).data("bs." + this.type)) || (n = new this.constructor(e.currentTarget, this.getDelegateOptions()), t(e.currentTarget).data("bs." + this.type, n))), e ? (n.inState.click = !n.inState.click, n.isInStateTrue() ? n.enter(n) : n.leave(n)) : n.tip().hasClass("in") ? n.leave(n) : n.enter(n)
        }, e.prototype.destroy = function () {
            var t = this;
            clearTimeout(this.timeout), this.hide(function () {
                t.$element.off("." + t.type).removeData("bs." + t.type), t.$tip && t.$tip.detach(), t.$tip = null, t.$arrow = null, t.$viewport = null, t.$element = null
            })
        };
        var n = t.fn.tooltip;
        t.fn.tooltip = function (n) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.tooltip"), r = "object" == typeof n && n;
                !o && /destroy|hide/.test(n) || (o || i.data("bs.tooltip", o = new e(this, r)), "string" == typeof n && o[n]())
            })
        }, t.fn.tooltip.Constructor = e, t.fn.tooltip.noConflict = function () {
            return t.fn.tooltip = n, this
        }
    }(jQuery), function (t) {
        "use strict";
        var e = function (t, e) {
            this.init("popover", t, e)
        };
        if (!t.fn.tooltip) throw new Error("Popover requires tooltip.js");
        e.VERSION = "3.3.7", e.DEFAULTS = t.extend({}, t.fn.tooltip.Constructor.DEFAULTS, {
            placement: "right",
            trigger: "click",
            content: "",
            template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
        }), e.prototype = t.extend({}, t.fn.tooltip.Constructor.prototype), e.prototype.constructor = e, e.prototype.getDefaults = function () {
            return e.DEFAULTS
        }, e.prototype.setContent = function () {
            var t = this.tip(), e = this.getTitle(), n = this.getContent();
            t.find(".popover-title")[this.options.html ? "html" : "text"](e), t.find(".popover-content").children().detach().end()[this.options.html ? "string" == typeof n ? "html" : "append" : "text"](n), t.removeClass("fade top bottom left right in"), t.find(".popover-title").html() || t.find(".popover-title").hide()
        }, e.prototype.hasContent = function () {
            return this.getTitle() || this.getContent()
        }, e.prototype.getContent = function () {
            var t = this.$element, e = this.options;
            return t.attr("data-content") || ("function" == typeof e.content ? e.content.call(t[0]) : e.content)
        }, e.prototype.arrow = function () {
            return this.$arrow = this.$arrow || this.tip().find(".arrow")
        };
        var n = t.fn.popover;
        t.fn.popover = function (n) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.popover"), r = "object" == typeof n && n;
                !o && /destroy|hide/.test(n) || (o || i.data("bs.popover", o = new e(this, r)), "string" == typeof n && o[n]())
            })
        }, t.fn.popover.Constructor = e, t.fn.popover.noConflict = function () {
            return t.fn.popover = n, this
        }
    }(jQuery), function (t) {
        "use strict";

        function e(n, i) {
            this.$body = t(document.body), this.$scrollElement = t(t(n).is(document.body) ? window : n), this.options = t.extend({}, e.DEFAULTS, i), this.selector = (this.options.target || "") + " .nav li > a", this.offsets = [], this.targets = [], this.activeTarget = null, this.scrollHeight = 0, this.$scrollElement.on("scroll.bs.scrollspy", t.proxy(this.process, this)), this.refresh(), this.process()
        }

        function n(n) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.scrollspy"), r = "object" == typeof n && n;
                o || i.data("bs.scrollspy", o = new e(this, r)), "string" == typeof n && o[n]()
            })
        }

        e.VERSION = "3.3.7", e.DEFAULTS = {offset: 10}, e.prototype.getScrollHeight = function () {
            return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
        }, e.prototype.refresh = function () {
            var e = this, n = "offset", i = 0;
            this.offsets = [], this.targets = [], this.scrollHeight = this.getScrollHeight(), t.isWindow(this.$scrollElement[0]) || (n = "position", i = this.$scrollElement.scrollTop()), this.$body.find(this.selector).map(function () {
                var e = t(this), o = e.data("target") || e.attr("href"), r = /^#./.test(o) && t(o);
                return r && r.length && r.is(":visible") && [[r[n]().top + i, o]] || null
            }).sort(function (t, e) {
                return t[0] - e[0]
            }).each(function () {
                e.offsets.push(this[0]), e.targets.push(this[1])
            })
        }, e.prototype.process = function () {
            var t, e = this.$scrollElement.scrollTop() + this.options.offset, n = this.getScrollHeight(),
                i = this.options.offset + n - this.$scrollElement.height(), o = this.offsets, r = this.targets,
                s = this.activeTarget;
            if (this.scrollHeight != n && this.refresh(), e >= i) return s != (t = r[r.length - 1]) && this.activate(t);
            if (s && e < o[0]) return this.activeTarget = null, this.clear();
            for (t = o.length; t--;) s != r[t] && e >= o[t] && (void 0 === o[t + 1] || e < o[t + 1]) && this.activate(r[t])
        }, e.prototype.activate = function (e) {
            this.activeTarget = e, this.clear();
            var n = this.selector + '[data-target="' + e + '"],' + this.selector + '[href="' + e + '"]',
                i = t(n).parents("li").addClass("active");
            i.parent(".dropdown-menu").length && (i = i.closest("li.dropdown").addClass("active")), i.trigger("activate.bs.scrollspy")
        }, e.prototype.clear = function () {
            t(this.selector).parentsUntil(this.options.target, ".active").removeClass("active")
        };
        var i = t.fn.scrollspy;
        t.fn.scrollspy = n, t.fn.scrollspy.Constructor = e, t.fn.scrollspy.noConflict = function () {
            return t.fn.scrollspy = i, this
        }, t(window).on("load.bs.scrollspy.data-api", function () {
            t('[data-spy="scroll"]').each(function () {
                var e = t(this);
                n.call(e, e.data())
            })
        })
    }(jQuery), function (t) {
        "use strict";

        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.tab");
                o || i.data("bs.tab", o = new n(this)), "string" == typeof e && o[e]()
            })
        }

        var n = function (e) {
            this.element = t(e)
        };
        n.VERSION = "3.3.7", n.TRANSITION_DURATION = 150, n.prototype.show = function () {
            var e = this.element, n = e.closest("ul:not(.dropdown-menu)"), i = e.data("target");
            if (i || (i = (i = e.attr("href")) && i.replace(/.*(?=#[^\s]*$)/, "")), !e.parent("li").hasClass("active")) {
                var o = n.find(".active:last a"), r = t.Event("hide.bs.tab", {relatedTarget: e[0]}),
                    s = t.Event("show.bs.tab", {relatedTarget: o[0]});
                if (o.trigger(r), e.trigger(s), !s.isDefaultPrevented() && !r.isDefaultPrevented()) {
                    var a = t(i);
                    this.activate(e.closest("li"), n), this.activate(a, a.parent(), function () {
                        o.trigger({type: "hidden.bs.tab", relatedTarget: e[0]}), e.trigger({
                            type: "shown.bs.tab",
                            relatedTarget: o[0]
                        })
                    })
                }
            }
        }, n.prototype.activate = function (e, i, o) {
            function r() {
                s.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !1), e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded", !0), a ? (e[0].offsetWidth, e.addClass("in")) : e.removeClass("fade"), e.parent(".dropdown-menu").length && e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded", !0), o && o()
            }

            var s = i.find("> .active"),
                a = o && t.support.transition && (s.length && s.hasClass("fade") || !!i.find("> .fade").length);
            s.length && a ? s.one("bsTransitionEnd", r).emulateTransitionEnd(n.TRANSITION_DURATION) : r(), s.removeClass("in")
        };
        var i = t.fn.tab;
        t.fn.tab = e, t.fn.tab.Constructor = n, t.fn.tab.noConflict = function () {
            return t.fn.tab = i, this
        };
        var o = function (n) {
            n.preventDefault(), e.call(t(this), "show")
        };
        t(document).on("click.bs.tab.data-api", '[data-toggle="tab"]', o).on("click.bs.tab.data-api", '[data-toggle="pill"]', o)
    }(jQuery), function (t) {
        "use strict";

        function e(e) {
            return this.each(function () {
                var i = t(this), o = i.data("bs.affix"), r = "object" == typeof e && e;
                o || i.data("bs.affix", o = new n(this, r)), "string" == typeof e && o[e]()
            })
        }

        var n = function (e, i) {
            this.options = t.extend({}, n.DEFAULTS, i), this.$target = t(this.options.target).on("scroll.bs.affix.data-api", t.proxy(this.checkPosition, this)).on("click.bs.affix.data-api", t.proxy(this.checkPositionWithEventLoop, this)), this.$element = t(e), this.affixed = null, this.unpin = null, this.pinnedOffset = null, this.checkPosition()
        };
        n.VERSION = "3.3.7", n.RESET = "affix affix-top affix-bottom", n.DEFAULTS = {
            offset: 0,
            target: window
        }, n.prototype.getState = function (t, e, n, i) {
            var o = this.$target.scrollTop(), r = this.$element.offset(), s = this.$target.height();
            if (null != n && "top" == this.affixed) return o < n && "top";
            if ("bottom" == this.affixed) return null != n ? !(o + this.unpin <= r.top) && "bottom" : !(o + s <= t - i) && "bottom";
            var a = null == this.affixed, l = a ? o : r.top;
            return null != n && o <= n ? "top" : null != i && l + (a ? s : e) >= t - i && "bottom"
        }, n.prototype.getPinnedOffset = function () {
            if (this.pinnedOffset) return this.pinnedOffset;
            this.$element.removeClass(n.RESET).addClass("affix");
            var t = this.$target.scrollTop(), e = this.$element.offset();
            return this.pinnedOffset = e.top - t
        }, n.prototype.checkPositionWithEventLoop = function () {
            setTimeout(t.proxy(this.checkPosition, this), 1)
        }, n.prototype.checkPosition = function () {
            if (this.$element.is(":visible")) {
                var e = this.$element.height(), i = this.options.offset, o = i.top, r = i.bottom,
                    s = Math.max(t(document).height(), t(document.body).height());
                "object" != typeof i && (r = o = i), "function" == typeof o && (o = i.top(this.$element)), "function" == typeof r && (r = i.bottom(this.$element));
                var a = this.getState(s, e, o, r);
                if (this.affixed != a) {
                    null != this.unpin && this.$element.css("top", "");
                    var l = "affix" + (a ? "-" + a : ""), u = t.Event(l + ".bs.affix");
                    if (this.$element.trigger(u), u.isDefaultPrevented()) return;
                    this.affixed = a, this.unpin = "bottom" == a ? this.getPinnedOffset() : null, this.$element.removeClass(n.RESET).addClass(l).trigger(l.replace("affix", "affixed") + ".bs.affix")
                }
                "bottom" == a && this.$element.offset({top: s - e - r})
            }
        };
        var i = t.fn.affix;
        t.fn.affix = e, t.fn.affix.Constructor = n, t.fn.affix.noConflict = function () {
            return t.fn.affix = i, this
        }, t(window).on("load", function () {
            t('[data-spy="affix"]').each(function () {
                var n = t(this), i = n.data();
                i.offset = i.offset || {}, null != i.offsetBottom && (i.offset.bottom = i.offsetBottom), null != i.offsetTop && (i.offset.top = i.offsetTop), e.call(n, i)
            })
        })
    }(jQuery);
=======
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<script>
    if(function(t,e){"use strict";"object"==typeof module&&"object"==typeof module.exports?module.exports=t.document?e(t,!0):function(t){if(!t.document)throw new Error("jQuery requires a window with a document");return e(t)}:e(t)}("undefined"!=typeof window?window:this,function(t,e){"use strict";var n=[],i=t.document,o=Object.getPrototypeOf,r=n.slice,s=n.concat,a=n.push,l=n.indexOf,u={},c=u.toString,f=u.hasOwnProperty,p=f.toString,d=p.call(Object),h={};function g(t,e){var n=(e=e||i).createElement("script");n.text=t,e.head.appendChild(n).parentNode.removeChild(n)}var v="3.2.1",m=function(t,e){return new m.fn.init(t,e)},y=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,b=/^-ms-/,x=/-([a-z])/g,w=function(t,e){return e.toUpperCase()};function T(t){var e=!!t&&"length"in t&&t.length,n=m.type(t);return"function"!==n&&!m.isWindow(t)&&("array"===n||0===e||"number"==typeof e&&e>0&&e-1 in t)}m.fn=m.prototype={jquery:v,constructor:m,length:0,toArray:function(){return r.call(this)},get:function(t){return null==t?r.call(this):t<0?this[t+this.length]:this[t]},pushStack:function(t){var e=m.merge(this.constructor(),t);return e.prevObject=this,e},each:function(t){return m.each(this,t)},map:function(t){return this.pushStack(m.map(this,function(e,n){return t.call(e,n,e)}))},slice:function(){return this.pushStack(r.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(t){var e=this.length,n=+t+(t<0?e:0);return this.pushStack(n>=0&&n<e?[this[n]]:[])},end:function(){return this.prevObject||this.constructor()},push:a,sort:n.sort,splice:n.splice},m.extend=m.fn.extend=function(){var t,e,n,i,o,r,s=arguments[0]||{},a=1,l=arguments.length,u=!1;for("boolean"==typeof s&&(u=s,s=arguments[a]||{},a++),"object"==typeof s||m.isFunction(s)||(s={}),a===l&&(s=this,a--);a<l;a++)if(null!=(t=arguments[a]))for(e in t)n=s[e],i=t[e],s!==i&&(u&&i&&(m.isPlainObject(i)||(o=Array.isArray(i)))?(o?(o=!1,r=n&&Array.isArray(n)?n:[]):r=n&&m.isPlainObject(n)?n:{},s[e]=m.extend(u,r,i)):void 0!==i&&(s[e]=i));return s},m.extend({expando:"jQuery"+(v+Math.random()).replace(/\D/g,""),isReady:!0,error:function(t){throw new Error(t)},noop:function(){},isFunction:function(t){return"function"===m.type(t)},isWindow:function(t){return null!=t&&t===t.window},isNumeric:function(t){var e=m.type(t);return("number"===e||"string"===e)&&!isNaN(t-parseFloat(t))},isPlainObject:function(t){var e,n;return!(!t||"[object Object]"!==c.call(t)||(e=o(t))&&(n=f.call(e,"constructor")&&e.constructor,"function"!=typeof n||p.call(n)!==d))},isEmptyObject:function(t){var e;for(e in t)return!1;return!0},type:function(t){return null==t?t+"":"object"==typeof t||"function"==typeof t?u[c.call(t)]||"object":typeof t},globalEval:function(t){g(t)},camelCase:function(t){return t.replace(b,"ms-").replace(x,w)},each:function(t,e){var n,i=0;if(T(t))for(n=t.length;i<n&&!1!==e.call(t[i],i,t[i]);i++);else for(i in t)if(!1===e.call(t[i],i,t[i]))break;return t},trim:function(t){return null==t?"":(t+"").replace(y,"")},makeArray:function(t,e){var n=e||[];return null!=t&&(T(Object(t))?m.merge(n,"string"==typeof t?[t]:t):a.call(n,t)),n},inArray:function(t,e,n){return null==e?-1:l.call(e,t,n)},merge:function(t,e){for(var n=+e.length,i=0,o=t.length;i<n;i++)t[o++]=e[i];return t.length=o,t},grep:function(t,e,n){for(var i,o=[],r=0,s=t.length,a=!n;r<s;r++)i=!e(t[r],r),i!==a&&o.push(t[r]);return o},map:function(t,e,n){var i,o,r=0,a=[];if(T(t))for(i=t.length;r<i;r++)o=e(t[r],r,n),null!=o&&a.push(o);else for(r in t)o=e(t[r],r,n),null!=o&&a.push(o);return s.apply([],a)},guid:1,proxy:function(t,e){var n,i,o;if("string"==typeof e&&(n=t[e],e=t,t=n),m.isFunction(t))return i=r.call(arguments,2),o=function(){return t.apply(e||this,i.concat(r.call(arguments)))},o.guid=t.guid=t.guid||m.guid++,o},now:Date.now,support:h}),"function"==typeof Symbol&&(m.fn[Symbol.iterator]=n[Symbol.iterator]),m.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "),function(t,e){u["[object "+e+"]"]=e.toLowerCase()});var C=function(t){var e,n,i,o,r,s,a,l,u,c,f,p,d,h,g,v,m,y,b,x="sizzle"+1*new Date,w=t.document,T=0,C=0,E=st(),S=st(),$=st(),k=function(t,e){return t===e&&(f=!0),0},D={}.hasOwnProperty,N=[],A=N.pop,j=N.push,O=N.push,I=N.slice,L=function(t,e){for(var n=0,i=t.length;n<i;n++)if(t[n]===e)return n;return-1},R="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",q="[\\x20\\t\\r\\n\\f]",P="(?:\\\\.|[\\w-]|[^\0-\\xa0])+",H="\\["+q+"*("+P+")(?:"+q+"*([*^$|!~]?=)"+q+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+P+"))|)"+q+"*\\]",F=":("+P+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+H+")*)|.*)\\)|)",W=new RegExp(q+"+","g"),M=new RegExp("^"+q+"+|((?:^|[^\\\\])(?:\\\\.)*)"+q+"+$","g"),B=new RegExp("^"+q+"*,"+q+"*"),U=new RegExp("^"+q+"*([>+~]|"+q+")"+q+"*"),_=new RegExp("="+q+"*([^\\]'\"]*?)"+q+"*\\]","g"),z=new RegExp(F),V=new RegExp("^"+P+"$"),Q={ID:new RegExp("^#("+P+")"),CLASS:new RegExp("^\\.("+P+")"),TAG:new RegExp("^("+P+"|[*])"),ATTR:new RegExp("^"+H),PSEUDO:new RegExp("^"+F),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+q+"*(even|odd|(([+-]|)(\\d*)n|)"+q+"*(?:([+-]|)"+q+"*(\\d+)|))"+q+"*\\)|)","i"),bool:new RegExp("^(?:"+R+")$","i"),needsContext:new RegExp("^"+q+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+q+"*((?:-\\d)?\\d*)"+q+"*\\)|)(?=[^-]|$)","i")},X=/^(?:input|select|textarea|button)$/i,G=/^h\d$/i,Y=/^[^{]+\{\s*\[native \w/,J=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,K=/[+~]/,Z=new RegExp("\\\\([\\da-f]{1,6}"+q+"?|("+q+")|.)","ig"),tt=function(t,e,n){var i="0x"+e-65536;return i!=i||n?e:i<0?String.fromCharCode(i+65536):String.fromCharCode(i>>10|55296,1023&i|56320)},et=/([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,nt=function(t,e){return e?"\0"===t?"�":t.slice(0,-1)+"\\"+t.charCodeAt(t.length-1).toString(16)+" ":"\\"+t},it=function(){p()},ot=yt(function(t){return!0===t.disabled&&("form"in t||"label"in t)},{dir:"parentNode",next:"legend"});try{O.apply(N=I.call(w.childNodes),w.childNodes),N[w.childNodes.length].nodeType}catch(t){O={apply:N.length?function(t,e){j.apply(t,I.call(e))}:function(t,e){for(var n=t.length,i=0;t[n++]=e[i++];);t.length=n-1}}}function rt(t,e,i,o){var r,a,u,c,f,h,m,y=e&&e.ownerDocument,T=e?e.nodeType:9;if(i=i||[],"string"!=typeof t||!t||1!==T&&9!==T&&11!==T)return i;if(!o&&((e?e.ownerDocument||e:w)!==d&&p(e),e=e||d,g)){if(11!==T&&(f=J.exec(t)))if(r=f[1]){if(9===T){if(!(u=e.getElementById(r)))return i;if(u.id===r)return i.push(u),i}else if(y&&(u=y.getElementById(r))&&b(e,u)&&u.id===r)return i.push(u),i}else{if(f[2])return O.apply(i,e.getElementsByTagName(t)),i;if((r=f[3])&&n.getElementsByClassName&&e.getElementsByClassName)return O.apply(i,e.getElementsByClassName(r)),i}if(n.qsa&&!$[t+" "]&&(!v||!v.test(t))){if(1!==T)y=e,m=t;else if("object"!==e.nodeName.toLowerCase()){for((c=e.getAttribute("id"))?c=c.replace(et,nt):e.setAttribute("id",c=x),a=(h=s(t)).length;a--;)h[a]="#"+c+" "+mt(h[a]);m=h.join(","),y=K.test(t)&&gt(e.parentNode)||e}if(m)try{return O.apply(i,y.querySelectorAll(m)),i}catch(t){}finally{c===x&&e.removeAttribute("id")}}}return l(t.replace(M,"$1"),e,i,o)}function st(){var t=[];return function e(n,o){return t.push(n+" ")>i.cacheLength&&delete e[t.shift()],e[n+" "]=o}}function at(t){return t[x]=!0,t}function lt(t){var e=d.createElement("fieldset");try{return!!t(e)}catch(t){return!1}finally{e.parentNode&&e.parentNode.removeChild(e),e=null}}function ut(t,e){for(var n=t.split("|"),o=n.length;o--;)i.attrHandle[n[o]]=e}function ct(t,e){var n=e&&t,i=n&&1===t.nodeType&&1===e.nodeType&&t.sourceIndex-e.sourceIndex;if(i)return i;if(n)for(;n=n.nextSibling;)if(n===e)return-1;return t?1:-1}function ft(t){return function(e){return"input"===e.nodeName.toLowerCase()&&e.type===t}}function pt(t){return function(e){var n=e.nodeName.toLowerCase();return("input"===n||"button"===n)&&e.type===t}}function dt(t){return function(e){return"form"in e?e.parentNode&&!1===e.disabled?"label"in e?"label"in e.parentNode?e.parentNode.disabled===t:e.disabled===t:e.isDisabled===t||e.isDisabled!==!t&&ot(e)===t:e.disabled===t:"label"in e&&e.disabled===t}}function ht(t){return at(function(e){return e=+e,at(function(n,i){for(var o,r=t([],n.length,e),s=r.length;s--;)n[o=r[s]]&&(n[o]=!(i[o]=n[o]))})})}function gt(t){return t&&void 0!==t.getElementsByTagName&&t}n=rt.support={},r=rt.isXML=function(t){var e=t&&(t.ownerDocument||t).documentElement;return!!e&&"HTML"!==e.nodeName},p=rt.setDocument=function(t){var e,o,s=t?t.ownerDocument||t:w;return s!==d&&9===s.nodeType&&s.documentElement?(h=(d=s).documentElement,g=!r(d),w!==d&&(o=d.defaultView)&&o.top!==o&&(o.addEventListener?o.addEventListener("unload",it,!1):o.attachEvent&&o.attachEvent("onunload",it)),n.attributes=lt(function(t){return t.className="i",!t.getAttribute("className")}),n.getElementsByTagName=lt(function(t){return t.appendChild(d.createComment("")),!t.getElementsByTagName("*").length}),n.getElementsByClassName=Y.test(d.getElementsByClassName),n.getById=lt(function(t){return h.appendChild(t).id=x,!d.getElementsByName||!d.getElementsByName(x).length}),n.getById?(i.filter.ID=function(t){var e=t.replace(Z,tt);return function(t){return t.getAttribute("id")===e}},i.find.ID=function(t,e){if(void 0!==e.getElementById&&g){var n=e.getElementById(t);return n?[n]:[]}}):(i.filter.ID=function(t){var e=t.replace(Z,tt);return function(t){var n=void 0!==t.getAttributeNode&&t.getAttributeNode("id");return n&&n.value===e}},i.find.ID=function(t,e){if(void 0!==e.getElementById&&g){var n,i,o,r=e.getElementById(t);if(r){if((n=r.getAttributeNode("id"))&&n.value===t)return[r];for(o=e.getElementsByName(t),i=0;r=o[i++];)if(n=r.getAttributeNode("id"),n&&n.value===t)return[r]}return[]}}),i.find.TAG=n.getElementsByTagName?function(t,e){return void 0!==e.getElementsByTagName?e.getElementsByTagName(t):n.qsa?e.querySelectorAll(t):void 0}:function(t,e){var n,i=[],o=0,r=e.getElementsByTagName(t);if("*"===t){for(;n=r[o++];)1===n.nodeType&&i.push(n);return i}return r},i.find.CLASS=n.getElementsByClassName&&function(t,e){if(void 0!==e.getElementsByClassName&&g)return e.getElementsByClassName(t)},m=[],v=[],(n.qsa=Y.test(d.querySelectorAll))&&(lt(function(t){h.appendChild(t).innerHTML="<a id='"+x+"'></a><select id='"+x+"-\r\\' msallowcapture=''><option selected=''></option></select>",t.querySelectorAll("[msallowcapture^='']").length&&v.push("[*^$]="+q+"*(?:''|\"\")"),t.querySelectorAll("[selected]").length||v.push("\\["+q+"*(?:value|"+R+")"),t.querySelectorAll("[id~="+x+"-]").length||v.push("~="),t.querySelectorAll(":checked").length||v.push(":checked"),t.querySelectorAll("a#"+x+"+*").length||v.push(".#.+[+~]")}),lt(function(t){t.innerHTML="<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";var e=d.createElement("input");e.setAttribute("type","hidden"),t.appendChild(e).setAttribute("name","D"),t.querySelectorAll("[name=d]").length&&v.push("name"+q+"*[*^$|!~]?="),2!==t.querySelectorAll(":enabled").length&&v.push(":enabled",":disabled"),h.appendChild(t).disabled=!0,2!==t.querySelectorAll(":disabled").length&&v.push(":enabled",":disabled"),t.querySelectorAll("*,:x"),v.push(",.*:")})),(n.matchesSelector=Y.test(y=h.matches||h.webkitMatchesSelector||h.mozMatchesSelector||h.oMatchesSelector||h.msMatchesSelector))&&lt(function(t){n.disconnectedMatch=y.call(t,"*"),y.call(t,"[s!='']:x"),m.push("!=",F)}),v=v.length&&new RegExp(v.join("|")),m=m.length&&new RegExp(m.join("|")),e=Y.test(h.compareDocumentPosition),b=e||Y.test(h.contains)?function(t,e){var n=9===t.nodeType?t.documentElement:t,i=e&&e.parentNode;return t===i||!(!i||1!==i.nodeType||!(n.contains?n.contains(i):t.compareDocumentPosition&&16&t.compareDocumentPosition(i)))}:function(t,e){if(e)for(;e=e.parentNode;)if(e===t)return!0;return!1},k=e?function(t,e){if(t===e)return f=!0,0;var i=!t.compareDocumentPosition-!e.compareDocumentPosition;return i||(1&(i=(t.ownerDocument||t)===(e.ownerDocument||e)?t.compareDocumentPosition(e):1)||!n.sortDetached&&e.compareDocumentPosition(t)===i?t===d||t.ownerDocument===w&&b(w,t)?-1:e===d||e.ownerDocument===w&&b(w,e)?1:c?L(c,t)-L(c,e):0:4&i?-1:1)}:function(t,e){if(t===e)return f=!0,0;var n,i=0,o=t.parentNode,r=e.parentNode,s=[t],a=[e];if(!o||!r)return t===d?-1:e===d?1:o?-1:r?1:c?L(c,t)-L(c,e):0;if(o===r)return ct(t,e);for(n=t;n=n.parentNode;)s.unshift(n);for(n=e;n=n.parentNode;)a.unshift(n);for(;s[i]===a[i];)i++;return i?ct(s[i],a[i]):s[i]===w?-1:a[i]===w?1:0},d):d},rt.matches=function(t,e){return rt(t,null,null,e)},rt.matchesSelector=function(t,e){if((t.ownerDocument||t)!==d&&p(t),e=e.replace(_,"='$1']"),n.matchesSelector&&g&&!$[e+" "]&&(!m||!m.test(e))&&(!v||!v.test(e)))try{var i=y.call(t,e);if(i||n.disconnectedMatch||t.document&&11!==t.document.nodeType)return i}catch(t){}return rt(e,d,null,[t]).length>0},rt.contains=function(t,e){return(t.ownerDocument||t)!==d&&p(t),b(t,e)},rt.attr=function(t,e){(t.ownerDocument||t)!==d&&p(t);var o=i.attrHandle[e.toLowerCase()],r=o&&D.call(i.attrHandle,e.toLowerCase())?o(t,e,!g):void 0;return void 0!==r?r:n.attributes||!g?t.getAttribute(e):(r=t.getAttributeNode(e))&&r.specified?r.value:null},rt.escape=function(t){return(t+"").replace(et,nt)},rt.error=function(t){throw new Error("Syntax error, unrecognized expression: "+t)},rt.uniqueSort=function(t){var e,i=[],o=0,r=0;if(f=!n.detectDuplicates,c=!n.sortStable&&t.slice(0),t.sort(k),f){for(;e=t[r++];)e===t[r]&&(o=i.push(r));for(;o--;)t.splice(i[o],1)}return c=null,t},o=rt.getText=function(t){var e,n="",i=0,r=t.nodeType;if(r){if(1===r||9===r||11===r){if("string"==typeof t.textContent)return t.textContent;for(t=t.firstChild;t;t=t.nextSibling)n+=o(t)}else if(3===r||4===r)return t.nodeValue}else for(;e=t[i++];)n+=o(e);return n},(i=rt.selectors={cacheLength:50,createPseudo:at,match:Q,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(t){return t[1]=t[1].replace(Z,tt),t[3]=(t[3]||t[4]||t[5]||"").replace(Z,tt),"~="===t[2]&&(t[3]=" "+t[3]+" "),t.slice(0,4)},CHILD:function(t){return t[1]=t[1].toLowerCase(),"nth"===t[1].slice(0,3)?(t[3]||rt.error(t[0]),t[4]=+(t[4]?t[5]+(t[6]||1):2*("even"===t[3]||"odd"===t[3])),t[5]=+(t[7]+t[8]||"odd"===t[3])):t[3]&&rt.error(t[0]),t},PSEUDO:function(t){var e,n=!t[6]&&t[2];return Q.CHILD.test(t[0])?null:(t[3]?t[2]=t[4]||t[5]||"":n&&z.test(n)&&(e=s(n,!0))&&(e=n.indexOf(")",n.length-e)-n.length)&&(t[0]=t[0].slice(0,e),t[2]=n.slice(0,e)),t.slice(0,3))}},filter:{TAG:function(t){var e=t.replace(Z,tt).toLowerCase();return"*"===t?function(){return!0}:function(t){return t.nodeName&&t.nodeName.toLowerCase()===e}},CLASS:function(t){var e=E[t+" "];return e||(e=new RegExp("(^|"+q+")"+t+"("+q+"|$)"))&&E(t,function(t){return e.test("string"==typeof t.className&&t.className||void 0!==t.getAttribute&&t.getAttribute("class")||"")})},ATTR:function(t,e,n){return function(i){var o=rt.attr(i,t);return null==o?"!="===e:!e||(o+="","="===e?o===n:"!="===e?o!==n:"^="===e?n&&0===o.indexOf(n):"*="===e?n&&o.indexOf(n)>-1:"$="===e?n&&o.slice(-n.length)===n:"~="===e?(" "+o.replace(W," ")+" ").indexOf(n)>-1:"|="===e&&(o===n||o.slice(0,n.length+1)===n+"-"))}},CHILD:function(t,e,n,i,o){var r="nth"!==t.slice(0,3),s="last"!==t.slice(-4),a="of-type"===e;return 1===i&&0===o?function(t){return!!t.parentNode}:function(e,n,l){var u,c,f,p,d,h,g=r!==s?"nextSibling":"previousSibling",v=e.parentNode,m=a&&e.nodeName.toLowerCase(),y=!l&&!a,b=!1;if(v){if(r){for(;g;){for(p=e;p=p[g];)if(a?p.nodeName.toLowerCase()===m:1===p.nodeType)return!1;h=g="only"===t&&!h&&"nextSibling"}return!0}if(h=[s?v.firstChild:v.lastChild],s&&y){for(b=(d=(u=(c=(f=(p=v)[x]||(p[x]={}))[p.uniqueID]||(f[p.uniqueID]={}))[t]||[])[0]===T&&u[1])&&u[2],p=d&&v.childNodes[d];p=++d&&p&&p[g]||(b=d=0)||h.pop();)if(1===p.nodeType&&++b&&p===e){c[t]=[T,d,b];break}}else if(y&&(p=e,f=p[x]||(p[x]={}),c=f[p.uniqueID]||(f[p.uniqueID]={}),u=c[t]||[],d=u[0]===T&&u[1],b=d),!1===b)for(;(p=++d&&p&&p[g]||(b=d=0)||h.pop())&&((a?p.nodeName.toLowerCase()!==m:1!==p.nodeType)||!++b||(y&&(f=p[x]||(p[x]={}),c=f[p.uniqueID]||(f[p.uniqueID]={}),c[t]=[T,b]),p!==e)););return(b-=o)===i||b%i==0&&b/i>=0}}},PSEUDO:function(t,e){var n,o=i.pseudos[t]||i.setFilters[t.toLowerCase()]||rt.error("unsupported pseudo: "+t);return o[x]?o(e):o.length>1?(n=[t,t,"",e],i.setFilters.hasOwnProperty(t.toLowerCase())?at(function(t,n){for(var i,r=o(t,e),s=r.length;s--;)i=L(t,r[s]),t[i]=!(n[i]=r[s])}):function(t){return o(t,0,n)}):o}},pseudos:{not:at(function(t){var e=[],n=[],i=a(t.replace(M,"$1"));return i[x]?at(function(t,e,n,o){for(var r,s=i(t,null,o,[]),a=t.length;a--;)(r=s[a])&&(t[a]=!(e[a]=r))}):function(t,o,r){return e[0]=t,i(e,null,r,n),e[0]=null,!n.pop()}}),has:at(function(t){return function(e){return rt(t,e).length>0}}),contains:at(function(t){return t=t.replace(Z,tt),function(e){return(e.textContent||e.innerText||o(e)).indexOf(t)>-1}}),lang:at(function(t){return V.test(t||"")||rt.error("unsupported lang: "+t),t=t.replace(Z,tt).toLowerCase(),function(e){var n;do{if(n=g?e.lang:e.getAttribute("xml:lang")||e.getAttribute("lang"))return n=n.toLowerCase(),n===t||0===n.indexOf(t+"-")}while((e=e.parentNode)&&1===e.nodeType);return!1}}),target:function(e){var n=t.location&&t.location.hash;return n&&n.slice(1)===e.id},root:function(t){return t===h},focus:function(t){return t===d.activeElement&&(!d.hasFocus||d.hasFocus())&&!!(t.type||t.href||~t.tabIndex)},enabled:dt(!1),disabled:dt(!0),checked:function(t){var e=t.nodeName.toLowerCase();return"input"===e&&!!t.checked||"option"===e&&!!t.selected},selected:function(t){return t.parentNode&&t.parentNode.selectedIndex,!0===t.selected},empty:function(t){for(t=t.firstChild;t;t=t.nextSibling)if(t.nodeType<6)return!1;return!0},parent:function(t){return!i.pseudos.empty(t)},header:function(t){return G.test(t.nodeName)},input:function(t){return X.test(t.nodeName)},button:function(t){var e=t.nodeName.toLowerCase();return"input"===e&&"button"===t.type||"button"===e},text:function(t){var e;return"input"===t.nodeName.toLowerCase()&&"text"===t.type&&(null==(e=t.getAttribute("type"))||"text"===e.toLowerCase())},first:ht(function(){return[0]}),last:ht(function(t,e){return[e-1]}),eq:ht(function(t,e,n){return[n<0?n+e:n]}),even:ht(function(t,e){for(var n=0;n<e;n+=2)t.push(n);return t}),odd:ht(function(t,e){for(var n=1;n<e;n+=2)t.push(n);return t}),lt:ht(function(t,e,n){for(var i=n<0?n+e:n;--i>=0;)t.push(i);return t}),gt:ht(function(t,e,n){for(var i=n<0?n+e:n;++i<e;)t.push(i);return t})}}).pseudos.nth=i.pseudos.eq;for(e in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})i.pseudos[e]=ft(e);for(e in{submit:!0,reset:!0})i.pseudos[e]=pt(e);function vt(){}function mt(t){for(var e=0,n=t.length,i="";e<n;e++)i+=t[e].value;return i}function yt(t,e,n){var i=e.dir,o=e.next,r=o||i,s=n&&"parentNode"===r,a=C++;return e.first?function(e,n,o){for(;e=e[i];)if(1===e.nodeType||s)return t(e,n,o);return!1}:function(e,n,l){var u,c,f,p=[T,a];if(l){for(;e=e[i];)if((1===e.nodeType||s)&&t(e,n,l))return!0}else for(;e=e[i];)if(1===e.nodeType||s)if(f=e[x]||(e[x]={}),c=f[e.uniqueID]||(f[e.uniqueID]={}),o&&o===e.nodeName.toLowerCase())e=e[i]||e;else{if((u=c[r])&&u[0]===T&&u[1]===a)return p[2]=u[2];if(c[r]=p,p[2]=t(e,n,l))return!0}return!1}}function bt(t){return t.length>1?function(e,n,i){for(var o=t.length;o--;)if(!t[o](e,n,i))return!1;return!0}:t[0]}function xt(t,e,n,i,o){for(var r,s=[],a=0,l=t.length,u=null!=e;a<l;a++)(r=t[a])&&(n&&!n(r,i,o)||(s.push(r),u&&e.push(a)));return s}function wt(t,e,n,i,o,r){return i&&!i[x]&&(i=wt(i)),o&&!o[x]&&(o=wt(o,r)),at(function(r,s,a,l){var u,c,f,p=[],d=[],h=s.length,g=r||function(t,e,n){for(var i=0,o=e.length;i<o;i++)rt(t,e[i],n);return n}(e||"*",a.nodeType?[a]:a,[]),v=!t||!r&&e?g:xt(g,p,t,a,l),m=n?o||(r?t:h||i)?[]:s:v;if(n&&n(v,m,a,l),i)for(u=xt(m,d),i(u,[],a,l),c=u.length;c--;)(f=u[c])&&(m[d[c]]=!(v[d[c]]=f));if(r){if(o||t){if(o){for(u=[],c=m.length;c--;)(f=m[c])&&u.push(v[c]=f);o(null,m=[],u,l)}for(c=m.length;c--;)(f=m[c])&&(u=o?L(r,f):p[c])>-1&&(r[u]=!(s[u]=f))}}else m=xt(m===s?m.splice(h,m.length):m),o?o(null,s,m,l):O.apply(s,m)})}function Tt(t){for(var e,n,o,r=t.length,s=i.relative[t[0].type],a=s||i.relative[" "],l=s?1:0,c=yt(function(t){return t===e},a,!0),f=yt(function(t){return L(e,t)>-1},a,!0),p=[function(t,n,i){var o=!s&&(i||n!==u)||((e=n).nodeType?c(t,n,i):f(t,n,i));return e=null,o}];l<r;l++)if(n=i.relative[t[l].type])p=[yt(bt(p),n)];else{if((n=i.filter[t[l].type].apply(null,t[l].matches))[x]){for(o=++l;o<r&&!i.relative[t[o].type];o++);return wt(l>1&&bt(p),l>1&&mt(t.slice(0,l-1).concat({value:" "===t[l-2].type?"*":""})).replace(M,"$1"),n,l<o&&Tt(t.slice(l,o)),o<r&&Tt(t=t.slice(o)),o<r&&mt(t))}p.push(n)}return bt(p)}return vt.prototype=i.filters=i.pseudos,i.setFilters=new vt,s=rt.tokenize=function(t,e){var n,o,r,s,a,l,u,c=S[t+" "];if(c)return e?0:c.slice(0);for(a=t,l=[],u=i.preFilter;a;){n&&!(o=B.exec(a))||(o&&(a=a.slice(o[0].length)||a),l.push(r=[])),n=!1,(o=U.exec(a))&&(n=o.shift(),r.push({value:n,type:o[0].replace(M," ")}),a=a.slice(n.length));for(s in i.filter)!(o=Q[s].exec(a))||u[s]&&!(o=u[s](o))||(n=o.shift(),r.push({value:n,type:s,matches:o}),a=a.slice(n.length));if(!n)break}return e?a.length:a?rt.error(t):S(t,l).slice(0)},a=rt.compile=function(t,e){var n,o,r,a,l,c,f=[],h=[],v=$[t+" "];if(!v){for(e||(e=s(t)),n=e.length;n--;)v=Tt(e[n]),v[x]?f.push(v):h.push(v);(v=$(t,(o=h,a=(r=f).length>0,l=o.length>0,c=function(t,e,n,s,c){var f,h,v,m=0,y="0",b=t&&[],x=[],w=u,C=t||l&&i.find.TAG("*",c),E=T+=null==w?1:Math.random()||.1,S=C.length;for(c&&(u=e===d||e||c);y!==S&&null!=(f=C[y]);y++){if(l&&f){for(h=0,e||f.ownerDocument===d||(p(f),n=!g);v=o[h++];)if(v(f,e||d,n)){s.push(f);break}c&&(T=E)}a&&((f=!v&&f)&&m--,t&&b.push(f))}if(m+=y,a&&y!==m){for(h=0;v=r[h++];)v(b,x,e,n);if(t){if(m>0)for(;y--;)b[y]||x[y]||(x[y]=A.call(s));x=xt(x)}O.apply(s,x),c&&!t&&x.length>0&&m+r.length>1&&rt.uniqueSort(s)}return c&&(T=E,u=w),b},a?at(c):c))).selector=t}return v},l=rt.select=function(t,e,n,o){var r,l,u,c,f,p="function"==typeof t&&t,d=!o&&s(t=p.selector||t);if(n=n||[],1===d.length){if((l=d[0]=d[0].slice(0)).length>2&&"ID"===(u=l[0]).type&&9===e.nodeType&&g&&i.relative[l[1].type]){if(!(e=(i.find.ID(u.matches[0].replace(Z,tt),e)||[])[0]))return n;p&&(e=e.parentNode),t=t.slice(l.shift().value.length)}for(r=Q.needsContext.test(t)?0:l.length;r--&&(u=l[r],!i.relative[c=u.type]);)if((f=i.find[c])&&(o=f(u.matches[0].replace(Z,tt),K.test(l[0].type)&&gt(e.parentNode)||e))){if(l.splice(r,1),!(t=o.length&&mt(l)))return O.apply(n,o),n;break}}return(p||a(t,d))(o,e,!g,n,!e||K.test(t)&&gt(e.parentNode)||e),n},n.sortStable=x.split("").sort(k).join("")===x,n.detectDuplicates=!!f,p(),n.sortDetached=lt(function(t){return 1&t.compareDocumentPosition(d.createElement("fieldset"))}),lt(function(t){return t.innerHTML="<a href='#'></a>","#"===t.firstChild.getAttribute("href")})||ut("type|href|height|width",function(t,e,n){if(!n)return t.getAttribute(e,"type"===e.toLowerCase()?1:2)}),n.attributes&&lt(function(t){return t.innerHTML="<input/>",t.firstChild.setAttribute("value",""),""===t.firstChild.getAttribute("value")})||ut("value",function(t,e,n){if(!n&&"input"===t.nodeName.toLowerCase())return t.defaultValue}),lt(function(t){return null==t.getAttribute("disabled")})||ut(R,function(t,e,n){var i;if(!n)return!0===t[e]?e.toLowerCase():(i=t.getAttributeNode(e))&&i.specified?i.value:null}),rt}(t);m.find=C,m.expr=C.selectors,m.expr[":"]=m.expr.pseudos,m.uniqueSort=m.unique=C.uniqueSort,m.text=C.getText,m.isXMLDoc=C.isXML,m.contains=C.contains,m.escapeSelector=C.escape;var E=function(t,e,n){for(var i=[],o=void 0!==n;(t=t[e])&&9!==t.nodeType;)if(1===t.nodeType){if(o&&m(t).is(n))break;i.push(t)}return i},S=function(t,e){for(var n=[];t;t=t.nextSibling)1===t.nodeType&&t!==e&&n.push(t);return n},$=m.expr.match.needsContext;function k(t,e){return t.nodeName&&t.nodeName.toLowerCase()===e.toLowerCase()}var D=/^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i,N=/^.[^:#\[\.,]*$/;function A(t,e,n){return m.isFunction(e)?m.grep(t,function(t,i){return!!e.call(t,i,t)!==n}):e.nodeType?m.grep(t,function(t){return t===e!==n}):"string"!=typeof e?m.grep(t,function(t){return l.call(e,t)>-1!==n}):N.test(e)?m.filter(e,t,n):(e=m.filter(e,t),m.grep(t,function(t){return l.call(e,t)>-1!==n&&1===t.nodeType}))}m.filter=function(t,e,n){var i=e[0];return n&&(t=":not("+t+")"),1===e.length&&1===i.nodeType?m.find.matchesSelector(i,t)?[i]:[]:m.find.matches(t,m.grep(e,function(t){return 1===t.nodeType}))},m.fn.extend({find:function(t){var e,n,i=this.length,o=this;if("string"!=typeof t)return this.pushStack(m(t).filter(function(){for(e=0;e<i;e++)if(m.contains(o[e],this))return!0}));for(n=this.pushStack([]),e=0;e<i;e++)m.find(t,o[e],n);return i>1?m.uniqueSort(n):n},filter:function(t){return this.pushStack(A(this,t||[],!1))},not:function(t){return this.pushStack(A(this,t||[],!0))},is:function(t){return!!A(this,"string"==typeof t&&$.test(t)?m(t):t||[],!1).length}});var j,O=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;(m.fn.init=function(t,e,n){var o,r;if(!t)return this;if(n=n||j,"string"==typeof t){if(!(o="<"===t[0]&&">"===t[t.length-1]&&t.length>=3?[null,t,null]:O.exec(t))||!o[1]&&e)return!e||e.jquery?(e||n).find(t):this.constructor(e).find(t);if(o[1]){if(e=e instanceof m?e[0]:e,m.merge(this,m.parseHTML(o[1],e&&e.nodeType?e.ownerDocument||e:i,!0)),D.test(o[1])&&m.isPlainObject(e))for(o in e)m.isFunction(this[o])?this[o](e[o]):this.attr(o,e[o]);return this}return(r=i.getElementById(o[2]))&&(this[0]=r,this.length=1),this}return t.nodeType?(this[0]=t,this.length=1,this):m.isFunction(t)?void 0!==n.ready?n.ready(t):t(m):m.makeArray(t,this)}).prototype=m.fn,j=m(i);var I=/^(?:parents|prev(?:Until|All))/,L={children:!0,contents:!0,next:!0,prev:!0};function R(t,e){for(;(t=t[e])&&1!==t.nodeType;);return t}m.fn.extend({has:function(t){var e=m(t,this),n=e.length;return this.filter(function(){for(var t=0;t<n;t++)if(m.contains(this,e[t]))return!0})},closest:function(t,e){var n,i=0,o=this.length,r=[],s="string"!=typeof t&&m(t);if(!$.test(t))for(;i<o;i++)for(n=this[i];n&&n!==e;n=n.parentNode)if(n.nodeType<11&&(s?s.index(n)>-1:1===n.nodeType&&m.find.matchesSelector(n,t))){r.push(n);break}return this.pushStack(r.length>1?m.uniqueSort(r):r)},index:function(t){return t?"string"==typeof t?l.call(m(t),this[0]):l.call(this,t.jquery?t[0]:t):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(t,e){return this.pushStack(m.uniqueSort(m.merge(this.get(),m(t,e))))},addBack:function(t){return this.add(null==t?this.prevObject:this.prevObject.filter(t))}}),m.each({parent:function(t){var e=t.parentNode;return e&&11!==e.nodeType?e:null},parents:function(t){return E(t,"parentNode")},parentsUntil:function(t,e,n){return E(t,"parentNode",n)},next:function(t){return R(t,"nextSibling")},prev:function(t){return R(t,"previousSibling")},nextAll:function(t){return E(t,"nextSibling")},prevAll:function(t){return E(t,"previousSibling")},nextUntil:function(t,e,n){return E(t,"nextSibling",n)},prevUntil:function(t,e,n){return E(t,"previousSibling",n)},siblings:function(t){return S((t.parentNode||{}).firstChild,t)},children:function(t){return S(t.firstChild)},contents:function(t){return k(t,"iframe")?t.contentDocument:(k(t,"template")&&(t=t.content||t),m.merge([],t.childNodes))}},function(t,e){m.fn[t]=function(n,i){var o=m.map(this,e,n);return"Until"!==t.slice(-5)&&(i=n),i&&"string"==typeof i&&(o=m.filter(i,o)),this.length>1&&(L[t]||m.uniqueSort(o),I.test(t)&&o.reverse()),this.pushStack(o)}});var q=/[^\x20\t\r\n\f]+/g;function P(t){return t}function H(t){throw t}function F(t,e,n,i){var o;try{t&&m.isFunction(o=t.promise)?o.call(t).done(e).fail(n):t&&m.isFunction(o=t.then)?o.call(t,e,n):e.apply(void 0,[t].slice(i))}catch(t){n.apply(void 0,[t])}}m.Callbacks=function(t){var e,n;t="string"==typeof t?(e=t,n={},m.each(e.match(q)||[],function(t,e){n[e]=!0}),n):m.extend({},t);var i,o,r,s,a=[],l=[],u=-1,c=function(){for(s=s||t.once,r=i=!0;l.length;u=-1)for(o=l.shift();++u<a.length;)!1===a[u].apply(o[0],o[1])&&t.stopOnFalse&&(u=a.length,o=!1);t.memory||(o=!1),i=!1,s&&(a=o?[]:"")},f={add:function(){return a&&(o&&!i&&(u=a.length-1,l.push(o)),function e(n){m.each(n,function(n,i){m.isFunction(i)?t.unique&&f.has(i)||a.push(i):i&&i.length&&"string"!==m.type(i)&&e(i)})}(arguments),o&&!i&&c()),this},remove:function(){return m.each(arguments,function(t,e){for(var n;(n=m.inArray(e,a,n))>-1;)a.splice(n,1),n<=u&&u--}),this},has:function(t){return t?m.inArray(t,a)>-1:a.length>0},empty:function(){return a&&(a=[]),this},disable:function(){return s=l=[],a=o="",this},disabled:function(){return!a},lock:function(){return s=l=[],o||i||(a=o=""),this},locked:function(){return!!s},fireWith:function(t,e){return s||(e=[t,(e=e||[]).slice?e.slice():e],l.push(e),i||c()),this},fire:function(){return f.fireWith(this,arguments),this},fired:function(){return!!r}};return f},m.extend({Deferred:function(e){var n=[["notify","progress",m.Callbacks("memory"),m.Callbacks("memory"),2],["resolve","done",m.Callbacks("once memory"),m.Callbacks("once memory"),0,"resolved"],["reject","fail",m.Callbacks("once memory"),m.Callbacks("once memory"),1,"rejected"]],i="pending",o={state:function(){return i},always:function(){return r.done(arguments).fail(arguments),this},catch:function(t){return o.then(null,t)},pipe:function(){var t=arguments;return m.Deferred(function(e){m.each(n,function(n,i){var o=m.isFunction(t[i[4]])&&t[i[4]];r[i[1]](function(){var t=o&&o.apply(this,arguments);t&&m.isFunction(t.promise)?t.promise().progress(e.notify).done(e.resolve).fail(e.reject):e[i[0]+"With"](this,o?[t]:arguments)})}),t=null}).promise()},then:function(e,i,o){var r=0;function s(e,n,i,o){return function(){var a=this,l=arguments,u=function(){var t,u;if(!(e<r)){if((t=i.apply(a,l))===n.promise())throw new TypeError("Thenable self-resolution");u=t&&("object"==typeof t||"function"==typeof t)&&t.then,m.isFunction(u)?o?u.call(t,s(r,n,P,o),s(r,n,H,o)):(r++,u.call(t,s(r,n,P,o),s(r,n,H,o),s(r,n,P,n.notifyWith))):(i!==P&&(a=void 0,l=[t]),(o||n.resolveWith)(a,l))}},c=o?u:function(){try{u()}catch(t){m.Deferred.exceptionHook&&m.Deferred.exceptionHook(t,c.stackTrace),e+1>=r&&(i!==H&&(a=void 0,l=[t]),n.rejectWith(a,l))}};e?c():(m.Deferred.getStackHook&&(c.stackTrace=m.Deferred.getStackHook()),t.setTimeout(c))}}return m.Deferred(function(t){n[0][3].add(s(0,t,m.isFunction(o)?o:P,t.notifyWith)),n[1][3].add(s(0,t,m.isFunction(e)?e:P)),n[2][3].add(s(0,t,m.isFunction(i)?i:H))}).promise()},promise:function(t){return null!=t?m.extend(t,o):o}},r={};return m.each(n,function(t,e){var s=e[2],a=e[5];o[e[1]]=s.add,a&&s.add(function(){i=a},n[3-t][2].disable,n[0][2].lock),s.add(e[3].fire),r[e[0]]=function(){return r[e[0]+"With"](this===r?void 0:this,arguments),this},r[e[0]+"With"]=s.fireWith}),o.promise(r),e&&e.call(r,r),r},when:function(t){var e=arguments.length,n=e,i=Array(n),o=r.call(arguments),s=m.Deferred(),a=function(t){return function(n){i[t]=this,o[t]=arguments.length>1?r.call(arguments):n,--e||s.resolveWith(i,o)}};if(e<=1&&(F(t,s.done(a(n)).resolve,s.reject,!e),"pending"===s.state()||m.isFunction(o[n]&&o[n].then)))return s.then();for(;n--;)F(o[n],a(n),s.reject);return s.promise()}});var W=/^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;m.Deferred.exceptionHook=function(e,n){t.console&&t.console.warn&&e&&W.test(e.name)&&t.console.warn("jQuery.Deferred exception: "+e.message,e.stack,n)},m.readyException=function(e){t.setTimeout(function(){throw e})};var M=m.Deferred();function B(){i.removeEventListener("DOMContentLoaded",B),t.removeEventListener("load",B),m.ready()}m.fn.ready=function(t){return M.then(t).catch(function(t){m.readyException(t)}),this},m.extend({isReady:!1,readyWait:1,ready:function(t){(!0===t?--m.readyWait:m.isReady)||(m.isReady=!0,!0!==t&&--m.readyWait>0||M.resolveWith(i,[m]))}}),m.ready.then=M.then,"complete"===i.readyState||"loading"!==i.readyState&&!i.documentElement.doScroll?t.setTimeout(m.ready):(i.addEventListener("DOMContentLoaded",B),t.addEventListener("load",B));var U=function(t,e,n,i,o,r,s){var a=0,l=t.length,u=null==n;if("object"===m.type(n)){o=!0;for(a in n)U(t,e,a,n[a],!0,r,s)}else if(void 0!==i&&(o=!0,m.isFunction(i)||(s=!0),u&&(s?(e.call(t,i),e=null):(u=e,e=function(t,e,n){return u.call(m(t),n)})),e))for(;a<l;a++)e(t[a],n,s?i:i.call(t[a],a,e(t[a],n)));return o?t:u?e.call(t):l?e(t[0],n):r},_=function(t){return 1===t.nodeType||9===t.nodeType||!+t.nodeType};function z(){this.expando=m.expando+z.uid++}z.uid=1,z.prototype={cache:function(t){var e=t[this.expando];return e||(e={},_(t)&&(t.nodeType?t[this.expando]=e:Object.defineProperty(t,this.expando,{value:e,configurable:!0}))),e},set:function(t,e,n){var i,o=this.cache(t);if("string"==typeof e)o[m.camelCase(e)]=n;else for(i in e)o[m.camelCase(i)]=e[i];return o},get:function(t,e){return void 0===e?this.cache(t):t[this.expando]&&t[this.expando][m.camelCase(e)]},access:function(t,e,n){return void 0===e||e&&"string"==typeof e&&void 0===n?this.get(t,e):(this.set(t,e,n),void 0!==n?n:e)},remove:function(t,e){var n,i=t[this.expando];if(void 0!==i){if(void 0!==e){Array.isArray(e)?e=e.map(m.camelCase):e=(e=m.camelCase(e))in i?[e]:e.match(q)||[],n=e.length;for(;n--;)delete i[e[n]]}(void 0===e||m.isEmptyObject(i))&&(t.nodeType?t[this.expando]=void 0:delete t[this.expando])}},hasData:function(t){var e=t[this.expando];return void 0!==e&&!m.isEmptyObject(e)}};var V=new z,Q=new z,X=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,G=/[A-Z]/g;function Y(t,e,n){var i,o;if(void 0===n&&1===t.nodeType)if(i="data-"+e.replace(G,"-$&").toLowerCase(),n=t.getAttribute(i),"string"==typeof n){try{n="true"===(o=n)||"false"!==o&&("null"===o?null:o===+o+""?+o:X.test(o)?JSON.parse(o):o)}catch(t){}Q.set(t,e,n)}else n=void 0;return n}m.extend({hasData:function(t){return Q.hasData(t)||V.hasData(t)},data:function(t,e,n){return Q.access(t,e,n)},removeData:function(t,e){Q.remove(t,e)},_data:function(t,e,n){return V.access(t,e,n)},_removeData:function(t,e){V.remove(t,e)}}),m.fn.extend({data:function(t,e){var n,i,o,r=this[0],s=r&&r.attributes;if(void 0===t){if(this.length&&(o=Q.get(r),1===r.nodeType&&!V.get(r,"hasDataAttrs"))){for(n=s.length;n--;)s[n]&&(i=s[n].name,0===i.indexOf("data-")&&(i=m.camelCase(i.slice(5)),Y(r,i,o[i])));V.set(r,"hasDataAttrs",!0)}return o}return"object"==typeof t?this.each(function(){Q.set(this,t)}):U(this,function(e){var n;if(r&&void 0===e){if(void 0!==(n=Q.get(r,t)))return n;if(void 0!==(n=Y(r,t)))return n}else this.each(function(){Q.set(this,t,e)})},null,e,arguments.length>1,null,!0)},removeData:function(t){return this.each(function(){Q.remove(this,t)})}}),m.extend({queue:function(t,e,n){var i;if(t)return e=(e||"fx")+"queue",i=V.get(t,e),n&&(!i||Array.isArray(n)?i=V.access(t,e,m.makeArray(n)):i.push(n)),i||[]},dequeue:function(t,e){e=e||"fx";var n=m.queue(t,e),i=n.length,o=n.shift(),r=m._queueHooks(t,e);"inprogress"===o&&(o=n.shift(),i--),o&&("fx"===e&&n.unshift("inprogress"),delete r.stop,o.call(t,function(){m.dequeue(t,e)},r)),!i&&r&&r.empty.fire()},_queueHooks:function(t,e){var n=e+"queueHooks";return V.get(t,n)||V.access(t,n,{empty:m.Callbacks("once memory").add(function(){V.remove(t,[e+"queue",n])})})}}),m.fn.extend({queue:function(t,e){var n=2;return"string"!=typeof t&&(e=t,t="fx",n--),arguments.length<n?m.queue(this[0],t):void 0===e?this:this.each(function(){var n=m.queue(this,t,e);m._queueHooks(this,t),"fx"===t&&"inprogress"!==n[0]&&m.dequeue(this,t)})},dequeue:function(t){return this.each(function(){m.dequeue(this,t)})},clearQueue:function(t){return this.queue(t||"fx",[])},promise:function(t,e){var n,i=1,o=m.Deferred(),r=this,s=this.length,a=function(){--i||o.resolveWith(r,[r])};for("string"!=typeof t&&(e=t,t=void 0),t=t||"fx";s--;)n=V.get(r[s],t+"queueHooks"),n&&n.empty&&(i++,n.empty.add(a));return a(),o.promise(e)}});var J=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,K=new RegExp("^(?:([+-])=|)("+J+")([a-z%]*)$","i"),Z=["Top","Right","Bottom","Left"],tt=function(t,e){return"none"===(t=e||t).style.display||""===t.style.display&&m.contains(t.ownerDocument,t)&&"none"===m.css(t,"display")},et=function(t,e,n,i){var o,r,s={};for(r in e)s[r]=t.style[r],t.style[r]=e[r];o=n.apply(t,i||[]);for(r in e)t.style[r]=s[r];return o};function nt(t,e,n,i){var o,r=1,s=20,a=i?function(){return i.cur()}:function(){return m.css(t,e,"")},l=a(),u=n&&n[3]||(m.cssNumber[e]?"":"px"),c=(m.cssNumber[e]||"px"!==u&&+l)&&K.exec(m.css(t,e));if(c&&c[3]!==u){u=u||c[3],n=n||[],c=+l||1;do{r=r||".5",c/=r,m.style(t,e,c+u)}while(r!==(r=a()/l)&&1!==r&&--s)}return n&&(c=+c||+l||0,o=n[1]?c+(n[1]+1)*n[2]:+n[2],i&&(i.unit=u,i.start=c,i.end=o)),o}var it={};function ot(t,e){for(var n,i,o=[],r=0,s=t.length;r<s;r++)i=t[r],i.style&&(n=i.style.display,e?("none"===n&&(o[r]=V.get(i,"display")||null,o[r]||(i.style.display="")),""===i.style.display&&tt(i)&&(o[r]=(a=i,l=void 0,u=void 0,void 0,f=void 0,u=a.ownerDocument,c=a.nodeName,f=it[c],f||(l=u.body.appendChild(u.createElement(c)),f=m.css(l,"display"),l.parentNode.removeChild(l),"none"===f&&(f="block"),it[c]=f,f)))):"none"!==n&&(o[r]="none",V.set(i,"display",n)));var a,l,u,c,f;for(r=0;r<s;r++)null!=o[r]&&(t[r].style.display=o[r]);return t}m.fn.extend({show:function(){return ot(this,!0)},hide:function(){return ot(this)},toggle:function(t){return"boolean"==typeof t?t?this.show():this.hide():this.each(function(){tt(this)?m(this).show():m(this).hide()})}});var rt=/^(?:checkbox|radio)$/i,st=/<([a-z][^\/\0>\x20\t\r\n\f]+)/i,at=/^$|\/(?:java|ecma)script/i,lt={option:[1,"<select multiple='multiple'>","</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};function ut(t,e){var n;return n=void 0!==t.getElementsByTagName?t.getElementsByTagName(e||"*"):void 0!==t.querySelectorAll?t.querySelectorAll(e||"*"):[],void 0===e||e&&k(t,e)?m.merge([t],n):n}function ct(t,e){for(var n=0,i=t.length;n<i;n++)V.set(t[n],"globalEval",!e||V.get(e[n],"globalEval"))}lt.optgroup=lt.option,lt.tbody=lt.tfoot=lt.colgroup=lt.caption=lt.thead,lt.th=lt.td;var ft,pt,dt=/<|&#?\w+;/;function ht(t,e,n,i,o){for(var r,s,a,l,u,c,f=e.createDocumentFragment(),p=[],d=0,h=t.length;d<h;d++)if(r=t[d],r||0===r)if("object"===m.type(r))m.merge(p,r.nodeType?[r]:r);else if(dt.test(r)){for(s=s||f.appendChild(e.createElement("div")),a=(st.exec(r)||["",""])[1].toLowerCase(),l=lt[a]||lt._default,s.innerHTML=l[1]+m.htmlPrefilter(r)+l[2],c=l[0];c--;)s=s.lastChild;m.merge(p,s.childNodes),(s=f.firstChild).textContent=""}else p.push(e.createTextNode(r));for(f.textContent="",d=0;r=p[d++];)if(i&&m.inArray(r,i)>-1)o&&o.push(r);else if(u=m.contains(r.ownerDocument,r),s=ut(f.appendChild(r),"script"),u&&ct(s),n)for(c=0;r=s[c++];)at.test(r.type||"")&&n.push(r);return f}ft=i.createDocumentFragment().appendChild(i.createElement("div")),(pt=i.createElement("input")).setAttribute("type","radio"),pt.setAttribute("checked","checked"),pt.setAttribute("name","t"),ft.appendChild(pt),h.checkClone=ft.cloneNode(!0).cloneNode(!0).lastChild.checked,ft.innerHTML="<textarea>x</textarea>",h.noCloneChecked=!!ft.cloneNode(!0).lastChild.defaultValue;var gt=i.documentElement,vt=/^key/,mt=/^(?:mouse|pointer|contextmenu|drag|drop)|click/,yt=/^([^.]*)(?:\.(.+)|)/;function bt(){return!0}function xt(){return!1}function wt(){try{return i.activeElement}catch(t){}}function Tt(t,e,n,i,o,r){var s,a;if("object"==typeof e){"string"!=typeof n&&(i=i||n,n=void 0);for(a in e)Tt(t,a,n,i,e[a],r);return t}if(null==i&&null==o?(o=n,i=n=void 0):null==o&&("string"==typeof n?(o=i,i=void 0):(o=i,i=n,n=void 0)),!1===o)o=xt;else if(!o)return t;return 1===r&&(s=o,(o=function(t){return m().off(t),s.apply(this,arguments)}).guid=s.guid||(s.guid=m.guid++)),t.each(function(){m.event.add(this,e,o,i,n)})}m.event={global:{},add:function(t,e,n,i,o){var r,s,a,l,u,c,f,p,d,h,g,v=V.get(t);if(v)for(n.handler&&(n=(r=n).handler,o=r.selector),o&&m.find.matchesSelector(gt,o),n.guid||(n.guid=m.guid++),(l=v.events)||(l=v.events={}),(s=v.handle)||(s=v.handle=function(e){return void 0!==m&&m.event.triggered!==e.type?m.event.dispatch.apply(t,arguments):void 0}),u=(e=(e||"").match(q)||[""]).length;u--;)a=yt.exec(e[u])||[],d=g=a[1],h=(a[2]||"").split(".").sort(),d&&(f=m.event.special[d]||{},d=(o?f.delegateType:f.bindType)||d,f=m.event.special[d]||{},c=m.extend({type:d,origType:g,data:i,handler:n,guid:n.guid,selector:o,needsContext:o&&m.expr.match.needsContext.test(o),namespace:h.join(".")},r),(p=l[d])||(p=l[d]=[],p.delegateCount=0,f.setup&&!1!==f.setup.call(t,i,h,s)||t.addEventListener&&t.addEventListener(d,s)),f.add&&(f.add.call(t,c),c.handler.guid||(c.handler.guid=n.guid)),o?p.splice(p.delegateCount++,0,c):p.push(c),m.event.global[d]=!0)},remove:function(t,e,n,i,o){var r,s,a,l,u,c,f,p,d,h,g,v=V.hasData(t)&&V.get(t);if(v&&(l=v.events)){for(u=(e=(e||"").match(q)||[""]).length;u--;)if(a=yt.exec(e[u])||[],d=g=a[1],h=(a[2]||"").split(".").sort(),d){for(f=m.event.special[d]||{},p=l[d=(i?f.delegateType:f.bindType)||d]||[],a=a[2]&&new RegExp("(^|\\.)"+h.join("\\.(?:.*\\.|)")+"(\\.|$)"),s=r=p.length;r--;)c=p[r],!o&&g!==c.origType||n&&n.guid!==c.guid||a&&!a.test(c.namespace)||i&&i!==c.selector&&("**"!==i||!c.selector)||(p.splice(r,1),c.selector&&p.delegateCount--,f.remove&&f.remove.call(t,c));s&&!p.length&&(f.teardown&&!1!==f.teardown.call(t,h,v.handle)||m.removeEvent(t,d,v.handle),delete l[d])}else for(d in l)m.event.remove(t,d+e[u],n,i,!0);m.isEmptyObject(l)&&V.remove(t,"handle events")}},dispatch:function(t){var e,n,i,o,r,s,a=m.event.fix(t),l=new Array(arguments.length),u=(V.get(this,"events")||{})[a.type]||[],c=m.event.special[a.type]||{};for(l[0]=a,e=1;e<arguments.length;e++)l[e]=arguments[e];if(a.delegateTarget=this,!c.preDispatch||!1!==c.preDispatch.call(this,a)){for(s=m.event.handlers.call(this,a,u),e=0;(o=s[e++])&&!a.isPropagationStopped();)for(a.currentTarget=o.elem,n=0;(r=o.handlers[n++])&&!a.isImmediatePropagationStopped();)a.rnamespace&&!a.rnamespace.test(r.namespace)||(a.handleObj=r,a.data=r.data,i=((m.event.special[r.origType]||{}).handle||r.handler).apply(o.elem,l),void 0!==i&&!1===(a.result=i)&&(a.preventDefault(),a.stopPropagation()));return c.postDispatch&&c.postDispatch.call(this,a),a.result}},handlers:function(t,e){var n,i,o,r,s,a=[],l=e.delegateCount,u=t.target;if(l&&u.nodeType&&!("click"===t.type&&t.button>=1))for(;u!==this;u=u.parentNode||this)if(1===u.nodeType&&("click"!==t.type||!0!==u.disabled)){for(r=[],s={},n=0;n<l;n++)i=e[n],o=i.selector+" ",void 0===s[o]&&(s[o]=i.needsContext?m(o,this).index(u)>-1:m.find(o,this,null,[u]).length),s[o]&&r.push(i);r.length&&a.push({elem:u,handlers:r})}return u=this,l<e.length&&a.push({elem:u,handlers:e.slice(l)}),a},addProp:function(t,e){Object.defineProperty(m.Event.prototype,t,{enumerable:!0,configurable:!0,get:m.isFunction(e)?function(){if(this.originalEvent)return e(this.originalEvent)}:function(){if(this.originalEvent)return this.originalEvent[t]},set:function(e){Object.defineProperty(this,t,{enumerable:!0,configurable:!0,writable:!0,value:e})}})},fix:function(t){return t[m.expando]?t:new m.Event(t)},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==wt()&&this.focus)return this.focus(),!1},delegateType:"focusin"},blur:{trigger:function(){if(this===wt()&&this.blur)return this.blur(),!1},delegateType:"focusout"},click:{trigger:function(){if("checkbox"===this.type&&this.click&&k(this,"input"))return this.click(),!1},_default:function(t){return k(t.target,"a")}},beforeunload:{postDispatch:function(t){void 0!==t.result&&t.originalEvent&&(t.originalEvent.returnValue=t.result)}}}},m.removeEvent=function(t,e,n){t.removeEventListener&&t.removeEventListener(e,n)},m.Event=function(t,e){return this instanceof m.Event?(t&&t.type?(this.originalEvent=t,this.type=t.type,this.isDefaultPrevented=t.defaultPrevented||void 0===t.defaultPrevented&&!1===t.returnValue?bt:xt,this.target=t.target&&3===t.target.nodeType?t.target.parentNode:t.target,this.currentTarget=t.currentTarget,this.relatedTarget=t.relatedTarget):this.type=t,e&&m.extend(this,e),this.timeStamp=t&&t.timeStamp||m.now(),void(this[m.expando]=!0)):new m.Event(t,e)},m.Event.prototype={constructor:m.Event,isDefaultPrevented:xt,isPropagationStopped:xt,isImmediatePropagationStopped:xt,isSimulated:!1,preventDefault:function(){var t=this.originalEvent;this.isDefaultPrevented=bt,t&&!this.isSimulated&&t.preventDefault()},stopPropagation:function(){var t=this.originalEvent;this.isPropagationStopped=bt,t&&!this.isSimulated&&t.stopPropagation()},stopImmediatePropagation:function(){var t=this.originalEvent;this.isImmediatePropagationStopped=bt,t&&!this.isSimulated&&t.stopImmediatePropagation(),this.stopPropagation()}},m.each({altKey:!0,bubbles:!0,cancelable:!0,changedTouches:!0,ctrlKey:!0,detail:!0,eventPhase:!0,metaKey:!0,pageX:!0,pageY:!0,shiftKey:!0,view:!0,char:!0,charCode:!0,key:!0,keyCode:!0,button:!0,buttons:!0,clientX:!0,clientY:!0,offsetX:!0,offsetY:!0,pointerId:!0,pointerType:!0,screenX:!0,screenY:!0,targetTouches:!0,toElement:!0,touches:!0,which:function(t){var e=t.button;return null==t.which&&vt.test(t.type)?null!=t.charCode?t.charCode:t.keyCode:!t.which&&void 0!==e&&mt.test(t.type)?1&e?1:2&e?3:4&e?2:0:t.which}},m.event.addProp),m.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(t,e){m.event.special[t]={delegateType:e,bindType:e,handle:function(t){var n,i=t.relatedTarget,o=t.handleObj;return i&&(i===this||m.contains(this,i))||(t.type=o.origType,n=o.handler.apply(this,arguments),t.type=e),n}}}),m.fn.extend({on:function(t,e,n,i){return Tt(this,t,e,n,i)},one:function(t,e,n,i){return Tt(this,t,e,n,i,1)},off:function(t,e,n){var i,o;if(t&&t.preventDefault&&t.handleObj)return i=t.handleObj,m(t.delegateTarget).off(i.namespace?i.origType+"."+i.namespace:i.origType,i.selector,i.handler),this;if("object"==typeof t){for(o in t)this.off(o,e,t[o]);return this}return!1!==e&&"function"!=typeof e||(n=e,e=void 0),!1===n&&(n=xt),this.each(function(){m.event.remove(this,t,n,e)})}});var Ct=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,Et=/<script|<style|<link/i,St=/checked\s*(?:[^=]|=\s*.checked.)/i,$t=/^true\/(.*)/,kt=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;function Dt(t,e){return k(t,"table")&&k(11!==e.nodeType?e:e.firstChild,"tr")&&m(">tbody",t)[0]||t}function Nt(t){return t.type=(null!==t.getAttribute("type"))+"/"+t.type,t}function At(t){var e=$t.exec(t.type);return e?t.type=e[1]:t.removeAttribute("type"),t}function jt(t,e){var n,i,o,r,s,a,l,u;if(1===e.nodeType){if(V.hasData(t)&&(r=V.access(t),s=V.set(e,r),u=r.events)){delete s.handle,s.events={};for(o in u)for(n=0,i=u[o].length;n<i;n++)m.event.add(e,o,u[o][n])}Q.hasData(t)&&(a=Q.access(t),l=m.extend({},a),Q.set(e,l))}}function Ot(t,e,n,i){e=s.apply([],e);var o,r,a,l,u,c,f=0,p=t.length,d=p-1,v=e[0],y=m.isFunction(v);if(y||p>1&&"string"==typeof v&&!h.checkClone&&St.test(v))return t.each(function(o){var r=t.eq(o);y&&(e[0]=v.call(this,o,r.html())),Ot(r,e,n,i)});if(p&&(r=(o=ht(e,t[0].ownerDocument,!1,t,i)).firstChild,1===o.childNodes.length&&(o=r),r||i)){for(l=(a=m.map(ut(o,"script"),Nt)).length;f<p;f++)u=o,f!==d&&(u=m.clone(u,!0,!0),l&&m.merge(a,ut(u,"script"))),n.call(t[f],u,f);if(l)for(c=a[a.length-1].ownerDocument,m.map(a,At),f=0;f<l;f++)u=a[f],at.test(u.type||"")&&!V.access(u,"globalEval")&&m.contains(c,u)&&(u.src?m._evalUrl&&m._evalUrl(u.src):g(u.textContent.replace(kt,""),c))}return t}function It(t,e,n){for(var i,o=e?m.filter(e,t):t,r=0;null!=(i=o[r]);r++)n||1!==i.nodeType||m.cleanData(ut(i)),i.parentNode&&(n&&m.contains(i.ownerDocument,i)&&ct(ut(i,"script")),i.parentNode.removeChild(i));return t}m.extend({htmlPrefilter:function(t){return t.replace(Ct,"<$1></$2>")},clone:function(t,e,n){var i,o,r,s,a,l,u,c=t.cloneNode(!0),f=m.contains(t.ownerDocument,t);if(!(h.noCloneChecked||1!==t.nodeType&&11!==t.nodeType||m.isXMLDoc(t)))for(s=ut(c),r=ut(t),i=0,o=r.length;i<o;i++)a=r[i],l=s[i],void 0,u=l.nodeName.toLowerCase(),"input"===u&&rt.test(a.type)?l.checked=a.checked:"input"!==u&&"textarea"!==u||(l.defaultValue=a.defaultValue);if(e)if(n)for(r=r||ut(t),s=s||ut(c),i=0,o=r.length;i<o;i++)jt(r[i],s[i]);else jt(t,c);return(s=ut(c,"script")).length>0&&ct(s,!f&&ut(t,"script")),c},cleanData:function(t){for(var e,n,i,o=m.event.special,r=0;void 0!==(n=t[r]);r++)if(_(n)){if(e=n[V.expando]){if(e.events)for(i in e.events)o[i]?m.event.remove(n,i):m.removeEvent(n,i,e.handle);n[V.expando]=void 0}n[Q.expando]&&(n[Q.expando]=void 0)}}}),m.fn.extend({detach:function(t){return It(this,t,!0)},remove:function(t){return It(this,t)},text:function(t){return U(this,function(t){return void 0===t?m.text(this):this.empty().each(function(){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||(this.textContent=t)})},null,t,arguments.length)},append:function(){return Ot(this,arguments,function(t){1!==this.nodeType&&11!==this.nodeType&&9!==this.nodeType||Dt(this,t).appendChild(t)})},prepend:function(){return Ot(this,arguments,function(t){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var e=Dt(this,t);e.insertBefore(t,e.firstChild)}})},before:function(){return Ot(this,arguments,function(t){this.parentNode&&this.parentNode.insertBefore(t,this)})},after:function(){return Ot(this,arguments,function(t){this.parentNode&&this.parentNode.insertBefore(t,this.nextSibling)})},empty:function(){for(var t,e=0;null!=(t=this[e]);e++)1===t.nodeType&&(m.cleanData(ut(t,!1)),t.textContent="");return this},clone:function(t,e){return t=null!=t&&t,e=null==e?t:e,this.map(function(){return m.clone(this,t,e)})},html:function(t){return U(this,function(t){var e=this[0]||{},n=0,i=this.length;if(void 0===t&&1===e.nodeType)return e.innerHTML;if("string"==typeof t&&!Et.test(t)&&!lt[(st.exec(t)||["",""])[1].toLowerCase()]){t=m.htmlPrefilter(t);try{for(;n<i;n++)e=this[n]||{},1===e.nodeType&&(m.cleanData(ut(e,!1)),e.innerHTML=t);e=0}catch(t){}}e&&this.empty().append(t)},null,t,arguments.length)},replaceWith:function(){var t=[];return Ot(this,arguments,function(e){var n=this.parentNode;m.inArray(this,t)<0&&(m.cleanData(ut(this)),n&&n.replaceChild(e,this))},t)}}),m.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(t,e){m.fn[t]=function(t){for(var n,i=[],o=m(t),r=o.length-1,s=0;s<=r;s++)n=s===r?this:this.clone(!0),m(o[s])[e](n),a.apply(i,n.get());return this.pushStack(i)}});var Lt=/^margin/,Rt=new RegExp("^("+J+")(?!px)[a-z%]+$","i"),qt=function(e){var n=e.ownerDocument.defaultView;return n&&n.opener||(n=t),n.getComputedStyle(e)};function Pt(t,e,n){var i,o,r,s,a=t.style;return(n=n||qt(t))&&(""!==(s=n.getPropertyValue(e)||n[e])||m.contains(t.ownerDocument,t)||(s=m.style(t,e)),!h.pixelMarginRight()&&Rt.test(s)&&Lt.test(e)&&(i=a.width,o=a.minWidth,r=a.maxWidth,a.minWidth=a.maxWidth=a.width=s,s=n.width,a.width=i,a.minWidth=o,a.maxWidth=r)),void 0!==s?s+"":s}function Ht(t,e){return{get:function(){return t()?void delete this.get:(this.get=e).apply(this,arguments)}}}!function(){function e(){if(l){l.style.cssText="box-sizing:border-box;position:relative;display:block;margin:auto;border:1px;padding:1px;top:1%;width:50%",l.innerHTML="",gt.appendChild(a);var e=t.getComputedStyle(l);n="1%"!==e.top,s="2px"===e.marginLeft,o="4px"===e.width,l.style.marginRight="50%",r="4px"===e.marginRight,gt.removeChild(a),l=null}}var n,o,r,s,a=i.createElement("div"),l=i.createElement("div");l.style&&(l.style.backgroundClip="content-box",l.cloneNode(!0).style.backgroundClip="",h.clearCloneStyle="content-box"===l.style.backgroundClip,a.style.cssText="border:0;width:8px;height:0;top:0;left:-9999px;padding:0;margin-top:1px;position:absolute",a.appendChild(l),m.extend(h,{pixelPosition:function(){return e(),n},boxSizingReliable:function(){return e(),o},pixelMarginRight:function(){return e(),r},reliableMarginLeft:function(){return e(),s}}))}();var Ft=/^(none|table(?!-c[ea]).+)/,Wt=/^--/,Mt={position:"absolute",visibility:"hidden",display:"block"},Bt={letterSpacing:"0",fontWeight:"400"},Ut=["Webkit","Moz","ms"],_t=i.createElement("div").style;function zt(t){var e=m.cssProps[t];return e||(e=m.cssProps[t]=function(t){if(t in _t)return t;for(var e=t[0].toUpperCase()+t.slice(1),n=Ut.length;n--;)if(t=Ut[n]+e,t in _t)return t}(t)||t),e}function Vt(t,e,n){var i=K.exec(e);return i?Math.max(0,i[2]-(n||0))+(i[3]||"px"):e}function Qt(t,e,n,i,o){var r,s=0;for(r=n===(i?"border":"content")?4:"width"===e?1:0;r<4;r+=2)"margin"===n&&(s+=m.css(t,n+Z[r],!0,o)),i?("content"===n&&(s-=m.css(t,"padding"+Z[r],!0,o)),"margin"!==n&&(s-=m.css(t,"border"+Z[r]+"Width",!0,o))):(s+=m.css(t,"padding"+Z[r],!0,o),"padding"!==n&&(s+=m.css(t,"border"+Z[r]+"Width",!0,o)));return s}function Xt(t,e,n){var i,o=qt(t),r=Pt(t,e,o),s="border-box"===m.css(t,"boxSizing",!1,o);return Rt.test(r)?r:(i=s&&(h.boxSizingReliable()||r===t.style[e]),"auto"===r&&(r=t["offset"+e[0].toUpperCase()+e.slice(1)]),(r=parseFloat(r)||0)+Qt(t,e,n||(s?"border":"content"),i,o)+"px")}function Gt(t,e,n,i,o){return new Gt.prototype.init(t,e,n,i,o)}m.extend({cssHooks:{opacity:{get:function(t,e){if(e){var n=Pt(t,"opacity");return""===n?"1":n}}}},cssNumber:{animationIterationCount:!0,columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{float:"cssFloat"},style:function(t,e,n,i){if(t&&3!==t.nodeType&&8!==t.nodeType&&t.style){var o,r,s,a=m.camelCase(e),l=Wt.test(e),u=t.style;return l||(e=zt(a)),s=m.cssHooks[e]||m.cssHooks[a],void 0===n?s&&"get"in s&&void 0!==(o=s.get(t,!1,i))?o:u[e]:("string"===(r=typeof n)&&(o=K.exec(n))&&o[1]&&(n=nt(t,e,o),r="number"),void(null!=n&&n==n&&("number"===r&&(n+=o&&o[3]||(m.cssNumber[a]?"":"px")),h.clearCloneStyle||""!==n||0!==e.indexOf("background")||(u[e]="inherit"),s&&"set"in s&&void 0===(n=s.set(t,n,i))||(l?u.setProperty(e,n):u[e]=n))))}},css:function(t,e,n,i){var o,r,s,a=m.camelCase(e);return Wt.test(e)||(e=zt(a)),(s=m.cssHooks[e]||m.cssHooks[a])&&"get"in s&&(o=s.get(t,!0,n)),void 0===o&&(o=Pt(t,e,i)),"normal"===o&&e in Bt&&(o=Bt[e]),""===n||n?(r=parseFloat(o),!0===n||isFinite(r)?r||0:o):o}}),m.each(["height","width"],function(t,e){m.cssHooks[e]={get:function(t,n,i){if(n)return!Ft.test(m.css(t,"display"))||t.getClientRects().length&&t.getBoundingClientRect().width?Xt(t,e,i):et(t,Mt,function(){return Xt(t,e,i)})},set:function(t,n,i){var o,r=i&&qt(t),s=i&&Qt(t,e,i,"border-box"===m.css(t,"boxSizing",!1,r),r);return s&&(o=K.exec(n))&&"px"!==(o[3]||"px")&&(t.style[e]=n,n=m.css(t,e)),Vt(0,n,s)}}}),m.cssHooks.marginLeft=Ht(h.reliableMarginLeft,function(t,e){if(e)return(parseFloat(Pt(t,"marginLeft"))||t.getBoundingClientRect().left-et(t,{marginLeft:0},function(){return t.getBoundingClientRect().left}))+"px"}),m.each({margin:"",padding:"",border:"Width"},function(t,e){m.cssHooks[t+e]={expand:function(n){for(var i=0,o={},r="string"==typeof n?n.split(" "):[n];i<4;i++)o[t+Z[i]+e]=r[i]||r[i-2]||r[0];return o}},Lt.test(t)||(m.cssHooks[t+e].set=Vt)}),m.fn.extend({css:function(t,e){return U(this,function(t,e,n){var i,o,r={},s=0;if(Array.isArray(e)){for(i=qt(t),o=e.length;s<o;s++)r[e[s]]=m.css(t,e[s],!1,i);return r}return void 0!==n?m.style(t,e,n):m.css(t,e)},t,e,arguments.length>1)}}),m.Tween=Gt,Gt.prototype={constructor:Gt,init:function(t,e,n,i,o,r){this.elem=t,this.prop=n,this.easing=o||m.easing._default,this.options=e,this.start=this.now=this.cur(),this.end=i,this.unit=r||(m.cssNumber[n]?"":"px")},cur:function(){var t=Gt.propHooks[this.prop];return t&&t.get?t.get(this):Gt.propHooks._default.get(this)},run:function(t){var e,n=Gt.propHooks[this.prop];return this.options.duration?this.pos=e=m.easing[this.easing](t,this.options.duration*t,0,1,this.options.duration):this.pos=e=t,this.now=(this.end-this.start)*e+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):Gt.propHooks._default.set(this),this}},Gt.prototype.init.prototype=Gt.prototype,Gt.propHooks={_default:{get:function(t){var e;return 1!==t.elem.nodeType||null!=t.elem[t.prop]&&null==t.elem.style[t.prop]?t.elem[t.prop]:(e=m.css(t.elem,t.prop,""))&&"auto"!==e?e:0},set:function(t){m.fx.step[t.prop]?m.fx.step[t.prop](t):1!==t.elem.nodeType||null==t.elem.style[m.cssProps[t.prop]]&&!m.cssHooks[t.prop]?t.elem[t.prop]=t.now:m.style(t.elem,t.prop,t.now+t.unit)}}},Gt.propHooks.scrollTop=Gt.propHooks.scrollLeft={set:function(t){t.elem.nodeType&&t.elem.parentNode&&(t.elem[t.prop]=t.now)}},m.easing={linear:function(t){return t},swing:function(t){return.5-Math.cos(t*Math.PI)/2},_default:"swing"},m.fx=Gt.prototype.init,m.fx.step={};var Yt,Jt,Kt,Zt,te=/^(?:toggle|show|hide)$/,ee=/queueHooks$/;function ne(){Jt&&(!1===i.hidden&&t.requestAnimationFrame?t.requestAnimationFrame(ne):t.setTimeout(ne,m.fx.interval),m.fx.tick())}function ie(){return t.setTimeout(function(){Yt=void 0}),Yt=m.now()}function oe(t,e){var n,i=0,o={height:t};for(e=e?1:0;i<4;i+=2-e)n=Z[i],o["margin"+n]=o["padding"+n]=t;return e&&(o.opacity=o.width=t),o}function re(t,e,n){for(var i,o=(se.tweeners[e]||[]).concat(se.tweeners["*"]),r=0,s=o.length;r<s;r++)if(i=o[r].call(n,e,t))return i}function se(t,e,n){var i,o,r=0,s=se.prefilters.length,a=m.Deferred().always(function(){delete l.elem}),l=function(){if(o)return!1;for(var e=Yt||ie(),n=Math.max(0,u.startTime+u.duration-e),i=1-(n/u.duration||0),r=0,s=u.tweens.length;r<s;r++)u.tweens[r].run(i);return a.notifyWith(t,[u,i,n]),i<1&&s?n:(s||a.notifyWith(t,[u,1,0]),a.resolveWith(t,[u]),!1)},u=a.promise({elem:t,props:m.extend({},e),opts:m.extend(!0,{specialEasing:{},easing:m.easing._default},n),originalProperties:e,originalOptions:n,startTime:Yt||ie(),duration:n.duration,tweens:[],createTween:function(e,n){var i=m.Tween(t,u.opts,e,n,u.opts.specialEasing[e]||u.opts.easing);return u.tweens.push(i),i},stop:function(e){var n=0,i=e?u.tweens.length:0;if(o)return this;for(o=!0;n<i;n++)u.tweens[n].run(1);return e?(a.notifyWith(t,[u,1,0]),a.resolveWith(t,[u,e])):a.rejectWith(t,[u,e]),this}}),c=u.props;for(function(t,e){var n,i,o,r,s;for(n in t)if(i=m.camelCase(n),o=e[i],r=t[n],Array.isArray(r)&&(o=r[1],r=t[n]=r[0]),n!==i&&(t[i]=r,delete t[n]),s=m.cssHooks[i],s&&"expand"in s){r=s.expand(r),delete t[i];for(n in r)n in t||(t[n]=r[n],e[n]=o)}else e[i]=o}(c,u.opts.specialEasing);r<s;r++)if(i=se.prefilters[r].call(u,t,c,u.opts))return m.isFunction(i.stop)&&(m._queueHooks(u.elem,u.opts.queue).stop=m.proxy(i.stop,i)),i;return m.map(c,re,u),m.isFunction(u.opts.start)&&u.opts.start.call(t,u),u.progress(u.opts.progress).done(u.opts.done,u.opts.complete).fail(u.opts.fail).always(u.opts.always),m.fx.timer(m.extend(l,{elem:t,anim:u,queue:u.opts.queue})),u}m.Animation=m.extend(se,{tweeners:{"*":[function(t,e){var n=this.createTween(t,e);return nt(n.elem,t,K.exec(e),n),n}]},tweener:function(t,e){m.isFunction(t)?(e=t,t=["*"]):t=t.match(q);for(var n,i=0,o=t.length;i<o;i++)n=t[i],se.tweeners[n]=se.tweeners[n]||[],se.tweeners[n].unshift(e)},prefilters:[function(t,e,n){var i,o,r,s,a,l,u,c,f="width"in e||"height"in e,p=this,d={},h=t.style,g=t.nodeType&&tt(t),v=V.get(t,"fxshow");n.queue||(null==(s=m._queueHooks(t,"fx")).unqueued&&(s.unqueued=0,a=s.empty.fire,s.empty.fire=function(){s.unqueued||a()}),s.unqueued++,p.always(function(){p.always(function(){s.unqueued--,m.queue(t,"fx").length||s.empty.fire()})}));for(i in e)if(o=e[i],te.test(o)){if(delete e[i],r=r||"toggle"===o,o===(g?"hide":"show")){if("show"!==o||!v||void 0===v[i])continue;g=!0}d[i]=v&&v[i]||m.style(t,i)}if((l=!m.isEmptyObject(e))||!m.isEmptyObject(d)){f&&1===t.nodeType&&(n.overflow=[h.overflow,h.overflowX,h.overflowY],null==(u=v&&v.display)&&(u=V.get(t,"display")),"none"===(c=m.css(t,"display"))&&(u?c=u:(ot([t],!0),u=t.style.display||u,c=m.css(t,"display"),ot([t]))),("inline"===c||"inline-block"===c&&null!=u)&&"none"===m.css(t,"float")&&(l||(p.done(function(){h.display=u}),null==u&&(c=h.display,u="none"===c?"":c)),h.display="inline-block")),n.overflow&&(h.overflow="hidden",p.always(function(){h.overflow=n.overflow[0],h.overflowX=n.overflow[1],h.overflowY=n.overflow[2]})),l=!1;for(i in d)l||(v?"hidden"in v&&(g=v.hidden):v=V.access(t,"fxshow",{display:u}),r&&(v.hidden=!g),g&&ot([t],!0),p.done(function(){g||ot([t]),V.remove(t,"fxshow");for(i in d)m.style(t,i,d[i])})),l=re(g?v[i]:0,i,p),i in v||(v[i]=l.start,g&&(l.end=l.start,l.start=0))}}],prefilter:function(t,e){e?se.prefilters.unshift(t):se.prefilters.push(t)}}),m.speed=function(t,e,n){var i=t&&"object"==typeof t?m.extend({},t):{complete:n||!n&&e||m.isFunction(t)&&t,duration:t,easing:n&&e||e&&!m.isFunction(e)&&e};return m.fx.off?i.duration=0:"number"!=typeof i.duration&&(i.duration in m.fx.speeds?i.duration=m.fx.speeds[i.duration]:i.duration=m.fx.speeds._default),null!=i.queue&&!0!==i.queue||(i.queue="fx"),i.old=i.complete,i.complete=function(){m.isFunction(i.old)&&i.old.call(this),i.queue&&m.dequeue(this,i.queue)},i},m.fn.extend({fadeTo:function(t,e,n,i){return this.filter(tt).css("opacity",0).show().end().animate({opacity:e},t,n,i)},animate:function(t,e,n,i){var o=m.isEmptyObject(t),r=m.speed(e,n,i),s=function(){var e=se(this,m.extend({},t),r);(o||V.get(this,"finish"))&&e.stop(!0)};return s.finish=s,o||!1===r.queue?this.each(s):this.queue(r.queue,s)},stop:function(t,e,n){var i=function(t){var e=t.stop;delete t.stop,e(n)};return"string"!=typeof t&&(n=e,e=t,t=void 0),e&&!1!==t&&this.queue(t||"fx",[]),this.each(function(){var e=!0,o=null!=t&&t+"queueHooks",r=m.timers,s=V.get(this);if(o)s[o]&&s[o].stop&&i(s[o]);else for(o in s)s[o]&&s[o].stop&&ee.test(o)&&i(s[o]);for(o=r.length;o--;)r[o].elem!==this||null!=t&&r[o].queue!==t||(r[o].anim.stop(n),e=!1,r.splice(o,1));!e&&n||m.dequeue(this,t)})},finish:function(t){return!1!==t&&(t=t||"fx"),this.each(function(){var e,n=V.get(this),i=n[t+"queue"],o=n[t+"queueHooks"],r=m.timers,s=i?i.length:0;for(n.finish=!0,m.queue(this,t,[]),o&&o.stop&&o.stop.call(this,!0),e=r.length;e--;)r[e].elem===this&&r[e].queue===t&&(r[e].anim.stop(!0),r.splice(e,1));for(e=0;e<s;e++)i[e]&&i[e].finish&&i[e].finish.call(this);delete n.finish})}}),m.each(["toggle","show","hide"],function(t,e){var n=m.fn[e];m.fn[e]=function(t,i,o){return null==t||"boolean"==typeof t?n.apply(this,arguments):this.animate(oe(e,!0),t,i,o)}}),m.each({slideDown:oe("show"),slideUp:oe("hide"),slideToggle:oe("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(t,e){m.fn[t]=function(t,n,i){return this.animate(e,t,n,i)}}),m.timers=[],m.fx.tick=function(){var t,e=0,n=m.timers;for(Yt=m.now();e<n.length;e++)t=n[e],t()||n[e]!==t||n.splice(e--,1);n.length||m.fx.stop(),Yt=void 0},m.fx.timer=function(t){m.timers.push(t),m.fx.start()},m.fx.interval=13,m.fx.start=function(){Jt||(Jt=!0,ne())},m.fx.stop=function(){Jt=null},m.fx.speeds={slow:600,fast:200,_default:400},m.fn.delay=function(e,n){return e=m.fx&&m.fx.speeds[e]||e,n=n||"fx",this.queue(n,function(n,i){var o=t.setTimeout(n,e);i.stop=function(){t.clearTimeout(o)}})},Kt=i.createElement("input"),Zt=i.createElement("select").appendChild(i.createElement("option")),Kt.type="checkbox",h.checkOn=""!==Kt.value,h.optSelected=Zt.selected,(Kt=i.createElement("input")).value="t",Kt.type="radio",h.radioValue="t"===Kt.value;var ae,le=m.expr.attrHandle;m.fn.extend({attr:function(t,e){return U(this,m.attr,t,e,arguments.length>1)},removeAttr:function(t){return this.each(function(){m.removeAttr(this,t)})}}),m.extend({attr:function(t,e,n){var i,o,r=t.nodeType;if(3!==r&&8!==r&&2!==r)return void 0===t.getAttribute?m.prop(t,e,n):(1===r&&m.isXMLDoc(t)||(o=m.attrHooks[e.toLowerCase()]||(m.expr.match.bool.test(e)?ae:void 0)),void 0!==n?null===n?void m.removeAttr(t,e):o&&"set"in o&&void 0!==(i=o.set(t,n,e))?i:(t.setAttribute(e,n+""),n):o&&"get"in o&&null!==(i=o.get(t,e))?i:(i=m.find.attr(t,e),null==i?void 0:i))},attrHooks:{type:{set:function(t,e){if(!h.radioValue&&"radio"===e&&k(t,"input")){var n=t.value;return t.setAttribute("type",e),n&&(t.value=n),e}}}},removeAttr:function(t,e){var n,i=0,o=e&&e.match(q);if(o&&1===t.nodeType)for(;n=o[i++];)t.removeAttribute(n)}}),ae={set:function(t,e,n){return!1===e?m.removeAttr(t,n):t.setAttribute(n,n),n}},m.each(m.expr.match.bool.source.match(/\w+/g),function(t,e){var n=le[e]||m.find.attr;le[e]=function(t,e,i){var o,r,s=e.toLowerCase();return i||(r=le[s],le[s]=o,o=null!=n(t,e,i)?s:null,le[s]=r),o}});var ue=/^(?:input|select|textarea|button)$/i,ce=/^(?:a|area)$/i;function fe(t){return(t.match(q)||[]).join(" ")}function pe(t){return t.getAttribute&&t.getAttribute("class")||""}m.fn.extend({prop:function(t,e){return U(this,m.prop,t,e,arguments.length>1)},removeProp:function(t){return this.each(function(){delete this[m.propFix[t]||t]})}}),m.extend({prop:function(t,e,n){var i,o,r=t.nodeType;if(3!==r&&8!==r&&2!==r)return 1===r&&m.isXMLDoc(t)||(e=m.propFix[e]||e,o=m.propHooks[e]),void 0!==n?o&&"set"in o&&void 0!==(i=o.set(t,n,e))?i:t[e]=n:o&&"get"in o&&null!==(i=o.get(t,e))?i:t[e]},propHooks:{tabIndex:{get:function(t){var e=m.find.attr(t,"tabindex");return e?parseInt(e,10):ue.test(t.nodeName)||ce.test(t.nodeName)&&t.href?0:-1}}},propFix:{for:"htmlFor",class:"className"}}),h.optSelected||(m.propHooks.selected={get:function(t){var e=t.parentNode;return e&&e.parentNode&&e.parentNode.selectedIndex,null},set:function(t){var e=t.parentNode;e&&(e.selectedIndex,e.parentNode&&e.parentNode.selectedIndex)}}),m.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){m.propFix[this.toLowerCase()]=this}),m.fn.extend({addClass:function(t){var e,n,i,o,r,s,a,l=0;if(m.isFunction(t))return this.each(function(e){m(this).addClass(t.call(this,e,pe(this)))});if("string"==typeof t&&t)for(e=t.match(q)||[];n=this[l++];)if(o=pe(n),i=1===n.nodeType&&" "+fe(o)+" "){for(s=0;r=e[s++];)i.indexOf(" "+r+" ")<0&&(i+=r+" ");o!==(a=fe(i))&&n.setAttribute("class",a)}return this},removeClass:function(t){var e,n,i,o,r,s,a,l=0;if(m.isFunction(t))return this.each(function(e){m(this).removeClass(t.call(this,e,pe(this)))});if(!arguments.length)return this.attr("class","");if("string"==typeof t&&t)for(e=t.match(q)||[];n=this[l++];)if(o=pe(n),i=1===n.nodeType&&" "+fe(o)+" "){for(s=0;r=e[s++];)for(;i.indexOf(" "+r+" ")>-1;)i=i.replace(" "+r+" "," ");o!==(a=fe(i))&&n.setAttribute("class",a)}return this},toggleClass:function(t,e){var n=typeof t;return"boolean"==typeof e&&"string"===n?e?this.addClass(t):this.removeClass(t):m.isFunction(t)?this.each(function(n){m(this).toggleClass(t.call(this,n,pe(this),e),e)}):this.each(function(){var e,i,o,r;if("string"===n)for(i=0,o=m(this),r=t.match(q)||[];e=r[i++];)o.hasClass(e)?o.removeClass(e):o.addClass(e);else void 0!==t&&"boolean"!==n||(e=pe(this),e&&V.set(this,"__className__",e),this.setAttribute&&this.setAttribute("class",e||!1===t?"":V.get(this,"__className__")||""))})},hasClass:function(t){var e,n,i=0;for(e=" "+t+" ";n=this[i++];)if(1===n.nodeType&&(" "+fe(pe(n))+" ").indexOf(e)>-1)return!0;return!1}});var de=/\r/g;m.fn.extend({val:function(t){var e,n,i,o=this[0];return arguments.length?(i=m.isFunction(t),this.each(function(n){var o;1===this.nodeType&&(null==(o=i?t.call(this,n,m(this).val()):t)?o="":"number"==typeof o?o+="":Array.isArray(o)&&(o=m.map(o,function(t){return null==t?"":t+""})),(e=m.valHooks[this.type]||m.valHooks[this.nodeName.toLowerCase()])&&"set"in e&&void 0!==e.set(this,o,"value")||(this.value=o))})):o?(e=m.valHooks[o.type]||m.valHooks[o.nodeName.toLowerCase()])&&"get"in e&&void 0!==(n=e.get(o,"value"))?n:"string"==typeof(n=o.value)?n.replace(de,""):null==n?"":n:void 0}}),m.extend({valHooks:{option:{get:function(t){var e=m.find.attr(t,"value");return null!=e?e:fe(m.text(t))}},select:{get:function(t){var e,n,i,o=t.options,r=t.selectedIndex,s="select-one"===t.type,a=s?null:[],l=s?r+1:o.length;for(i=r<0?l:s?r:0;i<l;i++)if(n=o[i],(n.selected||i===r)&&!n.disabled&&(!n.parentNode.disabled||!k(n.parentNode,"optgroup"))){if(e=m(n).val(),s)return e;a.push(e)}return a},set:function(t,e){for(var n,i,o=t.options,r=m.makeArray(e),s=o.length;s--;)i=o[s],(i.selected=m.inArray(m.valHooks.option.get(i),r)>-1)&&(n=!0);return n||(t.selectedIndex=-1),r}}}}),m.each(["radio","checkbox"],function(){m.valHooks[this]={set:function(t,e){if(Array.isArray(e))return t.checked=m.inArray(m(t).val(),e)>-1}},h.checkOn||(m.valHooks[this].get=function(t){return null===t.getAttribute("value")?"on":t.value})});var he=/^(?:focusinfocus|focusoutblur)$/;m.extend(m.event,{trigger:function(e,n,o,r){var s,a,l,u,c,p,d,h=[o||i],g=f.call(e,"type")?e.type:e,v=f.call(e,"namespace")?e.namespace.split("."):[];if(a=l=o=o||i,3!==o.nodeType&&8!==o.nodeType&&!he.test(g+m.event.triggered)&&(g.indexOf(".")>-1&&(g=(v=g.split(".")).shift(),v.sort()),c=g.indexOf(":")<0&&"on"+g,(e=e[m.expando]?e:new m.Event(g,"object"==typeof e&&e)).isTrigger=r?2:3,e.namespace=v.join("."),e.rnamespace=e.namespace?new RegExp("(^|\\.)"+v.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,e.result=void 0,e.target||(e.target=o),n=null==n?[e]:m.makeArray(n,[e]),d=m.event.special[g]||{},r||!d.trigger||!1!==d.trigger.apply(o,n))){if(!r&&!d.noBubble&&!m.isWindow(o)){for(u=d.delegateType||g,he.test(u+g)||(a=a.parentNode);a;a=a.parentNode)h.push(a),l=a;l===(o.ownerDocument||i)&&h.push(l.defaultView||l.parentWindow||t)}for(s=0;(a=h[s++])&&!e.isPropagationStopped();)e.type=s>1?u:d.bindType||g,p=(V.get(a,"events")||{})[e.type]&&V.get(a,"handle"),p&&p.apply(a,n),p=c&&a[c],p&&p.apply&&_(a)&&(e.result=p.apply(a,n),!1===e.result&&e.preventDefault());return e.type=g,r||e.isDefaultPrevented()||d._default&&!1!==d._default.apply(h.pop(),n)||!_(o)||c&&m.isFunction(o[g])&&!m.isWindow(o)&&((l=o[c])&&(o[c]=null),m.event.triggered=g,o[g](),m.event.triggered=void 0,l&&(o[c]=l)),e.result}},simulate:function(t,e,n){var i=m.extend(new m.Event,n,{type:t,isSimulated:!0});m.event.trigger(i,null,e)}}),m.fn.extend({trigger:function(t,e){return this.each(function(){m.event.trigger(t,e,this)})},triggerHandler:function(t,e){var n=this[0];if(n)return m.event.trigger(t,e,n,!0)}}),m.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "),function(t,e){m.fn[e]=function(t,n){return arguments.length>0?this.on(e,null,t,n):this.trigger(e)}}),m.fn.extend({hover:function(t,e){return this.mouseenter(t).mouseleave(e||t)}}),h.focusin="onfocusin"in t,h.focusin||m.each({focus:"focusin",blur:"focusout"},function(t,e){var n=function(t){m.event.simulate(e,t.target,m.event.fix(t))};m.event.special[e]={setup:function(){var i=this.ownerDocument||this,o=V.access(i,e);o||i.addEventListener(t,n,!0),V.access(i,e,(o||0)+1)},teardown:function(){var i=this.ownerDocument||this,o=V.access(i,e)-1;o?V.access(i,e,o):(i.removeEventListener(t,n,!0),V.remove(i,e))}}});var ge=t.location,ve=m.now(),me=/\?/;m.parseXML=function(e){var n;if(!e||"string"!=typeof e)return null;try{n=(new t.DOMParser).parseFromString(e,"text/xml")}catch(t){n=void 0}return n&&!n.getElementsByTagName("parsererror").length||m.error("Invalid XML: "+e),n};var ye=/\[\]$/,be=/\r?\n/g,xe=/^(?:submit|button|image|reset|file)$/i,we=/^(?:input|select|textarea|keygen)/i;function Te(t,e,n,i){var o;if(Array.isArray(e))m.each(e,function(e,o){n||ye.test(t)?i(t,o):Te(t+"["+("object"==typeof o&&null!=o?e:"")+"]",o,n,i)});else if(n||"object"!==m.type(e))i(t,e);else for(o in e)Te(t+"["+o+"]",e[o],n,i)}m.param=function(t,e){var n,i=[],o=function(t,e){var n=m.isFunction(e)?e():e;i[i.length]=encodeURIComponent(t)+"="+encodeURIComponent(null==n?"":n)};if(Array.isArray(t)||t.jquery&&!m.isPlainObject(t))m.each(t,function(){o(this.name,this.value)});else for(n in t)Te(n,t[n],e,o);return i.join("&")},m.fn.extend({serialize:function(){return m.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var t=m.prop(this,"elements");return t?m.makeArray(t):this}).filter(function(){var t=this.type;return this.name&&!m(this).is(":disabled")&&we.test(this.nodeName)&&!xe.test(t)&&(this.checked||!rt.test(t))}).map(function(t,e){var n=m(this).val();return null==n?null:Array.isArray(n)?m.map(n,function(t){return{name:e.name,value:t.replace(be,"\r\n")}}):{name:e.name,value:n.replace(be,"\r\n")}}).get()}});var Ce=/%20/g,Ee=/#.*$/,Se=/([?&])_=[^&]*/,$e=/^(.*?):[ \t]*([^\r\n]*)$/gm,ke=/^(?:GET|HEAD)$/,De=/^\/\//,Ne={},Ae={},je="*/".concat("*"),Oe=i.createElement("a");function Ie(t){return function(e,n){"string"!=typeof e&&(n=e,e="*");var i,o=0,r=e.toLowerCase().match(q)||[];if(m.isFunction(n))for(;i=r[o++];)"+"===i[0]?(i=i.slice(1)||"*",(t[i]=t[i]||[]).unshift(n)):(t[i]=t[i]||[]).push(n)}}function Le(t,e,n,i){var o={},r=t===Ae;function s(a){var l;return o[a]=!0,m.each(t[a]||[],function(t,a){var u=a(e,n,i);return"string"!=typeof u||r||o[u]?r?!(l=u):void 0:(e.dataTypes.unshift(u),s(u),!1)}),l}return s(e.dataTypes[0])||!o["*"]&&s("*")}function Re(t,e){var n,i,o=m.ajaxSettings.flatOptions||{};for(n in e)void 0!==e[n]&&((o[n]?t:i||(i={}))[n]=e[n]);return i&&m.extend(!0,t,i),t}Oe.href=ge.href,m.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:ge.href,type:"GET",isLocal:/^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(ge.protocol),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":je,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/\bxml\b/,html:/\bhtml/,json:/\bjson\b/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":JSON.parse,"text xml":m.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(t,e){return e?Re(Re(t,m.ajaxSettings),e):Re(m.ajaxSettings,t)},ajaxPrefilter:Ie(Ne),ajaxTransport:Ie(Ae),ajax:function(e,n){"object"==typeof e&&(n=e,e=void 0),n=n||{};var o,r,s,a,l,u,c,f,p,d,h=m.ajaxSetup({},n),g=h.context||h,v=h.context&&(g.nodeType||g.jquery)?m(g):m.event,y=m.Deferred(),b=m.Callbacks("once memory"),x=h.statusCode||{},w={},T={},C="canceled",E={readyState:0,getResponseHeader:function(t){var e;if(c){if(!a)for(a={};e=$e.exec(s);)a[e[1].toLowerCase()]=e[2];e=a[t.toLowerCase()]}return null==e?null:e},getAllResponseHeaders:function(){return c?s:null},setRequestHeader:function(t,e){return null==c&&(t=T[t.toLowerCase()]=T[t.toLowerCase()]||t,w[t]=e),this},overrideMimeType:function(t){return null==c&&(h.mimeType=t),this},statusCode:function(t){var e;if(t)if(c)E.always(t[E.status]);else for(e in t)x[e]=[x[e],t[e]];return this},abort:function(t){var e=t||C;return o&&o.abort(e),S(0,e),this}};if(y.promise(E),h.url=((e||h.url||ge.href)+"").replace(De,ge.protocol+"//"),h.type=n.method||n.type||h.method||h.type,h.dataTypes=(h.dataType||"*").toLowerCase().match(q)||[""],null==h.crossDomain){u=i.createElement("a");try{u.href=h.url,u.href=u.href,h.crossDomain=Oe.protocol+"//"+Oe.host!=u.protocol+"//"+u.host}catch(t){h.crossDomain=!0}}if(h.data&&h.processData&&"string"!=typeof h.data&&(h.data=m.param(h.data,h.traditional)),Le(Ne,h,n,E),c)return E;(f=m.event&&h.global)&&0==m.active++&&m.event.trigger("ajaxStart"),h.type=h.type.toUpperCase(),h.hasContent=!ke.test(h.type),r=h.url.replace(Ee,""),h.hasContent?h.data&&h.processData&&0===(h.contentType||"").indexOf("application/x-www-form-urlencoded")&&(h.data=h.data.replace(Ce,"+")):(d=h.url.slice(r.length),h.data&&(r+=(me.test(r)?"&":"?")+h.data,delete h.data),!1===h.cache&&(r=r.replace(Se,"$1"),d=(me.test(r)?"&":"?")+"_="+ve+++d),h.url=r+d),h.ifModified&&(m.lastModified[r]&&E.setRequestHeader("If-Modified-Since",m.lastModified[r]),m.etag[r]&&E.setRequestHeader("If-None-Match",m.etag[r])),(h.data&&h.hasContent&&!1!==h.contentType||n.contentType)&&E.setRequestHeader("Content-Type",h.contentType),E.setRequestHeader("Accept",h.dataTypes[0]&&h.accepts[h.dataTypes[0]]?h.accepts[h.dataTypes[0]]+("*"!==h.dataTypes[0]?", "+je+"; q=0.01":""):h.accepts["*"]);for(p in h.headers)E.setRequestHeader(p,h.headers[p]);if(h.beforeSend&&(!1===h.beforeSend.call(g,E,h)||c))return E.abort();if(C="abort",b.add(h.complete),E.done(h.success),E.fail(h.error),o=Le(Ae,h,n,E)){if(E.readyState=1,f&&v.trigger("ajaxSend",[E,h]),c)return E;h.async&&h.timeout>0&&(l=t.setTimeout(function(){E.abort("timeout")},h.timeout));try{c=!1,o.send(w,S)}catch(t){if(c)throw t;S(-1,t)}}else S(-1,"No Transport");function S(e,n,i,a){var u,p,d,w,T,C=n;c||(c=!0,l&&t.clearTimeout(l),o=void 0,s=a||"",E.readyState=e>0?4:0,u=e>=200&&e<300||304===e,i&&(w=function(t,e,n){for(var i,o,r,s,a=t.contents,l=t.dataTypes;"*"===l[0];)l.shift(),void 0===i&&(i=t.mimeType||e.getResponseHeader("Content-Type"));if(i)for(o in a)if(a[o]&&a[o].test(i)){l.unshift(o);break}if(l[0]in n)r=l[0];else{for(o in n){if(!l[0]||t.converters[o+" "+l[0]]){r=o;break}s||(s=o)}r=r||s}if(r)return r!==l[0]&&l.unshift(r),n[r]}(h,E,i)),w=function(t,e,n,i){var o,r,s,a,l,u={},c=t.dataTypes.slice();if(c[1])for(s in t.converters)u[s.toLowerCase()]=t.converters[s];for(r=c.shift();r;)if(t.responseFields[r]&&(n[t.responseFields[r]]=e),!l&&i&&t.dataFilter&&(e=t.dataFilter(e,t.dataType)),l=r,r=c.shift())if("*"===r)r=l;else if("*"!==l&&l!==r){if(!(s=u[l+" "+r]||u["* "+r]))for(o in u)if(a=o.split(" "),a[1]===r&&(s=u[l+" "+a[0]]||u["* "+a[0]])){!0===s?s=u[o]:!0!==u[o]&&(r=a[0],c.unshift(a[1]));break}if(!0!==s)if(s&&t.throws)e=s(e);else try{e=s(e)}catch(t){return{state:"parsererror",error:s?t:"No conversion from "+l+" to "+r}}}return{state:"success",data:e}}(h,w,E,u),u?(h.ifModified&&((T=E.getResponseHeader("Last-Modified"))&&(m.lastModified[r]=T),(T=E.getResponseHeader("etag"))&&(m.etag[r]=T)),204===e||"HEAD"===h.type?C="nocontent":304===e?C="notmodified":(C=w.state,p=w.data,u=!(d=w.error))):(d=C,!e&&C||(C="error",e<0&&(e=0))),E.status=e,E.statusText=(n||C)+"",u?y.resolveWith(g,[p,C,E]):y.rejectWith(g,[E,C,d]),E.statusCode(x),x=void 0,f&&v.trigger(u?"ajaxSuccess":"ajaxError",[E,h,u?p:d]),b.fireWith(g,[E,C]),f&&(v.trigger("ajaxComplete",[E,h]),--m.active||m.event.trigger("ajaxStop")))}return E},getJSON:function(t,e,n){return m.get(t,e,n,"json")},getScript:function(t,e){return m.get(t,void 0,e,"script")}}),m.each(["get","post"],function(t,e){m[e]=function(t,n,i,o){return m.isFunction(n)&&(o=o||i,i=n,n=void 0),m.ajax(m.extend({url:t,type:e,dataType:o,data:n,success:i},m.isPlainObject(t)&&t))}}),m._evalUrl=function(t){return m.ajax({url:t,type:"GET",dataType:"script",cache:!0,async:!1,global:!1,throws:!0})},m.fn.extend({wrapAll:function(t){var e;return this[0]&&(m.isFunction(t)&&(t=t.call(this[0])),e=m(t,this[0].ownerDocument).eq(0).clone(!0),this[0].parentNode&&e.insertBefore(this[0]),e.map(function(){for(var t=this;t.firstElementChild;)t=t.firstElementChild;return t}).append(this)),this},wrapInner:function(t){return m.isFunction(t)?this.each(function(e){m(this).wrapInner(t.call(this,e))}):this.each(function(){var e=m(this),n=e.contents();n.length?n.wrapAll(t):e.append(t)})},wrap:function(t){var e=m.isFunction(t);return this.each(function(n){m(this).wrapAll(e?t.call(this,n):t)})},unwrap:function(t){return this.parent(t).not("body").each(function(){m(this).replaceWith(this.childNodes)}),this}}),m.expr.pseudos.hidden=function(t){return!m.expr.pseudos.visible(t)},m.expr.pseudos.visible=function(t){return!!(t.offsetWidth||t.offsetHeight||t.getClientRects().length)},m.ajaxSettings.xhr=function(){try{return new t.XMLHttpRequest}catch(t){}};var qe={0:200,1223:204},Pe=m.ajaxSettings.xhr();h.cors=!!Pe&&"withCredentials"in Pe,h.ajax=Pe=!!Pe,m.ajaxTransport(function(e){var n,i;if(h.cors||Pe&&!e.crossDomain)return{send:function(o,r){var s,a=e.xhr();if(a.open(e.type,e.url,e.async,e.username,e.password),e.xhrFields)for(s in e.xhrFields)a[s]=e.xhrFields[s];e.mimeType&&a.overrideMimeType&&a.overrideMimeType(e.mimeType),e.crossDomain||o["X-Requested-With"]||(o["X-Requested-With"]="XMLHttpRequest");for(s in o)a.setRequestHeader(s,o[s]);n=function(t){return function(){n&&(n=i=a.onload=a.onerror=a.onabort=a.onreadystatechange=null,"abort"===t?a.abort():"error"===t?"number"!=typeof a.status?r(0,"error"):r(a.status,a.statusText):r(qe[a.status]||a.status,a.statusText,"text"!==(a.responseType||"text")||"string"!=typeof a.responseText?{binary:a.response}:{text:a.responseText},a.getAllResponseHeaders()))}},a.onload=n(),i=a.onerror=n("error"),void 0!==a.onabort?a.onabort=i:a.onreadystatechange=function(){4===a.readyState&&t.setTimeout(function(){n&&i()})},n=n("abort");try{a.send(e.hasContent&&e.data||null)}catch(t){if(n)throw t}},abort:function(){n&&n()}}}),m.ajaxPrefilter(function(t){t.crossDomain&&(t.contents.script=!1)}),m.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/\b(?:java|ecma)script\b/},converters:{"text script":function(t){return m.globalEval(t),t}}}),m.ajaxPrefilter("script",function(t){void 0===t.cache&&(t.cache=!1),t.crossDomain&&(t.type="GET")}),m.ajaxTransport("script",function(t){var e,n;if(t.crossDomain)return{send:function(o,r){e=m("<script>").prop({charset:t.scriptCharset,src:t.url}).on("load error",n=function(t){e.remove(),n=null,t&&r("error"===t.type?404:200,t.type)}),i.head.appendChild(e[0])},abort:function(){n&&n()}}});var He,Fe=[],We=/(=)\?(?=&|$)|\?\?/;m.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var t=Fe.pop()||m.expando+"_"+ve++;return this[t]=!0,t}}),m.ajaxPrefilter("json jsonp",function(e,n,i){var o,r,s,a=!1!==e.jsonp&&(We.test(e.url)?"url":"string"==typeof e.data&&0===(e.contentType||"").indexOf("application/x-www-form-urlencoded")&&We.test(e.data)&&"data");if(a||"jsonp"===e.dataTypes[0])return o=e.jsonpCallback=m.isFunction(e.jsonpCallback)?e.jsonpCallback():e.jsonpCallback,a?e[a]=e[a].replace(We,"$1"+o):!1!==e.jsonp&&(e.url+=(me.test(e.url)?"&":"?")+e.jsonp+"="+o),e.converters["script json"]=function(){return s||m.error(o+" was not called"),s[0]},e.dataTypes[0]="json",r=t[o],t[o]=function(){s=arguments},i.always(function(){void 0===r?m(t).removeProp(o):t[o]=r,e[o]&&(e.jsonpCallback=n.jsonpCallback,Fe.push(o)),s&&m.isFunction(r)&&r(s[0]),s=r=void 0}),"script"}),h.createHTMLDocument=((He=i.implementation.createHTMLDocument("").body).innerHTML="<form></form><form></form>",2===He.childNodes.length),m.parseHTML=function(t,e,n){return"string"!=typeof t?[]:("boolean"==typeof e&&(n=e,e=!1),e||(h.createHTMLDocument?((o=(e=i.implementation.createHTMLDocument("")).createElement("base")).href=i.location.href,e.head.appendChild(o)):e=i),r=D.exec(t),s=!n&&[],r?[e.createElement(r[1])]:(r=ht([t],e,s),s&&s.length&&m(s).remove(),m.merge([],r.childNodes)));var o,r,s},m.fn.load=function(t,e,n){var i,o,r,s=this,a=t.indexOf(" ");return a>-1&&(i=fe(t.slice(a)),t=t.slice(0,a)),m.isFunction(e)?(n=e,e=void 0):e&&"object"==typeof e&&(o="POST"),s.length>0&&m.ajax({url:t,type:o||"GET",dataType:"html",data:e}).done(function(t){r=arguments,s.html(i?m("<div>").append(m.parseHTML(t)).find(i):t)}).always(n&&function(t,e){s.each(function(){n.apply(this,r||[t.responseText,e,t])})}),this},m.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(t,e){m.fn[e]=function(t){return this.on(e,t)}}),m.expr.pseudos.animated=function(t){return m.grep(m.timers,function(e){return t===e.elem}).length},m.offset={setOffset:function(t,e,n){var i,o,r,s,a,l,u=m.css(t,"position"),c=m(t),f={};"static"===u&&(t.style.position="relative"),a=c.offset(),r=m.css(t,"top"),l=m.css(t,"left"),("absolute"===u||"fixed"===u)&&(r+l).indexOf("auto")>-1?(s=(i=c.position()).top,o=i.left):(s=parseFloat(r)||0,o=parseFloat(l)||0),m.isFunction(e)&&(e=e.call(t,n,m.extend({},a))),null!=e.top&&(f.top=e.top-a.top+s),null!=e.left&&(f.left=e.left-a.left+o),"using"in e?e.using.call(t,f):c.css(f)}},m.fn.extend({offset:function(t){if(arguments.length)return void 0===t?this:this.each(function(e){m.offset.setOffset(this,t,e)});var e,n,i,o,r=this[0];return r?r.getClientRects().length?(i=r.getBoundingClientRect(),n=(e=r.ownerDocument).documentElement,o=e.defaultView,{top:i.top+o.pageYOffset-n.clientTop,left:i.left+o.pageXOffset-n.clientLeft}):{top:0,left:0}:void 0},position:function(){if(this[0]){var t,e,n=this[0],i={top:0,left:0};return"fixed"===m.css(n,"position")?e=n.getBoundingClientRect():(t=this.offsetParent(),e=this.offset(),k(t[0],"html")||(i=t.offset()),i={top:i.top+m.css(t[0],"borderTopWidth",!0),left:i.left+m.css(t[0],"borderLeftWidth",!0)}),{top:e.top-i.top-m.css(n,"marginTop",!0),left:e.left-i.left-m.css(n,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){for(var t=this.offsetParent;t&&"static"===m.css(t,"position");)t=t.offsetParent;return t||gt})}}),m.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(t,e){var n="pageYOffset"===e;m.fn[t]=function(i){return U(this,function(t,i,o){var r;return m.isWindow(t)?r=t:9===t.nodeType&&(r=t.defaultView),void 0===o?r?r[e]:t[i]:void(r?r.scrollTo(n?r.pageXOffset:o,n?o:r.pageYOffset):t[i]=o)},t,i,arguments.length)}}),m.each(["top","left"],function(t,e){m.cssHooks[e]=Ht(h.pixelPosition,function(t,n){if(n)return n=Pt(t,e),Rt.test(n)?m(t).position()[e]+"px":n})}),m.each({Height:"height",Width:"width"},function(t,e){m.each({padding:"inner"+t,content:e,"":"outer"+t},function(n,i){m.fn[i]=function(o,r){var s=arguments.length&&(n||"boolean"!=typeof o),a=n||(!0===o||!0===r?"margin":"border");return U(this,function(e,n,o){var r;return m.isWindow(e)?0===i.indexOf("outer")?e["inner"+t]:e.document.documentElement["client"+t]:9===e.nodeType?(r=e.documentElement,Math.max(e.body["scroll"+t],r["scroll"+t],e.body["offset"+t],r["offset"+t],r["client"+t])):void 0===o?m.css(e,n,a):m.style(e,n,o,a)},e,s?o:void 0,s)}})}),m.fn.extend({bind:function(t,e,n){return this.on(t,null,e,n)},unbind:function(t,e){return this.off(t,null,e)},delegate:function(t,e,n,i){return this.on(e,t,n,i)},undelegate:function(t,e,n){return 1===arguments.length?this.off(t,"**"):this.off(e,t||"**",n)}}),m.holdReady=function(t){t?m.readyWait++:m.ready(!0)},m.isArray=Array.isArray,m.parseJSON=JSON.parse,m.nodeName=k,"function"==typeof define&&define.amd&&define("jquery",[],function(){return m});var Me=t.jQuery,Be=t.$;return m.noConflict=function(e){return t.$===m&&(t.$=Be),e&&t.jQuery===m&&(t.jQuery=Me),m},e||(t.jQuery=t.$=m),m}),"undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");!function(t){"use strict";var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1==e[0]&&9==e[1]&&e[2]<1||e[0]>3)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")}(jQuery),function(t){"use strict";t.fn.emulateTransitionEnd=function(e){var n=!1,i=this;t(this).one("bsTransitionEnd",function(){n=!0});return setTimeout(function(){n||t(i).trigger(t.support.transition.end)},e),this},t(function(){t.support.transition=function(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var n in e)if(void 0!==t.style[n])return{end:e[n]};return!1}(),t.support.transition&&(t.event.special.bsTransitionEnd={bindType:t.support.transition.end,delegateType:t.support.transition.end,handle:function(e){if(t(e.target).is(this))return e.handleObj.handler.apply(this,arguments)}})})}(jQuery),function(t){"use strict";var e='[data-dismiss="alert"]',n=function(n){t(n).on("click",e,this.close)};n.VERSION="3.3.7",n.TRANSITION_DURATION=150,n.prototype.close=function(e){function i(){s.detach().trigger("closed.bs.alert").remove()}var o=t(this),r=o.attr("data-target");r||(r=(r=o.attr("href"))&&r.replace(/.*(?=#[^\s]*$)/,""));var s=t("#"===r?[]:r);e&&e.preventDefault(),s.length||(s=o.closest(".alert")),s.trigger(e=t.Event("close.bs.alert")),e.isDefaultPrevented()||(s.removeClass("in"),t.support.transition&&s.hasClass("fade")?s.one("bsTransitionEnd",i).emulateTransitionEnd(n.TRANSITION_DURATION):i())};var i=t.fn.alert;t.fn.alert=function(e){return this.each(function(){var i=t(this),o=i.data("bs.alert");o||i.data("bs.alert",o=new n(this)),"string"==typeof e&&o[e].call(i)})},t.fn.alert.Constructor=n,t.fn.alert.noConflict=function(){return t.fn.alert=i,this},t(document).on("click.bs.alert.data-api",e,n.prototype.close)}(jQuery),function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.button"),r="object"==typeof e&&e;o||i.data("bs.button",o=new n(this,r)),"toggle"==e?o.toggle():e&&o.setState(e)})}var n=function(e,i){this.$element=t(e),this.options=t.extend({},n.DEFAULTS,i),this.isLoading=!1};n.VERSION="3.3.7",n.DEFAULTS={loadingText:"loading..."},n.prototype.setState=function(e){var n="disabled",i=this.$element,o=i.is("input")?"val":"html",r=i.data();e+="Text",null==r.resetText&&i.data("resetText",i[o]()),setTimeout(t.proxy(function(){i[o](null==r[e]?this.options[e]:r[e]),"loadingText"==e?(this.isLoading=!0,i.addClass(n).attr(n,n).prop(n,!0)):this.isLoading&&(this.isLoading=!1,i.removeClass(n).removeAttr(n).prop(n,!1))},this),0)},n.prototype.toggle=function(){var t=!0,e=this.$element.closest('[data-toggle="buttons"]');if(e.length){var n=this.$element.find("input");"radio"==n.prop("type")?(n.prop("checked")&&(t=!1),e.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==n.prop("type")&&(n.prop("checked")!==this.$element.hasClass("active")&&(t=!1),this.$element.toggleClass("active")),n.prop("checked",this.$element.hasClass("active")),t&&n.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var i=t.fn.button;t.fn.button=e,t.fn.button.Constructor=n,t.fn.button.noConflict=function(){return t.fn.button=i,this},t(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(n){var i=t(n.target).closest(".btn");e.call(i,"toggle"),t(n.target).is('input[type="radio"], input[type="checkbox"]')||(n.preventDefault(),i.is("input,button")?i.trigger("focus"):i.find("input:visible,button:visible").first().trigger("focus"))}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(e){t(e.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(e.type))})}(jQuery),function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.carousel"),r=t.extend({},n.DEFAULTS,i.data(),"object"==typeof e&&e),s="string"==typeof e?e:r.slide;o||i.data("bs.carousel",o=new n(this,r)),"number"==typeof e?o.to(e):s?o[s]():r.interval&&o.pause().cycle()})}var n=function(e,n){this.$element=t(e),this.$indicators=this.$element.find(".carousel-indicators"),this.options=n,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",t.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",t.proxy(this.pause,this)).on("mouseleave.bs.carousel",t.proxy(this.cycle,this))};n.VERSION="3.3.7",n.TRANSITION_DURATION=600,n.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},n.prototype.keydown=function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.prev();break;case 39:this.next();break;default:return}t.preventDefault()}},n.prototype.cycle=function(e){return e||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(t.proxy(this.next,this),this.options.interval)),this},n.prototype.getItemIndex=function(t){return this.$items=t.parent().children(".item"),this.$items.index(t||this.$active)},n.prototype.getItemForDirection=function(t,e){var n=this.getItemIndex(e);if(("prev"==t&&0===n||"next"==t&&n==this.$items.length-1)&&!this.options.wrap)return e;var i=(n+("prev"==t?-1:1))%this.$items.length;return this.$items.eq(i)},n.prototype.to=function(t){var e=this,n=this.getItemIndex(this.$active=this.$element.find(".item.active"));if(!(t>this.$items.length-1||t<0))return this.sliding?this.$element.one("slid.bs.carousel",function(){e.to(t)}):n==t?this.pause().cycle():this.slide(t>n?"next":"prev",this.$items.eq(t))},n.prototype.pause=function(e){return e||(this.paused=!0),this.$element.find(".next, .prev").length&&t.support.transition&&(this.$element.trigger(t.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},n.prototype.next=function(){if(!this.sliding)return this.slide("next")},n.prototype.prev=function(){if(!this.sliding)return this.slide("prev")},n.prototype.slide=function(e,i){var o=this.$element.find(".item.active"),r=i||this.getItemForDirection(e,o),s=this.interval,a="next"==e?"left":"right",l=this;if(r.hasClass("active"))return this.sliding=!1;var u=r[0],c=t.Event("slide.bs.carousel",{relatedTarget:u,direction:a});if(this.$element.trigger(c),!c.isDefaultPrevented()){if(this.sliding=!0,s&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var f=t(this.$indicators.children()[this.getItemIndex(r)]);f&&f.addClass("active")}var p=t.Event("slid.bs.carousel",{relatedTarget:u,direction:a});return t.support.transition&&this.$element.hasClass("slide")?(r.addClass(e),r[0].offsetWidth,o.addClass(a),r.addClass(a),o.one("bsTransitionEnd",function(){r.removeClass([e,a].join(" ")).addClass("active"),o.removeClass(["active",a].join(" ")),l.sliding=!1,setTimeout(function(){l.$element.trigger(p)},0)}).emulateTransitionEnd(n.TRANSITION_DURATION)):(o.removeClass("active"),r.addClass("active"),this.sliding=!1,this.$element.trigger(p)),s&&this.cycle(),this}};var i=t.fn.carousel;t.fn.carousel=e,t.fn.carousel.Constructor=n,t.fn.carousel.noConflict=function(){return t.fn.carousel=i,this};var o=function(n){var i,o=t(this),r=t(o.attr("data-target")||(i=o.attr("href"))&&i.replace(/.*(?=#[^\s]+$)/,""));if(r.hasClass("carousel")){var s=t.extend({},r.data(),o.data()),a=o.attr("data-slide-to");a&&(s.interval=!1),e.call(r,s),a&&r.data("bs.carousel").to(a),n.preventDefault()}};t(document).on("click.bs.carousel.data-api","[data-slide]",o).on("click.bs.carousel.data-api","[data-slide-to]",o),t(window).on("load",function(){t('[data-ride="carousel"]').each(function(){var n=t(this);e.call(n,n.data())})})}(jQuery),function(t){"use strict";function e(e){var n,i=e.attr("data-target")||(n=e.attr("href"))&&n.replace(/.*(?=#[^\s]+$)/,"");return t(i)}function n(e){return this.each(function(){var n=t(this),o=n.data("bs.collapse"),r=t.extend({},i.DEFAULTS,n.data(),"object"==typeof e&&e);!o&&r.toggle&&/show|hide/.test(e)&&(r.toggle=!1),o||n.data("bs.collapse",o=new i(this,r)),"string"==typeof e&&o[e]()})}var i=function(e,n){this.$element=t(e),this.options=t.extend({},i.DEFAULTS,n),this.$trigger=t('[data-toggle="collapse"][href="#'+e.id+'"],[data-toggle="collapse"][data-target="#'+e.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};i.VERSION="3.3.7",i.TRANSITION_DURATION=350,i.DEFAULTS={toggle:!0},i.prototype.dimension=function(){return this.$element.hasClass("width")?"width":"height"},i.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var e,o=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(o&&o.length&&(e=o.data("bs.collapse"),e&&e.transitioning))){var r=t.Event("show.bs.collapse");if(this.$element.trigger(r),!r.isDefaultPrevented()){o&&o.length&&(n.call(o,"hide"),e||o.data("bs.collapse",null));var s=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[s](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var a=function(){this.$element.removeClass("collapsing").addClass("collapse in")[s](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!t.support.transition)return a.call(this);var l=t.camelCase(["scroll",s].join("-"));this.$element.one("bsTransitionEnd",t.proxy(a,this)).emulateTransitionEnd(i.TRANSITION_DURATION)[s](this.$element[0][l])}}}},i.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var e=t.Event("hide.bs.collapse");if(this.$element.trigger(e),!e.isDefaultPrevented()){var n=this.dimension();this.$element[n](this.$element[n]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var o=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return t.support.transition?void this.$element[n](0).one("bsTransitionEnd",t.proxy(o,this)).emulateTransitionEnd(i.TRANSITION_DURATION):o.call(this)}}},i.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},i.prototype.getParent=function(){return t(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(t.proxy(function(n,i){var o=t(i);this.addAriaAndCollapsedClass(e(o),o)},this)).end()},i.prototype.addAriaAndCollapsedClass=function(t,e){var n=t.hasClass("in");t.attr("aria-expanded",n),e.toggleClass("collapsed",!n).attr("aria-expanded",n)};var o=t.fn.collapse;t.fn.collapse=n,t.fn.collapse.Constructor=i,t.fn.collapse.noConflict=function(){return t.fn.collapse=o,this},t(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(i){var o=t(this);o.attr("data-target")||i.preventDefault();var r=e(o),s=r.data("bs.collapse")?"toggle":o.data();n.call(r,s)})}(jQuery),function(t){"use strict";function e(e){var n=e.attr("data-target");n||(n=(n=e.attr("href"))&&/#[A-Za-z]/.test(n)&&n.replace(/.*(?=#[^\s]*$)/,""));var i=n&&t(n);return i&&i.length?i:e.parent()}function n(n){n&&3===n.which||(t(i).remove(),t(o).each(function(){var i=t(this),o=e(i),r={relatedTarget:this};o.hasClass("open")&&(n&&"click"==n.type&&/input|textarea/i.test(n.target.tagName)&&t.contains(o[0],n.target)||(o.trigger(n=t.Event("hide.bs.dropdown",r)),n.isDefaultPrevented()||(i.attr("aria-expanded","false"),o.removeClass("open").trigger(t.Event("hidden.bs.dropdown",r)))))}))}var i=".dropdown-backdrop",o='[data-toggle="dropdown"]',r=function(e){t(e).on("click.bs.dropdown",this.toggle)};r.VERSION="3.3.7",r.prototype.toggle=function(i){var o=t(this);if(!o.is(".disabled, :disabled")){var r=e(o),s=r.hasClass("open");if(n(),!s){"ontouchstart"in document.documentElement&&!r.closest(".navbar-nav").length&&t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click",n);var a={relatedTarget:this};if(r.trigger(i=t.Event("show.bs.dropdown",a)),i.isDefaultPrevented())return;o.trigger("focus").attr("aria-expanded","true"),r.toggleClass("open").trigger(t.Event("shown.bs.dropdown",a))}return!1}},r.prototype.keydown=function(n){if(/(38|40|27|32)/.test(n.which)&&!/input|textarea/i.test(n.target.tagName)){var i=t(this);if(n.preventDefault(),n.stopPropagation(),!i.is(".disabled, :disabled")){var r=e(i),s=r.hasClass("open");if(!s&&27!=n.which||s&&27==n.which)return 27==n.which&&r.find(o).trigger("focus"),i.trigger("click");var a=r.find(".dropdown-menu li:not(.disabled):visible a");if(a.length){var l=a.index(n.target);38==n.which&&l>0&&l--,40==n.which&&l<a.length-1&&l++,~l||(l=0),a.eq(l).trigger("focus")}}}};var s=t.fn.dropdown;t.fn.dropdown=function(e){return this.each(function(){var n=t(this),i=n.data("bs.dropdown");i||n.data("bs.dropdown",i=new r(this)),"string"==typeof e&&i[e].call(n)})},t.fn.dropdown.Constructor=r,t.fn.dropdown.noConflict=function(){return t.fn.dropdown=s,this},t(document).on("click.bs.dropdown.data-api",n).on("click.bs.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.bs.dropdown.data-api",o,r.prototype.toggle).on("keydown.bs.dropdown.data-api",o,r.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",r.prototype.keydown)}(jQuery),function(t){"use strict";function e(e,i){return this.each(function(){var o=t(this),r=o.data("bs.modal"),s=t.extend({},n.DEFAULTS,o.data(),"object"==typeof e&&e);r||o.data("bs.modal",r=new n(this,s)),"string"==typeof e?r[e](i):s.show&&r.show(i)})}var n=function(e,n){this.options=n,this.$body=t(document.body),this.$element=t(e),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,t.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};n.VERSION="3.3.7",n.TRANSITION_DURATION=300,n.BACKDROP_TRANSITION_DURATION=150,n.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},n.prototype.toggle=function(t){return this.isShown?this.hide():this.show(t)},n.prototype.show=function(e){var i=this,o=t.Event("show.bs.modal",{relatedTarget:e});this.$element.trigger(o),this.isShown||o.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',t.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){i.$element.one("mouseup.dismiss.bs.modal",function(e){t(e.target).is(i.$element)&&(i.ignoreBackdropClick=!0)})}),this.backdrop(function(){var o=t.support.transition&&i.$element.hasClass("fade");i.$element.parent().length||i.$element.appendTo(i.$body),i.$element.show().scrollTop(0),i.adjustDialog(),o&&i.$element[0].offsetWidth,i.$element.addClass("in"),i.enforceFocus();var r=t.Event("shown.bs.modal",{relatedTarget:e});o?i.$dialog.one("bsTransitionEnd",function(){i.$element.trigger("focus").trigger(r)}).emulateTransitionEnd(n.TRANSITION_DURATION):i.$element.trigger("focus").trigger(r)}))},n.prototype.hide=function(e){e&&e.preventDefault(),e=t.Event("hide.bs.modal"),this.$element.trigger(e),this.isShown&&!e.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),t(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),t.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",t.proxy(this.hideModal,this)).emulateTransitionEnd(n.TRANSITION_DURATION):this.hideModal())},n.prototype.enforceFocus=function(){t(document).off("focusin.bs.modal").on("focusin.bs.modal",t.proxy(function(t){document===t.target||this.$element[0]===t.target||this.$element.has(t.target).length||this.$element.trigger("focus")},this))},n.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",t.proxy(function(t){27==t.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},n.prototype.resize=function(){this.isShown?t(window).on("resize.bs.modal",t.proxy(this.handleUpdate,this)):t(window).off("resize.bs.modal")},n.prototype.hideModal=function(){var t=this;this.$element.hide(),this.backdrop(function(){t.$body.removeClass("modal-open"),t.resetAdjustments(),t.resetScrollbar(),t.$element.trigger("hidden.bs.modal")})},n.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},n.prototype.backdrop=function(e){var i=this,o=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var r=t.support.transition&&o;if(this.$backdrop=t(document.createElement("div")).addClass("modal-backdrop "+o).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",t.proxy(function(t){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(t.target===t.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),r&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!e)return;r?this.$backdrop.one("bsTransitionEnd",e).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION):e()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var s=function(){i.removeBackdrop(),e&&e()};t.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",s).emulateTransitionEnd(n.BACKDROP_TRANSITION_DURATION):s()}else e&&e()},n.prototype.handleUpdate=function(){this.adjustDialog()},n.prototype.adjustDialog=function(){var t=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&t?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!t?this.scrollbarWidth:""})},n.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},n.prototype.checkScrollbar=function(){var t=window.innerWidth;if(!t){var e=document.documentElement.getBoundingClientRect();t=e.right-Math.abs(e.left)}this.bodyIsOverflowing=document.body.clientWidth<t,this.scrollbarWidth=this.measureScrollbar()},n.prototype.setScrollbar=function(){var t=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",t+this.scrollbarWidth)},n.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},n.prototype.measureScrollbar=function(){var t=document.createElement("div");t.className="modal-scrollbar-measure",this.$body.append(t);var e=t.offsetWidth-t.clientWidth;return this.$body[0].removeChild(t),e};var i=t.fn.modal;t.fn.modal=e,t.fn.modal.Constructor=n,t.fn.modal.noConflict=function(){return t.fn.modal=i,this},t(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(n){var i=t(this),o=i.attr("href"),r=t(i.attr("data-target")||o&&o.replace(/.*(?=#[^\s]+$)/,"")),s=r.data("bs.modal")?"toggle":t.extend({remote:!/#/.test(o)&&o},r.data(),i.data());i.is("a")&&n.preventDefault(),r.one("show.bs.modal",function(t){t.isDefaultPrevented()||r.one("hidden.bs.modal",function(){i.is(":visible")&&i.trigger("focus")})}),e.call(r,s,this)})}(jQuery),function(t){"use strict";var e=function(t,e){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",t,e)};e.VERSION="3.3.7",e.TRANSITION_DURATION=150,e.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},e.prototype.init=function(e,n,i){if(this.enabled=!0,this.type=e,this.$element=t(n),this.options=this.getOptions(i),this.$viewport=this.options.viewport&&t(t.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var o=this.options.trigger.split(" "),r=o.length;r--;){var s=o[r];if("click"==s)this.$element.on("click."+this.type,this.options.selector,t.proxy(this.toggle,this));else if("manual"!=s){var a="hover"==s?"mouseenter":"focusin",l="hover"==s?"mouseleave":"focusout";this.$element.on(a+"."+this.type,this.options.selector,t.proxy(this.enter,this)),this.$element.on(l+"."+this.type,this.options.selector,t.proxy(this.leave,this))}}this.options.selector?this._options=t.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},e.prototype.getDefaults=function(){return e.DEFAULTS},e.prototype.getOptions=function(e){return(e=t.extend({},this.getDefaults(),this.$element.data(),e)).delay&&"number"==typeof e.delay&&(e.delay={show:e.delay,hide:e.delay}),e},e.prototype.getDelegateOptions=function(){var e={},n=this.getDefaults();return this._options&&t.each(this._options,function(t,i){n[t]!=i&&(e[t]=i)}),e},e.prototype.enter=function(e){var n=e instanceof this.constructor?e:t(e.currentTarget).data("bs."+this.type);return n||(n=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,n)),e instanceof t.Event&&(n.inState["focusin"==e.type?"focus":"hover"]=!0),n.tip().hasClass("in")||"in"==n.hoverState?void(n.hoverState="in"):(clearTimeout(n.timeout),n.hoverState="in",n.options.delay&&n.options.delay.show?void(n.timeout=setTimeout(function(){"in"==n.hoverState&&n.show()},n.options.delay.show)):n.show())},e.prototype.isInStateTrue=function(){for(var t in this.inState)if(this.inState[t])return!0;return!1},e.prototype.leave=function(e){var n=e instanceof this.constructor?e:t(e.currentTarget).data("bs."+this.type);if(n||(n=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,n)),e instanceof t.Event&&(n.inState["focusout"==e.type?"focus":"hover"]=!1),!n.isInStateTrue())return clearTimeout(n.timeout),n.hoverState="out",n.options.delay&&n.options.delay.hide?void(n.timeout=setTimeout(function(){"out"==n.hoverState&&n.hide()},n.options.delay.hide)):n.hide()},e.prototype.show=function(){var n=t.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(n);var i=t.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(n.isDefaultPrevented()||!i)return;var o=this,r=this.tip(),s=this.getUID(this.type);this.setContent(),r.attr("id",s),this.$element.attr("aria-describedby",s),this.options.animation&&r.addClass("fade");var a="function"==typeof this.options.placement?this.options.placement.call(this,r[0],this.$element[0]):this.options.placement,l=/\s?auto?\s?/i,u=l.test(a);u&&(a=a.replace(l,"")||"top"),r.detach().css({top:0,left:0,display:"block"}).addClass(a).data("bs."+this.type,this),this.options.container?r.appendTo(this.options.container):r.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var c=this.getPosition(),f=r[0].offsetWidth,p=r[0].offsetHeight;if(u){var d=a,h=this.getPosition(this.$viewport);a="bottom"==a&&c.bottom+p>h.bottom?"top":"top"==a&&c.top-p<h.top?"bottom":"right"==a&&c.right+f>h.width?"left":"left"==a&&c.left-f<h.left?"right":a,r.removeClass(d).addClass(a)}var g=this.getCalculatedOffset(a,c,f,p);this.applyPlacement(g,a);var v=function(){var t=o.hoverState;o.$element.trigger("shown.bs."+o.type),o.hoverState=null,"out"==t&&o.leave(o)};t.support.transition&&this.$tip.hasClass("fade")?r.one("bsTransitionEnd",v).emulateTransitionEnd(e.TRANSITION_DURATION):v()}},e.prototype.applyPlacement=function(e,n){var i=this.tip(),o=i[0].offsetWidth,r=i[0].offsetHeight,s=parseInt(i.css("margin-top"),10),a=parseInt(i.css("margin-left"),10);isNaN(s)&&(s=0),isNaN(a)&&(a=0),e.top+=s,e.left+=a,t.offset.setOffset(i[0],t.extend({using:function(t){i.css({top:Math.round(t.top),left:Math.round(t.left)})}},e),0),i.addClass("in");var l=i[0].offsetWidth,u=i[0].offsetHeight;"top"==n&&u!=r&&(e.top=e.top+r-u);var c=this.getViewportAdjustedDelta(n,e,l,u);c.left?e.left+=c.left:e.top+=c.top;var f=/top|bottom/.test(n),p=f?2*c.left-o+l:2*c.top-r+u,d=f?"offsetWidth":"offsetHeight";i.offset(e),this.replaceArrow(p,i[0][d],f)},e.prototype.replaceArrow=function(t,e,n){this.arrow().css(n?"left":"top",50*(1-t/e)+"%").css(n?"top":"left","")},e.prototype.setContent=function(){var t=this.tip(),e=this.getTitle();t.find(".tooltip-inner")[this.options.html?"html":"text"](e),t.removeClass("fade in top bottom left right")},e.prototype.hide=function(n){function i(){"in"!=o.hoverState&&r.detach(),o.$element&&o.$element.removeAttr("aria-describedby").trigger("hidden.bs."+o.type),n&&n()}var o=this,r=t(this.$tip),s=t.Event("hide.bs."+this.type);if(this.$element.trigger(s),!s.isDefaultPrevented())return r.removeClass("in"),t.support.transition&&r.hasClass("fade")?r.one("bsTransitionEnd",i).emulateTransitionEnd(e.TRANSITION_DURATION):i(),this.hoverState=null,this},e.prototype.fixTitle=function(){var t=this.$element;(t.attr("title")||"string"!=typeof t.attr("data-original-title"))&&t.attr("data-original-title",t.attr("title")||"").attr("title","")},e.prototype.hasContent=function(){return this.getTitle()},e.prototype.getPosition=function(e){var n=(e=e||this.$element)[0],i="BODY"==n.tagName,o=n.getBoundingClientRect();null==o.width&&(o=t.extend({},o,{width:o.right-o.left,height:o.bottom-o.top}));var r=window.SVGElement&&n instanceof window.SVGElement,s=i?{top:0,left:0}:r?null:e.offset(),a={scroll:i?document.documentElement.scrollTop||document.body.scrollTop:e.scrollTop()},l=i?{width:t(window).width(),height:t(window).height()}:null;return t.extend({},o,a,l,s)},e.prototype.getCalculatedOffset=function(t,e,n,i){return"bottom"==t?{top:e.top+e.height,left:e.left+e.width/2-n/2}:"top"==t?{top:e.top-i,left:e.left+e.width/2-n/2}:"left"==t?{top:e.top+e.height/2-i/2,left:e.left-n}:{top:e.top+e.height/2-i/2,left:e.left+e.width}},e.prototype.getViewportAdjustedDelta=function(t,e,n,i){var o={top:0,left:0};if(!this.$viewport)return o;var r=this.options.viewport&&this.options.viewport.padding||0,s=this.getPosition(this.$viewport);if(/right|left/.test(t)){var a=e.top-r-s.scroll,l=e.top+r-s.scroll+i;a<s.top?o.top=s.top-a:l>s.top+s.height&&(o.top=s.top+s.height-l)}else{var u=e.left-r,c=e.left+r+n;u<s.left?o.left=s.left-u:c>s.right&&(o.left=s.left+s.width-c)}return o},e.prototype.getTitle=function(){var t=this.$element,e=this.options;return t.attr("data-original-title")||("function"==typeof e.title?e.title.call(t[0]):e.title)},e.prototype.getUID=function(t){do{t+=~~(1e6*Math.random())}while(document.getElementById(t));return t},e.prototype.tip=function(){if(!this.$tip&&(this.$tip=t(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},e.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},e.prototype.enable=function(){this.enabled=!0},e.prototype.disable=function(){this.enabled=!1},e.prototype.toggleEnabled=function(){this.enabled=!this.enabled},e.prototype.toggle=function(e){var n=this;e&&((n=t(e.currentTarget).data("bs."+this.type))||(n=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,n))),e?(n.inState.click=!n.inState.click,n.isInStateTrue()?n.enter(n):n.leave(n)):n.tip().hasClass("in")?n.leave(n):n.enter(n)},e.prototype.destroy=function(){var t=this;clearTimeout(this.timeout),this.hide(function(){t.$element.off("."+t.type).removeData("bs."+t.type),t.$tip&&t.$tip.detach(),t.$tip=null,t.$arrow=null,t.$viewport=null,t.$element=null})};var n=t.fn.tooltip;t.fn.tooltip=function(n){return this.each(function(){var i=t(this),o=i.data("bs.tooltip"),r="object"==typeof n&&n;!o&&/destroy|hide/.test(n)||(o||i.data("bs.tooltip",o=new e(this,r)),"string"==typeof n&&o[n]())})},t.fn.tooltip.Constructor=e,t.fn.tooltip.noConflict=function(){return t.fn.tooltip=n,this}}(jQuery),function(t){"use strict";var e=function(t,e){this.init("popover",t,e)};if(!t.fn.tooltip)throw new Error("Popover requires tooltip.js");e.VERSION="3.3.7",e.DEFAULTS=t.extend({},t.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),e.prototype=t.extend({},t.fn.tooltip.Constructor.prototype),e.prototype.constructor=e,e.prototype.getDefaults=function(){return e.DEFAULTS},e.prototype.setContent=function(){var t=this.tip(),e=this.getTitle(),n=this.getContent();t.find(".popover-title")[this.options.html?"html":"text"](e),t.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof n?"html":"append":"text"](n),t.removeClass("fade top bottom left right in"),t.find(".popover-title").html()||t.find(".popover-title").hide()},e.prototype.hasContent=function(){return this.getTitle()||this.getContent()},e.prototype.getContent=function(){var t=this.$element,e=this.options;return t.attr("data-content")||("function"==typeof e.content?e.content.call(t[0]):e.content)},e.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var n=t.fn.popover;t.fn.popover=function(n){return this.each(function(){var i=t(this),o=i.data("bs.popover"),r="object"==typeof n&&n;!o&&/destroy|hide/.test(n)||(o||i.data("bs.popover",o=new e(this,r)),"string"==typeof n&&o[n]())})},t.fn.popover.Constructor=e,t.fn.popover.noConflict=function(){return t.fn.popover=n,this}}(jQuery),function(t){"use strict";function e(n,i){this.$body=t(document.body),this.$scrollElement=t(t(n).is(document.body)?window:n),this.options=t.extend({},e.DEFAULTS,i),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",t.proxy(this.process,this)),this.refresh(),this.process()}function n(n){return this.each(function(){var i=t(this),o=i.data("bs.scrollspy"),r="object"==typeof n&&n;o||i.data("bs.scrollspy",o=new e(this,r)),"string"==typeof n&&o[n]()})}e.VERSION="3.3.7",e.DEFAULTS={offset:10},e.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},e.prototype.refresh=function(){var e=this,n="offset",i=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),t.isWindow(this.$scrollElement[0])||(n="position",i=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var e=t(this),o=e.data("target")||e.attr("href"),r=/^#./.test(o)&&t(o);return r&&r.length&&r.is(":visible")&&[[r[n]().top+i,o]]||null}).sort(function(t,e){return t[0]-e[0]}).each(function(){e.offsets.push(this[0]),e.targets.push(this[1])})},e.prototype.process=function(){var t,e=this.$scrollElement.scrollTop()+this.options.offset,n=this.getScrollHeight(),i=this.options.offset+n-this.$scrollElement.height(),o=this.offsets,r=this.targets,s=this.activeTarget;if(this.scrollHeight!=n&&this.refresh(),e>=i)return s!=(t=r[r.length-1])&&this.activate(t);if(s&&e<o[0])return this.activeTarget=null,this.clear();for(t=o.length;t--;)s!=r[t]&&e>=o[t]&&(void 0===o[t+1]||e<o[t+1])&&this.activate(r[t])},e.prototype.activate=function(e){this.activeTarget=e,this.clear();var n=this.selector+'[data-target="'+e+'"],'+this.selector+'[href="'+e+'"]',i=t(n).parents("li").addClass("active");i.parent(".dropdown-menu").length&&(i=i.closest("li.dropdown").addClass("active")),i.trigger("activate.bs.scrollspy")},e.prototype.clear=function(){t(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var i=t.fn.scrollspy;t.fn.scrollspy=n,t.fn.scrollspy.Constructor=e,t.fn.scrollspy.noConflict=function(){return t.fn.scrollspy=i,this},t(window).on("load.bs.scrollspy.data-api",function(){t('[data-spy="scroll"]').each(function(){var e=t(this);n.call(e,e.data())})})}(jQuery),function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.tab");o||i.data("bs.tab",o=new n(this)),"string"==typeof e&&o[e]()})}var n=function(e){this.element=t(e)};n.VERSION="3.3.7",n.TRANSITION_DURATION=150,n.prototype.show=function(){var e=this.element,n=e.closest("ul:not(.dropdown-menu)"),i=e.data("target");if(i||(i=(i=e.attr("href"))&&i.replace(/.*(?=#[^\s]*$)/,"")),!e.parent("li").hasClass("active")){var o=n.find(".active:last a"),r=t.Event("hide.bs.tab",{relatedTarget:e[0]}),s=t.Event("show.bs.tab",{relatedTarget:o[0]});if(o.trigger(r),e.trigger(s),!s.isDefaultPrevented()&&!r.isDefaultPrevented()){var a=t(i);this.activate(e.closest("li"),n),this.activate(a,a.parent(),function(){o.trigger({type:"hidden.bs.tab",relatedTarget:e[0]}),e.trigger({type:"shown.bs.tab",relatedTarget:o[0]})})}}},n.prototype.activate=function(e,i,o){function r(){s.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),a?(e[0].offsetWidth,e.addClass("in")):e.removeClass("fade"),e.parent(".dropdown-menu").length&&e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),o&&o()}var s=i.find("> .active"),a=o&&t.support.transition&&(s.length&&s.hasClass("fade")||!!i.find("> .fade").length);s.length&&a?s.one("bsTransitionEnd",r).emulateTransitionEnd(n.TRANSITION_DURATION):r(),s.removeClass("in")};var i=t.fn.tab;t.fn.tab=e,t.fn.tab.Constructor=n,t.fn.tab.noConflict=function(){return t.fn.tab=i,this};var o=function(n){n.preventDefault(),e.call(t(this),"show")};t(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',o).on("click.bs.tab.data-api",'[data-toggle="pill"]',o)}(jQuery),function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.affix"),r="object"==typeof e&&e;o||i.data("bs.affix",o=new n(this,r)),"string"==typeof e&&o[e]()})}var n=function(e,i){this.options=t.extend({},n.DEFAULTS,i),this.$target=t(this.options.target).on("scroll.bs.affix.data-api",t.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",t.proxy(this.checkPositionWithEventLoop,this)),this.$element=t(e),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};n.VERSION="3.3.7",n.RESET="affix affix-top affix-bottom",n.DEFAULTS={offset:0,target:window},n.prototype.getState=function(t,e,n,i){var o=this.$target.scrollTop(),r=this.$element.offset(),s=this.$target.height();if(null!=n&&"top"==this.affixed)return o<n&&"top";if("bottom"==this.affixed)return null!=n?!(o+this.unpin<=r.top)&&"bottom":!(o+s<=t-i)&&"bottom";var a=null==this.affixed,l=a?o:r.top;return null!=n&&o<=n?"top":null!=i&&l+(a?s:e)>=t-i&&"bottom"},n.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(n.RESET).addClass("affix");var t=this.$target.scrollTop(),e=this.$element.offset();return this.pinnedOffset=e.top-t},n.prototype.checkPositionWithEventLoop=function(){setTimeout(t.proxy(this.checkPosition,this),1)},n.prototype.checkPosition=function(){if(this.$element.is(":visible")){var e=this.$element.height(),i=this.options.offset,o=i.top,r=i.bottom,s=Math.max(t(document).height(),t(document.body).height());"object"!=typeof i&&(r=o=i),"function"==typeof o&&(o=i.top(this.$element)),"function"==typeof r&&(r=i.bottom(this.$element));var a=this.getState(s,e,o,r);if(this.affixed!=a){null!=this.unpin&&this.$element.css("top","");var l="affix"+(a?"-"+a:""),u=t.Event(l+".bs.affix");if(this.$element.trigger(u),u.isDefaultPrevented())return;this.affixed=a,this.unpin="bottom"==a?this.getPinnedOffset():null,this.$element.removeClass(n.RESET).addClass(l).trigger(l.replace("affix","affixed")+".bs.affix")}"bottom"==a&&this.$element.offset({top:s-e-r})}};var i=t.fn.affix;t.fn.affix=e,t.fn.affix.Constructor=n,t.fn.affix.noConflict=function(){return t.fn.affix=i,this},t(window).on("load",function(){t('[data-spy="affix"]').each(function(){var n=t(this),i=n.data();i.offset=i.offset||{},null!=i.offsetBottom&&(i.offset.bottom=i.offsetBottom),null!=i.offsetTop&&(i.offset.top=i.offsetTop),e.call(n,i)})})}(jQuery);
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83

</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>


{{--<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="7862bf73-484b-464a-845a-18f56d3f7933";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>--}}

<style>

    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: 'Shazde_Regular2';
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.eot?v003.200')}}');
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.eot?v003.200#iefix')}}') format('embedded-opentype'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.woff2?v003.200')}}') format('woff2'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.woff?v003.200')}}') format('woff'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer.ttf?v003.200')}}') format('truetype'), url('') format('svg');
    }

    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: 'Shazde_Regular';
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.eot?v003.200')}}');
        src: url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.eot?v003.200#iefix')}}') format('embedded-opentype'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.woff2?v003.200')}}') format('woff2'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.woff?v003.200')}}') format('woff'), url('{{URL::asset('fonts/shazdemosafer/Shazdemosafer_Regular.ttf?v003.200')}}') format('truetype'), url('') format('svg');
    }

    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 900;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Black.eot')}}');
<<<<<<< HEAD
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Black.eot?#iefix')}}') format('embedded-opentype'), /* IE6-8 */ url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Black.woff2')}}') format('woff2'), /* FF39+,Chrome36+, Opera24+*/ url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Black.woff')}}') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Black.ttf')}}') format('truetype');
    }

=======
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Black.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Black.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Black.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Black.ttf')}}') format('truetype');
    }
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: bold;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Bold.eot')}}');
<<<<<<< HEAD
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Bold.eot?#iefix')}}') format('embedded-opentype'), /* IE6-8 */ url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Bold.woff2')}}') format('woff2'), /* FF39+,Chrome36+, Opera24+*/ url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Bold.woff')}}') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Bold.ttf')}}') format('truetype');
    }

=======
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Bold.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Bold.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Bold.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Bold.ttf')}}') format('truetype');
    }
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 500;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Medium.eot')}}');
<<<<<<< HEAD
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Medium.eot?#iefix')}}') format('embedded-opentype'), /* IE6-8 */ url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Medium.woff2')}}') format('woff2'), /* FF39+,Chrome36+, Opera24+*/ url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Medium.woff')}}') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Medium.ttf')}}') format('truetype');
    }

=======
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Medium.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Medium.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Medium.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Medium.ttf')}}') format('truetype');
    }
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 300;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Light.eot')}}');
<<<<<<< HEAD
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Light.eot?#iefix')}}') format('embedded-opentype'), /* IE6-8 */ url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Light.woff2')}}') format('woff2'), /* FF39+,Chrome36+, Opera24+*/ url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Light.woff')}}') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Light.ttf')}}') format('truetype');
    }

=======
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_Light.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_Light.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_Light.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_Light.ttf')}}') format('truetype');
    }
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: 200;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_UltraLight.eot')}}');
<<<<<<< HEAD
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_UltraLight.eot?#iefix')}}') format('embedded-opentype'), /* IE6-8 */ url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_UltraLight.woff2')}}') format('woff2'), /* FF39+,Chrome36+, Opera24+*/ url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_UltraLight.woff')}}') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_UltraLight.ttf')}}') format('truetype');
    }

=======
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum)_UltraLight.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum)_UltraLight.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum)_UltraLight.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum)_UltraLight.ttf')}}') format('truetype');
    }
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    @font-face {
        font-family: 'IRANSansWeb';
        font-style: normal;
        font-weight: normal;
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum).eot')}}');
<<<<<<< HEAD
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum).eot?#iefix')}}') format('embedded-opentype'), /* IE6-8 */ url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum).woff2')}}') format('woff2'), /* FF39+,Chrome36+, Opera24+*/ url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum).woff')}}') format('woff'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/ url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum).ttf')}}') format('truetype');
=======
        src: url('{{URL::asset('fonts/eot/IRANSansWeb(FaNum).eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
        url('{{URL::asset('fonts/woff2/IRANSansWeb(FaNum).woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url('{{URL::asset('fonts/woff/IRANSansWeb(FaNum).woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('{{URL::asset('fonts/ttf/IRANSansWeb(FaNum).ttf')}}') format('truetype');
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    }

</style>

<style>
    /*in Phone*/
<<<<<<< HEAD
    @media only screen and (max-width: 600px) {
=======
    @media only screen and (max-width:600px) {
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
        .hideOnPhone {
            display: none;
            width: 0;
            height: 0;
        }
    }
<<<<<<< HEAD

    /*in Screen*/
    @media only screen and (min-width: 601px) {
=======
    /*in Screen*/
    @media only screen and (min-width:601px) {
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
        .hideOnScreen {
            display: none;
            width: 0;
            height: 0;
        }
    }
<<<<<<< HEAD

=======
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
    .hidden {
        display: none !important;
    }
</style>

{{--<script src="{{URL::asset('js/persianumber.js')}}"></script>--}}

{{--<script>--}}
<<<<<<< HEAD
{{--$(document).ready(function () {--}}
{{--$(document.body).persiaNumber();--}}
{{--});--}}
=======
    {{--$(document).ready(function () {--}}
        {{--$(document.body).persiaNumber();--}}
    {{--});--}}
>>>>>>> 7cbfd2e57ae6406017b4c8ad2b228a5b32355d83
{{--</script>--}}
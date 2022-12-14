/**
* This is tinymce theme js file 4.3.8 (2016-03-15). Don't edit the file if you want to update module in future.
* 
* @author    Tinymce
* @copyright 2015 Tinymce
* @link	     https://www.tinymce.com
* @license   please read license in file license.txt
*/

tinymce.ThemeManager.add("modern", function(a) {
    function b(b, c) {
        var d, e = [];
        if (b) return o(b.split(/[ ,]/), function(b) {
            function f() {
                function c(a) {
                    return function(c, d) {
                        for (var e, f = d.parents.length; f-- && (e = d.parents[f].nodeName, "OL" != e && "UL" != e););
                        b.active(c && e == a)
                    }
                }
                var d = a.selection;
                "bullist" == g && d.selectorChanged("ul > li", c("UL")), "numlist" == g && d.selectorChanged("ol > li", c("OL")), b.settings.stateSelector && d.selectorChanged(b.settings.stateSelector, function(a) {
                    b.active(a)
                }, !0), b.settings.disabledStateSelector && d.selectorChanged(b.settings.disabledStateSelector, function(a) {
                    b.disabled(a)
                })
            }
            var g;
            "|" == b ? d = null : n.has(b) ? (b = {
                type: b,
                size: c
            }, e.push(b), d = null) : (d || (d = {
                type: "buttongroup",
                items: []
            }, e.push(d)), a.buttons[b] && (g = b, b = a.buttons[g], "function" == typeof b && (b = b()), b.type = b.type || "button", b.size = c, b = n.create(b), d.items.push(b), a.initialized ? f() : a.on("init", f)))
        }), {
            type: "toolbar",
            layout: "flow",
            items: e
        }
    }

    function c(a) {
        function c(c) {
            return c ? (d.push(b(c, a)), !0) : void 0
        }
        var d = [];
        if (tinymce.isArray(m.toolbar)) {
            if (0 === m.toolbar.length) return;
            tinymce.each(m.toolbar, function(a, b) {
                m["toolbar" + (b + 1)] = a
            }), delete m.toolbar
        }
        for (var e = 1; 10 > e && c(m["toolbar" + e]); e++);
        return d.length || m.toolbar === !1 || c(m.toolbar || t), d.length ? {
            type: "panel",
            layout: "stack",
            classes: "toolbar-grp",
            ariaRoot: !0,
            ariaRemember: !0,
            items: d
        } : void 0
    }

    function d() {
        function b(b) {
            var c;
            return "|" == b ? {
                text: "|"
            } : c = a.menuItems[b]
        }

        function c(c) {
            var d, e, f, g, h;
            if (h = tinymce.makeMap((m.removed_menuitems || "").split(/[ ,]/)), m.menu ? (e = m.menu[c], g = !0) : e = s[c], e) {
                d = {
                    text: e.title
                }, f = [], o((e.items || "").split(/[ ,]/), function(a) {
                    var c = b(a);
                    c && !h[a] && f.push(b(a))
                }), g || o(a.menuItems, function(a) {
                    a.context == c && ("before" == a.separator && f.push({
                        text: "|"
                    }), a.prependToContext ? f.unshift(a) : f.push(a), "after" == a.separator && f.push({
                        text: "|"
                    }))
                });
                for (var i = 0; i < f.length; i++) "|" == f[i].text && (0 !== i && i != f.length - 1 || f.splice(i, 1));
                if (d.menu = f, !d.menu.length) return null
            }
            return d
        }
        var d, e = [],
            f = [];
        if (m.menu)
            for (d in m.menu) f.push(d);
        else
            for (d in s) f.push(d);
        for (var g = "string" == typeof m.menubar ? m.menubar.split(/[ ,]/) : f, h = 0; h < g.length; h++) {
            var i = g[h];
            i = c(i), i && e.push(i)
        }
        return e
    }

    function e(b) {
        function c(a) {
            var c = b.find(a)[0];
            c && c.focus(!0)
        }
        a.shortcuts.add("Alt+F9", "", function() {
            c("menubar")
        }), a.shortcuts.add("Alt+F10", "", function() {
            c("toolbar")
        }), a.shortcuts.add("Alt+F11", "", function() {
            c("elementpath")
        }), b.on("cancel", function() {
            a.focus()
        })
    }

    function f(b, c) {
        function d(a) {
            return {
                width: a.clientWidth,
                height: a.clientHeight
            }
        }
        var e, f, g, h;
        e = a.getContainer(), f = a.getContentAreaContainer().firstChild, g = d(e), h = d(f), null !== b && (b = Math.max(m.min_width || 100, b), b = Math.min(m.max_width || 65535, b), p.setStyle(e, "width", b + (g.width - h.width)), p.setStyle(f, "width", b)), c = Math.max(m.min_height || 100, c), c = Math.min(m.max_height || 65535, c), p.setStyle(f, "height", c), a.fire("ResizeEditor")
    }

    function g(b, c) {
        var d = a.getContentAreaContainer();
        l.resizeTo(d.clientWidth + b, d.clientHeight + c)
    }

    function h() {
        function c() {
            return a.contextToolbars || []
        }

        function d(b) {
            var c, d, e;
            return c = tinymce.DOM.getPos(a.getContentAreaContainer()), d = a.dom.getRect(b), e = a.dom.getRoot(), "BODY" == e.nodeName && (d.x -= e.ownerDocument.documentElement.scrollLeft || e.scrollLeft, d.y -= e.ownerDocument.documentElement.scrollTop || e.scrollTop), d.x += c.x, d.y += c.y, d
        }

        function e() {
            o(a.contextToolbars, function(a) {
                a.panel && a.panel.hide()
            })
        }

        function f(b) {
            var c, f, g, h, i, j, k;
            if (!a.removed) {
                if (!b || !b.toolbar.panel) return void e();
                k = ["tc-bc", "bc-tc", "tl-bl", "bl-tl", "tr-br", "br-tr"], i = b.toolbar.panel, i.show(), g = d(b.element), f = tinymce.DOM.getRect(i.getEl()), h = tinymce.DOM.getRect(a.getContentAreaContainer() || a.getBody()), g.w = b.element.clientWidth, g.h = b.element.clientHeight, a.inline || (h.w = a.getDoc().documentElement.offsetWidth), a.selection.controlSelection.isResizable(b.element) && (g = q.inflate(g, 0, 8)), c = q.findBestRelativePosition(f, g, h, k), c ? (o(k.concat("inside"), function(a) {
                    i.classes.toggle("tinymce-inline-" + a, a == c)
                }), j = q.relativePosition(f, g, c), i.moveTo(j.x, j.y)) : (o(k, function(a) {
                    i.classes.toggle("tinymce-inline-" + a, !1)
                }), i.classes.toggle("tinymce-inline-inside", !0), g = q.intersect(h, g), g ? (c = q.findBestRelativePosition(f, g, h, ["tc-tc", "tl-tl", "tr-tr"]), c ? (j = q.relativePosition(f, g, c), i.moveTo(j.x, j.y)) : i.moveTo(g.x, g.y)) : i.hide())
            }
        }

        function g() {
            function b() {
                a.selection && f(k(a.selection.getNode()))
            }
            tinymce.util.Delay.requestAnimationFrame(b)
        }

        function h() {
            l || (l = a.selection.getScrollContainer() || a.getWin(), tinymce.$(l).on("scroll", g), a.on("remove", function() {
                tinymce.$(l).off("scroll")
            }))
        }

        function i(a) {
            var c;
            return a.toolbar.panel ? (a.toolbar.panel.show(), void f(a)) : (h(), c = n.create({
                type: "floatpanel",
                role: "application",
                classes: "tinymce tinymce-inline",
                layout: "flex",
                direction: "column",
                align: "stretch",
                autohide: !1,
                autofix: !0,
                fixed: !0,
                border: 1,
                items: b(a.toolbar.items)
            }), a.toolbar.panel = c, c.renderTo(document.body).reflow(), void f(a))
        }

        function j() {
            tinymce.each(c(), function(a) {
                a.panel && a.panel.hide()
            })
        }

        function k(b) {
            var d, e, f, g = c();
            for (f = a.$(b).parents().add(b), d = f.length - 1; d >= 0; d--)
                for (e = g.length - 1; e >= 0; e--)
                    if (g[e].predicate(f[d])) return {
                        toolbar: g[e],
                        element: f[d]
                    };
            return null
        }
        var l;
        a.on("click keyup setContent", function(b) {
            ("setcontent" != b.type || b.selection) && tinymce.util.Delay.setEditorTimeout(a, function() {
                var b;
                b = k(a.selection.getNode()), b ? (j(), i(b)) : j()
            })
        }), a.on("blur hide", j), a.on("ObjectResizeStart", function() {
            var b = k(a.selection.getNode());
            b && b.toolbar.panel && b.toolbar.panel.hide()
        }), a.on("nodeChange ResizeEditor ResizeWindow", g), a.on("remove", function() {
            tinymce.each(c(), function(a) {
                a.panel && a.panel.remove()
            }), a.contextToolbars = {}
        })
    }

    function i(a) {
        return function() {
            a.initialized ? a.fire("SkinLoaded") : a.on("init", function() {
                a.fire("SkinLoaded")
            })
        }
    }

    function j(b) {
        function f() {
            if (o && o.moveRel && o.visible() && !o._fixed) {
                var b = a.selection.getScrollContainer(),
                    c = a.getBody(),
                    d = 0,
                    e = 0;
                if (b) {
                    var f = p.getPos(c),
                        g = p.getPos(b);
                    d = Math.max(0, g.x - f.x), e = Math.max(0, g.y - f.y)
                }
                o.fixed(!1).moveRel(c, a.rtl ? ["tr-br", "br-tr"] : ["tl-bl", "bl-tl", "tr-br"]).moveBy(d, e)
            }
        }

        function g() {
            o && (o.show(), f(), p.addClass(a.getBody(), "mce-edit-focus"))
        }

        function j() {
            o && (o.hide(), r.hideAll(), p.removeClass(a.getBody(), "mce-edit-focus"))
        }

        function k() {
            return o ? void(o.visible() || g()) : (o = l.panel = n.create({
                type: q ? "panel" : "floatpanel",
                role: "application",
                classes: "tinymce tinymce-inline",
                layout: "flex",
                direction: "column",
                align: "stretch",
                autohide: !1,
                autofix: !0,
                fixed: !!q,
                border: 1,
                items: [m.menubar === !1 ? null : {
                    type: "menubar",
                    border: "0 0 1 0",
                    items: d()
                }, c(m.toolbar_items_size)]
            }), a.fire("BeforeRenderUI"), o.renderTo(q || document.body).reflow(), e(o), g(), h(), a.on("nodeChange", f), a.on("activate", g), a.on("deactivate", j), void a.nodeChanged())
        }
        var o, q;
        return m.fixed_toolbar_container && (q = p.select(m.fixed_toolbar_container)[0]), m.content_editable = !0, a.on("focus", function() {
            b.skinUiCss ? tinymce.DOM.styleSheetLoader.load(b.skinUiCss, k, k) : k()
        }), a.on("blur hide", j), a.on("remove", function() {
            o && (o.remove(), o = null)
        }), b.skinUiCss && tinymce.DOM.styleSheetLoader.load(b.skinUiCss, i(a)), {}
    }

    function k(b) {
        function g() {
            return function(a) {
                "readonly" == a.mode ? j.find("*").disabled(!0) : j.find("*").disabled(!1)
            }
        }
        var j, k, o;
        return b.skinUiCss && tinymce.DOM.styleSheetLoader.load(b.skinUiCss, i(a)), j = l.panel = n.create({
            type: "panel",
            role: "application",
            classes: "tinymce",
            style: "visibility: hidden",
            layout: "stack",
            border: 1,
            items: [m.menubar === !1 ? null : {
                type: "menubar",
                border: "0 0 1 0",
                items: d()
            }, c(m.toolbar_items_size), {
                type: "panel",
                name: "iframe",
                layout: "stack",
                classes: "edit-area",
                html: "",
                border: "1 0 0 0"
            }]
        }), m.resize !== !1 && (k = {
            type: "resizehandle",
            direction: m.resize,
            onResizeStart: function() {
                var b = a.getContentAreaContainer().firstChild;
                o = {
                    width: b.clientWidth,
                    height: b.clientHeight
                }
            },
            onResize: function(a) {
                "both" == m.resize ? f(o.width + a.deltaX, o.height + a.deltaY) : f(null, o.height + a.deltaY)
            }
        }), m.statusbar !== !1 && j.add({
            type: "panel",
            name: "statusbar",
            classes: "statusbar",
            layout: "flow",
            border: "1 0 0 0",
            ariaRoot: !0,
            items: [{
                type: "elementpath"
            }, k]
        }), m.readonly && j.find("*").disabled(!0), a.fire("BeforeRenderUI"), a.on("SwitchMode", g()), j.renderBefore(b.targetNode).reflow(), m.width && tinymce.DOM.setStyle(j.getEl(), "width", m.width), a.on("remove", function() {
            j.remove(), j = null
        }), e(j), h(), {
            iframeContainer: j.find("#iframe")[0].getEl(),
            editorContainer: j.getEl()
        }
    }
    var l = this,
        m = a.settings,
        n = tinymce.ui.Factory,
        o = tinymce.each,
        p = tinymce.DOM,
        q = tinymce.geom.Rect,
        r = tinymce.ui.FloatPanel,
        s = {
            file: {
                title: "File",
                items: "newdocument"
            },
            edit: {
                title: "Edit",
                items: "undo redo | cut copy paste pastetext | selectall"
            },
            insert: {
                title: "Insert",
                items: "|"
            },
            view: {
                title: "View",
                items: "visualaid |"
            },
            format: {
                title: "Format",
                items: "bold italic underline strikethrough superscript subscript | formats | removeformat"
            },
            table: {
                title: "Table"
            },
            tools: {
                title: "Tools"
            }
        },
        t = "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image";
    l.renderUI = function(b) {
        var c = m.skin !== !1 ? m.skin || "lightgray" : !1;
        if (c) {
            var d = m.skin_url;
            d = d ? a.documentBaseURI.toAbsolute(d) : baseUri+"modules/gformbuilderpro/views/css/front/skins/lightgray/" + c, tinymce.Env.documentMode <= 7 ? b.skinUiCss =  baseUri+"modules/gformbuilderpro/views/css/front/skins/lightgray/skin.ie7.min.css" : b.skinUiCss =  baseUri+"modules/gformbuilderpro/views/css/front/skins/lightgray/skin.min.css", a.contentCSS.push( baseUri+"modules/gformbuilderpro/views/css/front/skins/lightgray/content" + (a.inline ? ".inline" : "") + ".min.css")
        }
        return a.on("ProgressState", function(a) {
            l.throbber = l.throbber || new tinymce.ui.Throbber(l.panel.getEl("body")), a.state ? l.throbber.show(a.time) : l.throbber.hide()
        }), m.inline ? j(b) : k(b)
    }, l.resizeTo = f, l.resizeBy = g
});
function getVehicleCanvas() {
    return c_mainVehicle
}

function sizeWheel(n) {
    var t = 1;
    (sizeUpRatio !== 1 || n !== "down") && (t = n === "down" ? .95 : 1.05, sizeUpRatio *= t, sizeUpRatio <= 1 && (sizeUpRatio = 1), sizeWheelToRatio(t, sizeUpRatio))
}

function sizeWheelToRatio(n, t) {
    var i = group_wvF.getWidth(),
        r = group_wvF.getHeight(),
        u = (i - i * n) / 2,
        f = group_wvF.getLeft(),
        e = (r - r * n) / 2,
        o = group_wvF.getTop(),
        s = (group_wvR.getWidth() - group_wvR.getWidth() * n) / 2,
        h = group_wvR.getLeft(),
        c = (group_wvR.getHeight() - group_wvR.getHeight() * n) / 2,
        l = group_wvR.getTop();
    group_wvF.set({
        scaleX: t,
        scaleY: t,
        left: f + u,
        top: o + e
    }).setCoords();
    group_wvR.set({
        scaleX: t,
        scaleY: t,
        left: h + s,
        top: l + c
    }).setCoords();
    c_mainVehicle.renderAll()
}

function resetSizeRatio() {
    sizeUpRatio = 1
}

function setupWheelFilters(n) {
    var t = n.find(".vtws-filter"),
        r = 8e3,
        i;
    t.click(function() {
        function u() {
            t.removeClass("open")
        }
        n.hasClass("vtws-filters-horizontal") && ($(this).hasClass("open") ? $(this).removeClass("open") : (u(), $(this).addClass("open"), clearInterval(i), i = setInterval(u, r)))
    })
}

function applyColorPicker() {
    $(".colorpicker").spectrum({
        flat: !1,
        allowEmpty: !0,
        showInput: !1,
        chooseText: "Paint It",
        cancelText: "Cancel",
        showInitial: !1,
        showPalette: !0,
        showSelectionPalette: !0,
        replacerClassName: "pickerBox",
        maxPaletteSize: 10,
        preferredFormat: "hex",
        localStorageKey: "cp.wheel",
        show: function() {},
        change: function() {},
        hide: function(n) {
            wheelColorSet = !0;
            wheelColorLayer = String($(this).parent().data("layer"));
            wheelColor = n;
            wheelColorMap[wheelColorLayer] = wheelColor;
            changeLayerColor(wheelColorLayer, wheelColor)
        },
        palette: [
            ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)", "rgb(204, 204, 204)", "rgb(217, 217, 217)", "rgb(255, 255, 255)", "rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)", "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"]
        ]
    })
}

function clearWheelResults() {
    var n = $("#vtws-wheel-results");
    return n === null || n === undefined ? null : (n.addClass("vtws-hide"), n.html(""), n)
}

function showWheelResults(n) {
    var t = $("#vtws-wheel-results");
    if (t.length === 0) return null;
    if (n === !0 || t.hasClass("vtws-hide")) {
        if (n === !0 && (t.removeClass("vtws-hide"), vtwsSettings && vtwsSettings.onProductsLoaded)) vtwsSettings.onProductsLoaded(resultHitCount)
    } else t.addClass("vtws-hide");
    return t
}

function resetVehicleCanvas() {
    vehicleStageScale = $mainVehicleStage.width() / baseVehicleWidth;
    vehicleWheelScale = vehicleStageScale;
    c_mainVehicle && (c_mainVehicle.setWidth(baseVehicleWidth * vehicleStageScale), c_mainVehicle.setHeight(baseVehicleHeight * vehicleStageScale))
}

function setVehicleBackground(n, t) {
    c_mainVehicle && (group_wvF && (c_mainVehicle.remove(group_wvF), c_mainVehicle.remove(group_wvR), group_wvF = null, group_wvR = null), img_vc && (c_mainVehicle.remove(img_vc), img_vc = null), n.overlayImage = null, fabric.Image.fromURL(t, function(t) {
        vehicleStageScale = $mainVehicleStage.width() / t.width;
        vehicleWheelScale = $mainVehicleStage.width() / baseVehicleWidth;
        setVehicleStageScale(t.width, t.height);
        n.setBackgroundImage(t, n.renderAll.bind(n), {
            width: n.width,
            height: n.height,
            originX: "left",
            originY: "top",
            crossOrigin: "anonymous"
        })
    }), t == "" ? (n.backgroundImage = !1, $("#vtws-mainImage").css("visibility", "hidden"), $("#vtws-mainActions").hide(), $("#vtws-product-grid").html(""), $("#vtws-product-grid").hide()) : ($("#vtws-mainImage").css("visibility", "visible"), $("#vtws-mainActions").show()), $("#vtws-customize-wheel").show(), flipWheelToggle = !1)
}

function setVehicleColor(n, t) {
    n.setOverlayImage(t, n.renderAll.bind(n), {
        width: n.width,
        height: n.height
    });
    return
}

function updatePositions(n) {
    n.wvF_left = group_wvF.left;
    n.wvF_top = group_wvF.top;
    n.wvF_width = group_wvF.getWidth();
    n.wvF_height = group_wvF.getHeight();
    n.wvF_angle = group_wvF.getAngle();
    n.wvR_left = group_wvR.left;
    n.wvR_top = group_wvR.top;
    n.wvR_width = group_wvR.getWidth();
    n.wvR_height = group_wvR.getHeight();
    n.wvR_angle = group_wvR.getAngle()
}

function scaleWheel(n, t) {
    t === undefined && (t = 1);
    var i = vehicleWheelScale;
    n.wvF_left = i * t * n.wvF_left;
    n.wvF_top = i * t * n.wvF_top;
    n.wvF_width = i * t * n.wvF_width;
    n.wvF_height = i * t * n.wvF_height;
    n.wvR_left = i * t * n.wvR_left;
    n.wvR_top = i * t * n.wvR_top;
    n.wvR_width = i * t * n.wvR_width;
    n.wvR_height = i * t * n.wvR_height
}

function loadWheels(n) {
    var t = sizeUpRatio,
        i, r;
    t > 1 && resetSizeRatio();
    scaleWheel(n);
    group_wvF && (c_mainVehicle.remove(group_wvF), c_mainVehicle.remove(group_wvR), updatePositions(n));
    i = [];
    r = [];
    fabric.Image.fromURL(n.frontWheelBase, function(r) {
        if (wvF_main = r.set({
                id: "main",
                visible: !0,
                width: n.wvF_width,
                height: n.wvF_height
            }), i.push(wvF_main), n.frontWheelWindow && fabric.Image.fromURL(n.frontWheelWindow, function(t) {
                if (wvF_window = t.set({
                        id: "window",
                        visible: wheelColorSet,
                        opacity: paintLayerAlpha,
                        left: -n.wvF_width / 2,
                        top: -n.wvF_height / 2,
                        width: n.wvF_width,
                        height: n.wvF_height
                    }), i.push(wvF_window), wvfWheelGroup.window = wvF_window, n.frontWheelWindow && wheelColorSet) {
                    var r = wheelColorMap.window;
                    changeLayerColor("window", r)
                }
            }), n.frontWheelFace && fabric.Image.fromURL(n.frontWheelFace, function(t) {
                if (wvF_face = t.set({
                        id: "face",
                        visible: wheelColorSet,
                        opacity: paintLayerAlpha,
                        left: -n.wvF_width / 2,
                        top: -n.wvF_height / 2,
                        width: n.wvF_width,
                        height: n.wvF_height
                    }), i.push(wvF_face), wvfWheelGroup.face = wvF_face, n.frontWheelFace && wheelColorSet) {
                    var r = wheelColorMap.face;
                    changeLayerColor("face", r)
                }
            }), group_wvF = new fabric.Group(i, {
                left: n.wvF_left,
                top: n.wvF_top,
                angle: n.wvF_angle,
                cornerSize: handleSize,
                cornerColor: handleColor,
                borderColor: handleColor
            }), n.wvF_flipX === !0 && (flipWheelToggle = !0), flipWheelToggle && group_wvF.toggle("flipX"), t > 1) {
            var u = group_wvF.getWidth() * t,
                f = group_wvF.getHeight() * t,
                e = (u - u * t) / 2,
                o = group_wvF.getLeft(),
                s = (f - f * t) / 2,
                h = group_wvF.getTop();
            group_wvF.set({
                scaleX: t,
                scaleY: t,
                left: o + e,
                top: h + s
            }).setCoords();
            sizeUpRatio = t
        }
        c_mainVehicle.add(group_wvF);
        setBrightness(wvF_main, $brightnessSliderInput.val());
        setContrast(wvF_main, $contrastSliderInput.val())
    });
    fabric.Image.fromURL(n.rearWheelBase, function(i) {
        if (wvR_main = i.set({
                id: "main",
                visible: !0,
                width: n.wvR_width,
                height: n.wvR_height
            }), r.push(wvR_main), n.rearWheelWindow && fabric.Image.fromURL(n.rearWheelWindow, function(t) {
                if (wvR_window = t.set({
                        id: "window",
                        visible: wheelColorSet,
                        opacity: paintLayerAlpha,
                        left: -n.wvR_width / 2,
                        top: -n.wvR_height / 2,
                        width: n.wvR_width,
                        height: n.wvR_height
                    }), r.push(wvR_window), wvrWheelGroup.window = wvR_window, n.rearWheelWindow && wheelColorSet) {
                    var i = wheelColorMap.window;
                    changeLayerColor("window", i)
                }
            }), n.rearWheelFace && fabric.Image.fromURL(n.rearWheelFace, function(t) {
                if (wvR_face = t.set({
                        id: "face",
                        visible: wheelColorSet,
                        opacity: paintLayerAlpha,
                        left: -n.wvR_width / 2,
                        top: -n.wvR_height / 2,
                        width: n.wvR_width,
                        height: n.wvR_height
                    }), r.push(wvR_face), wvrWheelGroup.face = wvR_face, n.rearWheelFace && wheelColorSet) {
                    var i = wheelColorMap.face;
                    changeLayerColor("face", i)
                }
            }), group_wvR = new fabric.Group(r, {
                left: n.wvR_left,
                top: n.wvR_top,
                angle: n.wvR_angle,
                cornerSize: handleSize,
                cornerColor: handleColor,
                borderColor: handleColor
            }), n.wvR_flipX === !0 && (flipWheelToggle = !0), flipWheelToggle && group_wvR.toggle("flipX"), t > 1) {
            var u = (group_wvR.getWidth() - group_wvR.getWidth() * t) / 2,
                f = group_wvR.getLeft(),
                e = (group_wvR.getHeight() - group_wvR.getHeight() * t) / 2,
                o = group_wvR.getTop();
            group_wvR.set({
                scaleX: t,
                scaleY: t,
                left: f + u,
                top: o + e
            }).setCoords();
            sizeUpRatio = t
        }
        c_mainVehicle.add(group_wvR);
        setBrightness(wvR_main, $brightnessSliderInput.val());
        setContrast(wvR_main, $contrastSliderInput.val())
    })
}

function colorLayer(n, t, i) {
    switch (i) {
        case "null":
            t.set({
                visible: !1
            });
            n.renderAll();
            break;
        default:
            t.set({
                visible: !0
            });
            var r = new fabric.Image.filters.Blend({
                color: i,
                mode: "multiply"
            });
            t.filters[0] = r;
            setLayerOrder();
            t.applyFilters(n.renderAll.bind(n))
    }
}

function hideLayer(n, t) {
    var i = getObjectById(n, t);
    i.set({
        visible: !1
    });
    n.renderAll()
}

function hideObject(n) {
    n.set({
        visible: !1
    })
}

function changeLayerColor(n, t) {
    var f = String(t),
        e = getObjectById(c_mainWheel, n),
        i = n.toLowerCase(),
        r, u;
    console.log(i);
    r = wvfWheelGroup[i];
    u = wvrWheelGroup[i];
    console.log(r);
    console.log(u);
    console.log(i);
    colorLayer(c_mainWheel, e, f);
    r !== undefined && colorLayer(c_mainVehicle, r, f);
    u !== undefined && colorLayer(c_mainVehicle, u, f)
}

function setLayerOrder() {
    var n = getObjectById(c_mainWheel, "main");
    c_mainWheel.sendToBack(n)
}

function getObjectById(n, t) {
    var i = n.getObjects();
    for (var r in i)
        if (i[r].get("id") === t) return i[r]
}

function setBrightness(n, t) {
    if (n) {
        wheelBrightness = t;
        var i = new fabric.Image.filters.Brightness({
            brightness: t / 4
        });
        n.filters && (n.filters[1] = i, n.applyFilters(c_mainVehicle.renderAll.bind(c_mainVehicle)))
    }
}

function setContrast(n, t) {
    if (n) {
        wheelContrast = t;
        var i = new fabric.Image.filters.Contrast({
            contrast: t / 4
        });
        n.filters && (n.filters[2] = i, n.applyFilters(c_mainVehicle.renderAll.bind(c_mainVehicle)))
    }
}

function reslickWheels() {
    return
}

function slickWheels() {
    $.get("/Product/Grid/" + autoSelectPartNumbers, function(n) {
        $("#vtws-product-grid").show();
        $("#vtws-product-grid").html(n)
    })
}

function showUploadVehicleForm() {
    $("#vtws-vehicle-select-pick-an-image").addClass("vtws-hide");
    $("#vtws-vehicle-tips-section").removeClass("vtws-hide");
    $("#vtws-use-own-image-tips").addClass("vtws-hide");
    $("#vtws-vehicleSelect").show();
    $("#vtws-mainImage").addClass("vtws-hide")
}

function getYear() {
    return $("#vtws-vehicle-year").val()
}

function getMake() {
    return $("#vtws-vehicle-make").val()
}

function getModel() {
    return $("#vtws-vehicle-model").val()
}

function getBodyStyle() {
    return $("#vtws-vehicle-body-type").val()
}

function getSubModel() {
    return $("#vtws-vehicle-sub-model").val()
}

function getVehicleImage(n, t, i, r, u) {
    var f, c, l;
    t == null && (t = !0);
    $.loadingSpinner();
    setVehicleStageScaleToDefault();
    vtwsSettings && vtwsSettings.onVehicleChanging && vtwsSettings.onVehicleChanging();
    t === !0 && showWheelResults(!1);
    $("#vtws-vehicleSelect").hide();
    var e = getYear(),
        o = getMake(),
        s = getModel(),
        h = getBodyStyle();
    h == "BODY TYPE" && (h = "");
    f = getSubModel();
    f == "SUB-MODEL" && (f = "");
    c = $("#vtws-changeOrientation");
    (n === null || n === undefined) && (n = "");
    l = $("#vtws-productBrand").val();
    $("#vtws-mainVehicle").data("partNumber", n);
    vehicleList = null;
    setVehicleBackground(c_mainVehicle, "");
    $("#vtws-swatches").hide();
    $("#vtws-secondaryVehicle").html("");
    $(".studioVehicleList").html("");
    $(".customStudioVehicleList").html("");
    $("#vtws-vehicle-select-pick-an-image").removeClass("vtws-hide");
    $("#vtws-vehicle-select-first-image").hide();
    i === undefined && (i = null);
    $.get(baseURL + "/Vehicle/GetVehicleImages/?y=" + e + "&m=" + o + "&mdl=" + s + "&b=" + h + "&sm=" + f + "&o=" + c.data("orientationPrimary"), function(n) {
        var a = null,
            w;
        try {
            if (a = JSON.parse(n), console.log("chassisid = " + a.chassisId + ", vehicleId = " + a.id), $("#vtws-mainVehicle").data("vehicleID", a.id), w = $("#vtws-mainVehicle").data("chassisId"), t === !0 && (w !== a.chassisId ? (clearWheelResults(), $("#vtws-mainVehicle").data("chassisId", a.chassisId), sortingFiltering = !1, renderWheelResults({
                    brand: l
                })) : showWheelResults(!0)), a.products != null && a.products[0].productFormats[0].assets.length > 0) {
                var v = renderSwatches(a.products[0].productFormats[0].assets),
                    y = null,
                    p = null,
                    b = a.products[0].productFormats[0].assets;
                y = b[v].shotCode.code;
                p = b[v].url;
                lastVehicleId = a.id;
                vehicleImageId = a.vehicleImageId;
                i !== null && u !== null && u !== undefined && (a.apiId = i, p = r, vehicleImageId = u, a.id = u, clearSecondaryWheels(), $("#vtws-swatches").hide());
                showVehicleLoadWheelPosition(p, a.id, y, a.products[0].productFormats[0].id, a.apiId);
                $.loadingSpinner();
                a.apiId === null || a.apiId === undefined || a.apiId !== 4 ? $.get(baseURL + "/Vehicle/GetVehicleImages/?y=" + e + "&m=" + o + "&mdl=" + s + "&b=" + h + "&sm=" + f + "&o=" + c.data("orientationSecondary"), function(n) {
                    var t, r, u, i, f;
                    try {
                        if (t = JSON.parse(n), t.products[0].productFormats[0].assets.length > 0) {
                            for (r = t.products[0].productFormats[0].assets, $("#vtws-secondaryVehicle").show(), u = t.products[0].productFormats[0].assets[v], i = 0; i < r.length; ++i)
                                if (y === r[i].shotCode.code) {
                                    u = r[i];
                                    break
                                }
                            f = formatImageUrl(u.url, a.id, u.shotCode.code, t.products[0].productFormats[0].id, a.apiId);
                            $("#vtws-secondaryVehicle").html('<img crossOrigin="anonymous" src=\'' + f + "'>");
                            loadSecondaryWheelPosition();
                            vtwsSettings && vtwsSettings.onVehicleLoaded && vtwsSettings.onVehicleLoaded()
                        }
                    } catch (e) {
                        console.log(e)
                    }
                }).fail(function() {
                    console.log("failed get - /Vehicle/GetVehicleImages/ - orientationSecondary")
                }).always(function() {
                    $.removeLoadingSpinner()
                }) : (vtwsSettings && vtwsSettings.onVehicleLoaded && vtwsSettings.onVehicleLoaded(), $.removeLoadingSpinner())
            } else console.log("No vehicle found...")
        } catch (k) {
            clearWheelResults();
            console.log(k)
        }
        a && a.products != null && a.products[0].productFormats[0].assets.length != 0 || showUploadVehicleForm(e, o, s)
    }).fail(function() {
        clearWheelResults();
        showUploadVehicleForm(e, o, s)
    }).always(function() {
        $.removeLoadingSpinner()
    })
}

function formatImageUrl(n, t, i, r, u) {
    return u === null || u === undefined ? baseURL + "/Vehicle/GetCroppedImage?url=" + n + "&vid=" + t + "&code=" + i + "&fid=" + r : baseURL + "/Vehicle/GetCroppedImage?url=" + n + "&vid=" + t + "&code=" + i + "&fid=" + r + "&apiId=" + u
}

function showVehicle(n, t, i, r, u) {
    var f = formatImageUrl(n, t, i, r, u);
    $(".vsForm-image img").attr("src", f);
    setVehicleBackground(c_mainVehicle, f)
}

function displayCustomizeWheel(n, t, i) {
    $.get(baseURL + "/Wheel/GetLayers?wheelId=" + n + "&partNumber=" + t + "&token=" + vtwsToken, function(r) {
        var u, s, e, f, o, h;
        if (r.Error == null) {
            if (u = $("#vtws-customize-wheel-section"), u.find(".wheel-brand").html(r.Brand), u.find(".wheel-name").html(r.Style), loadWheelLayer(c_mainWheel, s, r.BaseLayerImage, !0, "main"), e = u.find(".builder_buttons"), e.length > 0) {
                for (console.log(r.WheelLayers), e.html(""), f = 0; f < r.WheelLayers.length; ++f) o = r.WheelLayers[f], loadWheelLayer(c_mainWheel, h, r.WheelLayers[f].BaseLayerImage, !1, o.LevelName), e.append('<div class="wbLayer" data-layer="' + o.LevelName + '"><label class="small">' + o.LevelName + '<\/label><input type="text" class="colorpicker" /><\/div>');
                applyColorPicker()
            }
            vtwsSelectWheel(t);
            i ? $(this).openLeanModal("#vtws-paintWheel", {
                top: 100,
                overlay: .5,
                closeButton: ".vtws-close-button"
            }) : u.find(".vtws-modal-title").html("")
        } else r.Error != null && console.log("Sorry, we couldn't find any layers that match your wheel " + n), console.log(r.Error)
    }).fail(function() {
        console.log("failed to get wheel layers")
    })
}

function addCustomizeWheelEvent(n, t) {
    n.find("a.customize-btn").click(function(n) {
        n.preventDefault();
        var i = $(this),
            r = i.data("vtwsWheelPartNumber");
        displayCustomizeWheel(t, r, !0)
    })
}

function addSpecsClickEvent(n, t, i) {
    n.find("a.view-specs-btn").click(function(n) {
        n.preventDefault();
        $.get(baseURL + "/Wheel/GetWheel?cid=" + i + "&wheelId=" + t + "&token=" + vtwsToken, function(n) {
            var u, o, r, e, f, s;
            if (n.Error == null) {
                if (u = $("#wheelDetailsModal"), u.length > 0) {
                    for (u.find(".brandName").html(n.Brand), u.find(".vtws-details-style").html(n.Style), u.find(".vtws-details-finish").html(n.Finish), u.find("#vtws-wheelThumb-img").attr("src", n.Image), n.CustomPricing === !1 ? u.find(".vtws-specs-msrp-column").html("MSRP") : u.find(".vtws-specs-msrp-column").html("Price"), o = u.find("#vtws-wheelspecs-body"), o.html(""), r = "", e = 0; e < n.Products.length; ++e) f = n.Products[e], r += f.FitsChassis ? '<tr class="vtws-specFits">' : "<tr>", r += '<td><span class="vtws-sku">' + f.PartNumber + "<\/span><\/td>", r += "<td><span>" + f.Size + "<\/span><\/td>", r += "<td><span>" + f.BoltPattern + "<\/span><\/td>", r += "<td><span>" + f.Offset + "<\/span><\/td>", r += f.Inventory !== null ? "<td><span>" + f.Inventory + "<\/span><\/td>" : "<td><\/td>", s = f.Msrp, s != null ? (r += '<td><span class="vtws-price">$' + s + "<\/span>", r += '<span class="vtws-ea">/ea.<\/span><\/td>') : r += "<td>&nbsp;<\/td>", r += "<\/tr>";
                    o.html(r);
                    $(this).openLeanModal("#wheelDetailsModal", {
                        top: 100,
                        overlay: .5,
                        closeButton: ".vtws-close-button"
                    })
                }
            } else n.Error != null && console.log("Sorry, we couldn't find any products that match your search using chassis " + i + " and wheel " + t), console.log(n.Error)
        }).fail(function() {
            console.log("failed to get wheel specs")
        })
    })
}

function addWheelClickEvent(n) {
    n.find("a.vtws-wheel-selector").click(function(n) {
        n.preventDefault();
        var t = $(this);
        vtwsSelectWheel(t.data("vtwsWheelPartNumber"))
    });
    n.find("a.vtws-previewWheelBtn").click(function(n) {
        n.preventDefault();
        var t = $(this);
        vtwsSelectWheel(t.data("vtwsWheelPartNumber"))
    })
}

function specModalCallback(n, t) {
    return t == "#wheelDetailsModal" ? !1 : !0
}

function redirectPost(n, t) {
    var i = $("<form><\/form>");
    i.attr("method", "post");
    i.attr("action", n);
    $.each(t, function(n, t) {
        var r = $("<input><\/input>");
        r.attr("type", "hidden");
        r.attr("name", n);
        r.attr("value", t);
        i.append(r)
    });
    $(i).appendTo("body").submit()
}

function addQuoteClickEvent(n, t, i) {
    n.find(".vtws-size-btn").click(function(n) {
        n.preventDefault();
        getWheelDataForQuote(t, i)
    })
}

function getWheelDataForQuote(n, t) {
    $.get(baseURL + "/Wheel/GetWheelPart?partNumber=" + t.partId + "&wheelId=" + t.id + "&token=" + vtwsToken, function(i) {
        i.Error == null ? (t.w_retailprice = i.RetailPrice, t.id = "", redirectPost(n, t)) : (i.Error != null && console.log("Sorry, we couldn't find any part that match your search using part number " + t.w_partnumber + " and wheel " + t.id), console.log(i.Error))
    }).fail(function() {
        console.log("failed to get wheel specs")
    })
}

function buildWheelFromTemplate(n, t, i, r, u, f, e, o) {
    var w = $("#vtws-productGrid"),
        s = w.find(".vtws-productTile").clone(),
        l, a, v, p, y, c, h;
    for (n.Customizable && s.addClass("customize"), s.find(".vtws-productName").html(n.ProductName), s.find(".vtws-productBrand").html(n.Brand), s.find(".vtws-productFinish").html(n.Finish), n.Msrp != null && n.Msrp !== 0 ? s.find(".vtws-price").html("$" + n.Msrp) : s.find(".vtws-productInfo").addClass("vtws-hide"), l = s.find(".vtws-wheel-selector"), n.FrontImage == null || n.RearImage == null ? (s.find(".vtws-previewWheelBtn").addClass("vtws-hide"), l.removeAttr("data-vtws-wheel-part-number"), l.removeAttr("href")) : (s.find(".vtws-previewWheelBtn").attr("data-vtws-wheel-part-number", n.PartNumber), l.attr("data-vtws-wheel-part-number", n.PartNumber), addWheelClickEvent(s, n.WheelId, t)), addSpecsClickEvent(s, n.WheelId, t), n.Customizable && (a = s.find(".vtws-view-customize"), a.removeClass("vtws-hide"), a.find(".customize-btn").attr("data-vtws-wheel-part-number", n.PartNumber), addCustomizeWheelEvent(a, n.WheelId)), l.html('<img width="150" height="150" src=' + n.Image + ' alt="' + n.Brand + " " + n.PartNumber + ' " />'), v = s.find(".vtws-sizeOptions"), p = v.find(".vtws-size-list-item").clone(), v.html(""), y = 0; y < n.Sizes.length; y++) c = n.Sizes[y], h = p.clone(), h.find(".vtws-size-text").html(c.Size), i.TireWeb && (h.find(".vtws-size-btn").removeClass("vtws-hide"), i.RetailPricing === !1 || c.RetailPrice === null ? h.find(".vtws-get-quote").text(i.LinkText) : h.find(".vtws-get-quote").html('<i class="vticon-cart-add"><\/i> $' + c.RetailPrice.toFixed(2)), addQuoteClickEvent(h, i.TireWebBaseUrl, {
        v_year: r,
        v_make: u,
        v_model: f,
        v_bodystyle: e,
        v_submodel: o,
        w_partnumber: n.PartNumber,
        w_brand: n.Brand,
        w_style: n.ProductName,
        w_finish: n.Finish,
        w_size: c.Size,
        w_price: n.Msrp,
        w_image: n.Image,
        id: n.WheelId,
        partId: c.Id
    })), v.append(h);
    return s
}

function addSortEvent(n) {
    n.find("a.vtws-sort-link").click(function(n) {
        n.preventDefault();
        sortingFiltering = !0;
        var t = $(this),
            r = t.data("vtwsSortDirection"),
            i = {
                field: t.data("vtwsSort"),
                direction: r
            };
        if (vtwsSettings && vtwsSettings.onSortClicked) vtwsSettings.onSortClicked(i);
        renderWheelResults(currentFilter, i)
    })
}

function addFilterEvent(n) {
    var t = n.find(".filter-brands"),
        i = n.find(".filter-wheelSize");
    t.find("a.vtws-filter-link").click(function(n) {
        n.preventDefault();
        sortingFiltering = !0;
        var t = $(this),
            i = t.data("vtwsFilter");
        if (currentFilter.brand = i, vtwsSettings && vtwsSettings.onFilterClicked) vtwsSettings.onFilterClicked(currentFilter);
        renderWheelResults(currentFilter)
    });
    i.find("a.vtws-filter-link").click(function(n) {
        n.preventDefault();
        sortingFiltering = !0;
        var t = $(this),
            i = t.data("vtwsFilter");
        if (currentFilter.diameter = i, vtwsSettings && vtwsSettings.onFilterClicked) vtwsSettings.onFilterClicked(currentFilter);
        renderWheelResults(currentFilter)
    })
}

function buildSortsFilters(n) {
    var r = $("#vtws-product-filters"),
        t = r.clone(),
        p = r.find(".filter-brands").find(".vtws-filter-link"),
        w = r.find(".filter-brands").find(".vtws-filter-option"),
        b = r.find(".filter-wheelSize").find(".vtws-filter-link"),
        k = r.find(".filter-wheelSize").find(".vtws-filter-option"),
        d = t.find(".filter-brands").find(".vtws-filter-list"),
        g = t.find(".filter-wheelSize").find(".vtws-filter-list"),
        u, f, e, i, o, a, s, v, h, c, l, y;
    for (currentFilter !== null && currentFilter.brand !== null && t.find(".filter-brands").find(".vtws-filter-option-title").html(currentFilter.brand === "" ? "All Brands" : currentFilter.brand), currentFilter !== null && currentFilter.diameter !== null && t.find(".filter-wheelSize").find(".vtws-filter-option-title").html(currentFilter.diameter === "" ? "All Sizes" : currentFilter.diameter), u = [], f = [], e = 0; e < n.WheelResultsModels.length; e++) i = n.WheelResultsModels[e].Brand, u[i] == null ? (u[i] = {
        brand: i,
        hits: 1
    }, f.push(i)) : u[i].hits++;
    for (o = 0; o < n.Diameters.length; o++) a = n.Diameters[o], s = b.clone(), s.html(a + '"'), s.attr("data-vtws-filter", a), v = k.clone(), v.html(s), g.append(v);
    for (f.sort(), h = 0; h < f.length; h++) c = f[h], l = p.clone(), l.html(c + " (" + u[c].hits + ")"), l.attr("data-vtws-filter", c), y = w.clone(), y.html(l), d.append(y);
    return addSortEvent(t), addFilterEvent(t), setupWheelFilters(t), t
}

function searchWheels(n, t, i) {
    var r = clearWheelResults();
    if (r != null) {
        r.removeClass("vtws-hide");
        t == null && $("#vtws-mainImage").addClass("vtws-hide");
        var u = n.brand !== undefined && n.brand !== null ? n.brand : "",
            f = n.diameter !== undefined && n.diameter !== null ? "&diameter=" + n.diameter : "&diameter=",
            e = i !== undefined && i !== null ? i.field : "ProductName",
            o = i !== undefined && i !== null ? i.direction : 0;
        $.get(baseURL + "/Vehicle/GetWheelResults?cid=" + t + "&brand=" + u + f + "&sortField=" + e + "&sortDirection=" + o + "&token=" + vtwsToken, function(n) {
            var f, i, e, s, h;
            if (n.Error == null) {
                var c = getYear(),
                    l = getMake(),
                    a = getModel(),
                    o = getBodyStyle();
                for (o == "BODY TYPE" && (o = ""), f = getSubModel(), f == "SUB-MODEL" && (f = ""), i = $("#vtws-productGrid"), i = i.clone(), i.html(""), sortingFiltering === !1 ? (r.append(buildSortsFilters(n)), currentWheelResults = n, currentFilter = {}) : r.append(buildSortsFilters(currentWheelResults)), e = 0; e < n.WheelResultsModels.length; e++) s = n.WheelResultsModels[e], h = buildWheelFromTemplate(s, t, n, c, l, a, o, f), i.append(h);
                if (n.WheelResultsModels.length === 0 && (console.log("Sorry, we couldn't find any products that match your search using chassis " + t + " and brand " + u), i.html('<div class="vtws-error-msg">Sorry, we couldn\'t find any products that match your search<div>')), r.append(i), $(".vtws-customize-close-button").click(function(n) {
                        n.preventDefault();
                        $("#vtws-paintWheel").addClass("vtws-hide")
                    }), $("a[rel*=leanModal]").leanModal({
                        top: 100,
                        overlay: .5,
                        closeButton: ".modal_close",
                        callback: specModalCallback
                    }), vtwsSettings && vtwsSettings.onProductsLoaded) {
                    resultHitCount = n.WheelResultsModels.length;
                    vtwsSettings.onProductsLoaded(resultHitCount)
                }
            } else console.log(n.Error)
        }).fail(function() {
            console.log("failed to get wheel results from chassis")
        })
    }
}

function renderWheelResults(n, t) {
    var i = $("#vtws-mainVehicle").data("chassisId");
    if (i == null || i === 0) {
        clearWheelResults();
        return
    }
    searchWheels(n, i, t)
}

function showVehicleLoadWheelPosition(n, t, i, r, u) {
    clientImageUpload = !1;
    showVehicle(n, t, i, r, u);
    loadWheelPosition()
}

function loadDefaultPosition() {
    var n = default_wheel_info;
    console.info(default_wheel_info);
    loadWheels(n);
    $("#vtws-mainImage").removeClass("vtws-hide")
}

function loadWheelPosition() {
    var r;
    (clientImageUpload === undefined || clientImageUpload === null) && (clientImageUpload = !1);
    var i = $("#vtws-mainVehicle").data("vehicleID"),
        n = $("#vtws-mainVehicle").data("partNumber"),
        u = $("#vtws-changeOrientation").data("orientationPrimary"),
        t = vehicleImageId;
    t === undefined && (t = null);
    console.log("loadWheelPosition - " + i);
    r = encodeURIComponent(n);
    $.get(baseURL + "/Vehicle/GetWheelPosition?vid=" + i + "&o=" + u + "&pn=" + r + "&clientUpload=" + clientImageUpload + "&imageId=" + t, function(t) {
        var i = t,
            r;
        i.VehicleID != null || i.VehicleImageId != null ? (r = o_wheel1, i.FrontMainImage != null && i.RearMainImage != null ? (r.vehicleID = i.VehicleID, r.frontWheelBase = baseURL + i.FrontMainImage, r.rearWheelBase = baseURL + i.RearMainImage, r.wvF_left = i.FrontLeft, r.wvF_top = i.FrontTop, r.wvF_width = i.FrontWidth, r.wvF_height = i.FrontHeight, r.wvF_angle = i.FrontAngle, r.wvF_flipX = i.FlipX, r.wvR_left = i.RearLeft, r.wvR_top = i.RearTop, r.wvR_width = i.RearWidth, r.wvR_height = i.RearHeight, r.wvR_angle = i.RearAngle, r.wvR_flipX = i.FlipX, loadWheels(r), $("#vtws-mainImage").removeClass("vtws-hide")) : n !== null && n !== undefined && n !== "" ? console.log("Part number not available for vehicle preview ") : (console.log("Wheel not available for vehicle preview "), $("#vtws-mainImage").removeClass("vtws-hide"))) : console.log("Wheel not available for vehicle preview ")
    })
}

function clearSecondaryWheels() {
    var t = $("#secondary-wheel-front"),
        n;
    t != null && t.remove();
    n = $("#secondary-wheel-rear");
    n != null && n.remove()
}

function loadSecondaryWheelPosition() {
    var i = $("#vtws-mainVehicle").data("vehicleID"),
        r = $("#vtws-mainVehicle").data("partNumber"),
        u = $("#vtws-changeOrientation").data("orientationSecondary"),
        n, t;
    clearSecondaryWheels();
    n = vehicleImageId;
    n === undefined && (n = null);
    t = encodeURIComponent(r);
    $.get(baseURL + "/Vehicle/GetWheelPosition?vid=" + i + "&o=" + u + "&pn=" + t + "&imageId=" + n, function(n) {
        var t = n;
        t.VehicleID != null ? t.FrontMainImage != null && t.RearMainImage != null ? (wheel.wvF_left = t.FrontLeft, wheel.wvF_top = t.FrontTop, wheel.wvF_width = t.FrontWidth, wheel.wvF_height = t.FrontHeight, wheel.wvF_angle = t.FrontAngle, wheel.wvR_left = t.RearLeft, wheel.wvR_top = t.RearTop, wheel.wvR_width = t.RearWidth, wheel.wvR_height = t.RearHeight, wheel.wvR_angle = t.RearAngle, scaleWheel(wheel, .3), $("#vtws-secondaryVehicle").prepend('<div id="secondary-wheel-front" style="position: absolute; left: ' + wheel.wvF_left + "px; top : " + wheel.wvF_top + "px; width: " + wheel.wvF_width + "px; height: " + wheel.wvF_height + 'px;"><img src="' + baseURL + t.FrontMainImage + '" alt="" style="width: 100%; height: 100%; transform: rotate(' + wheel.FrontAngle + "deg); -ms-transform: rotate(" + wheel.FrontAngle + "deg); -webkit-transform: rotate(" + wheel.FrontAngle + 'deg);"><\/div>'), $("#vtws-secondaryVehicle").prepend('<div id="secondary-wheel-rear" style="position: absolute; left: ' + wheel.wvR_left + "px; top : " + wheel.wvR_top + "px; width: " + wheel.wvR_width + "px; height: " + wheel.wvR_height + 'px;"><img src="' + baseURL + t.RearMainImage + '" alt="" style="width: 100%; height: 100%; transform: rotate(' + wheel.FrontAngle + "deg); -ms-transform: rotate(" + wheel.FrontAngle + "deg); -webkit-transform: rotate(" + wheel.FrontAngle + 'deg);"><\/div>')) : console.log("Part number not available for secondary vehicle preview ") : console.log("Wheel not available for secondary vehicle preview")
    })
}

function vtwsSelectWheel(n) {
    (n === null || n === undefined) && (n = "");
    $("#vtws-mainVehicle").data("partNumber", n);
    group_wvF && sizeUpRatio > 1 && (c_mainVehicle.remove(group_wvF), c_mainVehicle.remove(group_wvR), group_wvF = null, group_wvR = null);
    loadWheelPosition();
    loadSecondaryWheelPosition()
}

function renderSwatches(n) {
    var t = $("#vtws-swatches").data("color"),
        i = 0,
        r, u;
    return $("#vtws-swatches").html(""), r = "", $.each(n, function(n, u) {
        var f = u.shotCode.color.rgb1;
        f && r.indexOf(f + ",") < 0 && (r += f + ",", $("#vtws-swatches").append("<a href='#' title='" + u.shotCode.color.oem_name + "' data-color='" + u.shotCode.color.rgb1 + "' data-vehicle-image-url='" + u.url + "'><div class='vtws-colorSwatch' style='background-color: #" + u.shotCode.color.rgb1 + "'><\/div><\/a>"), t == f && (i = n))
    }), (t === null || t === "" || t === undefined) && (u = n[i].shotCode.color.rgb1, $("#vtws-swatches").data("color", u)), $("#vtws-swatches").show(), i
}

function loadSwatch(n) {
    n.preventDefault();
    var t = $(this);
    $("#vtws-swatches").data("color", t.data("color"));
    getVehicleImage($("#vtws-mainVehicle").data("partNumber"))
}

function changeOrientation() {
    var n = $("#vtws-changeOrientation"),
        t = n.data("orientationPrimary"),
        i = n.data("orientationSecondary");
    n.data("orientationPrimary", i);
    n.data("orientationSecondary", t);
    getVehicleImage($("#vtws-mainVehicle").data("partNumber"))
}

function loadWheelLayer(n, t, i, r, u) {
    fabric.Image.fromURL(i, function(i) {
        t = i.set({
            id: u,
            opacity: paintLayerAlpha,
            visible: r,
            width: c_mainWheel.width,
            height: c_mainWheel.height,
            selectable: !1,
            crossOrigin: "Anonymous"
        });
        n.add(t);
        u === "ib" || u === "main" ? n.sendToBack(t) : n.bringToFront(t);
        n.renderAll()
    })
}

function resetYears() {
    var n = $("#vtws-vehicle-year");
    vehicleYears.length === 0 && (n.html("<option>YEAR<\/option>"), n.val("YEAR"), n.prop("disabled", "disabled"));
    typeof setVehicleBackground != "undefined" && setVehicleBackground(c_mainVehicle, "")
}

function resetMakes() {
    var n = $("#vtws-vehicle-make");
    n.html("<option>MAKE<\/option>");
    n.val("MAKE");
    n.prop("disabled", "disabled")
}

function resetModels() {
    var n = $("#vtws-vehicle-model");
    n.html("<option>MODEL<\/option>");
    n.val("MODEL");
    n.prop("disabled", "disabled")
}

function resetBodyTypes() {
    var n = $("#vtws-vehicle-body-type");
    n.html("<option>BODY TYPE<\/option>");
    n.val("BODY TYPE");
    n.prop("disabled", "disabled")
}

function resetSubModels() {
    var n = $("#vtws-vehicle-sub-model");
    n.html("<option>SUB-MODEL<\/option>");
    n.val("SUB-MODEL");
    n.prop("disabled", "disabled")
}

function getYears() {
    resetYears();
    resetMakes();
    resetModels();
    resetBodyTypes();
    resetSubModels();
    $.get(baseURL + "/Vehicle/GetYears", function(n) {
        vehicleYears = n;
        var t = $("#vtws-vehicle-year");
        $.each(n, function(n, i) {
            t.append($("<option><\/option>").html(i))
        });
        t.prop("disabled", !1);
        autoSelect && t.val(autoSelectYear);
        getMakes()
    })
}

function getMakes() {
    var n = $("#vtws-vehicle-year").val();
    n != "YEAR" && (resetMakes(), resetModels(), resetBodyTypes(), resetSubModels(), $.get(baseURL + "/Vehicle/GetMakes/?y=" + n, function(n) {
        var t = $("#vtws-vehicle-make");
        $.each(n, function(n, i) {
            t.append($("<option><\/option>").html(i))
        });
        t.prop("disabled", !1);
        autoSelect && t.val(autoSelectMake);
        getModels()
    }))
}

function getModels() {
    var n = $("#vtws-vehicle-year").val(),
        t = $("#vtws-vehicle-make").val();
    n != "YEAR" && t != "MAKE" && (resetModels(), resetBodyTypes(), resetSubModels(), $.get(baseURL + "/Vehicle/GetModels/?y=" + n + "&m=" + t, function(n) {
        var t = $("#vtws-vehicle-model");
        $.each(n, function(n, i) {
            t.append($("<option><\/option>").html(i))
        });
        t.prop("disabled", !1);
        autoSelect ? t.val(autoSelectModel) : t.children().length == 2 && t.prop("selectedIndex", 1);
        getBodyTypes()
    }))
}

function getBodyTypes() {
    var n = $("#vtws-vehicle-year").val(),
        t = $("#vtws-vehicle-make").val(),
        i = $("#vtws-vehicle-model").val();
    n != "YEAR" && t != "MAKE" && i != "MODEL" && (resetBodyTypes(), resetSubModels(), $.get(baseURL + "/Vehicle/GetBodyTypes/?y=" + n + "&m=" + t + "&mdl=" + i, function(n) {
        var t = $("#vtws-vehicle-body-type");
        $.each(n, function(n, i) {
            t.append($("<option><\/option>").html(i))
        });
        t.prop("disabled", !1);
        autoSelect ? t.val(autoSelectBodyType) : t.children().length == 2 && t.prop("selectedIndex", 1);
        getSubModels()
    }))
}

function getSubModels() {
    var n = $("#vtws-vehicle-year").val(),
        t = $("#vtws-vehicle-make").val(),
        i = $("#vtws-vehicle-model").val(),
        r = $("#vtws-vehicle-body-type").val();
    n != "YEAR" && t != "MAKE" && i != "MODEL" && r != "BODY TYPE" && (resetSubModels(), $.get(baseURL + "/Vehicle/GetSubModels/?y=" + n + "&m=" + t + "&mdl=" + i + "&b=" + r, function(n) {
        var t = $("#vtws-vehicle-sub-model");
        $.each(n, function(n, i) {
            t.append($("<option><\/option>").html(i))
        });
        t.prop("disabled", !1);
        autoTrigger = !1;
        autoSelect ? (t.val(autoSelectSubModel), autoSelect = !1) : t.children().length == 2 && (t.prop("selectedIndex", 1), autoTrigger = !0);
        autoTrigger && subModelSelected()
    }))
}

function subModelSelected() {
    var y = $("#vtws-vehicle-year").val(),
        m = $("#vtws-vehicle-make").val(),
        mdl = $("#vtws-vehicle-model").val(),
        b = $("#vtws-vehicle-body-type").val(),
        sm = $("#vtws-vehicle-sub-model").val(),
        v, cb, url;
    y != "YEAR" && m != "MAKE" && mdl != "MODEL" && b != "BODY TYPE" && sm != "SUB-MODEL" && (v = y + "|" + m + "|" + mdl + "|" + b + "|" + sm, cb = $("#vtws-vehicle-selector").data("callback"), cb && cb != "" ? eval(cb + "('" + v + "', 0)") : (url = location.href.split("?"), history.pushState({}, "", url[0] + "?v=" + v), showVehicleHeaderText(y, m, mdl, b, sm), getVehicleImage()))
}

function showVehicleHeaderText(n, t, i, r, u) {
    $("#vtws-selected-vehicle > span").html('<span class="vtws-year">' + n + ' <\/span><span class="vtws-make">' + t + ' <\/span><span class="vtws-model">' + i + ' <\/span><span class="vtws-bodyStyle">' + r + ' <\/span><span class="vtws-subModel">' + u + " <\/span>");
    $("#vtws-selected-vehicle").show();
    $("#vtws-select-menus").hide()
}

function prepareVehicleArea() {
    $("#vtws-vehicleSelect").hide();
    $("#vtws-mainImage").show()
}

function vtwsSelectVehicle(n, t, i, r, u, f, e, o, s, h) {
    if (s == null && (s = !0), e === null || e === undefined || e === !0) {
        var c = qs("v");
        if (c && c != "") return
    }
    prepareVehicleArea();
    showVehicleHeaderText(n, t, i, r, u);
    prepareVehicleArea();
    vtwsSetAndSelectVehicleOption("year", n);
    vtwsSetAndSelectVehicleOption("make", t);
    vtwsSetAndSelectVehicleOption("model", i);
    vtwsSetAndSelectVehicleOption("body-type", r);
    vtwsSetAndSelectVehicleOption("sub-model", u);
    o !== null && o !== undefined && $("#vtws-productBrand").val(o);
    getVehicleImage(f, s, h)
}

function vtwsLoadBuilder(n) {
    var t = $("#vtws-wheelBuilder"),
        i;
    if (t.length === 0) return null;
    t.html("");
    displayCustomizeWheel(null, n, !1);
    i = $("#vtws-customize-wheel-section");
    t.append(i)
}

function vtwsSetAndSelectVehicleOption(n, t) {
    var i = $("#vtws-vehicle-" + n);
    i.append($("<option><\/option>").html(t));
    i.val(t)
}

function vtwsChangeVehicle() {
    vtwsSettings && vtwsSettings.vehicleChangeClicked && vtwsSettings.vehicleChangeClicked();
    showWheelResults(!1);
    $("#vtws-selected-vehicle").hide();
    getYears(!1);
    $("#vtws-select-menus").show();
    prepareVehicleArea()
}
var fabric = fabric || {
    version: "1.6.6"
};
typeof exports != "undefined" && (exports.fabric = fabric);
typeof document != "undefined" && typeof window != "undefined" ? (fabric.document = document, fabric.window = window, window.fabric = fabric) : (fabric.document = require("jsdom").jsdom("<!DOCTYPE html><html><head><\/head><body><\/body><\/html>"), fabric.window = fabric.document.createWindow ? fabric.document.createWindow() : fabric.document.parentWindow);
fabric.isTouchSupported = "ontouchstart" in fabric.document.documentElement;
fabric.isLikelyNode = typeof Buffer != "undefined" && typeof window == "undefined";
fabric.SHARED_ATTRIBUTES = ["display", "transform", "fill", "fill-opacity", "fill-rule", "opacity", "stroke", "stroke-dasharray", "stroke-linecap", "stroke-linejoin", "stroke-miterlimit", "stroke-opacity", "stroke-width", "id"];
fabric.DPI = 96;
fabric.reNum = "(?:[-+]?(?:\\d+|\\d*\\.\\d+)(?:e[-+]?\\d+)?)";
fabric.fontPaths = {};
fabric.charWidthsCache = {};
fabric.devicePixelRatio = fabric.window.devicePixelRatio || fabric.window.webkitDevicePixelRatio || fabric.window.mozDevicePixelRatio || 1,
    function() {
        function n(n, t) {
            if (this.__eventListeners[n]) {
                var i = this.__eventListeners[n];
                t ? i[i.indexOf(t)] = !1 : fabric.util.array.fill(i, !1)
            }
        }

        function t(n, t) {
            if (this.__eventListeners || (this.__eventListeners = {}), arguments.length === 1)
                for (var i in n) this.on(i, n[i]);
            else this.__eventListeners[n] || (this.__eventListeners[n] = []), this.__eventListeners[n].push(t);
            return this
        }

        function i(t, i) {
            if (this.__eventListeners) {
                if (arguments.length === 0)
                    for (t in this.__eventListeners) n.call(this, t);
                else if (arguments.length === 1 && typeof arguments[0] == "object")
                    for (var r in t) n.call(this, r, t[r]);
                else n.call(this, t, i);
                return this
            }
        }

        function r(n, t) {
            var i, r, u;
            if (this.__eventListeners && (i = this.__eventListeners[n], i)) {
                for (r = 0, u = i.length; r < u; r++) i[r] && i[r].call(this, t || {});
                return this.__eventListeners[n] = i.filter(function(n) {
                    return n !== !1
                }), this
            }
        }
        fabric.Observable = {
            observe: t,
            stopObserving: i,
            fire: r,
            on: t,
            off: i,
            trigger: r
        }
    }();
fabric.Collection = {
        _objects: [],
        add: function() {
            if (this._objects.push.apply(this._objects, arguments), this._onObjectAdded)
                for (var n = 0, t = arguments.length; n < t; n++) this._onObjectAdded(arguments[n]);
            return this.renderOnAddRemove && this.renderAll(), this
        },
        insertAt: function(n, t, i) {
            var r = this.getObjects();
            return i ? r[t] = n : r.splice(t, 0, n), this._onObjectAdded && this._onObjectAdded(n), this.renderOnAddRemove && this.renderAll(), this
        },
        remove: function() {
            for (var i = this.getObjects(), t, r = !1, n = 0, u = arguments.length; n < u; n++) t = i.indexOf(arguments[n]), t !== -1 && (r = !0, i.splice(t, 1), this._onObjectRemoved && this._onObjectRemoved(arguments[n]));
            return this.renderOnAddRemove && r && this.renderAll(), this
        },
        forEachObject: function(n, t) {
            for (var r = this.getObjects(), i = 0, u = r.length; i < u; i++) n.call(t, r[i], i, r);
            return this
        },
        getObjects: function(n) {
            return typeof n == "undefined" ? this._objects : this._objects.filter(function(t) {
                return t.type === n
            })
        },
        item: function(n) {
            return this.getObjects()[n]
        },
        isEmpty: function() {
            return this.getObjects().length === 0
        },
        size: function() {
            return this.getObjects().length
        },
        contains: function(n) {
            return this.getObjects().indexOf(n) > -1
        },
        complexity: function() {
            return this.getObjects().reduce(function(n, t) {
                return n + (t.complexity ? t.complexity() : 0)
            }, 0)
        }
    },
    function(n) {
        var u = Math.sqrt,
            i = Math.atan2,
            f = Math.pow,
            r = Math.abs,
            t = Math.PI / 180;
        fabric.util = {
            removeFromArray: function(n, t) {
                var i = n.indexOf(t);
                return i !== -1 && n.splice(i, 1), n
            },
            getRandomInt: function(n, t) {
                return Math.floor(Math.random() * (t - n + 1)) + n
            },
            degreesToRadians: function(n) {
                return n * t
            },
            radiansToDegrees: function(n) {
                return n / t
            },
            rotatePoint: function(n, t, i) {
                n.subtractEquals(t);
                var r = fabric.util.rotateVector(n, i);
                return new fabric.Point(r.x, r.y).addEquals(t)
            },
            rotateVector: function(n, t) {
                var i = Math.sin(t),
                    r = Math.cos(t),
                    u = n.x * r - n.y * i,
                    f = n.x * i + n.y * r;
                return {
                    x: u,
                    y: f
                }
            },
            transformPoint: function(n, t, i) {
                return i ? new fabric.Point(t[0] * n.x + t[2] * n.y, t[1] * n.x + t[3] * n.y) : new fabric.Point(t[0] * n.x + t[2] * n.y + t[4], t[1] * n.x + t[3] * n.y + t[5])
            },
            makeBoundingBoxFromPoints: function(n) {
                var t = [n[0].x, n[1].x, n[2].x, n[3].x],
                    i = fabric.util.array.min(t),
                    f = fabric.util.array.max(t),
                    e = Math.abs(i - f),
                    r = [n[0].y, n[1].y, n[2].y, n[3].y],
                    u = fabric.util.array.min(r),
                    o = fabric.util.array.max(r),
                    s = Math.abs(u - o);
                return {
                    left: i,
                    top: u,
                    width: e,
                    height: s
                }
            },
            invertTransform: function(n) {
                var t = 1 / (n[0] * n[3] - n[1] * n[2]),
                    i = [t * n[3], -t * n[1], -t * n[2], t * n[0]],
                    r = fabric.util.transformPoint({
                        x: n[4],
                        y: n[5]
                    }, i, !0);
                return i[4] = -r.x, i[5] = -r.y, i
            },
            toFixed: function(n, t) {
                return parseFloat(Number(n).toFixed(t))
            },
            parseUnit: function(n, t) {
                var r = /\D{0,2}$/.exec(n),
                    i = parseFloat(n);
                t || (t = fabric.Text.DEFAULT_SVG_FONT_SIZE);
                switch (r[0]) {
                    case "mm":
                        return i * fabric.DPI / 25.4;
                    case "cm":
                        return i * fabric.DPI / 2.54;
                    case "in":
                        return i * fabric.DPI;
                    case "pt":
                        return i * fabric.DPI / 72;
                    case "pc":
                        return i * fabric.DPI / 6;
                    case "em":
                        return i * t;
                    default:
                        return i
                }
            },
            falseFunction: function() {
                return !1
            },
            getKlass: function(n, t) {
                return n = fabric.util.string.camelize(n.charAt(0).toUpperCase() + n.slice(1)), fabric.util.resolveNamespace(t)[n]
            },
            resolveNamespace: function(t) {
                if (!t) return fabric;
                for (var u = t.split("."), f = u.length, r = n || fabric.window, i = 0; i < f; ++i) r = r[u[i]];
                return r
            },
            loadImage: function(n, t, i, r) {
                if (!n) {
                    t && t.call(i, n);
                    return
                }
                var u = fabric.util.createImage();
                u.onload = function() {
                    t && t.call(i, u);
                    u = u.onload = u.onerror = null
                };
                u.onerror = function() {
                    fabric.log("Error loading " + u.src);
                    t && t.call(i, null, !0);
                    u = u.onload = u.onerror = null
                };
                r = "anonymous";
                n.indexOf("data") !== 0 && r && (u.crossOrigin = r);
                u.src = n
            },
            enlivenObjects: function(n, t, i, r) {
                function f() {
                    ++o === e && t && t(u)
                }
                n = n || [];
                var u = [],
                    o = 0,
                    e = n.length;
                if (!e) {
                    t && t(u);
                    return
                }
                n.forEach(function(n, t) {
                    if (!n || !n.type) {
                        f();
                        return
                    }
                    var e = fabric.util.getKlass(n.type, i);
                    e.async ? e.fromObject(n, function(i, e) {
                        e || (u[t] = i, r && r(n, u[t]));
                        f()
                    }) : (u[t] = e.fromObject(n), r && r(n, u[t]), f())
                })
            },
            groupSVGElements: function(n, t, i) {
                var r;
                return r = new fabric.PathGroup(n, t), typeof i != "undefined" && r.setSourcePath(i), r
            },
            populateWithProperties: function(n, t, i) {
                if (i && Object.prototype.toString.call(i) === "[object Array]")
                    for (var r = 0, u = i.length; r < u; r++) i[r] in n && (t[i[r]] = n[i[r]])
            },
            drawDashedLine: function(n, t, r, f, e, o) {
                var s = f - t,
                    h = e - r,
                    c = u(s * s + h * h),
                    a = i(h, s),
                    v = o.length,
                    y = 0,
                    l = !0;
                for (n.save(), n.translate(t, r), n.moveTo(0, 0), n.rotate(a), t = 0; c > t;) t += o[y++ % v], t > c && (t = c), n[l ? "lineTo" : "moveTo"](t, 0), l = !l;
                n.restore()
            },
            createCanvasElement: function(n) {
                return n || (n = fabric.document.createElement("canvas")), n.getContext || typeof G_vmlCanvasManager == "undefined" || G_vmlCanvasManager.initElement(n), n
            },
            createImage: function() {
                return fabric.isLikelyNode ? new(require("canvas").Image) : fabric.document.createElement("img")
            },
            createAccessors: function(n) {
                for (var t = n.prototype, i, u, f, e, r = t.stateProperties.length; r--;) i = t.stateProperties[r], u = i.charAt(0).toUpperCase() + i.slice(1), f = "set" + u, e = "get" + u, t[e] || (t[e] = function(n) {
                    return new Function('return this.get("' + n + '")')
                }(i)), t[f] || (t[f] = function(n) {
                    return new Function("value", 'return this.set("' + n + '", value)')
                }(i))
            },
            clipContext: function(n, t) {
                t.save();
                t.beginPath();
                n.clipTo(t);
                t.clip()
            },
            multiplyTransformMatrices: function(n, t, i) {
                return [n[0] * t[0] + n[2] * t[1], n[1] * t[0] + n[3] * t[1], n[0] * t[2] + n[2] * t[3], n[1] * t[2] + n[3] * t[3], i ? 0 : n[0] * t[4] + n[2] * t[5] + n[4], i ? 0 : n[1] * t[4] + n[3] * t[5] + n[5]]
            },
            qrDecompose: function(n) {
                var o = i(n[1], n[0]),
                    r = f(n[0], 2) + f(n[1], 2),
                    e = u(r),
                    s = (n[0] * n[3] - n[2] * n[1]) / e,
                    h = i(n[0] * n[2] + n[1] * n[3], r);
                return {
                    angle: o / t,
                    scaleX: e,
                    scaleY: s,
                    skewX: h / t,
                    skewY: 0,
                    translateX: n[4],
                    translateY: n[5]
                }
            },
            customTransformMatrix: function(n, i, u) {
                var f = [1, 0, r(Math.tan(u * t)), 1],
                    e = [r(n), 0, 0, r(i)];
                return fabric.util.multiplyTransformMatrices(e, f, !0)
            },
            resetObjectTransform: function(n) {
                n.scaleX = 1;
                n.scaleY = 1;
                n.skewX = 0;
                n.skewY = 0;
                n.flipX = !1;
                n.flipY = !1;
                n.setAngle(0)
            },
            getFunctionBody: function(n) {
                return (String(n).match(/function[^{]*\{([\s\S]*)\}/) || {})[1]
            },
            isTransparent: function(n, t, i, r) {
                r > 0 && (t > r ? t -= r : t = 0, i > r ? i -= r : i = 0);
                for (var f = !0, o, e = n.getImageData(t, i, r * 2 || 1, r * 2 || 1), s = e.data.length, u = 3; u < s; u += 4)
                    if (o = e.data[u], f = o <= 0, f === !1) break;
                return e = null, f
            },
            parsePreserveAspectRatioAttribute: function(n) {
                var t = "meet",
                    u = "Mid",
                    f = "Mid",
                    r = n.split(" "),
                    i;
                return r && r.length && (t = r.pop(), t !== "meet" && t !== "slice" ? (i = t, t = "meet") : r.length && (i = r.pop())), u = i !== "none" ? i.slice(1, 4) : "none", f = i !== "none" ? i.slice(5, 8) : "none", {
                    meetOrSlice: t,
                    alignX: u,
                    alignY: f
                }
            },
            clearFabricFontCache: function(n) {
                n ? fabric.charWidthsCache[n] && delete fabric.charWidthsCache[n] : fabric.charWidthsCache = {}
            }
        }
    }(typeof exports != "undefined" ? exports : this),
    function() {
        function u(n, i, u, e, s, h, c) {
            var rt = r.call(arguments),
                et, y;
            if (t[rt]) return t[rt];
            var nt = Math.PI,
                ht = c * nt / 180,
                p = Math.sin(ht),
                w = Math.cos(ht),
                ct = 0,
                lt = 0;
            u = Math.abs(u);
            e = Math.abs(e);
            var l = -w * n * .5 - p * i * .5,
                a = -w * i * .5 + p * n * .5,
                tt = u * u,
                it = e * e,
                at = a * a,
                vt = l * l,
                ut = tt * it - tt * at - it * vt,
                ft = 0;
            ut < 0 ? (et = Math.sqrt(1 - ut / (tt * it)), u *= et, e *= et) : ft = (s === h ? -1 : 1) * Math.sqrt(ut / (tt * at + it * vt));
            var b = ft * u * a / e,
                k = -ft * e * l / u,
                pt = w * b - p * k + n * .5,
                wt = p * b + w * k + i * .5,
                ot = f(1, 0, (l - b) / u, (a - k) / e),
                v = f((l - b) / u, (a - k) / e, (-l - b) / u, (-a - k) / e);
            h === 0 && v > 0 ? v -= 2 * nt : h === 1 && v < 0 && (v += 2 * nt);
            var yt = Math.ceil(Math.abs(v / nt * 2)),
                d = [],
                g = v / yt,
                bt = 8 / 3 * Math.sin(g / 4) * Math.sin(g / 4) / Math.sin(g / 2),
                st = ot + g;
            for (y = 0; y < yt; y++) d[y] = o(ot, st, w, p, u, e, pt, wt, bt, ct, lt), ct = d[y][4], lt = d[y][5], ot = st, st += g;
            return t[rt] = d, d
        }

        function o(t, i, u, f, e, o, s, h, c, l, a) {
            var v = r.call(arguments);
            if (n[v]) return n[v];
            var w = Math.cos(t),
                b = Math.sin(t),
                y = Math.cos(i),
                p = Math.sin(i),
                k = u * e * y - f * o * p + s,
                d = f * e * y + u * o * p + h,
                g = l + c * (-u * e * b - f * o * w),
                nt = a + c * (-f * e * b + u * o * w),
                tt = k + c * (u * e * p + f * o * y),
                it = d + c * (f * e * p - u * o * y);
            return n[v] = [g, nt, tt, it, k, d], n[v]
        }

        function f(n, t, i, r) {
            var u = Math.atan2(t, n),
                f = Math.atan2(r, i);
            return f >= u ? f - u : 2 * Math.PI - (u - f)
        }

        function e(n, t, u, f, e, o, s, h) {
            var tt = r.call(arguments),
                nt, st, ht, p, b, l, ut;
            if (i[tt]) return i[tt];
            var ct = Math.sqrt,
                ft = Math.min,
                et = Math.max,
                ot = Math.abs,
                w = [],
                a = [
                    [],
                    []
                ],
                y, v, k, c, d, g, it, rt;
            for (v = 6 * n - 12 * u + 6 * e, y = -3 * n + 9 * u - 9 * e + 3 * s, k = 3 * u - 3 * n, nt = 0; nt < 2; ++nt) {
                if (nt > 0 && (v = 6 * t - 12 * f + 6 * o, y = -3 * t + 9 * f - 9 * o + 3 * h, k = 3 * f - 3 * t), ot(y) < 1e-12) {
                    if (ot(v) < 1e-12) continue;
                    c = -k / v;
                    0 < c && c < 1 && w.push(c);
                    continue
                }(it = v * v - 4 * k * y, it < 0) || (rt = ct(it), d = (-v + rt) / (2 * y), 0 < d && d < 1 && w.push(d), g = (-v - rt) / (2 * y), 0 < g && g < 1 && w.push(g))
            }
            for (p = w.length, b = p; p--;) c = w[p], l = 1 - c, st = l * l * l * n + 3 * l * l * c * u + 3 * l * c * c * e + c * c * c * s, a[0][p] = st, ht = l * l * l * t + 3 * l * l * c * f + 3 * l * c * c * o + c * c * c * h, a[1][p] = ht;
            return a[0][b] = n, a[1][b] = t, a[0][b + 1] = s, a[1][b + 1] = h, ut = [{
                x: ft.apply(null, a[0]),
                y: ft.apply(null, a[1])
            }, {
                x: et.apply(null, a[0]),
                y: et.apply(null, a[1])
            }], i[tt] = ut, ut
        }
        var t = {},
            n = {},
            i = {},
            r = Array.prototype.join;
        fabric.util.drawArc = function(n, t, i, r) {
            for (var s = r[0], h = r[1], c = r[2], l = r[3], a = r[4], v = r[5], y = r[6], e = [
                    [],
                    [],
                    [],
                    []
                ], o = u(v - t, y - i, s, h, l, a, c), f = 0, p = o.length; f < p; f++) e[f][0] = o[f][0] + t, e[f][1] = o[f][1] + i, e[f][2] = o[f][2] + t, e[f][3] = o[f][3] + i, e[f][4] = o[f][4] + t, e[f][5] = o[f][5] + i, n.bezierCurveTo.apply(n, e[f])
        };
        fabric.util.getBoundsOfArc = function(n, t, i, r, f, o, s, h, c) {
            for (var p = 0, w = 0, v, y = [], a = u(h - n, c - t, i, r, o, s, f), l = 0, b = a.length; l < b; l++) v = e(p, w, a[l][0], a[l][1], a[l][2], a[l][3], a[l][4], a[l][5]), y.push({
                x: v[0].x + n,
                y: v[0].y + t
            }), y.push({
                x: v[1].x + n,
                y: v[1].y + t
            }), p = a[l][4], w = a[l][5];
            return y
        };
        fabric.util.getBoundsOfCurve = e
    }(),
    function() {
        function i(n, i) {
            for (var u = t.call(arguments, 2), f = [], r = 0, e = n.length; r < e; r++) f[r] = u.length ? n[r][i].apply(n[r], u) : n[r][i].call(n[r]);
            return f
        }

        function r(t, i) {
            return n(t, i, function(n, t) {
                return n >= t
            })
        }

        function u(t, i) {
            return n(t, i, function(n, t) {
                return n < t
            })
        }

        function f(n, t) {
            for (var i = n.length; i--;) n[i] = t;
            return n
        }

        function n(n, t, i) {
            if (n && n.length !== 0) {
                var r = n.length - 1,
                    u = t ? n[r][t] : n[r];
                if (t)
                    while (r--) i(n[r][t], u) && (u = n[r][t]);
                else
                    while (r--) i(n[r], u) && (u = n[r]);
                return u
            }
        }
        var t = Array.prototype.slice;
        Array.prototype.indexOf || (Array.prototype.indexOf = function(n) {
            var u, r, t, i;
            if (this === void 0 || this === null) throw new TypeError;
            if ((u = Object(this), r = u.length >>> 0, r === 0) || (t = 0, arguments.length > 0 && (t = Number(arguments[1]), t !== t ? t = 0 : t !== 0 && t !== Number.POSITIVE_INFINITY && t !== Number.NEGATIVE_INFINITY && (t = (t > 0 || -1) * Math.floor(Math.abs(t)))), t >= r)) return -1;
            for (i = t >= 0 ? t : Math.max(r - Math.abs(t), 0); i < r; i++)
                if (i in u && u[i] === n) return i;
            return -1
        });
        Array.prototype.forEach || (Array.prototype.forEach = function(n, t) {
            for (var i = 0, r = this.length >>> 0; i < r; i++) i in this && n.call(t, this[i], i, this)
        });
        Array.prototype.map || (Array.prototype.map = function(n, t) {
            for (var r = [], i = 0, u = this.length >>> 0; i < u; i++) i in this && (r[i] = n.call(t, this[i], i, this));
            return r
        });
        Array.prototype.every || (Array.prototype.every = function(n, t) {
            for (var i = 0, r = this.length >>> 0; i < r; i++)
                if (i in this && !n.call(t, this[i], i, this)) return !1;
            return !0
        });
        Array.prototype.some || (Array.prototype.some = function(n, t) {
            for (var i = 0, r = this.length >>> 0; i < r; i++)
                if (i in this && n.call(t, this[i], i, this)) return !0;
            return !1
        });
        Array.prototype.filter || (Array.prototype.filter = function(n, t) {
            for (var u = [], r, i = 0, f = this.length >>> 0; i < f; i++) i in this && (r = this[i], n.call(t, r, i, this) && u.push(r));
            return u
        });
        Array.prototype.reduce || (Array.prototype.reduce = function(n) {
            var r = this.length >>> 0,
                t = 0,
                i;
            if (arguments.length > 1) i = arguments[1];
            else
                do {
                    if (t in this) {
                        i = this[t++];
                        break
                    }
                    if (++t >= r) throw new TypeError;
                } while (1);
            for (; t < r; t++) t in this && (i = n.call(null, i, this[t], t, this));
            return i
        });
        fabric.util.array = {
            fill: f,
            invoke: i,
            min: u,
            max: r
        }
    }(),
    function() {
        function t(t, i, r) {
            var u;
            if (r)
                if (!fabric.isLikelyNode && i instanceof Element) t = i;
                else if (i instanceof Array) t = i.map(function(t) {
                return n(t, r)
            });
            else if (i instanceof Object)
                for (u in i) t[u] = n(i[u], r);
            else t = i;
            else
                for (u in i) t[u] = i[u];
            return t
        }

        function n(n, i) {
            return t({}, n, i)
        }
        fabric.util.object = {
            extend: t,
            clone: n
        }
    }(),
    function() {
        function n(n) {
            return n.replace(/-+(.)?/g, function(n, t) {
                return t ? t.toUpperCase() : ""
            })
        }

        function t(n, t) {
            return n.charAt(0).toUpperCase() + (t ? n.slice(1) : n.slice(1).toLowerCase())
        }

        function i(n) {
            return n.replace(/&/g, "&amp;").replace(/"/g, "&quot;").replace(/'/g, "&apos;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
        }
        String.prototype.trim || (String.prototype.trim = function() {
            return this.replace(/^[\s\xA0]+/, "").replace(/[\s\xA0]+$/, "")
        });
        fabric.util.string = {
            camelize: n,
            capitalize: t,
            escapeXml: i
        }
    }(),
    function() {
        var t = Array.prototype.slice,
            i = Function.prototype.apply,
            n = function() {};
        Function.prototype.bind || (Function.prototype.bind = function(r) {
            var f = this,
                e = t.call(arguments, 1),
                u;
            return u = e.length ? function() {
                return i.call(f, this instanceof n ? this : r, e.concat(t.call(arguments)))
            } : function() {
                return i.call(f, this instanceof n ? this : r, arguments)
            }, n.prototype = this.prototype, u.prototype = new n, u
        })
    }(),
    function() {
        function t() {}

        function f(t) {
            var i = this.constructor.superclass.prototype[t];
            return arguments.length > 1 ? i.apply(this, n.call(arguments, 1)) : i.call(this)
        }

        function e() {
            function r() {
                this.initialize.apply(this, arguments)
            }
            var e = null,
                o = n.call(arguments, 0),
                s, h;
            for (typeof o[0] == "function" && (e = o.shift()), r.superclass = e, r.subclasses = [], e && (t.prototype = e.prototype, r.prototype = new t, e.subclasses.push(r)), s = 0, h = o.length; s < h; s++) u(r, o[s], e);
            return r.prototype.initialize || (r.prototype.initialize = i), r.prototype.constructor = r, r.prototype.callSuper = f, r
        }
        var n = Array.prototype.slice,
            i = function() {},
            r = function() {
                for (var n in {
                        toString: 1
                    })
                    if (n === "toString") return !1;
                return !0
            }(),
            u = function(n, t, i) {
                for (var u in t) n.prototype[u] = u in n.prototype && typeof n.prototype[u] == "function" && (t[u] + "").indexOf("callSuper") > -1 ? function(n) {
                    return function() {
                        var u = this.constructor.superclass,
                            r;
                        return this.constructor.superclass = i, r = t[n].apply(this, arguments), this.constructor.superclass = u, n !== "initialize" ? r : void 0
                    }
                }(u) : t[u], r && (t.toString !== Object.prototype.toString && (n.prototype.toString = t.toString), t.valueOf !== Object.prototype.valueOf && (n.prototype.valueOf = t.valueOf))
            };
        fabric.util.createClass = e
    }(),
    function() {
        function i(n) {
            for (var i = Array.prototype.slice.call(arguments, 1), r, u = i.length, t = 0; t < u; t++)
                if (r = typeof n[i[t]], !/^(?:function|object|unknown)$/.test(r)) return !1;
            return !0
        }

        function a(n, t) {
            return {
                handler: t,
                wrappedHandler: v(n, t)
            }
        }

        function v(n, t) {
            return function(i) {
                t.call(h(n), i || fabric.window.event)
            }
        }

        function y(t, i) {
            return function(r) {
                var f, u, e;
                if (n[t] && n[t][i])
                    for (f = n[t][i], u = 0, e = f.length; u < e; u++) f[u].call(this, r || fabric.window.event)
            }
        }

        function b(n) {
            n || (n = fabric.window.event);
            var i = n.target || (typeof n.srcElement !== e ? n.srcElement : null),
                t = fabric.util.getScrollLeftTop(i);
            return {
                x: o(n) + t.left,
                y: s(n) + t.top
            }
        }

        function l(n, t, i) {
            var r = n.type === "touchend" ? "changedTouches" : "touches";
            return n[r] && n[r][0] ? n[r][0][t] - (n[r][0][t] - n[r][0][i]) || n[i] : n[i]
        }
        var e = "unknown",
            h, c, r = function() {
                var n = 0;
                return function(t) {
                    return t.__uniqueID || (t.__uniqueID = "uniqueID__" + n++)
                }
            }(),
            o, s;
        (function() {
            var n = {};
            h = function(t) {
                return n[t]
            };
            c = function(t, i) {
                n[t] = i
            }
        })();
        var p = i(fabric.document.documentElement, "addEventListener", "removeEventListener") && i(fabric.window, "addEventListener", "removeEventListener"),
            w = i(fabric.document.documentElement, "attachEvent", "detachEvent") && i(fabric.window, "attachEvent", "detachEvent"),
            t = {},
            n = {},
            u, f;
        p ? (u = function(n, t, i) {
            n.addEventListener(t, i, !1)
        }, f = function(n, t, i) {
            n.removeEventListener(t, i, !1)
        }) : w ? (u = function(n, i, u) {
            var f = r(n),
                e;
            c(f, n);
            t[f] || (t[f] = {});
            t[f][i] || (t[f][i] = []);
            e = a(f, u);
            t[f][i].push(e);
            n.attachEvent("on" + i, e.wrappedHandler)
        }, f = function(n, i, u) {
            var f = r(n),
                o, e, s;
            if (t[f] && t[f][i])
                for (e = 0, s = t[f][i].length; e < s; e++) o = t[f][i][e], o && o.handler === u && (n.detachEvent("on" + i, o.wrappedHandler), t[f][i][e] = null)
        }) : (u = function(t, i, u) {
            var f = r(t),
                e;
            n[f] || (n[f] = {});
            n[f][i] || (n[f][i] = [], e = t["on" + i], e && n[f][i].push(e), t["on" + i] = y(f, i));
            n[f][i].push(u)
        }, f = function(t, i, u) {
            var o = r(t),
                e, f, s;
            if (n[o] && n[o][i])
                for (e = n[o][i], f = 0, s = e.length; f < s; f++) e[f] === u && e.splice(f, 1)
        });
        fabric.util.addListener = u;
        fabric.util.removeListener = f;
        o = function(n) {
            return typeof n.clientX !== e ? n.clientX : 0
        };
        s = function(n) {
            return typeof n.clientY !== e ? n.clientY : 0
        };
        fabric.isTouchSupported && (o = function(n) {
            return l(n, "pageX", "clientX")
        }, s = function(n) {
            return l(n, "pageY", "clientY")
        });
        fabric.util.getPointer = b;
        fabric.util.object.extend(fabric.util, fabric.Observable)
    }(),
    function() {
        function r(t, i) {
            var u = t.style,
                r, f;
            if (!u) return t;
            if (typeof i == "string") return t.style.cssText += ";" + i, i.indexOf("opacity") > -1 ? n(t, i.match(/opacity:\s*(\d?\.?\d*)/)[1]) : t;
            for (r in i) r === "opacity" ? n(t, i[r]) : (f = r === "float" || r === "cssFloat" ? typeof u.styleFloat == "undefined" ? "cssFloat" : "styleFloat" : r, u[f] = i[r]);
            return t
        }
        var t = fabric.document.createElement("div"),
            u = typeof t.style.opacity == "string",
            f = typeof t.style.filter == "string",
            i = /alpha\s*\(\s*opacity\s*=\s*([^\)]+)\)/,
            n = function(n) {
                return n
            };
        u ? n = function(n, t) {
            return n.style.opacity = t, n
        } : f && (n = function(n, t) {
            var r = n.style;
            return n.currentStyle && !n.currentStyle.hasLayout && (r.zoom = 1), i.test(r.filter) ? (t = t >= .9999 ? "" : "alpha(opacity=" + t * 100 + ")", r.filter = r.filter.replace(i, t)) : r.filter += " alpha(opacity=" + t * 100 + ")", n
        });
        fabric.util.setStyle = r
    }(),
    function() {
        function e(n) {
            return typeof n == "string" ? fabric.document.getElementById(n) : n
        }

        function r(n, t) {
            var r = fabric.document.createElement(n);
            for (var i in t) i === "class" ? r.className = t[i] : i === "for" ? r.htmlFor = t[i] : r.setAttribute(i, t[i]);
            return r
        }

        function o(n, t) {
            n && (" " + n.className + " ").indexOf(" " + t + " ") === -1 && (n.className += (n.className ? " " : "") + t)
        }

        function s(n, t, i) {
            return typeof t == "string" && (t = r(t, i)), n.parentNode && n.parentNode.replaceChild(t, n), t.appendChild(n), t
        }

        function u(n) {
            for (var t = 0, i = 0, r = fabric.document.documentElement, u = fabric.document.body || {
                    scrollLeft: 0,
                    scrollTop: 0
                }; n && (n.parentNode || n.host);)
                if (n = n.parentNode || n.host, n === fabric.document ? (t = u.scrollLeft || r.scrollLeft || 0, i = u.scrollTop || r.scrollTop || 0) : (t += n.scrollLeft || 0, i += n.scrollTop || 0), n.nodeType === 1 && fabric.util.getElementStyle(n, "position") === "fixed") break;
            return {
                left: t,
                top: i
            }
        }

        function h(n) {
            var r, s = n && n.ownerDocument,
                f = {
                    left: 0,
                    top: 0
                },
                i = {
                    left: 0,
                    top: 0
                },
                e, h = {
                    borderLeftWidth: "left",
                    borderTopWidth: "top",
                    paddingLeft: "left",
                    paddingTop: "top"
                },
                o;
            if (!s) return i;
            for (o in h) i[h[o]] += parseInt(t(n, o), 10) || 0;
            return r = s.documentElement, typeof n.getBoundingClientRect != "undefined" && (f = n.getBoundingClientRect()), e = u(n), {
                left: f.left + e.left - (r.clientLeft || 0) + i.left,
                top: f.top + e.top - (r.clientTop || 0) + i.top
            }
        }
        var f = Array.prototype.slice,
            i, n = function(n) {
                return f.call(n, 0)
            },
            t;
        try {
            i = n(fabric.document.childNodes) instanceof Array
        } catch (c) {}
        i || (n = function(n) {
            for (var i = new Array(n.length), t = n.length; t--;) i[t] = n[t];
            return i
        });
        t = fabric.document.defaultView && fabric.document.defaultView.getComputedStyle ? function(n, t) {
                var i = fabric.document.defaultView.getComputedStyle(n, null);
                return i ? i[t] : undefined
            } : function(n, t) {
                var i = n.style[t];
                return !i && n.currentStyle && (i = n.currentStyle[t]), i
            },
            function() {
                function i(n) {
                    return typeof n.onselectstart != "undefined" && (n.onselectstart = fabric.util.falseFunction), t ? n.style[t] = "none" : typeof n.unselectable == "string" && (n.unselectable = "on"), n
                }

                function r(n) {
                    return typeof n.onselectstart != "undefined" && (n.onselectstart = null), t ? n.style[t] = "" : typeof n.unselectable == "string" && (n.unselectable = ""), n
                }
                var n = fabric.document.documentElement.style,
                    t = "userSelect" in n ? "userSelect" : "MozUserSelect" in n ? "MozUserSelect" : "WebkitUserSelect" in n ? "WebkitUserSelect" : "KhtmlUserSelect" in n ? "KhtmlUserSelect" : "";
                fabric.util.makeElementUnselectable = i;
                fabric.util.makeElementSelectable = r
            }(),
            function() {
                function n(n, t) {
                    var u = fabric.document.getElementsByTagName("head")[0],
                        i = fabric.document.createElement("script"),
                        r = !0;
                    i.onload = i.onreadystatechange = function(n) {
                        if (r) {
                            if (typeof this.readyState == "string" && this.readyState !== "loaded" && this.readyState !== "complete") return;
                            r = !1;
                            t(n || fabric.window.event);
                            i = i.onload = i.onreadystatechange = null
                        }
                    };
                    i.src = n;
                    u.appendChild(i)
                }
                fabric.util.getScript = n
            }();
        fabric.util.getById = e;
        fabric.util.toArray = n;
        fabric.util.makeElement = r;
        fabric.util.addClass = o;
        fabric.util.wrapElement = s;
        fabric.util.getScrollLeftTop = u;
        fabric.util.getElementOffset = h;
        fabric.util.getElementStyle = t
    }(),
    function() {
        function n(n, t) {
            return n + (/\?/.test(n) ? "&" : "?") + t
        }

        function i() {}

        function r(r, u) {
            u || (u = {});
            var e = u.method ? u.method.toUpperCase() : "GET",
                s = u.onComplete || function() {},
                f = t(),
                o = u.body || u.parameters;
            return f.onreadystatechange = function() {
                f.readyState === 4 && (s(f), f.onreadystatechange = i)
            }, e === "GET" && (o = null, typeof u.parameters == "string" && (r = n(r, u.parameters))), f.open(e, r, !0), (e === "POST" || e === "PUT") && f.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), f.send(o), f
        }
        var t = function() {
            for (var i, n = [function() {
                    return new ActiveXObject("Microsoft.XMLHTTP")
                }, function() {
                    return new ActiveXObject("Msxml2.XMLHTTP")
                }, function() {
                    return new ActiveXObject("Msxml2.XMLHTTP.3.0")
                }, function() {
                    return new XMLHttpRequest
                }], t = n.length; t--;) try {
                if (i = n[t](), i) return n[t]
            } catch (r) {}
        }();
        fabric.util.request = r
    }();
fabric.log = function() {};
fabric.warn = function() {};
typeof console != "undefined" && ["log", "warn"].forEach(function(n) {
        typeof console[n] != "undefined" && typeof console[n].apply == "function" && (fabric[n] = function() {
            return console[n].apply(console, arguments)
        })
    }),
    function() {
        function t(t) {
            n(function(i) {
                t || (t = {});
                var u = i || +new Date,
                    f = t.duration || 500,
                    e = u + f,
                    r, s = t.onChange || function() {},
                    h = t.abort || function() {
                        return !1
                    },
                    c = t.easing || function(n, t, i, r) {
                        return -i * Math.cos(n / r * (Math.PI / 2)) + i + t
                    },
                    o = "startValue" in t ? t.startValue : 0,
                    l = "endValue" in t ? t.endValue : 100,
                    a = t.byValue || l - o;
                t.onStart && t.onStart(),
                    function v(i) {
                        r = i || +new Date;
                        var l = r > e ? f : r - u;
                        if (h()) {
                            t.onComplete && t.onComplete();
                            return
                        }
                        if (s(c(l, o, a, f)), r > e) {
                            t.onComplete && t.onComplete();
                            return
                        }
                        n(v)
                    }(u)
            })
        }

        function n() {
            return i.apply(fabric.window, arguments)
        }
        var i = fabric.window.requestAnimationFrame || fabric.window.webkitRequestAnimationFrame || fabric.window.mozRequestAnimationFrame || fabric.window.oRequestAnimationFrame || fabric.window.msRequestAnimationFrame || function(n) {
            fabric.window.setTimeout(n, 1e3 / 60)
        };
        fabric.util.animate = t;
        fabric.util.requestAnimFrame = n
    }(),
    function() {
        function n(n, t, i, r) {
            return n < Math.abs(t) ? (n = t, r = i / 4) : r = t === 0 && n === 0 ? i / (2 * Math.PI) * Math.asin(1) : i / (2 * Math.PI) * Math.asin(t / n), {
                a: n,
                c: t,
                p: i,
                s: r
            }
        }

        function i(n, t, i) {
            return n.a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * i - n.s) * 2 * Math.PI / n.p)
        }

        function u(n, t, i, r) {
            return i * ((n = n / r - 1) * n * n + 1) + t
        }

        function f(n, t, i, r) {
            return (n /= r / 2, n < 1) ? i / 2 * n * n * n + t : i / 2 * ((n -= 2) * n * n + 2) + t
        }

        function e(n, t, i, r) {
            return i * (n /= r) * n * n * n + t
        }

        function o(n, t, i, r) {
            return -i * ((n = n / r - 1) * n * n * n - 1) + t
        }

        function s(n, t, i, r) {
            return (n /= r / 2, n < 1) ? i / 2 * n * n * n * n + t : -i / 2 * ((n -= 2) * n * n * n - 2) + t
        }

        function h(n, t, i, r) {
            return i * (n /= r) * n * n * n * n + t
        }

        function c(n, t, i, r) {
            return i * ((n = n / r - 1) * n * n * n * n + 1) + t
        }

        function l(n, t, i, r) {
            return (n /= r / 2, n < 1) ? i / 2 * n * n * n * n * n + t : i / 2 * ((n -= 2) * n * n * n * n + 2) + t
        }

        function a(n, t, i, r) {
            return -i * Math.cos(n / r * (Math.PI / 2)) + i + t
        }

        function v(n, t, i, r) {
            return i * Math.sin(n / r * (Math.PI / 2)) + t
        }

        function y(n, t, i, r) {
            return -i / 2 * (Math.cos(Math.PI * n / r) - 1) + t
        }

        function p(n, t, i, r) {
            return n === 0 ? t : i * Math.pow(2, 10 * (n / r - 1)) + t
        }

        function w(n, t, i, r) {
            return n === r ? t + i : i * (-Math.pow(2, -10 * n / r) + 1) + t
        }

        function b(n, t, i, r) {
            return n === 0 ? t : n === r ? t + i : (n /= r / 2, n < 1) ? i / 2 * Math.pow(2, 10 * (n - 1)) + t : i / 2 * (-Math.pow(2, -10 * --n) + 2) + t
        }

        function k(n, t, i, r) {
            return -i * (Math.sqrt(1 - (n /= r) * n) - 1) + t
        }

        function d(n, t, i, r) {
            return i * Math.sqrt(1 - (n = n / r - 1) * n) + t
        }

        function g(n, t, i, r) {
            return (n /= r / 2, n < 1) ? -i / 2 * (Math.sqrt(1 - n * n) - 1) + t : i / 2 * (Math.sqrt(1 - (n -= 2) * n) + 1) + t
        }

        function nt(t, r, u, f) {
            var e = 0,
                s = u,
                o;
            return t === 0 ? r : (t /= f, t === 1) ? r + u : (e || (e = f * .3), o = n(s, u, e, 1.70158), -i(o, t, f) + r)
        }

        function tt(t, i, r, u) {
            var e = 0,
                o = r,
                f;
            return t === 0 ? i : (t /= u, t === 1) ? i + r : (e || (e = u * .3), f = n(o, r, e, 1.70158), f.a * Math.pow(2, -10 * t) * Math.sin((t * u - f.s) * 2 * Math.PI / f.p) + f.c + i)
        }

        function it(t, r, u, f) {
            var o = 0,
                s = u,
                e;
            return t === 0 ? r : (t /= f / 2, t === 2) ? r + u : (o || (o = f * .3 * 1.5), e = n(s, u, o, 1.70158), t < 1) ? -.5 * i(e, t, f) + r : e.a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * f - e.s) * 2 * Math.PI / e.p) * .5 + e.c + r
        }

        function rt(n, t, i, r, u) {
            return u === undefined && (u = 1.70158), i * (n /= r) * n * ((u + 1) * n - u) + t
        }

        function ut(n, t, i, r, u) {
            return u === undefined && (u = 1.70158), i * ((n = n / r - 1) * n * ((u + 1) * n + u) + 1) + t
        }

        function ft(n, t, i, r, u) {
            return (u === undefined && (u = 1.70158), n /= r / 2, n < 1) ? i / 2 * n * n * (((u *= 1.525) + 1) * n - u) + t : i / 2 * ((n -= 2) * n * (((u *= 1.525) + 1) * n + u) + 2) + t
        }

        function r(n, i, r, u) {
            return r - t(u - n, 0, r, u) + i
        }

        function t(n, t, i, r) {
            return (n /= r) < 1 / 2.75 ? i * 7.5625 * n * n + t : n < 2 / 2.75 ? i * (7.5625 * (n -= 1.5 / 2.75) * n + .75) + t : n < 2.5 / 2.75 ? i * (7.5625 * (n -= 2.25 / 2.75) * n + .9375) + t : i * (7.5625 * (n -= 2.625 / 2.75) * n + .984375) + t
        }

        function et(n, i, u, f) {
            return n < f / 2 ? r(n * 2, 0, u, f) * .5 + i : t(n * 2 - f, 0, u, f) * .5 + u * .5 + i
        }
        fabric.util.ease = {
            easeInQuad: function(n, t, i, r) {
                return i * (n /= r) * n + t
            },
            easeOutQuad: function(n, t, i, r) {
                return -i * (n /= r) * (n - 2) + t
            },
            easeInOutQuad: function(n, t, i, r) {
                return (n /= r / 2, n < 1) ? i / 2 * n * n + t : -i / 2 * (--n * (n - 2) - 1) + t
            },
            easeInCubic: function(n, t, i, r) {
                return i * (n /= r) * n * n + t
            },
            easeOutCubic: u,
            easeInOutCubic: f,
            easeInQuart: e,
            easeOutQuart: o,
            easeInOutQuart: s,
            easeInQuint: h,
            easeOutQuint: c,
            easeInOutQuint: l,
            easeInSine: a,
            easeOutSine: v,
            easeInOutSine: y,
            easeInExpo: p,
            easeOutExpo: w,
            easeInOutExpo: b,
            easeInCirc: k,
            easeOutCirc: d,
            easeInOutCirc: g,
            easeInElastic: nt,
            easeOutElastic: tt,
            easeInOutElastic: it,
            easeInBack: rt,
            easeOutBack: ut,
            easeInOutBack: ft,
            easeInBounce: r,
            easeOutBounce: t,
            easeInOutBounce: et
        }
    }(),
    function(n) {
        "use strict";

        function u(n) {
            return n in h ? h[n] : n
        }

        function f(n, r, u, f) {
            var o = Object.prototype.toString.call(r) === "[object Array]",
                e;
            return (n === "fill" || n === "stroke") && r === "none" ? r = "" : n === "strokeDashArray" ? r = r.replace(/,/g, " ").split(/\s+/).map(function(n) {
                return parseFloat(n)
            }) : n === "transformMatrix" ? r = u && u.transformMatrix ? k(u.transformMatrix, t.parseTransformAttribute(r)) : t.parseTransformAttribute(r) : n === "visible" ? (r = r === "none" || r === "hidden" ? !1 : !0, u && u.visible === !1 && (r = !1)) : n === "originX" ? r = r === "start" ? "left" : r === "end" ? "right" : "center" : e = o ? r.map(i) : i(r, f), !o && isNaN(e) ? r : e
        }

        function it(n) {
            var i, r;
            for (i in o)
                if (typeof n[o[i]] != "undefined" && n[i] !== "") {
                    if (typeof n[i] == "undefined") {
                        if (!t.Object.prototype[i]) continue;
                        n[i] = t.Object.prototype[i]
                    }
                    n[i].indexOf("url(") !== 0 && (r = new t.Color(n[i]), n[i] = r.setAlpha(b(r.getAlpha() * n[o[i]], 2)).toRgba())
                }
            return n
        }

        function c(n, t) {
            for (var u, i = [], f, r = 0; r < t.length; r++) u = t[r], f = n.getElementsByTagName(u), i = i.concat(Array.prototype.slice.call(f));
            return i
        }

        function rt(n, t) {
            var i, r;
            n.replace(/;\s*$/, "").split(";").forEach(function(n) {
                var e = n.split(":");
                i = u(e[0].trim().toLowerCase());
                r = f(i, e[1].trim());
                t[i] = r
            })
        }

        function ut(n, t) {
            var i, e;
            for (var r in n) typeof n[r] != "undefined" && (i = u(r.toLowerCase()), e = f(i, n[r]), t[i] = e)
        }

        function ft(n, i) {
            var f = {},
                r, u;
            for (r in t.cssRules[i])
                if (et(n, r.split(" ")))
                    for (u in t.cssRules[i][r]) f[u] = t.cssRules[i][r][u];
            return f
        }

        function et(n, t) {
            var i, r = !0;
            return i = l(n, t.pop()), i && t.length && (r = ot(n, t)), i && r && t.length === 0
        }

        function ot(n, t) {
            for (var i, r = !0; n.parentNode && n.parentNode.nodeType === 1 && t.length;) r && (i = t.pop()), n = n.parentNode, r = l(n, i);
            return t.length === 0
        }

        function l(n, t) {
            var e = n.nodeName,
                r = n.getAttribute("class"),
                f = n.getAttribute("id"),
                i, u;
            if (i = new RegExp("^" + e, "i"), t = t.replace(i, ""), f && t.length && (i = new RegExp("#" + f + "(?![a-zA-Z\\-]+)", "i"), t = t.replace(i, "")), r && t.length)
                for (r = r.split(" "), u = r.length; u--;) i = new RegExp("\\." + r[u] + "(?![a-zA-Z\\-]+)", "i"), t = t.replace(i, "");
            return t.length === 0
        }

        function st(n, t) {
            var r, u, i, f;
            if (n.getElementById && (r = n.getElementById(t)), r) return r;
            for (f = n.getElementsByTagName("*"), i = 0; i < f.length; i++)
                if (u = f[i], t === u.getAttribute("id")) return u
        }

        function ht(n) {
            for (var e = c(n, ["use", "svg:use"]), l = 0, h; e.length && l < e.length;) {
                var u = e[l],
                    y = u.getAttribute("xlink:href").substr(1),
                    p = u.getAttribute("x") || 0,
                    w = u.getAttribute("y") || 0,
                    t = st(n, y).cloneNode(!0),
                    a = (t.getAttribute("transform") || "") + " translate(" + p + ", " + w + ")",
                    v, b = e.length,
                    i, r, f, o;
                if (s(t), /^svg$/i.test(t.nodeName)) {
                    for (h = t.ownerDocument.createElement("g"), r = 0, f = t.attributes, o = f.length; r < o; r++) i = f.item(r), h.setAttribute(i.nodeName, i.nodeValue);
                    while (t.firstChild) h.appendChild(t.firstChild);
                    t = h
                }
                for (r = 0, f = u.attributes, o = f.length; r < o; r++)(i = f.item(r), i.nodeName !== "x" && i.nodeName !== "y" && i.nodeName !== "xlink:href") && (i.nodeName === "transform" ? a = i.nodeValue + " " + a : t.setAttribute(i.nodeName, i.nodeValue));
                t.setAttribute("transform", a);
                t.setAttribute("instantiated_by_use", "1");
                t.removeAttribute("id");
                v = u.parentNode;
                v.replaceChild(t, u);
                e.length === b && l++
            }
        }

        function s(n) {
            var u = n.getAttribute("viewBox"),
                f = 1,
                e = 1,
                l = 0,
                v = 0,
                y, p, s, o, h = n.getAttribute("width"),
                c = n.getAttribute("height"),
                w = n.getAttribute("x") || 0,
                b = n.getAttribute("y") || 0,
                k = n.getAttribute("preserveAspectRatio") || "",
                d = !u || !g.test(n.nodeName) || !(u = u.match(a)),
                nt = !h || !c || h === "100%" || c === "100%",
                tt = d && nt,
                r = {},
                it = "";
            if (r.width = 0, r.height = 0, r.toBeParsed = tt, tt) return r;
            if (d) return r.width = i(h), r.height = i(c), r;
            if (l = -parseFloat(u[1]), v = -parseFloat(u[2]), y = parseFloat(u[3]), p = parseFloat(u[4]), nt ? (r.width = y, r.height = p) : (r.width = i(h), r.height = i(c), f = r.width / y, e = r.height / p), k = t.util.parsePreserveAspectRatioAttribute(k), k.alignX !== "none" && (e = f = f > e ? e : f), f === 1 && e === 1 && l === 0 && v === 0 && w === 0 && b === 0) return r;
            if ((w || b) && (it = " translate(" + i(w) + " " + i(b) + ") "), s = it + " matrix(" + f + " 0 0 " + e + " " + l * f + " " + v * e + ") ", n.nodeName === "svg") {
                for (o = n.ownerDocument.createElement("g"); n.firstChild;) o.appendChild(n.firstChild);
                n.appendChild(o)
            } else o = n, s = o.getAttribute("transform") + s;
            return o.setAttribute("transform", s), r
        }

        function ct(n) {
            var i = n.objects,
                r = n.options;
            return i = i.map(function(n) {
                return t[p(n.type)].fromObject(n)
            }), {
                objects: i,
                options: r
            }
        }

        function v(n, t, i) {
            t[i] && t[i].toSVG && n.push('\t<pattern x="0" y="0" id="', i, 'Pattern" ', 'width="', t[i].source.width, '" height="', t[i].source.height, '" patternUnits="userSpaceOnUse">\n', '\t\t<image x="0" y="0" ', 'width="', t[i].source.width, '" height="', t[i].source.height, '" xlink:href="', t[i].source.src, '"><\/image>\n\t<\/pattern>\n')
        }
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            p = t.util.string.capitalize,
            w = t.util.object.clone,
            b = t.util.toFixed,
            i = t.util.parseUnit,
            k = t.util.multiplyTransformMatrices,
            d = /^(path|circle|polygon|polyline|ellipse|rect|line|image|text)$/i,
            g = /^(symbol|image|marker|pattern|view|svg)$/i,
            nt = /^(?:pattern|defs|symbol|metadata)$/i,
            tt = /^(symbol|g|a|svg)$/i,
            h = {
                cx: "left",
                x: "left",
                r: "radius",
                cy: "top",
                y: "top",
                display: "visible",
                visibility: "visible",
                transform: "transformMatrix",
                "fill-opacity": "fillOpacity",
                "fill-rule": "fillRule",
                "font-family": "fontFamily",
                "font-size": "fontSize",
                "font-style": "fontStyle",
                "font-weight": "fontWeight",
                "stroke-dasharray": "strokeDashArray",
                "stroke-linecap": "strokeLineCap",
                "stroke-linejoin": "strokeLineJoin",
                "stroke-miterlimit": "strokeMiterLimit",
                "stroke-opacity": "strokeOpacity",
                "stroke-width": "strokeWidth",
                "text-decoration": "textDecoration",
                "text-anchor": "originX"
            },
            o = {
                stroke: "strokeOpacity",
                fill: "fillOpacity"
            },
            a, e, y;
        t.cssRules = {};
        t.gradientDefs = {};
        t.parseTransformAttribute = function() {
            function f(n, t) {
                var i = t[0],
                    r = t.length === 3 ? t[1] : 0,
                    u = t.length === 3 ? t[2] : 0;
                n[0] = Math.cos(i);
                n[1] = Math.sin(i);
                n[2] = -Math.sin(i);
                n[3] = Math.cos(i);
                n[4] = r - (n[0] * r + n[2] * u);
                n[5] = u - (n[1] * r + n[3] * u)
            }

            function e(n, t) {
                var i = t[0],
                    r = t.length === 2 ? t[1] : t[0];
                n[0] = i;
                n[3] = r
            }

            function o(n, i) {
                n[2] = Math.tan(t.util.degreesToRadians(i[0]))
            }

            function s(n, i) {
                n[1] = Math.tan(t.util.degreesToRadians(i[0]))
            }

            function h(n, t) {
                n[4] = t[0];
                t.length === 2 && (n[5] = t[1])
            }
            var u = [1, 0, 0, 1, 0, 0],
                n = t.reNum,
                i = "(?:\\s+,?\\s*|,\\s*)",
                c = "(?:(skewX)\\s*\\(\\s*(" + n + ")\\s*\\))",
                l = "(?:(skewY)\\s*\\(\\s*(" + n + ")\\s*\\))",
                a = "(?:(rotate)\\s*\\(\\s*(" + n + ")(?:" + i + "(" + n + ")" + i + "(" + n + "))?\\s*\\))",
                v = "(?:(scale)\\s*\\(\\s*(" + n + ")(?:" + i + "(" + n + "))?\\s*\\))",
                y = "(?:(translate)\\s*\\(\\s*(" + n + ")(?:" + i + "(" + n + "))?\\s*\\))",
                p = "(?:(matrix)\\s*\\(\\s*(" + n + ")" + i + "(" + n + ")" + i + "(" + n + ")" + i + "(" + n + ")" + i + "(" + n + ")" + i + "(" + n + ")\\s*\\))",
                r = "(?:" + p + "|" + y + "|" + v + "|" + a + "|" + c + "|" + l + ")",
                w = "(?:" + r + "(?:" + i + "*" + r + ")*)",
                b = "^\\s*(?:" + w + "?)\\s*$",
                k = new RegExp(b),
                d = new RegExp(r, "g");
            return function(n) {
                var i = u.concat(),
                    c = [],
                    l;
                if (!n || n && !k.test(n)) return i;
                for (n.replace(d, function(n) {
                        var a = new RegExp(r).exec(n).filter(function(n) {
                                return !!n
                            }),
                            v = a[1],
                            l = a.slice(2).map(parseFloat);
                        switch (v) {
                            case "translate":
                                h(i, l);
                                break;
                            case "rotate":
                                l[0] = t.util.degreesToRadians(l[0]);
                                f(i, l);
                                break;
                            case "scale":
                                e(i, l);
                                break;
                            case "skewX":
                                o(i, l);
                                break;
                            case "skewY":
                                s(i, l);
                                break;
                            case "matrix":
                                i = l
                        }
                        c.push(i.concat());
                        i = u.concat()
                    }), l = c[0]; c.length > 1;) c.shift(), l = t.util.multiplyTransformMatrices(l, c[0]);
                return l
            }
        }();
        a = new RegExp("^\\s*(" + t.reNum + "+)\\s*,?\\s*(" + t.reNum + "+)\\s*,?\\s*(" + t.reNum + "+)\\s*,?\\s*(" + t.reNum + "+)\\s*$");
        t.parseSVGDocument = function() {
            function n(n, t) {
                while (n && (n = n.parentNode))
                    if (n.nodeName && t.test(n.nodeName.replace("svg:", "")) && !n.getAttribute("instantiated_by_use")) return !0;
                return !1
            }
            return function(i, r, u) {
                var l, e, a, o;
                if (i) {
                    ht(i);
                    var v = new Date,
                        h = t.Object.__uid++,
                        c = s(i),
                        f = t.util.toArray(i.getElementsByTagName("*"));
                    if (c.svgUid = h, f.length === 0 && t.isLikelyNode) {
                        for (f = i.selectNodes('//*[name(.)!="svg"]'), l = [], e = 0, a = f.length; e < a; e++) l[e] = f[e];
                        f = l
                    }
                    if (o = f.filter(function(t) {
                            return s(t), d.test(t.nodeName.replace("svg:", "")) && !n(t, nt)
                        }), !o || o && !o.length) {
                        r && r([], {});
                        return
                    }
                    t.gradientDefs[h] = t.getGradientDefs(i);
                    t.cssRules[h] = t.getCSSRules(i);
                    t.parseElements(o, function(n) {
                        t.documentParsingTime = new Date - v;
                        r && r(n, c)
                    }, w(c), u)
                }
            }
        }();
        e = {
            has: function(n, t) {
                t(!1)
            },
            get: function() {},
            set: function() {}
        };
        y = new RegExp("(normal|italic)?\\s*(normal|small-caps)?\\s*(normal|bold|bolder|lighter|100|200|300|400|500|600|700|800|900)?\\s*(" + t.reNum + "(?:px|cm|mm|em|pt|pc|in)*)(?:\\/(normal|" + t.reNum + "))?\\s+(.*)");
        r(t, {
            parseFontDeclaration: function(n, t) {
                var r = n.match(y);
                if (r) {
                    var e = r[1],
                        u = r[3],
                        o = r[4],
                        f = r[5],
                        s = r[6];
                    e && (t.fontStyle = e);
                    u && (t.fontWeight = isNaN(parseFloat(u)) ? u : parseFloat(u));
                    o && (t.fontSize = i(o));
                    s && (t.fontFamily = s);
                    f && (t.lineHeight = f === "normal" ? 1 : f)
                }
            },
            getGradientDefs: function(n) {
                for (var s = c(n, ["linearGradient", "radialGradient", "svg:linearGradient", "svg:radialGradient"]), t, u = 0, i, f, r = {}, e = {}, o, u = s.length; u--;) t = s[u], f = t.getAttribute("xlink:href"), i = t.getAttribute("id"), f && (e[i] = f.substr(1)), r[i] = t;
                for (i in e)
                    for (o = r[e[i]].cloneNode(!0), t = r[i]; o.firstChild;) t.appendChild(o.firstChild);
                return r
            },
            parseAttributes: function(n, i, e) {
                var h, s, c, o;
                if (n) return s = {}, typeof e == "undefined" && (e = n.getAttribute("svgUid")), n.parentNode && tt.test(n.parentNode.nodeName) && (s = t.parseAttributes(n.parentNode, i, e)), c = s && s.fontSize || n.getAttribute("font-size") || t.Text.DEFAULT_SVG_FONT_SIZE, o = i.reduce(function(t, i) {
                    return h = n.getAttribute(i), h && (i = u(i), h = f(i, h, s, c), t[i] = h), t
                }, {}), o = r(o, r(ft(n, e), t.parseStyleAttribute(n))), o.font && t.parseFontDeclaration(o.font, o), it(r(s, o))
            },
            parseElements: function(n, i, r, u) {
                new t.ElementsParser(n, i, r, u).parse()
            },
            parseStyleAttribute: function(n) {
                var t = {},
                    i = n.getAttribute("style");
                return i ? (typeof i == "string" ? rt(i, t) : ut(i, t), t) : t
            },
            parsePointsAttribute: function(n) {
                if (!n) return null;
                n = n.replace(/,/g, " ").trim();
                n = n.split(/\s+/);
                for (var i = [], t = 0, r = n.length; t < r; t += 2) i.push({
                    x: parseFloat(n[t]),
                    y: parseFloat(n[t + 1])
                });
                return i
            },
            getCSSRules: function(n) {
                for (var i, s = n.getElementsByTagName("style"), r = {}, e, o = 0, h = s.length; o < h; o++)(i = s[o].textContent || s[o].text, i = i.replace(/\/\*[\s\S]*?\*\//g, ""), i.trim() !== "") && (e = i.match(/[^{]*\{[\s\S]*?\}/g), e = e.map(function(n) {
                    return n.trim()
                }), e.forEach(function(n) {
                    for (var s = n.match(/([\s\S]*?)\s*\{([^}]*)\}/), i = {}, l = s[2].trim(), h = l.replace(/;$/, "").split(/\s*;\s*/), e = 0, a = h.length; e < a; e++) {
                        var o = h[e].split(/\s*:\s*/),
                            c = u(o[0]),
                            v = f(c, o[1], o[0]);
                        i[c] = v
                    }
                    n = s[1];
                    n.split(",").forEach(function(n) {
                        (n = n.replace(/^svg/i, "").trim(), n !== "") && (r[n] ? t.util.object.extend(r[n], i) : r[n] = t.util.object.clone(i))
                    })
                }));
                return r
            },
            loadSVGFromURL: function(n, i, r) {
                function u(u) {
                    var f = u.responseXML;
                    f && !f.documentElement && t.window.ActiveXObject && u.responseText && (f = new ActiveXObject("Microsoft.XMLDOM"), f.async = "false", f.loadXML(u.responseText.replace(/<!DOCTYPE[\s\S]*?(\[[\s\S]*\])*?>/i, "")));
                    f && f.documentElement || i && i(null);
                    t.parseSVGDocument(f.documentElement, function(r, u) {
                        e.set(n, {
                            objects: t.util.array.invoke(r, "toObject"),
                            options: u
                        });
                        i && i(r, u)
                    }, r)
                }
                n = n.replace(/^\n\s*/, "").trim();
                e.has(n, function(r) {
                    r ? e.get(n, function(n) {
                        var t = ct(n);
                        i(t.objects, t.options)
                    }) : new t.util.request(n, {
                        method: "get",
                        onComplete: u
                    })
                })
            },
            loadSVGFromString: function(n, i, r) {
                var u, f;
                n = n.trim();
                typeof DOMParser != "undefined" ? (f = new DOMParser, f && f.parseFromString && (u = f.parseFromString(n, "text/xml"))) : t.window.ActiveXObject && (u = new ActiveXObject("Microsoft.XMLDOM"), u.async = "false", u.loadXML(n.replace(/<!DOCTYPE[\s\S]*?(\[[\s\S]*\])*?>/i, "")));
                t.parseSVGDocument(u.documentElement, function(n, t) {
                    i(n, t)
                }, r)
            },
            createSVGFontFacesMarkup: function(n) {
                for (var c, r = "", u = {}, f, i, e, o, l, a, v, s = t.fontPaths, h = 0, y = n.length; h < y; h++)
                    if ((f = n[h], i = f.fontFamily, f.type.indexOf("text") !== -1 && !u[i] && s[i]) && (u[i] = !0, f.styles)) {
                        e = f.styles;
                        for (l in e) {
                            o = e[l];
                            for (v in o) a = o[v], i = a.fontFamily, !u[i] && s[i] && (u[i] = !0)
                        }
                    }
                for (c in u) r += ["\t\t@font-face {\n", "\t\t\tfont-family: '", c, "';\n", "\t\t\tsrc: url('", s[c], "');\n", "\t\t}\n"].join("");
                return r && (r = ['\t<style type="text/css">', "<![CDATA[\n", r, "]\]>", "<\/style>\n"].join("")), r
            },
            createSVGRefElementsMarkup: function(n) {
                var t = [];
                return v(t, n, "backgroundColor"), v(t, n, "overlayColor"), t.join("")
            }
        })
    }(typeof exports != "undefined" ? exports : this);
fabric.ElementsParser = function(n, t, i, r) {
    this.elements = n;
    this.callback = t;
    this.options = i;
    this.reviver = r;
    this.svgUid = i && i.svgUid || 0
};
fabric.ElementsParser.prototype.parse = function() {
    this.instances = new Array(this.elements.length);
    this.numElements = this.elements.length;
    this.createObjects()
};
fabric.ElementsParser.prototype.createObjects = function() {
    for (var n = 0, t = this.elements.length; n < t; n++) this.elements[n].setAttribute("svgUid", this.svgUid),
        function(n, t) {
            setTimeout(function() {
                n.createObject(n.elements[t], t)
            }, 0)
        }(this, n)
};
fabric.ElementsParser.prototype.createObject = function(n, t) {
    var i = fabric[fabric.util.string.capitalize(n.tagName.replace("svg:", ""))];
    if (i && i.fromElement) try {
        this._createObject(i, n, t)
    } catch (r) {
        fabric.log(r)
    } else this.checkIfDone()
};
fabric.ElementsParser.prototype._createObject = function(n, t, i) {
    if (n.async) n.fromElement(t, this.createCallback(i, t), this.options);
    else {
        var r = n.fromElement(t, this.options);
        this.resolveGradient(r, "fill");
        this.resolveGradient(r, "stroke");
        this.reviver && this.reviver(t, r);
        this.instances[i] = r;
        this.checkIfDone()
    }
};
fabric.ElementsParser.prototype.createCallback = function(n, t) {
    var i = this;
    return function(r) {
        i.resolveGradient(r, "fill");
        i.resolveGradient(r, "stroke");
        i.reviver && i.reviver(t, r);
        i.instances[n] = r;
        i.checkIfDone()
    }
};
fabric.ElementsParser.prototype.resolveGradient = function(n, t) {
    var i = n.get(t),
        r;
    /^url\(/.test(i) && (r = i.slice(5, i.length - 1), fabric.gradientDefs[this.svgUid][r] && n.set(t, fabric.Gradient.fromElement(fabric.gradientDefs[this.svgUid][r], n)))
};
fabric.ElementsParser.prototype.checkIfDone = function() {
        --this.numElements == 0 && (this.instances = this.instances.filter(function(n) {
            return n != null
        }), this.callback(this.instances))
    },
    function(n) {
        "use strict";

        function t(n, t) {
            this.x = n;
            this.y = t
        }
        var i = n.fabric || (n.fabric = {});
        if (i.Point) {
            i.warn("fabric.Point is already defined");
            return
        }
        i.Point = t;
        t.prototype = {
            type: "point",
            constructor: t,
            add: function(n) {
                return new t(this.x + n.x, this.y + n.y)
            },
            addEquals: function(n) {
                return this.x += n.x, this.y += n.y, this
            },
            scalarAdd: function(n) {
                return new t(this.x + n, this.y + n)
            },
            scalarAddEquals: function(n) {
                return this.x += n, this.y += n, this
            },
            subtract: function(n) {
                return new t(this.x - n.x, this.y - n.y)
            },
            subtractEquals: function(n) {
                return this.x -= n.x, this.y -= n.y, this
            },
            scalarSubtract: function(n) {
                return new t(this.x - n, this.y - n)
            },
            scalarSubtractEquals: function(n) {
                return this.x -= n, this.y -= n, this
            },
            multiply: function(n) {
                return new t(this.x * n, this.y * n)
            },
            multiplyEquals: function(n) {
                return this.x *= n, this.y *= n, this
            },
            divide: function(n) {
                return new t(this.x / n, this.y / n)
            },
            divideEquals: function(n) {
                return this.x /= n, this.y /= n, this
            },
            eq: function(n) {
                return this.x === n.x && this.y === n.y
            },
            lt: function(n) {
                return this.x < n.x && this.y < n.y
            },
            lte: function(n) {
                return this.x <= n.x && this.y <= n.y
            },
            gt: function(n) {
                return this.x > n.x && this.y > n.y
            },
            gte: function(n) {
                return this.x >= n.x && this.y >= n.y
            },
            lerp: function(n, i) {
                return typeof i == "undefined" && (i = .5), i = Math.max(Math.min(1, i), 0), new t(this.x + (n.x - this.x) * i, this.y + (n.y - this.y) * i)
            },
            distanceFrom: function(n) {
                var t = this.x - n.x,
                    i = this.y - n.y;
                return Math.sqrt(t * t + i * i)
            },
            midPointFrom: function(n) {
                return this.lerp(n)
            },
            min: function(n) {
                return new t(Math.min(this.x, n.x), Math.min(this.y, n.y))
            },
            max: function(n) {
                return new t(Math.max(this.x, n.x), Math.max(this.y, n.y))
            },
            toString: function() {
                return this.x + "," + this.y
            },
            setXY: function(n, t) {
                return this.x = n, this.y = t, this
            },
            setX: function(n) {
                return this.x = n, this
            },
            setY: function(n) {
                return this.y = n, this
            },
            setFromPoint: function(n) {
                return this.x = n.x, this.y = n.y, this
            },
            swap: function(n) {
                var t = this.x,
                    i = this.y;
                this.x = n.x;
                this.y = n.y;
                n.x = t;
                n.y = i
            },
            clone: function() {
                return new t(this.x, this.y)
            }
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";

        function t(n) {
            this.status = n;
            this.points = []
        }
        var i = n.fabric || (n.fabric = {});
        if (i.Intersection) {
            i.warn("fabric.Intersection is already defined");
            return
        }
        i.Intersection = t;
        i.Intersection.prototype = {
            constructor: t,
            appendPoint: function(n) {
                return this.points.push(n), this
            },
            appendPoints: function(n) {
                return this.points = this.points.concat(n), this
            }
        };
        i.Intersection.intersectLineLine = function(n, r, u, f) {
            var e, c = (f.x - u.x) * (n.y - u.y) - (f.y - u.y) * (n.x - u.x),
                l = (r.x - n.x) * (n.y - u.y) - (r.y - n.y) * (n.x - u.x),
                s = (f.y - u.y) * (r.x - n.x) - (f.x - u.x) * (r.y - n.y),
                o, h;
            return s !== 0 ? (o = c / s, h = l / s, 0 <= o && o <= 1 && 0 <= h && h <= 1 ? (e = new t("Intersection"), e.appendPoint(new i.Point(n.x + o * (r.x - n.x), n.y + o * (r.y - n.y)))) : e = new t) : e = c === 0 || l === 0 ? new t("Coincident") : new t("Parallel"), e
        };
        i.Intersection.intersectLinePolygon = function(n, i, r) {
            for (var u = new t, e = r.length, o, s, h, f = 0; f < e; f++) o = r[f], s = r[(f + 1) % e], h = t.intersectLineLine(n, i, o, s), u.appendPoints(h.points);
            return u.points.length > 0 && (u.status = "Intersection"), u
        };
        i.Intersection.intersectPolygonPolygon = function(n, i) {
            for (var r = new t, f = n.length, u = 0; u < f; u++) {
                var e = n[u],
                    o = n[(u + 1) % f],
                    s = t.intersectLinePolygon(e, o, i);
                r.appendPoints(s.points)
            }
            return r.points.length > 0 && (r.status = "Intersection"), r
        };
        i.Intersection.intersectPolygonRectangle = function(n, r, u) {
            var e = r.min(u),
                o = r.max(u),
                s = new i.Point(o.x, e.y),
                h = new i.Point(e.x, o.y),
                c = t.intersectLinePolygon(e, s, n),
                l = t.intersectLinePolygon(s, o, n),
                a = t.intersectLinePolygon(o, h, n),
                v = t.intersectLinePolygon(h, e, n),
                f = new t;
            return f.appendPoints(c.points), f.appendPoints(l.points), f.appendPoints(a.points), f.appendPoints(v.points), f.points.length > 0 && (f.status = "Intersection"), f
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";

        function t(n) {
            n ? this._tryParsingColor(n) : this.setSource([0, 0, 0, 1])
        }

        function r(n, t, i) {
            return (i < 0 && (i += 1), i > 1 && (i -= 1), i < 1 / 6) ? n + (t - n) * 6 * i : i < 1 / 2 ? t : i < 2 / 3 ? n + (t - n) * (2 / 3 - i) * 6 : n
        }
        var i = n.fabric || (n.fabric = {});
        if (i.Color) {
            i.warn("fabric.Color is already defined.");
            return
        }
        i.Color = t;
        i.Color.prototype = {
            _tryParsingColor: function(n) {
                var i;
                n in t.colorNameMap && (n = t.colorNameMap[n]);
                n === "transparent" && (i = [255, 255, 255, 0]);
                i || (i = t.sourceFromHex(n));
                i || (i = t.sourceFromRgb(n));
                i || (i = t.sourceFromHsl(n));
                i || (i = [0, 0, 0, 1]);
                i && this.setSource(i)
            },
            _rgbToHsl: function(n, t, r) {
                var f, s, h, u, e, o;
                if (n /= 255, t /= 255, r /= 255, u = i.util.array.max([n, t, r]), e = i.util.array.min([n, t, r]), h = (u + e) / 2, u === e) f = s = 0;
                else {
                    o = u - e;
                    s = h > .5 ? o / (2 - u - e) : o / (u + e);
                    switch (u) {
                        case n:
                            f = (t - r) / o + (t < r ? 6 : 0);
                            break;
                        case t:
                            f = (r - n) / o + 2;
                            break;
                        case r:
                            f = (n - t) / o + 4
                    }
                    f /= 6
                }
                return [Math.round(f * 360), Math.round(s * 100), Math.round(h * 100)]
            },
            getSource: function() {
                return this._source
            },
            setSource: function(n) {
                this._source = n
            },
            toRgb: function() {
                var n = this.getSource();
                return "rgb(" + n[0] + "," + n[1] + "," + n[2] + ")"
            },
            toRgba: function() {
                var n = this.getSource();
                return "rgba(" + n[0] + "," + n[1] + "," + n[2] + "," + n[3] + ")"
            },
            toHsl: function() {
                var n = this.getSource(),
                    t = this._rgbToHsl(n[0], n[1], n[2]);
                return "hsl(" + t[0] + "," + t[1] + "%," + t[2] + "%)"
            },
            toHsla: function() {
                var n = this.getSource(),
                    t = this._rgbToHsl(n[0], n[1], n[2]);
                return "hsla(" + t[0] + "," + t[1] + "%," + t[2] + "%," + n[3] + ")"
            },
            toHex: function() {
                var r = this.getSource(),
                    n, t, i;
                return n = r[0].toString(16), n = n.length === 1 ? "0" + n : n, t = r[1].toString(16), t = t.length === 1 ? "0" + t : t, i = r[2].toString(16), i = i.length === 1 ? "0" + i : i, n.toUpperCase() + t.toUpperCase() + i.toUpperCase()
            },
            getAlpha: function() {
                return this.getSource()[3]
            },
            setAlpha: function(n) {
                var t = this.getSource();
                return t[3] = n, this.setSource(t), this
            },
            toGrayscale: function() {
                var n = this.getSource(),
                    t = parseInt((n[0] * .3 + n[1] * .59 + n[2] * .11).toFixed(0), 10),
                    i = n[3];
                return this.setSource([t, t, t, i]), this
            },
            toBlackWhite: function(n) {
                var i = this.getSource(),
                    t = (i[0] * .3 + i[1] * .59 + i[2] * .11).toFixed(0),
                    r = i[3];
                return n = n || 127, t = Number(t) < Number(n) ? 0 : 255, this.setSource([t, t, t, r]), this
            },
            overlayWith: function(n) {
                var i;
                n instanceof t || (n = new t(n));
                var r = [],
                    f = this.getAlpha(),
                    u = .5,
                    e = this.getSource(),
                    o = n.getSource();
                for (i = 0; i < 3; i++) r.push(Math.round(e[i] * (1 - u) + o[i] * u));
                return r[3] = f, this.setSource(r), this
            }
        };
        i.Color.reRGBa = /^rgba?\(\s*(\d{1,3}(?:\.\d+)?\%?)\s*,\s*(\d{1,3}(?:\.\d+)?\%?)\s*,\s*(\d{1,3}(?:\.\d+)?\%?)\s*(?:\s*,\s*(\d+(?:\.\d+)?)\s*)?\)$/;
        i.Color.reHSLa = /^hsla?\(\s*(\d{1,3})\s*,\s*(\d{1,3}\%)\s*,\s*(\d{1,3}\%)\s*(?:\s*,\s*(\d+(?:\.\d+)?)\s*)?\)$/;
        i.Color.reHex = /^#?([0-9a-f]{8}|[0-9a-f]{6}|[0-9a-f]{4}|[0-9a-f]{3})$/i;
        i.Color.colorNameMap = {
            aqua: "#00FFFF",
            black: "#000000",
            blue: "#0000FF",
            fuchsia: "#FF00FF",
            gray: "#808080",
            grey: "#808080",
            green: "#008000",
            lime: "#00FF00",
            maroon: "#800000",
            navy: "#000080",
            olive: "#808000",
            orange: "#FFA500",
            purple: "#800080",
            red: "#FF0000",
            silver: "#C0C0C0",
            teal: "#008080",
            white: "#FFFFFF",
            yellow: "#FFFF00"
        };
        i.Color.fromRgb = function(n) {
            return t.fromSource(t.sourceFromRgb(n))
        };
        i.Color.sourceFromRgb = function(n) {
            var i = n.match(t.reRGBa);
            if (i) {
                var r = parseInt(i[1], 10) / (/%$/.test(i[1]) ? 100 : 1) * (/%$/.test(i[1]) ? 255 : 1),
                    u = parseInt(i[2], 10) / (/%$/.test(i[2]) ? 100 : 1) * (/%$/.test(i[2]) ? 255 : 1),
                    f = parseInt(i[3], 10) / (/%$/.test(i[3]) ? 100 : 1) * (/%$/.test(i[3]) ? 255 : 1);
                return [parseInt(r, 10), parseInt(u, 10), parseInt(f, 10), i[4] ? parseFloat(i[4]) : 1]
            }
        };
        i.Color.fromRgba = t.fromRgb;
        i.Color.fromHsl = function(n) {
            return t.fromSource(t.sourceFromHsl(n))
        };
        i.Color.sourceFromHsl = function(n) {
            var i = n.match(t.reHSLa),
                f, o;
            if (i) {
                var s = (parseFloat(i[1]) % 360 + 360) % 360 / 360,
                    e = parseFloat(i[2]) / (/%$/.test(i[2]) ? 100 : 1),
                    u = parseFloat(i[3]) / (/%$/.test(i[3]) ? 100 : 1),
                    h, c, l;
                return e === 0 ? h = c = l = u : (f = u <= .5 ? u * (e + 1) : u + e - u * e, o = u * 2 - f, h = r(o, f, s + 1 / 3), c = r(o, f, s), l = r(o, f, s - 1 / 3)), [Math.round(h * 255), Math.round(c * 255), Math.round(l * 255), i[4] ? parseFloat(i[4]) : 1]
            }
        };
        i.Color.fromHsla = t.fromHsl;
        i.Color.fromHex = function(n) {
            return t.fromSource(t.sourceFromHex(n))
        };
        i.Color.sourceFromHex = function(n) {
            if (n.match(t.reHex)) {
                var i = n.slice(n.indexOf("#") + 1),
                    r = i.length === 3 || i.length === 4,
                    u = i.length === 8 || i.length === 4,
                    f = r ? i.charAt(0) + i.charAt(0) : i.substring(0, 2),
                    e = r ? i.charAt(1) + i.charAt(1) : i.substring(2, 4),
                    o = r ? i.charAt(2) + i.charAt(2) : i.substring(4, 6),
                    s = u ? r ? i.charAt(3) + i.charAt(3) : i.substring(6, 8) : "FF";
                return [parseInt(f, 16), parseInt(e, 16), parseInt(o, 16), parseFloat((parseInt(s, 16) / 255).toFixed(2))]
            }
        };
        i.Color.fromSource = function(n) {
            var i = new t;
            return i.setSource(n), i
        }
    }(typeof exports != "undefined" ? exports : this),
    function() {
        function t(n) {
            var e = n.getAttribute("style"),
                t = n.getAttribute("offset") || 0,
                r, o, i, u, f;
            if (t = parseFloat(t) / (/%$/.test(t) ? 100 : 1), t = t < 0 ? 0 : t > 1 ? 1 : t, e)
                for (u = e.split(/\s*;\s*/), u[u.length - 1] === "" && u.pop(), f = u.length; f--;) {
                    var s = u[f].split(/\s*:\s*/),
                        h = s[0].trim(),
                        c = s[1].trim();
                    h === "stop-color" ? r = c : h === "stop-opacity" && (i = c)
                }
            return r || (r = n.getAttribute("stop-color") || "rgb(0,0,0)"), i || (i = n.getAttribute("stop-opacity")), r = new fabric.Color(r), o = r.getAlpha(), i = isNaN(parseFloat(i)) ? 1 : parseFloat(i), i *= o, {
                offset: t,
                color: r.toRgb(),
                opacity: i
            }
        }

        function i(n) {
            return {
                x1: n.getAttribute("x1") || 0,
                y1: n.getAttribute("y1") || 0,
                x2: n.getAttribute("x2") || "100%",
                y2: n.getAttribute("y2") || 0
            }
        }

        function r(n) {
            return {
                x1: n.getAttribute("fx") || n.getAttribute("cx") || "50%",
                y1: n.getAttribute("fy") || n.getAttribute("cy") || "50%",
                r1: 0,
                x2: n.getAttribute("cx") || "50%",
                y2: n.getAttribute("cy") || "50%",
                r2: n.getAttribute("r") || "50%"
            }
        }

        function n(n, t, i) {
            var o, e = 0,
                u = 1,
                s = "",
                r, f;
            for (r in t) t[r] === "Infinity" ? t[r] = 1 : t[r] === "-Infinity" && (t[r] = 0), o = parseFloat(t[r], 10), u = typeof t[r] == "string" && /^\d+%$/.test(t[r]) ? .01 : 1, r === "x1" || r === "x2" || r === "r2" ? (u *= i === "objectBoundingBox" ? n.width : 1, e = i === "objectBoundingBox" ? n.left || 0 : 0) : (r === "y1" || r === "y2") && (u *= i === "objectBoundingBox" ? n.height : 1, e = i === "objectBoundingBox" ? n.top || 0 : 0), t[r] = o * u + e;
            return n.type === "ellipse" && t.r2 !== null && i === "objectBoundingBox" && n.rx !== n.ry && (f = n.ry / n.rx, s = " scale(1, " + f + ")", t.y1 && (t.y1 /= f), t.y2 && (t.y2 /= f)), s
        }
        fabric.Gradient = fabric.util.createClass({
            offsetX: 0,
            offsetY: 0,
            initialize: function(n) {
                n || (n = {});
                var t = {};
                this.id = fabric.Object.__uid++;
                this.type = n.type || "linear";
                t = {
                    x1: n.coords.x1 || 0,
                    y1: n.coords.y1 || 0,
                    x2: n.coords.x2 || 0,
                    y2: n.coords.y2 || 0
                };
                this.type === "radial" && (t.r1 = n.coords.r1 || 0, t.r2 = n.coords.r2 || 0);
                this.coords = t;
                this.colorStops = n.colorStops.slice();
                n.gradientTransform && (this.gradientTransform = n.gradientTransform);
                this.offsetX = n.offsetX || this.offsetX;
                this.offsetY = n.offsetY || this.offsetY
            },
            addColorStop: function(n) {
                var t, i;
                for (t in n) i = new fabric.Color(n[t]), this.colorStops.push({
                    offset: t,
                    color: i.toRgb(),
                    opacity: i.getAlpha()
                });
                return this
            },
            toObject: function() {
                return {
                    type: this.type,
                    coords: this.coords,
                    colorStops: this.colorStops,
                    offsetX: this.offsetX,
                    offsetY: this.offsetY,
                    gradientTransform: this.gradientTransform ? this.gradientTransform.concat() : this.gradientTransform
                }
            },
            toSVG: function(n) {
                var t = fabric.util.object.clone(this.coords),
                    u, f, i, r;
                if (this.colorStops.sort(function(n, t) {
                        return n.offset - t.offset
                    }), !(n.group && n.group.type === "path-group"))
                    for (i in t) i === "x1" || i === "x2" || i === "r2" ? t[i] += this.offsetX - n.width / 2 : (i === "y1" || i === "y2") && (t[i] += this.offsetY - n.height / 2);
                for (f = 'id="SVGID_' + this.id + '" gradientUnits="userSpaceOnUse"', this.gradientTransform && (f += ' gradientTransform="matrix(' + this.gradientTransform.join(" ") + ')" '), this.type === "linear" ? u = ["<linearGradient ", f, ' x1="', t.x1, '" y1="', t.y1, '" x2="', t.x2, '" y2="', t.y2, '">\n'] : this.type === "radial" && (u = ["<radialGradient ", f, ' cx="', t.x2, '" cy="', t.y2, '" r="', t.r2, '" fx="', t.x1, '" fy="', t.y1, '">\n']), r = 0; r < this.colorStops.length; r++) u.push("<stop ", 'offset="', this.colorStops[r].offset * 100 + "%", '" style="stop-color:', this.colorStops[r].color, this.colorStops[r].opacity !== null ? ";stop-opacity: " + this.colorStops[r].opacity : ";", '"/>\n');
                return u.push(this.type === "linear" ? "<\/linearGradient>\n" : "<\/radialGradient>\n"), u.join("")
            },
            toLive: function(n, t) {
                var f, r, i = fabric.util.object.clone(this.coords),
                    u, o;
                if (this.type) {
                    if (t.group && t.group.type === "path-group")
                        for (r in i) r === "x1" || r === "x2" ? i[r] += -this.offsetX + t.width / 2 : (r === "y1" || r === "y2") && (i[r] += -this.offsetY + t.height / 2);
                    for (this.type === "linear" ? f = n.createLinearGradient(i.x1, i.y1, i.x2, i.y2) : this.type === "radial" && (f = n.createRadialGradient(i.x1, i.y1, i.r1, i.x2, i.y2, i.r2)), u = 0, o = this.colorStops.length; u < o; u++) {
                        var e = this.colorStops[u].color,
                            s = this.colorStops[u].opacity,
                            h = this.colorStops[u].offset;
                        typeof s != "undefined" && (e = new fabric.Color(e).setAlpha(s).toRgba());
                        f.addColorStop(parseFloat(h), e)
                    }
                    return f
                }
            }
        });
        fabric.util.object.extend(fabric.Gradient, {
            fromElement: function(u, f) {
                var l = u.getElementsByTagName("stop"),
                    e, y = u.getAttribute("gradientUnits") || "objectBoundingBox",
                    a = u.getAttribute("gradientTransform"),
                    v = [],
                    o, s, h, c;
                for (e = u.nodeName === "linearGradient" || u.nodeName === "LINEARGRADIENT" ? "linear" : "radial", e === "linear" ? o = i(u) : e === "radial" && (o = r(u)), h = l.length; h--;) v.push(t(l[h]));
                return s = n(f, o, y), c = new fabric.Gradient({
                    type: e,
                    coords: o,
                    colorStops: v,
                    offsetX: -f.left,
                    offsetY: -f.top
                }), (a || s !== "") && (c.gradientTransform = fabric.parseTransformAttribute((a || "") + s)), c
            },
            forObject: function(t, i) {
                return i || (i = {}), n(t, i.coords, "userSpaceOnUse"), new fabric.Gradient(i)
            }
        })
    }();
fabric.Pattern = fabric.util.createClass({
        repeat: "repeat",
        offsetX: 0,
        offsetY: 0,
        initialize: function(n) {
            if (n || (n = {}), this.id = fabric.Object.__uid++, n.source)
                if (typeof n.source == "string")
                    if (typeof fabric.util.getFunctionBody(n.source) != "undefined") this.source = new Function(fabric.util.getFunctionBody(n.source));
                    else {
                        var t = this;
                        this.source = fabric.util.createImage();
                        fabric.util.loadImage(n.source, function(n) {
                            t.source = n
                        })
                    } else this.source = n.source;
            n.repeat && (this.repeat = n.repeat);
            n.offsetX && (this.offsetX = n.offsetX);
            n.offsetY && (this.offsetY = n.offsetY)
        },
        toObject: function() {
            var n;
            return typeof this.source == "function" ? n = String(this.source) : typeof this.source.src == "string" ? n = this.source.src : typeof this.source == "object" && this.source.toDataURL && (n = this.source.toDataURL()), {
                source: n,
                repeat: this.repeat,
                offsetX: this.offsetX,
                offsetY: this.offsetY
            }
        },
        toSVG: function(n) {
            var t = typeof this.source == "function" ? this.source() : this.source,
                r = t.width / n.getWidth(),
                u = t.height / n.getHeight(),
                f = this.offsetX / n.getWidth(),
                e = this.offsetY / n.getHeight(),
                i = "";
            return (this.repeat === "repeat-x" || this.repeat === "no-repeat") && (u = 1), (this.repeat === "repeat-y" || this.repeat === "no-repeat") && (r = 1), t.src ? i = t.src : t.toDataURL && (i = t.toDataURL()), '<pattern id="SVGID_' + this.id + '" x="' + f + '" y="' + e + '" width="' + r + '" height="' + u + '">\n<image x="0" y="0" width="' + t.width + '" height="' + t.height + '" xlink:href="' + i + '"><\/image>\n<\/pattern>\n'
        },
        toLive: function(n) {
            var t = typeof this.source == "function" ? this.source() : this.source;
            return t ? typeof t.src != "undefined" && (!t.complete || t.naturalWidth === 0 || t.naturalHeight === 0) ? "" : n.createPattern(t, this.repeat) : ""
        }
    }),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.util.toFixed;
        if (t.Shadow) {
            t.warn("fabric.Shadow is already defined.");
            return
        }
        t.Shadow = t.util.createClass({
            color: "rgb(0,0,0)",
            blur: 0,
            offsetX: 0,
            offsetY: 0,
            affectStroke: !1,
            includeDefaultValues: !0,
            initialize: function(n) {
                typeof n == "string" && (n = this._parseShadow(n));
                for (var i in n) this[i] = n[i];
                this.id = t.Object.__uid++
            },
            _parseShadow: function(n) {
                var r = n.trim(),
                    i = t.Shadow.reOffsetsAndBlur.exec(r) || [],
                    u = r.replace(t.Shadow.reOffsetsAndBlur, "") || "rgb(0,0,0)";
                return {
                    color: u.trim(),
                    offsetX: parseInt(i[1], 10) || 0,
                    offsetY: parseInt(i[2], 10) || 0,
                    blur: parseInt(i[3], 10) || 0
                }
            },
            toString: function() {
                return [this.offsetX, this.offsetY, this.blur, this.color].join("px ")
            },
            toSVG: function(n) {
                var f = 40,
                    e = 40,
                    u = t.Object.NUM_FRACTION_DIGITS,
                    r = t.util.rotateVector({
                        x: this.offsetX,
                        y: this.offsetY
                    }, t.util.degreesToRadians(-n.angle)),
                    o = 20;
                return n.width && n.height && (f = i((Math.abs(r.x) + this.blur) / n.width, u) * 100 + o, e = i((Math.abs(r.y) + this.blur) / n.height, u) * 100 + o), n.flipX && (r.x *= -1), n.flipY && (r.y *= -1), '<filter id="SVGID_' + this.id + '" y="-' + e + '%" height="' + (100 + 2 * e) + '%" x="-' + f + '%" width="' + (100 + 2 * f) + '%" >\n\t<feGaussianBlur in="SourceAlpha" stdDeviation="' + i(this.blur ? this.blur / 2 : 0, u) + '"><\/feGaussianBlur>\n\t<feOffset dx="' + i(r.x, u) + '" dy="' + i(r.y, u) + '" result="oBlur" ><\/feOffset>\n\t<feFlood flood-color="' + this.color + '"/>\n\t<feComposite in2="oBlur" operator="in" />\n\t<feMerge>\n\t\t<feMergeNode><\/feMergeNode>\n\t\t<feMergeNode in="SourceGraphic"><\/feMergeNode>\n\t<\/feMerge>\n<\/filter>\n'
            },
            toObject: function() {
                if (this.includeDefaultValues) return {
                    color: this.color,
                    blur: this.blur,
                    offsetX: this.offsetX,
                    offsetY: this.offsetY,
                    affectStroke: this.affectStroke
                };
                var n = {},
                    i = t.Shadow.prototype;
                return ["color", "blur", "offsetX", "offsetY", "affectStroke"].forEach(function(t) {
                    this[t] !== i[t] && (n[t] = this[t])
                }, this), n
            }
        });
        t.Shadow.reOffsetsAndBlur = /(?:\s|^)(-?\d+(?:px)?(?:\s?|$))?(-?\d+(?:px)?(?:\s?|$))?(\d+(?:px)?)?(?:\s?|$)(?:$|\s)/
    }(typeof exports != "undefined" ? exports : this),
    function() {
        "use strict";
        if (fabric.StaticCanvas) {
            fabric.warn("fabric.StaticCanvas is already defined.");
            return
        }
        var t = fabric.util.object.extend,
            u = fabric.util.getElementOffset,
            n = fabric.util.removeFromArray,
            i = fabric.util.toFixed,
            r = new Error("Could not initialize `canvas` element");
        fabric.StaticCanvas = fabric.util.createClass({
            initialize: function(n, t) {
                t || (t = {});
                this._initStatic(n, t)
            },
            backgroundColor: "",
            backgroundImage: null,
            overlayColor: "",
            overlayImage: null,
            includeDefaultValues: !0,
            stateful: !0,
            renderOnAddRemove: !0,
            clipTo: null,
            controlsAboveOverlay: !1,
            allowTouchScrolling: !1,
            imageSmoothingEnabled: !0,
            viewportTransform: [1, 0, 0, 1, 0, 0],
            backgroundVpt: !0,
            overlayVpt: !0,
            onBeforeScaleRotate: function() {},
            enableRetinaScaling: !0,
            _initStatic: function(n, t) {
                var i = fabric.StaticCanvas.prototype.renderAll.bind(this);
                this._objects = [];
                this._createLowerCanvas(n);
                this._initOptions(t);
                this._setImageSmoothing();
                this.interactive || this._initRetinaScaling();
                t.overlayImage && this.setOverlayImage(t.overlayImage, i);
                t.backgroundImage && this.setBackgroundImage(t.backgroundImage, i);
                t.backgroundColor && this.setBackgroundColor(t.backgroundColor, i);
                t.overlayColor && this.setOverlayColor(t.overlayColor, i);
                this.calcOffset()
            },
            _isRetinaScaling: function() {
                return fabric.devicePixelRatio !== 1 && this.enableRetinaScaling
            },
            getRetinaScaling: function() {
                return this._isRetinaScaling() ? fabric.devicePixelRatio : 1
            },
            _initRetinaScaling: function() {
                this._isRetinaScaling() && (this.lowerCanvasEl.setAttribute("width", this.width * fabric.devicePixelRatio), this.lowerCanvasEl.setAttribute("height", this.height * fabric.devicePixelRatio), this.contextContainer.scale(fabric.devicePixelRatio, fabric.devicePixelRatio))
            },
            calcOffset: function() {
                return this._offset = u(this.lowerCanvasEl), this
            },
            setOverlayImage: function(n, t, i) {
                return this.__setBgOverlayImage("overlayImage", n, t, i)
            },
            setBackgroundImage: function(n, t, i) {
                return this.__setBgOverlayImage("backgroundImage", n, t, i)
            },
            setOverlayColor: function(n, t) {
                return this.__setBgOverlayColor("overlayColor", n, t)
            },
            setBackgroundColor: function(n, t) {
                return this.__setBgOverlayColor("backgroundColor", n, t)
            },
            _setImageSmoothing: function() {
                var n = this.getContext();
                n.imageSmoothingEnabled = n.imageSmoothingEnabled || n.webkitImageSmoothingEnabled || n.mozImageSmoothingEnabled || n.msImageSmoothingEnabled || n.oImageSmoothingEnabled;
                n.imageSmoothingEnabled = this.imageSmoothingEnabled
            },
            __setBgOverlayImage: function(n, t, i, r) {
                return typeof t == "string" ? fabric.util.loadImage(t, function(t) {
                    t && (this[n] = new fabric.Image(t, r));
                    i && i(t)
                }, this, r && r.crossOrigin) : (r && t.setOptions(r), this[n] = t, i && i(t)), this
            },
            __setBgOverlayColor: function(n, t, i) {
                if (t && t.source) {
                    var r = this;
                    fabric.util.loadImage(t.source, function(u) {
                        r[n] = new fabric.Pattern({
                            source: u,
                            repeat: t.repeat,
                            offsetX: t.offsetX,
                            offsetY: t.offsetY
                        });
                        i && i()
                    })
                } else this[n] = t, i && i();
                return this
            },
            _createCanvasElement: function(n) {
                var t = fabric.util.createCanvasElement(n);
                if (t.style || (t.style = {}), !t) throw r;
                if (typeof t.getContext == "undefined") throw r;
                return t
            },
            _initOptions: function(n) {
                for (var t in n) this[t] = n[t];
                (this.width = this.width || parseInt(this.lowerCanvasEl.width, 10) || 0, this.height = this.height || parseInt(this.lowerCanvasEl.height, 10) || 0, this.lowerCanvasEl.style) && (this.lowerCanvasEl.width = this.width, this.lowerCanvasEl.height = this.height, this.lowerCanvasEl.style.width = this.width + "px", this.lowerCanvasEl.style.height = this.height + "px", this.viewportTransform = this.viewportTransform.slice())
            },
            _createLowerCanvas: function(n) {
                this.lowerCanvasEl = fabric.util.getById(n) || this._createCanvasElement(n);
                fabric.util.addClass(this.lowerCanvasEl, "lower-canvas");
                this.interactive && this._applyCanvasStyle(this.lowerCanvasEl);
                this.contextContainer = this.lowerCanvasEl.getContext("2d")
            },
            getWidth: function() {
                return this.width
            },
            getHeight: function() {
                return this.height
            },
            setWidth: function(n, t) {
                return this.setDimensions({
                    width: n
                }, t)
            },
            setHeight: function(n, t) {
                return this.setDimensions({
                    height: n
                }, t)
            },
            setDimensions: function(n, t) {
                var r, i;
                t = t || {};
                for (i in n) r = n[i], t.cssOnly || (this._setBackstoreDimension(i, n[i]), r += "px"), t.backstoreOnly || this._setCssDimension(i, r);
                return this._initRetinaScaling(), this._setImageSmoothing(), this.calcOffset(), t.cssOnly || this.renderAll(), this
            },
            _setBackstoreDimension: function(n, t) {
                return this.lowerCanvasEl[n] = t, this.upperCanvasEl && (this.upperCanvasEl[n] = t), this.cacheCanvasEl && (this.cacheCanvasEl[n] = t), this[n] = t, this
            },
            _setCssDimension: function(n, t) {
                return this.lowerCanvasEl.style[n] = t, this.upperCanvasEl && (this.upperCanvasEl.style[n] = t), this.wrapperEl && (this.wrapperEl.style[n] = t), this
            },
            getZoom: function() {
                return Math.sqrt(this.viewportTransform[0] * this.viewportTransform[3])
            },
            setViewportTransform: function(n) {
                var r = this._activeGroup,
                    i, t, u;
                for (this.viewportTransform = n, t = 0, u = this._objects.length; t < u; t++) i = this._objects[t], i.group || i.setCoords();
                return r && r.setCoords(), this.renderAll(), this
            },
            zoomToPoint: function(n, t) {
                var u = n,
                    i = this.viewportTransform.slice(0),
                    r;
                return n = fabric.util.transformPoint(n, fabric.util.invertTransform(this.viewportTransform)), i[0] = t, i[3] = t, r = fabric.util.transformPoint(n, i), i[4] += u.x - r.x, i[5] += u.y - r.y, this.setViewportTransform(i)
            },
            setZoom: function(n) {
                return this.zoomToPoint(new fabric.Point(0, 0), n), this
            },
            absolutePan: function(n) {
                var t = this.viewportTransform.slice(0);
                return t[4] = -n.x, t[5] = -n.y, this.setViewportTransform(t)
            },
            relativePan: function(n) {
                return this.absolutePan(new fabric.Point(-n.x - this.viewportTransform[4], -n.y - this.viewportTransform[5]))
            },
            getElement: function() {
                return this.lowerCanvasEl
            },
            _onObjectAdded: function(n) {
                this.stateful && n.setupState();
                n._set("canvas", this);
                n.setCoords();
                this.fire("object:added", {
                    target: n
                });
                n.fire("added")
            },
            _onObjectRemoved: function(n) {
                this.fire("object:removed", {
                    target: n
                });
                n.fire("removed");
                delete n.canvas
            },
            clearContext: function(n) {
                return n.clearRect(0, 0, this.width, this.height), this
            },
            getContext: function() {
                return this.contextContainer
            },
            clear: function() {
                return this._objects.length = 0, this.backgroundImage = null, this.overlayImage = null, this.backgroundColor = "", this.overlayColor = "", this._hasITextHandlers && (this.off("selection:cleared", this._canvasITextSelectionClearedHanlder), this.off("object:selected", this._canvasITextSelectionClearedHanlder), this.off("mouse:up", this._mouseUpITextHandler), this._iTextInstances = null, this._hasITextHandlers = !1), this.clearContext(this.contextContainer), this.fire("canvas:cleared"), this.renderAll(), this
            },
            renderAll: function() {
                var n = this.contextContainer;
                return this.renderCanvas(n, this._objects), this
            },
            renderCanvas: function(n, t) {
                this.clearContext(n);
                this.fire("before:render");
                this.clipTo && fabric.util.clipContext(this, n);
                this._renderBackground(n);
                n.save();
                n.transform.apply(n, this.viewportTransform);
                this._renderObjects(n, t);
                n.restore();
                !this.controlsAboveOverlay && this.interactive && this.drawControls(n);
                this.clipTo && n.restore();
                this._renderOverlay(n);
                this.controlsAboveOverlay && this.interactive && this.drawControls(n);
                this.fire("after:render")
            },
            _renderObjects: function(n, t) {
                for (var i = 0, r = t.length; i < r; ++i) t[i] && t[i].render(n)
            },
            _renderBackgroundOrOverlay: function(n, t) {
                var i = this[t + "Color"];
                i && (n.fillStyle = i.toLive ? i.toLive(n) : i, n.fillRect(i.offsetX || 0, i.offsetY || 0, this.width, this.height));
                i = this[t + "Image"];
                i && (this[t + "Vpt"] && (n.save(), n.transform.apply(n, this.viewportTransform)), i.render(n), this[t + "Vpt"] && n.restore())
            },
            _renderBackground: function(n) {
                this._renderBackgroundOrOverlay(n, "background")
            },
            _renderOverlay: function(n) {
                this._renderBackgroundOrOverlay(n, "overlay")
            },
            getCenter: function() {
                return {
                    top: this.getHeight() / 2,
                    left: this.getWidth() / 2
                }
            },
            centerObjectH: function(n) {
                return this._centerObject(n, new fabric.Point(this.getCenter().left, n.getCenterPoint().y))
            },
            centerObjectV: function(n) {
                return this._centerObject(n, new fabric.Point(n.getCenterPoint().x, this.getCenter().top))
            },
            centerObject: function(n) {
                var t = this.getCenter();
                return this._centerObject(n, new fabric.Point(t.left, t.top))
            },
            viewportCenterObject: function(n) {
                var t = this.getVpCenter();
                return this._centerObject(n, t)
            },
            viewportCenterObjectH: function(n) {
                var t = this.getVpCenter();
                return this._centerObject(n, new fabric.Point(t.x, n.getCenterPoint().y)), this
            },
            viewportCenterObjectV: function(n) {
                var t = this.getVpCenter();
                return this._centerObject(n, new fabric.Point(n.getCenterPoint().x, t.y))
            },
            getVpCenter: function() {
                var n = this.getCenter(),
                    t = fabric.util.invertTransform(this.viewportTransform);
                return fabric.util.transformPoint({
                    x: n.left,
                    y: n.top
                }, t)
            },
            _centerObject: function(n, t) {
                return n.setPositionByOrigin(t, "center", "center"), this.renderAll(), this
            },
            toDatalessJSON: function(n) {
                return this.toDatalessObject(n)
            },
            toObject: function(n) {
                return this._toObjectMethod("toObject", n)
            },
            toDatalessObject: function(n) {
                return this._toObjectMethod("toDatalessObject", n)
            },
            _toObjectMethod: function(n, i) {
                var r = {
                    objects: this._toObjects(n, i)
                };
                return t(r, this.__serializeBgOverlay(i)), fabric.util.populateWithProperties(this, r, i), r
            },
            _toObjects: function(n, t) {
                return this.getObjects().filter(function(n) {
                    return !n.excludeFromExport
                }).map(function(i) {
                    return this._toObject(i, n, t)
                }, this)
            },
            _toObject: function(n, t, i) {
                var r, u;
                return this.includeDefaultValues || (r = n.includeDefaultValues, n.includeDefaultValues = !1), u = n[t](i), this.includeDefaultValues || (n.includeDefaultValues = r), u
            },
            __serializeBgOverlay: function(n) {
                var t = {
                    background: this.backgroundColor && this.backgroundColor.toObject ? this.backgroundColor.toObject(n) : this.backgroundColor
                };
                return this.overlayColor && (t.overlay = this.overlayColor.toObject ? this.overlayColor.toObject(n) : this.overlayColor), this.backgroundImage && (t.backgroundImage = this.backgroundImage.toObject(n)), this.overlayImage && (t.overlayImage = this.overlayImage.toObject(n)), t
            },
            svgViewportTransformation: !0,
            toSVG: function(n, t) {
                n || (n = {});
                var i = [];
                return this._setSVGPreamble(i, n), this._setSVGHeader(i, n), this._setSVGBgOverlayColor(i, "backgroundColor"), this._setSVGBgOverlayImage(i, "backgroundImage", t), this._setSVGObjects(i, t), this._setSVGBgOverlayColor(i, "overlayColor"), this._setSVGBgOverlayImage(i, "overlayImage", t), i.push("<\/svg>"), i.join("")
            },
            _setSVGPreamble: function(n, t) {
                t.suppressPreamble || n.push('<?xml version="1.0" encoding="', t.encoding || "UTF-8", '" standalone="no" ?>\n', '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" ', '"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">\n')
            },
            _setSVGHeader: function(n, t) {
                var e = t.width || this.width,
                    o = t.height || this.height,
                    r, f = 'viewBox="0 0 ' + this.width + " " + this.height + '" ',
                    u = fabric.Object.NUM_FRACTION_DIGITS;
                t.viewBox ? f = 'viewBox="' + t.viewBox.x + " " + t.viewBox.y + " " + t.viewBox.width + " " + t.viewBox.height + '" ' : this.svgViewportTransformation && (r = this.viewportTransform, f = 'viewBox="' + i(-r[4] / r[0], u) + " " + i(-r[5] / r[3], u) + " " + i(this.width / r[0], u) + " " + i(this.height / r[3], u) + '" ');
                n.push("<svg ", 'xmlns="http://www.w3.org/2000/svg" ', 'xmlns:xlink="http://www.w3.org/1999/xlink" ', 'version="1.1" ', 'width="', e, '" ', 'height="', o, '" ', this.backgroundColor && !this.backgroundColor.toLive ? 'style="background-color: ' + this.backgroundColor + '" ' : null, f, 'xml:space="preserve">\n', "<desc>Created with Fabric.js ", fabric.version, "<\/desc>\n", "<defs>", fabric.createSVGFontFacesMarkup(this.getObjects()), fabric.createSVGRefElementsMarkup(this), "<\/defs>\n")
            },
            _setSVGObjects: function(n, t) {
                for (var i, r = 0, u = this.getObjects(), f = u.length; r < f; r++)(i = u[r], i.excludeFromExport) || this._setSVGObject(n, i, t)
            },
            _setSVGObject: function(n, t, i) {
                n.push(t.toSVG(i))
            },
            _setSVGBgOverlayImage: function(n, t, i) {
                this[t] && this[t].toSVG && n.push(this[t].toSVG(i))
            },
            _setSVGBgOverlayColor: function(n, t) {
                this[t] && this[t].source ? n.push('<rect x="', this[t].offsetX, '" y="', this[t].offsetY, '" ', 'width="', this[t].repeat === "repeat-y" || this[t].repeat === "no-repeat" ? this[t].source.width : this.width, '" height="', this[t].repeat === "repeat-x" || this[t].repeat === "no-repeat" ? this[t].source.height : this.height, '" fill="url(#' + t + 'Pattern)"', "><\/rect>\n") : this[t] && t === "overlayColor" && n.push('<rect x="0" y="0" ', 'width="', this.width, '" height="', this.height, '" fill="', this[t], '"', "><\/rect>\n")
            },
            sendToBack: function(t) {
                if (!t) return this;
                var f = this._activeGroup,
                    i, r, u;
                if (t === f)
                    for (u = f._objects, i = u.length; i--;) r = u[i], n(this._objects, r), this._objects.unshift(r);
                else n(this._objects, t), this._objects.unshift(t);
                return this.renderAll && this.renderAll()
            },
            bringToFront: function(t) {
                if (!t) return this;
                var f = this._activeGroup,
                    i, r, u;
                if (t === f)
                    for (u = f._objects, i = 0; i < u.length; i++) r = u[i], n(this._objects, r), this._objects.push(r);
                else n(this._objects, t), this._objects.push(t);
                return this.renderAll && this.renderAll()
            },
            sendBackwards: function(t, i) {
                if (!t) return this;
                var s = this._activeGroup,
                    u, f, r, e, o;
                if (t === s)
                    for (o = s._objects, u = 0; u < o.length; u++) f = o[u], r = this._objects.indexOf(f), r !== 0 && (e = r - 1, n(this._objects, f), this._objects.splice(e, 0, f));
                else r = this._objects.indexOf(t), r !== 0 && (e = this._findNewLowerIndex(t, r, i), n(this._objects, t), this._objects.splice(e, 0, t));
                return this.renderAll && this.renderAll(), this
            },
            _findNewLowerIndex: function(n, t, i) {
                var u, r, f;
                if (i) {
                    for (u = t, r = t - 1; r >= 0; --r)
                        if (f = n.intersectsWithObject(this._objects[r]) || n.isContainedWithinObject(this._objects[r]) || this._objects[r].isContainedWithinObject(n), f) {
                            u = r;
                            break
                        }
                } else u = t - 1;
                return u
            },
            bringForward: function(t, i) {
                if (!t) return this;
                var s = this._activeGroup,
                    e, u, r, f, o;
                if (t === s)
                    for (o = s._objects, e = o.length; e--;) u = o[e], r = this._objects.indexOf(u), r !== this._objects.length - 1 && (f = r + 1, n(this._objects, u), this._objects.splice(f, 0, u));
                else r = this._objects.indexOf(t), r !== this._objects.length - 1 && (f = this._findNewUpperIndex(t, r, i), n(this._objects, t), this._objects.splice(f, 0, t));
                return this.renderAll && this.renderAll(), this
            },
            _findNewUpperIndex: function(n, t, i) {
                var u, r, f;
                if (i) {
                    for (u = t, r = t + 1; r < this._objects.length; ++r)
                        if (f = n.intersectsWithObject(this._objects[r]) || n.isContainedWithinObject(this._objects[r]) || this._objects[r].isContainedWithinObject(n), f) {
                            u = r;
                            break
                        }
                } else u = t + 1;
                return u
            },
            moveTo: function(t, i) {
                return n(this._objects, t), this._objects.splice(i, 0, t), this.renderAll && this.renderAll()
            },
            dispose: function() {
                return this.clear(), this
            },
            toString: function() {
                return "#<fabric.Canvas (" + this.complexity() + "): { objects: " + this.getObjects().length + " }>"
            }
        });
        t(fabric.StaticCanvas.prototype, fabric.Observable);
        t(fabric.StaticCanvas.prototype, fabric.Collection);
        t(fabric.StaticCanvas.prototype, fabric.DataURLExporter);
        t(fabric.StaticCanvas, {
            EMPTY_JSON: '{"objects": [], "background": "white"}',
            supports: function(n) {
                var t = fabric.util.createCanvasElement(),
                    i;
                if (!t || !t.getContext || (i = t.getContext("2d"), !i)) return null;
                switch (n) {
                    case "getImageData":
                        return typeof i.getImageData != "undefined";
                    case "setLineDash":
                        return typeof i.setLineDash != "undefined";
                    case "toDataURL":
                        return typeof t.toDataURL != "undefined";
                    case "toDataURLWithQuality":
                        try {
                            return t.toDataURL("image/jpeg", 0), !0
                        } catch (r) {}
                        return !1;
                    default:
                        return null
                }
            }
        });
        fabric.StaticCanvas.prototype.toJSON = fabric.StaticCanvas.prototype.toObject
    }();
fabric.BaseBrush = fabric.util.createClass({
        color: "rgb(0, 0, 0)",
        width: 1,
        shadow: null,
        strokeLineCap: "round",
        strokeLineJoin: "round",
        strokeDashArray: null,
        setShadow: function(n) {
            return this.shadow = new fabric.Shadow(n), this
        },
        _setBrushStyles: function() {
            var n = this.canvas.contextTop;
            n.strokeStyle = this.color;
            n.lineWidth = this.width;
            n.lineCap = this.strokeLineCap;
            n.lineJoin = this.strokeLineJoin;
            this.strokeDashArray && fabric.StaticCanvas.supports("setLineDash") && n.setLineDash(this.strokeDashArray)
        },
        _setShadow: function() {
            if (this.shadow) {
                var n = this.canvas.contextTop;
                n.shadowColor = this.shadow.color;
                n.shadowBlur = this.shadow.blur;
                n.shadowOffsetX = this.shadow.offsetX;
                n.shadowOffsetY = this.shadow.offsetY
            }
        },
        _resetShadow: function() {
            var n = this.canvas.contextTop;
            n.shadowColor = "";
            n.shadowBlur = n.shadowOffsetX = n.shadowOffsetY = 0
        }
    }),
    function() {
        fabric.PencilBrush = fabric.util.createClass(fabric.BaseBrush, {
            initialize: function(n) {
                this.canvas = n;
                this._points = []
            },
            onMouseDown: function(n) {
                this._prepareForDrawing(n);
                this._captureDrawingPath(n);
                this._render()
            },
            onMouseMove: function(n) {
                this._captureDrawingPath(n);
                this.canvas.clearContext(this.canvas.contextTop);
                this._render()
            },
            onMouseUp: function() {
                this._finalizeAndAddPath()
            },
            _prepareForDrawing: function(n) {
                var t = new fabric.Point(n.x, n.y);
                this._reset();
                this._addPoint(t);
                this.canvas.contextTop.moveTo(t.x, t.y)
            },
            _addPoint: function(n) {
                this._points.push(n)
            },
            _reset: function() {
                this._points.length = 0;
                this._setBrushStyles();
                this._setShadow()
            },
            _captureDrawingPath: function(n) {
                var t = new fabric.Point(n.x, n.y);
                this._addPoint(t)
            },
            _render: function() {
                var t = this.canvas.contextTop,
                    i = this.canvas.viewportTransform,
                    n = this._points[0],
                    r = this._points[1],
                    u, e, f;
                for (t.save(), t.transform(i[0], i[1], i[2], i[3], i[4], i[5]), t.beginPath(), this._points.length === 2 && n.x === r.x && n.y === r.y && (n.x -= .5, r.x += .5), t.moveTo(n.x, n.y), u = 1, e = this._points.length; u < e; u++) f = n.midPointFrom(r), t.quadraticCurveTo(n.x, n.y, f.x, f.y), n = this._points[u], r = this._points[u + 1];
                t.lineTo(n.x, n.y);
                t.stroke();
                t.restore()
            },
            convertPointsToSVGPath: function(n) {
                var r = [],
                    i = new fabric.Point(n[0].x, n[0].y),
                    f = new fabric.Point(n[1].x, n[1].y),
                    t, e, u;
                for (r.push("M ", n[0].x, " ", n[0].y, " "), t = 1, e = n.length; t < e; t++) u = i.midPointFrom(f), r.push("Q ", i.x, " ", i.y, " ", u.x, " ", u.y, " "), i = new fabric.Point(n[t].x, n[t].y), t + 1 < n.length && (f = new fabric.Point(n[t + 1].x, n[t + 1].y));
                return r.push("L ", i.x, " ", i.y, " "), r
            },
            createPath: function(n) {
                var t = new fabric.Path(n, {
                    fill: null,
                    stroke: this.color,
                    strokeWidth: this.width,
                    strokeLineCap: this.strokeLineCap,
                    strokeLineJoin: this.strokeLineJoin,
                    strokeDashArray: this.strokeDashArray,
                    originX: "center",
                    originY: "center"
                });
                return this.shadow && (this.shadow.affectStroke = !0, t.setShadow(this.shadow)), t
            },
            _finalizeAndAddPath: function() {
                var i = this.canvas.contextTop,
                    t, n;
                if (i.closePath(), t = this.convertPointsToSVGPath(this._points).join(""), t === "M 0 0 Q 0 0 0 0 L 0 0") {
                    this.canvas.renderAll();
                    return
                }
                n = this.createPath(t);
                this.canvas.add(n);
                n.setCoords();
                this.canvas.clearContext(this.canvas.contextTop);
                this._resetShadow();
                this.canvas.renderAll();
                this.canvas.fire("path:created", {
                    path: n
                })
            }
        })
    }();
fabric.CircleBrush = fabric.util.createClass(fabric.BaseBrush, {
    width: 10,
    initialize: function(n) {
        this.canvas = n;
        this.points = []
    },
    drawDot: function(n) {
        var r = this.addPoint(n),
            t = this.canvas.contextTop,
            i = this.canvas.viewportTransform;
        t.save();
        t.transform(i[0], i[1], i[2], i[3], i[4], i[5]);
        t.fillStyle = r.fill;
        t.beginPath();
        t.arc(r.x, r.y, r.radius, 0, Math.PI * 2, !1);
        t.closePath();
        t.fill();
        t.restore()
    },
    onMouseDown: function(n) {
        this.points.length = 0;
        this.canvas.clearContext(this.canvas.contextTop);
        this._setShadow();
        this.drawDot(n)
    },
    onMouseMove: function(n) {
        this.drawDot(n)
    },
    onMouseUp: function() {
        var e = this.canvas.renderOnAddRemove,
            r, t, f, n, u, i;
        for (this.canvas.renderOnAddRemove = !1, r = [], t = 0, f = this.points.length; t < f; t++) n = this.points[t], u = new fabric.Circle({
            radius: n.radius,
            left: n.x,
            top: n.y,
            originX: "center",
            originY: "center",
            fill: n.fill
        }), this.shadow && u.setShadow(this.shadow), r.push(u);
        i = new fabric.Group(r, {
            originX: "center",
            originY: "center"
        });
        i.canvas = this.canvas;
        this.canvas.add(i);
        this.canvas.fire("path:created", {
            path: i
        });
        this.canvas.clearContext(this.canvas.contextTop);
        this._resetShadow();
        this.canvas.renderOnAddRemove = e;
        this.canvas.renderAll()
    },
    addPoint: function(n) {
        var t = new fabric.Point(n.x, n.y),
            i = fabric.util.getRandomInt(Math.max(0, this.width - 20), this.width + 20) / 2,
            r = new fabric.Color(this.color).setAlpha(fabric.util.getRandomInt(0, 100) / 100).toRgba();
        return t.radius = i, t.fill = r, this.points.push(t), t
    }
});
fabric.SprayBrush = fabric.util.createClass(fabric.BaseBrush, {
    width: 10,
    density: 20,
    dotWidth: 1,
    dotWidthVariance: 1,
    randomOpacity: !1,
    optimizeOverlapping: !0,
    initialize: function(n) {
        this.canvas = n;
        this.sprayChunks = []
    },
    onMouseDown: function(n) {
        this.sprayChunks.length = 0;
        this.canvas.clearContext(this.canvas.contextTop);
        this._setShadow();
        this.addSprayChunk(n);
        this.render()
    },
    onMouseMove: function(n) {
        this.addSprayChunk(n);
        this.render()
    },
    onMouseUp: function() {
        var s = this.canvas.renderOnAddRemove,
            i, r, e, t, n, o, f, u;
        for (this.canvas.renderOnAddRemove = !1, i = [], r = 0, e = this.sprayChunks.length; r < e; r++)
            for (t = this.sprayChunks[r], n = 0, o = t.length; n < o; n++) f = new fabric.Rect({
                width: t[n].width,
                height: t[n].width,
                left: t[n].x + 1,
                top: t[n].y + 1,
                originX: "center",
                originY: "center",
                fill: this.color
            }), this.shadow && f.setShadow(this.shadow), i.push(f);
        this.optimizeOverlapping && (i = this._getOptimizedRects(i));
        u = new fabric.Group(i, {
            originX: "center",
            originY: "center"
        });
        u.canvas = this.canvas;
        this.canvas.add(u);
        this.canvas.fire("path:created", {
            path: u
        });
        this.canvas.clearContext(this.canvas.contextTop);
        this._resetShadow();
        this.canvas.renderOnAddRemove = s;
        this.canvas.renderAll()
    },
    _getOptimizedRects: function(n) {
        for (var u, r = {}, t, i = 0, f = n.length; i < f; i++) t = n[i].left + "" + n[i].top, r[t] || (r[t] = n[i]);
        u = [];
        for (t in r) u.push(r[t]);
        return u
    },
    render: function() {
        var i = this.canvas.contextTop,
            n, r, u, t;
        for (i.fillStyle = this.color, n = this.canvas.viewportTransform, i.save(), i.transform(n[0], n[1], n[2], n[3], n[4], n[5]), r = 0, u = this.sprayChunkPoints.length; r < u; r++) t = this.sprayChunkPoints[r], typeof t.opacity != "undefined" && (i.globalAlpha = t.opacity), i.fillRect(t.x, t.y, t.width, t.width);
        i.restore()
    },
    addSprayChunk: function(n) {
        var u, f, e, t, r, i;
        for (this.sprayChunkPoints = [], t = this.width / 2, r = 0; r < this.density; r++) u = fabric.util.getRandomInt(n.x - t, n.x + t), f = fabric.util.getRandomInt(n.y - t, n.y + t), e = this.dotWidthVariance ? fabric.util.getRandomInt(Math.max(1, this.dotWidth - this.dotWidthVariance), this.dotWidth + this.dotWidthVariance) : this.dotWidth, i = new fabric.Point(u, f), i.width = e, this.randomOpacity && (i.opacity = fabric.util.getRandomInt(0, 100) / 100), this.sprayChunkPoints.push(i);
        this.sprayChunks.push(this.sprayChunkPoints)
    }
});
fabric.PatternBrush = fabric.util.createClass(fabric.PencilBrush, {
        getPatternSrc: function() {
            var t = 20,
                i = fabric.document.createElement("canvas"),
                n = i.getContext("2d");
            return i.width = i.height = t + 5, n.fillStyle = this.color, n.beginPath(), n.arc(t / 2, t / 2, t / 2, 0, Math.PI * 2, !1), n.closePath(), n.fill(), i
        },
        getPatternSrcFunction: function() {
            return String(this.getPatternSrc).replace("this.color", '"' + this.color + '"')
        },
        getPattern: function() {
            return this.canvas.contextTop.createPattern(this.source || this.getPatternSrc(), "repeat")
        },
        _setBrushStyles: function() {
            this.callSuper("_setBrushStyles");
            this.canvas.contextTop.strokeStyle = this.getPattern()
        },
        createPath: function(n) {
            var t = this.callSuper("createPath", n),
                i = t._getLeftTopCoords().scalarAdd(t.strokeWidth / 2);
            return t.stroke = new fabric.Pattern({
                source: this.source || this.getPatternSrcFunction(),
                offsetX: -i.x,
                offsetY: -i.y
            }), t
        }
    }),
    function() {
        var u = fabric.util.getPointer,
            f = fabric.util.degreesToRadians,
            e = fabric.util.radiansToDegrees,
            r = Math.atan2,
            n = Math.abs,
            o = fabric.StaticCanvas.supports("setLineDash"),
            t = .5,
            i;
        fabric.Canvas = fabric.util.createClass(fabric.StaticCanvas, {
            initialize: function(n, t) {
                t || (t = {});
                this._initStatic(n, t);
                this._initInteractive();
                this._createCacheCanvas()
            },
            uniScaleTransform: !1,
            uniScaleKey: "shiftKey",
            centeredScaling: !1,
            centeredRotation: !1,
            centeredKey: "altKey",
            altActionKey: "shiftKey",
            interactive: !0,
            selection: !0,
            selectionKey: "shiftKey",
            altSelectionKey: null,
            selectionColor: "rgba(100, 100, 255, 0.3)",
            selectionDashArray: [],
            selectionBorderColor: "rgba(255, 255, 255, 0.3)",
            selectionLineWidth: 1,
            hoverCursor: "move",
            moveCursor: "move",
            defaultCursor: "default",
            freeDrawingCursor: "crosshair",
            rotationCursor: "crosshair",
            containerClass: "canvas-container",
            perPixelTargetFind: !1,
            targetFindTolerance: 0,
            skipTargetFind: !1,
            isDrawingMode: !1,
            preserveObjectStacking: !1,
            stopContextMenu: !1,
            fireRightClick: !1,
            _initInteractive: function() {
                this._currentTransform = null;
                this._groupSelector = null;
                this._initWrapperElement();
                this._createUpperCanvas();
                this._initEventListeners();
                this._initRetinaScaling();
                this.freeDrawingBrush = fabric.PencilBrush && new fabric.PencilBrush(this);
                this.calcOffset()
            },
            _chooseObjectsToRender: function() {
                var n = this.getActiveGroup(),
                    r = this.getActiveObject(),
                    t, i = [],
                    f = [],
                    u, e;
                if ((n || r) && !this.preserveObjectStacking) {
                    for (u = 0, e = this._objects.length; u < e; u++) t = this._objects[u], n && n.contains(t) || t === r ? f.push(t) : i.push(t);
                    n && (n._set("_objects", f), i.push(n));
                    r && i.push(r)
                } else i = this._objects;
                return i
            },
            renderAll: function() {
                !this.selection || this._groupSelector || this.isDrawingMode || this.clearContext(this.contextTop);
                var n = this.contextContainer;
                return this.renderCanvas(n, this._chooseObjectsToRender()), this
            },
            renderTop: function() {
                var n = this.contextTop;
                return this.clearContext(n), this.selection && this._groupSelector && this._drawSelection(n), this.fire("after:render"), this
            },
            _resetCurrentTransform: function() {
                var n = this._currentTransform;
                n.target.set({
                    scaleX: n.original.scaleX,
                    scaleY: n.original.scaleY,
                    skewX: n.original.skewX,
                    skewY: n.original.skewY,
                    left: n.original.left,
                    top: n.original.top
                });
                this._shouldCenterTransform(n.target) ? n.action === "rotate" ? this._setOriginToCenter(n.target) : (n.originX !== "center" && (n.mouseXSign = n.originX === "right" ? -1 : 1), n.originY !== "center" && (n.mouseYSign = n.originY === "bottom" ? -1 : 1), n.originX = "center", n.originY = "center") : (n.originX = n.original.originX, n.originY = n.original.originY)
            },
            containsPoint: function(n, t, i) {
                var r = i || this.getPointer(n, !0),
                    u;
                return u = t.group && t.group === this.getActiveGroup() ? this._normalizePointer(t.group, r) : {
                    x: r.x,
                    y: r.y
                }, t.containsPoint(u) || t._findTargetCorner(r)
            },
            _normalizePointer: function(n, t) {
                var i = n.calcTransformMatrix(),
                    r = fabric.util.invertTransform(i),
                    u = this.viewportTransform,
                    f = this.restorePointerVpt(t),
                    e = fabric.util.transformPoint(f, r);
                return fabric.util.transformPoint(e, u)
            },
            isTargetTransparent: function(n, t, i) {
                var f = n.hasBorders,
                    e = n.transparentCorners,
                    r = this.contextCache,
                    o = n.selectionBackgroundColor,
                    u;
                return n.hasBorders = n.transparentCorners = !1, n.selectionBackgroundColor = "", r.save(), r.transform.apply(r, this.viewportTransform), n.render(r), r.restore(), n.active && n._renderControls(r), n.hasBorders = f, n.transparentCorners = e, n.selectionBackgroundColor = o, u = fabric.util.isTransparent(r, t, i, this.targetFindTolerance), this.clearContext(r), u
            },
            _shouldClearSelection: function(n, t) {
                var i = this.getActiveGroup(),
                    r = this.getActiveObject();
                return !t || t && i && !i.contains(t) && i !== t && !n[this.selectionKey] || t && !t.evented || t && !t.selectable && r && r !== t
            },
            _shouldCenterTransform: function(n) {
                if (n) {
                    var t = this._currentTransform,
                        i;
                    return t.action === "scale" || t.action === "scaleX" || t.action === "scaleY" ? i = this.centeredScaling || n.centeredScaling : t.action === "rotate" && (i = this.centeredRotation || n.centeredRotation), i ? !t.altKey : t.altKey
                }
            },
            _getOriginFromCorner: function(n, t) {
                var i = {
                    x: n.originX,
                    y: n.originY
                };
                return t === "ml" || t === "tl" || t === "bl" ? i.x = "right" : (t === "mr" || t === "tr" || t === "br") && (i.x = "left"), t === "tl" || t === "mt" || t === "tr" ? i.y = "bottom" : (t === "bl" || t === "mb" || t === "br") && (i.y = "top"), i
            },
            _getActionFromCorner: function(n, t, i) {
                if (!t) return "drag";
                switch (t) {
                    case "mtr":
                        return "rotate";
                    case "ml":
                    case "mr":
                        return i[this.altActionKey] ? "skewY" : "scaleX";
                    case "mt":
                    case "mb":
                        return i[this.altActionKey] ? "skewX" : "scaleY";
                    default:
                        return "scale"
                }
            },
            _setupCurrentTransform: function(n, t) {
                if (t) {
                    var i = this.getPointer(n),
                        u = t._findTargetCorner(this.getPointer(n, !0)),
                        e = this._getActionFromCorner(t, u, n),
                        r = this._getOriginFromCorner(t, u);
                    this._currentTransform = {
                        target: t,
                        action: e,
                        corner: u,
                        scaleX: t.scaleX,
                        scaleY: t.scaleY,
                        skewX: t.skewX,
                        skewY: t.skewY,
                        offsetX: i.x - t.left,
                        offsetY: i.y - t.top,
                        originX: r.x,
                        originY: r.y,
                        ex: i.x,
                        ey: i.y,
                        lastX: i.x,
                        lastY: i.y,
                        left: t.left,
                        top: t.top,
                        theta: f(t.angle),
                        width: t.width * t.scaleX,
                        mouseXSign: 1,
                        mouseYSign: 1,
                        shiftKey: n.shiftKey,
                        altKey: n[this.centeredKey]
                    };
                    this._currentTransform.original = {
                        left: t.left,
                        top: t.top,
                        scaleX: t.scaleX,
                        scaleY: t.scaleY,
                        skewX: t.skewX,
                        skewY: t.skewY,
                        originX: r.x,
                        originY: r.y
                    };
                    this._resetCurrentTransform()
                }
            },
            _translateObject: function(n, t) {
                var r = this._currentTransform,
                    i = r.target,
                    u = n - r.offsetX,
                    f = t - r.offsetY,
                    e = !i.get("lockMovementX") && i.left !== u,
                    o = !i.get("lockMovementY") && i.top !== f;
                return e && i.set("left", u), o && i.set("top", f), e || o
            },
            _changeSkewTransformOrigin: function(n, t, i) {
                var e = "originX",
                    u = {
                        0: "center"
                    },
                    r = t.target.skewX,
                    o = "left",
                    s = "right",
                    h = t.corner === "mt" || t.corner === "ml" ? 1 : -1,
                    f = 1;
                n = n > 0 ? 1 : -1;
                i === "y" && (r = t.target.skewY, o = "top", s = "bottom", e = "originY");
                u[-1] = o;
                u[1] = s;
                t.target.flipX && (f *= -1);
                t.target.flipY && (f *= -1);
                r === 0 ? (t.skewSign = -h * n * f, t[e] = u[-n]) : (r = r > 0 ? 1 : -1, t.skewSign = r, t[e] = u[r * h * f])
            },
            _skewObject: function(n, t, i) {
                var r = this._currentTransform,
                    u = r.target,
                    f = !1,
                    s = u.get("lockSkewingX"),
                    h = u.get("lockSkewingY");
                if (s && i === "x" || h && i === "y") return !1;
                var c = u.getCenterPoint(),
                    l = u.toLocalPoint(new fabric.Point(n, t), "center", "center")[i],
                    a = u.toLocalPoint(new fabric.Point(r.lastX, r.lastY), "center", "center")[i],
                    e, o, v = u._getTransformedDimensions();
                return this._changeSkewTransformOrigin(l - a, r, i), e = u.toLocalPoint(new fabric.Point(n, t), r.originX, r.originY)[i], o = u.translateToOriginPoint(c, r.originX, r.originY), f = this._setObjectSkew(e, r, i, v), r.lastX = n, r.lastY = t, u.setPositionByOrigin(o, r.originX, r.originY), f
            },
            _setObjectSkew: function(n, t, i, r) {
                var u = t.target,
                    f, v = !1,
                    p = t.skewSign,
                    y, h, o, e, s, c, l, a;
                return i === "x" ? (o = "y", e = "Y", s = "X", l = 0, a = u.skewY) : (o = "x", e = "X", s = "Y", l = u.skewX, a = 0), h = u._getTransformedDimensions(l, a), c = 2 * Math.abs(n) - h[i], c <= 2 ? f = 0 : (f = p * Math.atan(c / u["scale" + s] / (h[o] / u["scale" + e])), f = fabric.util.radiansToDegrees(f)), v = u["skew" + s] !== f, u.set("skew" + s, f), u["skew" + e] !== 0 && (y = u._getTransformedDimensions(), f = r[o] / y[o] * u["scale" + e], u.set("scale" + e, f)), v
            },
            _scaleObject: function(n, t, i) {
                var r = this._currentTransform,
                    u = r.target,
                    f = u.get("lockScalingX"),
                    e = u.get("lockScalingY"),
                    h = u.get("lockScalingFlip");
                if (f && e) return !1;
                var c = u.translateToOriginPoint(u.getCenterPoint(), r.originX, r.originY),
                    o = u.toLocalPoint(new fabric.Point(n, t), r.originX, r.originY),
                    l = u._getTransformedDimensions(),
                    s = !1;
                return this._setLocalMouse(o, r), s = this._setObjectScale(o, r, f, e, i, h, l), u.setPositionByOrigin(c, r.originX, r.originY), s
            },
            _setObjectScale: function(n, t, i, r, u, f, e) {
                var o = t.target,
                    l = !1,
                    a = !1,
                    s = !1,
                    v, y, h, c;
                return h = n.x * o.scaleX / e.x, c = n.y * o.scaleY / e.y, v = o.scaleX !== h, y = o.scaleY !== c, f && h <= 0 && h < o.scaleX && (l = !0), f && c <= 0 && c < o.scaleY && (a = !0), u !== "equally" || i || r ? u ? u !== "x" || o.get("lockUniScaling") ? u !== "y" || o.get("lockUniScaling") || a || r || o.set("scaleY", c) && (s = s || y) : l || i || o.set("scaleX", h) && (s = s || v) : (l || i || o.set("scaleX", h) && (s = s || v), a || r || o.set("scaleY", c) && (s = s || y)) : l || a || (s = this._scaleObjectEqually(n, o, t, e)), t.newScaleX = h, t.newScaleY = c, l || a || this._flipObject(t, u), s
            },
            _scaleObjectEqually: function(n, t, i, r) {
                var u = n.y + n.x,
                    f = r.y * i.original.scaleY / t.scaleY + r.x * i.original.scaleX / t.scaleX,
                    e;
                return i.newScaleX = i.original.scaleX * u / f, i.newScaleY = i.original.scaleY * u / f, e = i.newScaleX !== t.scaleX || i.newScaleY !== t.scaleY, t.set("scaleX", i.newScaleX), t.set("scaleY", i.newScaleY), e
            },
            _flipObject: function(n, t) {
                n.newScaleX < 0 && t !== "y" && (n.originX === "left" ? n.originX = "right" : n.originX === "right" && (n.originX = "left"));
                n.newScaleY < 0 && t !== "x" && (n.originY === "top" ? n.originY = "bottom" : n.originY === "bottom" && (n.originY = "top"))
            },
            _setLocalMouse: function(t, i) {
                var r = i.target;
                i.originX === "right" ? t.x *= -1 : i.originX === "center" && (t.x *= i.mouseXSign * 2, t.x < 0 && (i.mouseXSign = -i.mouseXSign));
                i.originY === "bottom" ? t.y *= -1 : i.originY === "center" && (t.y *= i.mouseYSign * 2, t.y < 0 && (i.mouseYSign = -i.mouseYSign));
                n(t.x) > r.padding ? t.x < 0 ? t.x += r.padding : t.x -= r.padding : t.x = 0;
                n(t.y) > r.padding ? t.y < 0 ? t.y += r.padding : t.y -= r.padding : t.y = 0
            },
            _rotateObject: function(n, t) {
                var i = this._currentTransform;
                if (i.target.get("lockRotation")) return !1;
                var f = r(i.ey - i.top, i.ex - i.left),
                    o = r(t - i.top, n - i.left),
                    u = e(o - f + i.theta);
                return u < 0 && (u = 360 + u), i.target.angle = u % 360, !0
            },
            setCursor: function(n) {
                this.upperCanvasEl.style.cursor = n
            },
            _resetObjectTransform: function(n) {
                n.scaleX = 1;
                n.scaleY = 1;
                n.skewX = 0;
                n.skewY = 0;
                n.setAngle(0)
            },
            _drawSelection: function(i) {
                var f = this._groupSelector,
                    h = f.left,
                    c = f.top,
                    e = n(h),
                    s = n(c),
                    r, u;
                (this.selectionColor && (i.fillStyle = this.selectionColor, i.fillRect(f.ex - (h > 0 ? 0 : -h), f.ey - (c > 0 ? 0 : -c), e, s)), this.selectionLineWidth && this.selectionBorderColor) && (i.lineWidth = this.selectionLineWidth, i.strokeStyle = this.selectionBorderColor, this.selectionDashArray.length > 1 && !o ? (r = f.ex + t - (h > 0 ? 0 : e), u = f.ey + t - (c > 0 ? 0 : s), i.beginPath(), fabric.util.drawDashedLine(i, r, u, r + e, u, this.selectionDashArray), fabric.util.drawDashedLine(i, r, u + s - 1, r + e, u + s - 1, this.selectionDashArray), fabric.util.drawDashedLine(i, r, u, r, u + s, this.selectionDashArray), fabric.util.drawDashedLine(i, r + e - 1, u, r + e - 1, u + s, this.selectionDashArray), i.closePath(), i.stroke()) : (fabric.Object.prototype._setLineDash.call(this, i, this.selectionDashArray), i.strokeRect(f.ex + t - (h > 0 ? 0 : e), f.ey + t - (c > 0 ? 0 : s), e, s)))
            },
            findTarget: function(n, t) {
                var r;
                if (!this.skipTargetFind) {
                    var u = this.getPointer(n, !0),
                        f = this.getActiveGroup(),
                        i = this.getActiveObject(),
                        e;
                    if (f && !t && this._checkTarget(u, f)) return this._fireOverOutEvents(f, n), f;
                    if (i && i._findTargetCorner(u)) return this._fireOverOutEvents(i, n), i;
                    if (i && this._checkTarget(u, i))
                        if (this.preserveObjectStacking) e = i;
                        else return this._fireOverOutEvents(i, n), i;
                    return this.targets = [], r = this._searchPossibleTargets(this._objects, u), n[this.altSelectionKey] && r && e && r !== e && (r = e), this._fireOverOutEvents(r, n), r
                }
            },
            _fireOverOutEvents: function(n, t) {
                n ? this._hoveredTarget !== n && (this._hoveredTarget && (this.fire("mouse:out", {
                    target: this._hoveredTarget,
                    e: t
                }), this._hoveredTarget.fire("mouseout")), this.fire("mouse:over", {
                    target: n,
                    e: t
                }), n.fire("mouseover"), this._hoveredTarget = n) : this._hoveredTarget && (this.fire("mouse:out", {
                    target: this._hoveredTarget,
                    e: t
                }), this._hoveredTarget.fire("mouseout"), this._hoveredTarget = null)
            },
            _checkTarget: function(n, t) {
                if (t && t.visible && t.evented && this.containsPoint(null, t, n))
                    if ((this.perPixelTargetFind || t.perPixelTargetFind) && !t.isEditing) {
                        var i = this.isTargetTransparent(t, n.x, n.y);
                        if (!i) return !0
                    } else return !0
            },
            _searchPossibleTargets: function(n, t) {
                for (var i, r = n.length, f, u; r--;)
                    if (this._checkTarget(t, n[r])) {
                        i = n[r];
                        i.type === "group" && i.subTargetCheck && (f = this._normalizePointer(i, t), u = this._searchPossibleTargets(i._objects, f), u && this.targets.push(u));
                        break
                    }
                return i
            },
            restorePointerVpt: function(n) {
                return fabric.util.transformPoint(n, fabric.util.invertTransform(this.viewportTransform))
            },
            getPointer: function(n, t, i) {
                i || (i = this.upperCanvasEl);
                var f = u(n),
                    r = i.getBoundingClientRect(),
                    e = r.width || 0,
                    o = r.height || 0,
                    s;
                return e && o || ("top" in r && "bottom" in r && (o = Math.abs(r.top - r.bottom)), "right" in r && "left" in r && (e = Math.abs(r.right - r.left))), this.calcOffset(), f.x = f.x - this._offset.left, f.y = f.y - this._offset.top, t || (f = this.restorePointerVpt(f)), s = e === 0 || o === 0 ? {
                    width: 1,
                    height: 1
                } : {
                    width: i.width / e,
                    height: i.height / o
                }, {
                    x: f.x * s.width,
                    y: f.y * s.height
                }
            },
            _createUpperCanvas: function() {
                var n = this.lowerCanvasEl.className.replace(/\s*lower-canvas\s*/, "");
                this.upperCanvasEl = this._createCanvasElement();
                fabric.util.addClass(this.upperCanvasEl, "upper-canvas " + n);
                this.wrapperEl.appendChild(this.upperCanvasEl);
                this._copyCanvasStyle(this.lowerCanvasEl, this.upperCanvasEl);
                this._applyCanvasStyle(this.upperCanvasEl);
                this.contextTop = this.upperCanvasEl.getContext("2d")
            },
            _createCacheCanvas: function() {
                this.cacheCanvasEl = this._createCanvasElement();
                this.cacheCanvasEl.setAttribute("width", this.width);
                this.cacheCanvasEl.setAttribute("height", this.height);
                this.contextCache = this.cacheCanvasEl.getContext("2d")
            },
            _initWrapperElement: function() {
                this.wrapperEl = fabric.util.wrapElement(this.lowerCanvasEl, "div", {
                    "class": this.containerClass
                });
                fabric.util.setStyle(this.wrapperEl, {
                    width: this.getWidth() + "px",
                    height: this.getHeight() + "px",
                    position: "relative"
                });
                fabric.util.makeElementUnselectable(this.wrapperEl)
            },
            _applyCanvasStyle: function(n) {
                var t = this.getWidth() || n.width,
                    i = this.getHeight() || n.height;
                fabric.util.setStyle(n, {
                    position: "absolute",
                    width: t + "px",
                    height: i + "px",
                    left: 0,
                    top: 0
                });
                n.width = t;
                n.height = i;
                fabric.util.makeElementUnselectable(n)
            },
            _copyCanvasStyle: function(n, t) {
                t.style.cssText = n.style.cssText
            },
            getSelectionContext: function() {
                return this.contextTop
            },
            getSelectionElement: function() {
                return this.upperCanvasEl
            },
            _setActiveObject: function(n) {
                this._activeObject && this._activeObject.set("active", !1);
                this._activeObject = n;
                n.set("active", !0)
            },
            setActiveObject: function(n, t) {
                return this._setActiveObject(n), this.renderAll(), this.fire("object:selected", {
                    target: n,
                    e: t
                }), n.fire("selected", {
                    e: t
                }), this
            },
            getActiveObject: function() {
                return this._activeObject
            },
            _onObjectRemoved: function(n) {
                this.getActiveObject() === n && (this.fire("before:selection:cleared", {
                    target: n
                }), this._discardActiveObject(), this.fire("selection:cleared", {
                    target: n
                }), n.fire("deselected"));
                this.callSuper("_onObjectRemoved", n)
            },
            _discardActiveObject: function() {
                this._activeObject && this._activeObject.set("active", !1);
                this._activeObject = null
            },
            discardActiveObject: function(n) {
                var t = this._activeObject;
                return this.fire("before:selection:cleared", {
                    target: t,
                    e: n
                }), this._discardActiveObject(), this.fire("selection:cleared", {
                    e: n
                }), t && t.fire("deselected", {
                    e: n
                }), this
            },
            _setActiveGroup: function(n) {
                this._activeGroup = n;
                n && n.set("active", !0)
            },
            setActiveGroup: function(n, t) {
                return this._setActiveGroup(n), n && (this.fire("object:selected", {
                    target: n,
                    e: t
                }), n.fire("selected", {
                    e: t
                })), this
            },
            getActiveGroup: function() {
                return this._activeGroup
            },
            _discardActiveGroup: function() {
                var n = this.getActiveGroup();
                n && n.destroy();
                this.setActiveGroup(null)
            },
            discardActiveGroup: function(n) {
                var t = this.getActiveGroup();
                return this.fire("before:selection:cleared", {
                    e: n,
                    target: t
                }), this._discardActiveGroup(), this.fire("selection:cleared", {
                    e: n
                }), this
            },
            deactivateAll: function() {
                for (var t = this.getObjects(), n = 0, i = t.length; n < i; n++) t[n].set("active", !1);
                return this._discardActiveGroup(), this._discardActiveObject(), this
            },
            deactivateAllWithDispatch: function(n) {
                var i = this.getActiveGroup(),
                    t = this.getActiveObject();
                return (t || i) && this.fire("before:selection:cleared", {
                    target: t || i,
                    e: n
                }), this.deactivateAll(), (t || i) && (this.fire("selection:cleared", {
                    e: n,
                    target: t
                }), t && t.fire("deselected")), this
            },
            dispose: function() {
                this.callSuper("dispose");
                var n = this.wrapperEl;
                return this.removeListeners(), n.removeChild(this.upperCanvasEl), n.removeChild(this.lowerCanvasEl), delete this.upperCanvasEl, n.parentNode && n.parentNode.replaceChild(this.lowerCanvasEl, this.wrapperEl), delete this.wrapperEl, this
            },
            clear: function() {
                return this.discardActiveGroup(), this.discardActiveObject(), this.clearContext(this.contextTop), this.callSuper("clear")
            },
            drawControls: function(n) {
                var t = this.getActiveGroup();
                t ? t._renderControls(n) : this._drawObjectsControls(n)
            },
            _drawObjectsControls: function(n) {
                for (var t = 0, i = this._objects.length; t < i; ++t) this._objects[t] && this._objects[t].active && this._objects[t]._renderControls(n)
            },
            _toObject: function(n, t, i) {
                var r = this._realizeGroupTransformOnObject(n),
                    u = this.callSuper("_toObject", n, t, i);
                return this._unwindGroupTransformOnObject(n, r), u
            },
            _realizeGroupTransformOnObject: function(n) {
                var t;
                return n.group && n.group === this.getActiveGroup() ? (t = {}, ["angle", "flipX", "flipY", "height", "left", "scaleX", "scaleY", "top", "width"].forEach(function(i) {
                    t[i] = n[i]
                }), this.getActiveGroup().realizeTransform(n), t) : null
            },
            _unwindGroupTransformOnObject: function(n, t) {
                t && n.set(t)
            },
            _setSVGObject: function(n, t, i) {
                var r;
                r = this._realizeGroupTransformOnObject(t);
                this.callSuper("_setSVGObject", n, t, i);
                this._unwindGroupTransformOnObject(t, r)
            }
        });
        for (i in fabric.StaticCanvas) i !== "prototype" && (fabric.Canvas[i] = fabric.StaticCanvas[i]);
        fabric.isTouchSupported && (fabric.Canvas.prototype._setCursorFromEvent = function() {});
        fabric.Element = fabric.Canvas
    }(),
    function() {
        var i = {
                mt: 0,
                tr: 1,
                mr: 2,
                br: 3,
                mb: 4,
                bl: 5,
                ml: 6,
                tl: 7
            },
            n = fabric.util.addListener,
            t = fabric.util.removeListener;
        fabric.util.object.extend(fabric.Canvas.prototype, {
            cursorMap: ["n-resize", "ne-resize", "e-resize", "se-resize", "s-resize", "sw-resize", "w-resize", "nw-resize"],
            _initEventListeners: function() {
                this._bindEvents();
                n(fabric.window, "resize", this._onResize);
                n(this.upperCanvasEl, "mousedown", this._onMouseDown);
                n(this.upperCanvasEl, "mousemove", this._onMouseMove);
                n(this.upperCanvasEl, "mouseout", this._onMouseOut);
                n(this.upperCanvasEl, "wheel", this._onMouseWheel);
                n(this.upperCanvasEl, "contextmenu", this._onContextMenu);
                n(this.upperCanvasEl, "touchstart", this._onMouseDown);
                n(this.upperCanvasEl, "touchmove", this._onMouseMove);
                typeof eventjs != "undefined" && "add" in eventjs && (eventjs.add(this.upperCanvasEl, "gesture", this._onGesture), eventjs.add(this.upperCanvasEl, "drag", this._onDrag), eventjs.add(this.upperCanvasEl, "orientation", this._onOrientationChange), eventjs.add(this.upperCanvasEl, "shake", this._onShake), eventjs.add(this.upperCanvasEl, "longpress", this._onLongPress))
            },
            _bindEvents: function() {
                this._onMouseDown = this._onMouseDown.bind(this);
                this._onMouseMove = this._onMouseMove.bind(this);
                this._onMouseUp = this._onMouseUp.bind(this);
                this._onResize = this._onResize.bind(this);
                this._onGesture = this._onGesture.bind(this);
                this._onDrag = this._onDrag.bind(this);
                this._onShake = this._onShake.bind(this);
                this._onLongPress = this._onLongPress.bind(this);
                this._onOrientationChange = this._onOrientationChange.bind(this);
                this._onMouseWheel = this._onMouseWheel.bind(this);
                this._onMouseOut = this._onMouseOut.bind(this);
                this._onContextMenu = this._onContextMenu.bind(this)
            },
            removeListeners: function() {
                t(fabric.window, "resize", this._onResize);
                t(this.upperCanvasEl, "mousedown", this._onMouseDown);
                t(this.upperCanvasEl, "mousemove", this._onMouseMove);
                t(this.upperCanvasEl, "mouseout", this._onMouseOut);
                t(this.upperCanvasEl, "wheel", this._onMouseWheel);
                t(this.upperCanvasEl, "contextmenu", this._onContextMenu);
                t(this.upperCanvasEl, "touchstart", this._onMouseDown);
                t(this.upperCanvasEl, "touchmove", this._onMouseMove);
                typeof eventjs != "undefined" && "remove" in eventjs && (eventjs.remove(this.upperCanvasEl, "gesture", this._onGesture), eventjs.remove(this.upperCanvasEl, "drag", this._onDrag), eventjs.remove(this.upperCanvasEl, "orientation", this._onOrientationChange), eventjs.remove(this.upperCanvasEl, "shake", this._onShake), eventjs.remove(this.upperCanvasEl, "longpress", this._onLongPress))
            },
            _onGesture: function(n, t) {
                this.__onTransformGesture && this.__onTransformGesture(n, t)
            },
            _onDrag: function(n, t) {
                this.__onDrag && this.__onDrag(n, t)
            },
            _onMouseWheel: function(n) {
                this.__onMouseWheel(n)
            },
            _onMouseOut: function(n) {
                var t = this._hoveredTarget;
                this.fire("mouse:out", {
                    target: t,
                    e: n
                });
                this._hoveredTarget = null;
                t && t.fire("mouseout", {
                    e: n
                })
            },
            _onOrientationChange: function(n, t) {
                this.__onOrientationChange && this.__onOrientationChange(n, t)
            },
            _onShake: function(n, t) {
                this.__onShake && this.__onShake(n, t)
            },
            _onLongPress: function(n, t) {
                this.__onLongPress && this.__onLongPress(n, t)
            },
            _onContextMenu: function(n) {
                return this.stopContextMenu && (n.stopPropagation(), n.preventDefault()), !1
            },
            _onMouseDown: function(i) {
                this.__onMouseDown(i);
                n(fabric.document, "touchend", this._onMouseUp);
                n(fabric.document, "touchmove", this._onMouseMove);
                t(this.upperCanvasEl, "mousemove", this._onMouseMove);
                t(this.upperCanvasEl, "touchmove", this._onMouseMove);
                i.type === "touchstart" ? t(this.upperCanvasEl, "mousedown", this._onMouseDown) : (n(fabric.document, "mouseup", this._onMouseUp), n(fabric.document, "mousemove", this._onMouseMove))
            },
            _onMouseUp: function(i) {
                if (this.__onMouseUp(i), t(fabric.document, "mouseup", this._onMouseUp), t(fabric.document, "touchend", this._onMouseUp), t(fabric.document, "mousemove", this._onMouseMove), t(fabric.document, "touchmove", this._onMouseMove), n(this.upperCanvasEl, "mousemove", this._onMouseMove), n(this.upperCanvasEl, "touchmove", this._onMouseMove), i.type === "touchend") {
                    var r = this;
                    setTimeout(function() {
                        n(r.upperCanvasEl, "mousedown", r._onMouseDown)
                    }, 400)
                }
            },
            _onMouseMove: function(n) {
                !this.allowTouchScrolling && n.preventDefault && n.preventDefault();
                this.__onMouseMove(n)
            },
            _onResize: function() {
                this.calcOffset()
            },
            _shouldRender: function(n, t) {
                var i = this.getActiveGroup() || this.getActiveObject();
                return !!(n && (n.isMoving || n !== i) || !n && !!i || !n && !i && !this._groupSelector || t && this._previousPointer && this.selection && (t.x !== this._previousPointer.x || t.y !== this._previousPointer.y))
            },
            __onMouseUp: function(n) {
                var t, u = !0,
                    i = this._currentTransform,
                    r = this._groupSelector,
                    e = !r || r.left === 0 && r.top === 0,
                    f;
                if (this.isDrawingMode && this._isCurrentlyDrawing) {
                    this._onMouseUpInDrawingMode(n);
                    return
                }
                i && (this._finalizeCurrentTransform(), u = !i.actionPerformed);
                t = u ? this.findTarget(n, !0) : i.target;
                f = this._shouldRender(t, this.getPointer(n));
                t || !e ? this._maybeGroupObjects(n) : (this._groupSelector = null, this._currentTransform = null);
                t && (t.isMoving = !1);
                this._handleCursorAndEvent(n, t, "up");
                t && (t.__corner = 0);
                f && this.renderAll()
            },
            _handleCursorAndEvent: function(n, t, i) {
                this._setCursorFromEvent(n, t);
                this._handleEvent(n, i, t ? t : null)
            },
            _handleEvent: function(n, t, i) {
                var u = typeof i === undefined ? this.findTarget(n) : i,
                    f = this.targets || [],
                    e = {
                        e: n,
                        target: u,
                        subTargets: f
                    },
                    r;
                for (this.fire("mouse:" + t, e), u && u.fire("mouse" + t, e), r = 0; r < f.length; r++) f[r].fire("mouse" + t, e)
            },
            _finalizeCurrentTransform: function() {
                var t = this._currentTransform,
                    n = t.target;
                n._scaling && (n._scaling = !1);
                n.setCoords();
                this._restoreOriginXY(n);
                (t.actionPerformed || this.stateful && n.hasStateChanged()) && (this.fire("object:modified", {
                    target: n
                }), n.fire("modified"))
            },
            _restoreOriginXY: function(n) {
                if (this._previousOriginX && this._previousOriginY) {
                    var t = n.translateToOriginPoint(n.getCenterPoint(), this._previousOriginX, this._previousOriginY);
                    n.originX = this._previousOriginX;
                    n.originY = this._previousOriginY;
                    n.left = t.x;
                    n.top = t.y;
                    this._previousOriginX = null;
                    this._previousOriginY = null
                }
            },
            _onMouseDownInDrawingMode: function(n) {
                this._isCurrentlyDrawing = !0;
                this.discardActiveObject(n).renderAll();
                this.clipTo && fabric.util.clipContext(this, this.contextTop);
                var t = this.getPointer(n);
                this.freeDrawingBrush.onMouseDown(t);
                this._handleEvent(n, "down")
            },
            _onMouseMoveInDrawingMode: function(n) {
                if (this._isCurrentlyDrawing) {
                    var t = this.getPointer(n);
                    this.freeDrawingBrush.onMouseMove(t)
                }
                this.setCursor(this.freeDrawingCursor);
                this._handleEvent(n, "move")
            },
            _onMouseUpInDrawingMode: function(n) {
                this._isCurrentlyDrawing = !1;
                this.clipTo && this.contextTop.restore();
                this.freeDrawingBrush.onMouseUp();
                this._handleEvent(n, "up")
            },
            __onMouseDown: function(n) {
                var f = "which" in n ? n.which === 3 : n.button === 2,
                    t, i, u, r;
                if (f) {
                    this.fireRightClick && this._handleEvent(n, "down", t ? t : null);
                    return
                }
                if (this.isDrawingMode) {
                    this._onMouseDownInDrawingMode(n);
                    return
                }
                this._currentTransform || (t = this.findTarget(n), i = this.getPointer(n, !0), this._previousPointer = i, u = this._shouldRender(t, i), r = this._shouldGroup(n, t), this._shouldClearSelection(n, t) ? this._clearSelection(n, t, i) : r && (this._handleGrouping(n, t), t = this.getActiveGroup()), t && (t.selectable && (t.__corner || !r) && (this._beforeTransform(n, t), this._setupCurrentTransform(n, t)), t !== this.getActiveGroup() && t !== this.getActiveObject() && (this.deactivateAll(), t.selectable && this.setActiveObject(t, n))), this._handleEvent(n, "down", t ? t : null), u && this.renderAll())
            },
            _beforeTransform: function(n, t) {
                if (this.stateful && t.saveState(), t._findTargetCorner(this.getPointer(n))) this.onBeforeScaleRotate(t)
            },
            _clearSelection: function(n, t, i) {
                this.deactivateAllWithDispatch(n);
                t && t.selectable ? this.setActiveObject(t, n) : this.selection && (this._groupSelector = {
                    ex: i.x,
                    ey: i.y,
                    top: 0,
                    left: 0
                })
            },
            _setOriginToCenter: function(n) {
                this._previousOriginX = this._currentTransform.target.originX;
                this._previousOriginY = this._currentTransform.target.originY;
                var t = n.getCenterPoint();
                n.originX = "center";
                n.originY = "center";
                n.left = t.x;
                n.top = t.y;
                this._currentTransform.left = n.left;
                this._currentTransform.top = n.top
            },
            _setCenterToOrigin: function(n) {
                var t = n.translateToOriginPoint(n.getCenterPoint(), this._previousOriginX, this._previousOriginY);
                n.originX = this._previousOriginX;
                n.originY = this._previousOriginY;
                n.left = t.x;
                n.top = t.y;
                this._previousOriginX = null;
                this._previousOriginY = null
            },
            __onMouseMove: function(n) {
                var i, r, t;
                if (this.isDrawingMode) {
                    this._onMouseMoveInDrawingMode(n);
                    return
                }
                typeof n.touches != "undefined" && n.touches.length > 1 || (t = this._groupSelector, t ? (r = this.getPointer(n, !0), t.left = r.x - t.ex, t.top = r.y - t.ey, this.renderTop()) : this._currentTransform ? this._transformObject(n) : (i = this.findTarget(n), this._setCursorFromEvent(n, i)), this._handleEvent(n, "move", i ? i : null))
            },
            __onMouseWheel: function(n) {
                this.fire("mouse:wheel", {
                    e: n
                })
            },
            _transformObject: function(n) {
                var i = this.getPointer(n),
                    t = this._currentTransform;
                t.reset = !1;
                t.target.isMoving = !0;
                this._beforeScaleTransform(n, t);
                this._performTransformAction(n, t, i);
                t.actionPerformed && this.renderAll()
            },
            _performTransformAction: function(n, t, i) {
                var f = i.x,
                    e = i.y,
                    u = t.target,
                    o = t.action,
                    r = !1;
                o === "rotate" ? (r = this._rotateObject(f, e)) && this._fire("rotating", u, n) : o === "scale" ? (r = this._onScale(n, t, f, e)) && this._fire("scaling", u, n) : o === "scaleX" ? (r = this._scaleObject(f, e, "x")) && this._fire("scaling", u, n) : o === "scaleY" ? (r = this._scaleObject(f, e, "y")) && this._fire("scaling", u, n) : o === "skewX" ? (r = this._skewObject(f, e, "x")) && this._fire("skewing", u, n) : o === "skewY" ? (r = this._skewObject(f, e, "y")) && this._fire("skewing", u, n) : (r = this._translateObject(f, e), r && (this._fire("moving", u, n), this.setCursor(u.moveCursor || this.moveCursor)));
                t.actionPerformed = r
            },
            _fire: function(n, t, i) {
                this.fire("object:" + n, {
                    target: t,
                    e: i
                });
                t.fire(n, {
                    e: i
                })
            },
            _beforeScaleTransform: function(n, t) {
                if (t.action === "scale" || t.action === "scaleX" || t.action === "scaleY") {
                    var i = this._shouldCenterTransform(t.target);
                    (i && (t.originX !== "center" || t.originY !== "center") || !i && t.originX === "center" && t.originY === "center") && (this._resetCurrentTransform(), t.reset = !0)
                }
            },
            _onScale: function(n, t, i, r) {
                return (n[this.uniScaleKey] || this.uniScaleTransform) && !t.target.get("lockUniScaling") ? (t.currentAction = "scale", this._scaleObject(i, r)) : (t.reset || t.currentAction !== "scale" || this._resetCurrentTransform(), t.currentAction = "scaleEqually", this._scaleObject(i, r, "equally"))
            },
            _setCursorFromEvent: function(n, t) {
                var i, r, u;
                return t ? (i = t.hoverCursor || this.hoverCursor, t.selectable ? (r = this.getActiveGroup(), u = t._findTargetCorner && (!r || !r.contains(t)) && t._findTargetCorner(this.getPointer(n, !0)), u ? this._setCornerCursor(u, t, n) : this.setCursor(i)) : this.setCursor(i), !0) : (this.setCursor(this.defaultCursor), !1)
            },
            _setCornerCursor: function(n, t, r) {
                if (n in i) this.setCursor(this._getRotatedCornerCursor(n, t, r));
                else if (n === "mtr" && t.hasRotatingPoint) this.setCursor(this.rotationCursor);
                else return this.setCursor(this.defaultCursor), !1
            },
            _getRotatedCornerCursor: function(n, t, r) {
                var u = Math.round(t.getAngle() % 360 / 45);
                return u < 0 && (u += 8), u += i[n], r[this.altActionKey] && i[n] % 2 == 0 && (u += 2), u %= 8, this.cursorMap[u]
            }
        })
    }(),
    function() {
        var n = Math.min,
            t = Math.max;
        fabric.util.object.extend(fabric.Canvas.prototype, {
            _shouldGroup: function(n, t) {
                var i = this.getActiveObject();
                return n[this.selectionKey] && t && t.selectable && (this.getActiveGroup() || i && i !== t) && this.selection
            },
            _handleGrouping: function(n, t) {
                var i = this.getActiveGroup();
                (t !== i || (t = this.findTarget(n, !0), t)) && (i ? this._updateActiveGroup(t, n) : this._createActiveGroup(t, n), this._activeGroup && this._activeGroup.saveCoords())
            },
            _updateActiveGroup: function(n, t) {
                var i = this.getActiveGroup();
                if (i.contains(n)) {
                    if (i.removeWithUpdate(n), n.set("active", !1), i.size() === 1) {
                        this.discardActiveGroup(t);
                        this.setActiveObject(i.item(0));
                        return
                    }
                } else i.addWithUpdate(n);
                this.fire("selection:created", {
                    target: i,
                    e: t
                });
                i.set("active", !0)
            },
            _createActiveGroup: function(n, t) {
                if (this._activeObject && n !== this._activeObject) {
                    var i = this._createGroup(n);
                    i.addWithUpdate();
                    this.setActiveGroup(i);
                    this._activeObject = null;
                    this.fire("selection:created", {
                        target: i,
                        e: t
                    })
                }
                n.set("active", !0)
            },
            _createGroup: function(n) {
                var t = this.getObjects(),
                    i = t.indexOf(this._activeObject) < t.indexOf(n),
                    r = i ? [this._activeObject, n] : [n, this._activeObject];
                return this._activeObject.isEditing && this._activeObject.exitEditing(), new fabric.Group(r, {
                    canvas: this
                })
            },
            _groupSelectedObjects: function(n) {
                var t = this._collectObjects();
                t.length === 1 ? this.setActiveObject(t[0], n) : t.length > 1 && (t = new fabric.Group(t.reverse(), {
                    canvas: this
                }), t.addWithUpdate(), this.setActiveGroup(t, n), t.saveCoords(), this.fire("selection:created", {
                    target: t
                }), this.renderAll())
            },
            _collectObjects: function() {
                for (var h = [], i, r = this._groupSelector.ex, u = this._groupSelector.ey, f = r + this._groupSelector.left, e = u + this._groupSelector.top, o = new fabric.Point(n(r, f), n(u, e)), s = new fabric.Point(t(r, f), t(u, e)), l = r === f && u === e, c = this._objects.length; c--;)
                    if ((i = this._objects[c], i && i.selectable && i.visible) && (i.intersectsWithRect(o, s) || i.isContainedWithinRect(o, s) || i.containsPoint(o) || i.containsPoint(s)) && (i.set("active", !0), h.push(i), l)) break;
                return h
            },
            _maybeGroupObjects: function(n) {
                this.selection && this._groupSelector && this._groupSelectedObjects(n);
                var t = this.getActiveGroup();
                t && (t.setObjectsCoords().setCoords(), t.isMoving = !1, this.setCursor(this.defaultCursor));
                this._groupSelector = null;
                this._currentTransform = null
            }
        })
    }(),
    function() {
        var n = fabric.StaticCanvas.supports("toDataURLWithQuality");
        fabric.util.object.extend(fabric.StaticCanvas.prototype, {
            toDataURL: function(n) {
                n || (n = {});
                var t = n.format || "png",
                    i = n.quality || 1,
                    r = n.multiplier || 1,
                    u = {
                        left: n.left || 0,
                        top: n.top || 0,
                        width: n.width || 0,
                        height: n.height || 0
                    };
                return this.__toDataURLWithMultiplier(t, i, u, r)
            },
            __toDataURLWithMultiplier: function(n, t, i, r) {
                var f = this.getWidth(),
                    e = this.getHeight(),
                    o = (i.width || this.getWidth()) * r,
                    s = (i.height || this.getHeight()) * r,
                    a = this.getZoom(),
                    h = a * r,
                    u = this.viewportTransform,
                    v = (u[4] - i.left) * r,
                    y = (u[5] - i.top) * r,
                    p = [h, 0, 0, h, v, y],
                    c = this.interactive,
                    l;
                return this.viewportTransform = p, this.interactive && (this.interactive = !1), f !== o || e !== s ? this.setDimensions({
                    width: o,
                    height: s
                }) : this.renderAll(), l = this.__toDataURL(n, t, i), c && (this.interactive = c), this.viewportTransform = u, this.setDimensions({
                    width: f,
                    height: e
                }), l
            },
            __toDataURL: function(t, i) {
                var r = this.contextContainer.canvas;
                return t === "jpg" && (t = "jpeg"), n ? r.toDataURL("image/" + t, i) : r.toDataURL("image/" + t)
            },
            toDataURLWithMultiplier: function(n, t, i) {
                return this.toDataURL({
                    format: n,
                    multiplier: t,
                    quality: i
                })
            }
        })
    }();
fabric.util.object.extend(fabric.StaticCanvas.prototype, {
        loadFromDatalessJSON: function(n, t, i) {
            return this.loadFromJSON(n, t, i)
        },
        loadFromJSON: function(n, t, i) {
            var r, u;
            if (n) return r = typeof n == "string" ? JSON.parse(n) : fabric.util.object.clone(n), this.clear(), u = this, this._enlivenObjects(r.objects, function() {
                u._setBgOverlay(r, function() {
                    delete r.objects;
                    delete r.backgroundImage;
                    delete r.overlayImage;
                    delete r.background;
                    delete r.overlay;
                    for (var n in r) u[n] = r[n];
                    t && t()
                })
            }, i), this
        },
        _setBgOverlay: function(n, t) {
            var u = this,
                i = {
                    backgroundColor: !1,
                    overlayColor: !1,
                    backgroundImage: !1,
                    overlayImage: !1
                },
                r;
            if (!n.backgroundImage && !n.overlayImage && !n.background && !n.overlay) {
                t && t();
                return
            }
            r = function() {
                i.backgroundImage && i.overlayImage && i.backgroundColor && i.overlayColor && (u.renderAll(), t && t())
            };
            this.__setBgOverlay("backgroundImage", n.backgroundImage, i, r);
            this.__setBgOverlay("overlayImage", n.overlayImage, i, r);
            this.__setBgOverlay("backgroundColor", n.background, i, r);
            this.__setBgOverlay("overlayColor", n.overlay, i, r);
            r()
        },
        __setBgOverlay: function(n, t, i, r) {
            var u = this;
            if (!t) {
                i[n] = !0;
                return
            }
            n === "backgroundImage" || n === "overlayImage" ? fabric.Image.fromObject(t, function(t) {
                u[n] = t;
                i[n] = !0;
                r && r()
            }) : this["set" + fabric.util.string.capitalize(n, !0)](t, function() {
                i[n] = !0;
                r && r()
            })
        },
        _enlivenObjects: function(n, t, i) {
            var r = this,
                u;
            if (!n || n.length === 0) {
                t && t();
                return
            }
            u = this.renderOnAddRemove;
            this.renderOnAddRemove = !1;
            fabric.util.enlivenObjects(n, function(n) {
                n.forEach(function(n, t) {
                    r.insertAt(n, t)
                });
                r.renderOnAddRemove = u;
                t && t()
            }, null, i)
        },
        _toDataURL: function(n, t) {
            this.clone(function(i) {
                t(i.toDataURL(n))
            })
        },
        _toDataURLWithMultiplier: function(n, t, i) {
            this.clone(function(r) {
                i(r.toDataURLWithMultiplier(n, t))
            })
        },
        clone: function(n, t) {
            var i = JSON.stringify(this.toJSON(t));
            this.cloneWithoutData(function(t) {
                t.loadFromJSON(i, function() {
                    n && n(t)
                })
            })
        },
        cloneWithoutData: function(n) {
            var i = fabric.document.createElement("canvas"),
                t;
            i.width = this.getWidth();
            i.height = this.getHeight();
            t = new fabric.Canvas(i);
            t.clipTo = this.clipTo;
            this.backgroundImage ? (t.setBackgroundImage(this.backgroundImage.src, function() {
                t.renderAll();
                n && n(t)
            }), t.backgroundImageOpacity = this.backgroundImageOpacity, t.backgroundImageStretch = this.backgroundImageStretch) : n && n(t)
        }
    }),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            u = t.util.object.extend,
            i = t.util.toFixed,
            f = t.util.string.capitalize,
            r = t.util.degreesToRadians,
            e = t.StaticCanvas.supports("setLineDash");
        t.Object || (t.Object = t.util.createClass({
            type: "object",
            originX: "left",
            originY: "top",
            top: 0,
            left: 0,
            width: 0,
            height: 0,
            scaleX: 1,
            scaleY: 1,
            flipX: !1,
            flipY: !1,
            opacity: 1,
            angle: 0,
            skewX: 0,
            skewY: 0,
            cornerSize: 13,
            transparentCorners: !0,
            hoverCursor: null,
            moveCursor: null,
            padding: 0,
            borderColor: "rgba(102,153,255,0.75)",
            borderDashArray: null,
            cornerColor: "rgba(102,153,255,0.5)",
            cornerStrokeColor: null,
            cornerStyle: "rect",
            cornerDashArray: null,
            centeredScaling: !1,
            centeredRotation: !0,
            fill: "rgb(0,0,0)",
            fillRule: "nonzero",
            globalCompositeOperation: "source-over",
            backgroundColor: "",
            selectionBackgroundColor: "",
            stroke: null,
            strokeWidth: 1,
            strokeDashArray: null,
            strokeLineCap: "butt",
            strokeLineJoin: "miter",
            strokeMiterLimit: 10,
            shadow: null,
            borderOpacityWhenMoving: .4,
            borderScaleFactor: 1,
            transformMatrix: null,
            minScaleLimit: .01,
            selectable: !0,
            evented: !0,
            visible: !0,
            hasControls: !0,
            hasBorders: !0,
            hasRotatingPoint: !0,
            rotatingPointOffset: 40,
            perPixelTargetFind: !1,
            includeDefaultValues: !0,
            clipTo: null,
            lockMovementX: !1,
            lockMovementY: !1,
            lockRotation: !1,
            lockScalingX: !1,
            lockScalingY: !1,
            lockUniScaling: !1,
            lockSkewingX: !1,
            lockSkewingY: !1,
            lockScalingFlip: !1,
            excludeFromExport: !1,
            stateProperties: "top left width height scaleX scaleY flipX flipY originX originY transformMatrix stroke strokeWidth strokeDashArray strokeLineCap strokeLineJoin strokeMiterLimit angle opacity fill fillRule globalCompositeOperation shadow clipTo visible backgroundColor skewX skewY".split(" "),
            initialize: function(n) {
                n && this.setOptions(n)
            },
            _initGradient: function(n) {
                !n.fill || !n.fill.colorStops || n.fill instanceof t.Gradient || this.set("fill", new t.Gradient(n.fill));
                !n.stroke || !n.stroke.colorStops || n.stroke instanceof t.Gradient || this.set("stroke", new t.Gradient(n.stroke))
            },
            _initPattern: function(n) {
                !n.fill || !n.fill.source || n.fill instanceof t.Pattern || this.set("fill", new t.Pattern(n.fill));
                !n.stroke || !n.stroke.source || n.stroke instanceof t.Pattern || this.set("stroke", new t.Pattern(n.stroke))
            },
            _initClipping: function(n) {
                if (n.clipTo && typeof n.clipTo == "string") {
                    var i = t.util.getFunctionBody(n.clipTo);
                    typeof i != "undefined" && (this.clipTo = new Function("ctx", i))
                }
            },
            setOptions: function(n) {
                for (var t in n) this.set(t, n[t]);
                this._initGradient(n);
                this._initPattern(n);
                this._initClipping(n)
            },
            transform: function(n, t) {
                this.group && !this.group._transformDone && this.group === this.canvas._activeGroup && this.group.transform(n);
                var i = t ? this._getLeftTopCoords() : this.getCenterPoint();
                n.translate(i.x, i.y);
                n.rotate(r(this.angle));
                n.scale(this.scaleX * (this.flipX ? -1 : 1), this.scaleY * (this.flipY ? -1 : 1));
                n.transform(1, 0, Math.tan(r(this.skewX)), 1, 0, 0);
                n.transform(1, Math.tan(r(this.skewY)), 0, 1, 0, 0)
            },
            toObject: function(n) {
                var r = t.Object.NUM_FRACTION_DIGITS,
                    u = {
                        type: this.type,
                        originX: this.originX,
                        originY: this.originY,
                        left: i(this.left, r),
                        top: i(this.top, r),
                        width: i(this.width, r),
                        height: i(this.height, r),
                        fill: this.fill && this.fill.toObject ? this.fill.toObject() : this.fill,
                        stroke: this.stroke && this.stroke.toObject ? this.stroke.toObject() : this.stroke,
                        strokeWidth: i(this.strokeWidth, r),
                        strokeDashArray: this.strokeDashArray ? this.strokeDashArray.concat() : this.strokeDashArray,
                        strokeLineCap: this.strokeLineCap,
                        strokeLineJoin: this.strokeLineJoin,
                        strokeMiterLimit: i(this.strokeMiterLimit, r),
                        scaleX: i(this.scaleX, r),
                        scaleY: i(this.scaleY, r),
                        angle: i(this.getAngle(), r),
                        flipX: this.flipX,
                        flipY: this.flipY,
                        opacity: i(this.opacity, r),
                        shadow: this.shadow && this.shadow.toObject ? this.shadow.toObject() : this.shadow,
                        visible: this.visible,
                        clipTo: this.clipTo && String(this.clipTo),
                        backgroundColor: this.backgroundColor,
                        fillRule: this.fillRule,
                        globalCompositeOperation: this.globalCompositeOperation,
                        transformMatrix: this.transformMatrix ? this.transformMatrix.concat() : this.transformMatrix,
                        skewX: i(this.skewX, r),
                        skewY: i(this.skewY, r)
                    };
                return this.includeDefaultValues || (u = this._removeDefaultValues(u)), t.util.populateWithProperties(this, u, n), u
            },
            toDatalessObject: function(n) {
                return this.toObject(n)
            },
            _removeDefaultValues: function(n) {
                var i = t.util.getKlass(n.type).prototype,
                    r = i.stateProperties;
                return r.forEach(function(t) {
                    n[t] === i[t] && delete n[t];
                    var r = Object.prototype.toString.call(n[t]) === "[object Array]" && Object.prototype.toString.call(i[t]) === "[object Array]";
                    r && n[t].length === 0 && i[t].length === 0 && delete n[t]
                }), n
            },
            toString: function() {
                return "#<fabric." + f(this.type) + ">"
            },
            get: function(n) {
                return this[n]
            },
            getObjectScaling: function() {
                var t = this.scaleX,
                    i = this.scaleY,
                    n;
                return this.group && (n = this.group.getObjectScaling(), t *= n.scaleX, i *= n.scaleY), {
                    scaleX: t,
                    scaleY: i
                }
            },
            _setObject: function(n) {
                for (var t in n) this._set(t, n[t])
            },
            set: function(n, t) {
                return typeof n == "object" ? this._setObject(n) : typeof t == "function" && n !== "clipTo" ? this._set(n, t(this.get(n))) : this._set(n, t), this
            },
            _set: function(n, i) {
                var r = n === "scaleX" || n === "scaleY";
                return r && (i = this._constrainScale(i)), n === "scaleX" && i < 0 ? (this.flipX = !this.flipX, i *= -1) : n === "scaleY" && i < 0 ? (this.flipY = !this.flipY, i *= -1) : n !== "shadow" || !i || i instanceof t.Shadow || (i = new t.Shadow(i)), this[n] = i, (n === "width" || n === "height") && (this.minScaleLimit = Math.min(.1, 1 / Math.max(this.width, this.height))), this
            },
            setOnGroup: function() {},
            toggle: function(n) {
                var t = this.get(n);
                return typeof t == "boolean" && this.set(n, !t), this
            },
            setSourcePath: function(n) {
                return this.sourcePath = n, this
            },
            getViewportTransform: function() {
                return this.canvas && this.canvas.viewportTransform ? this.canvas.viewportTransform : [1, 0, 0, 1, 0, 0]
            },
            render: function(n, i) {
                (this.width !== 0 || this.height !== 0) && this.visible && (n.save(), this._setupCompositeOperation(n), this.drawSelectionBackground(n), i || this.transform(n), this._setOpacity(n), this._setShadow(n), this._renderBackground(n), this._setStrokeStyles(n), this._setFillStyles(n), this.transformMatrix && n.transform.apply(n, this.transformMatrix), this.clipTo && t.util.clipContext(this, n), this._render(n, i), this.clipTo && n.restore(), n.restore())
            },
            _renderBackground: function(n) {
                this.backgroundColor && (n.fillStyle = this.backgroundColor, n.fillRect(-this.width / 2, -this.height / 2, this.width, this.height), this._removeShadow(n))
            },
            _setOpacity: function(n) {
                this.group && this.group._setOpacity(n);
                n.globalAlpha *= this.opacity
            },
            _setStrokeStyles: function(n) {
                this.stroke && (n.lineWidth = this.strokeWidth, n.lineCap = this.strokeLineCap, n.lineJoin = this.strokeLineJoin, n.miterLimit = this.strokeMiterLimit, n.strokeStyle = this.stroke.toLive ? this.stroke.toLive(n, this) : this.stroke)
            },
            _setFillStyles: function(n) {
                this.fill && (n.fillStyle = this.fill.toLive ? this.fill.toLive(n, this) : this.fill)
            },
            _setLineDash: function(n, t, i) {
                t && (1 & t.length && t.push.apply(t, t), e ? n.setLineDash(t) : i && i(n))
            },
            _renderControls: function(n, i) {
                if (this.active && !i && (!this.group || this.group === this.canvas.getActiveGroup())) {
                    var e = this.getViewportTransform(),
                        f = this.calcTransformMatrix(),
                        u;
                    f = t.util.multiplyTransformMatrices(e, f);
                    u = t.util.qrDecompose(f);
                    n.save();
                    n.translate(u.translateX, u.translateY);
                    n.lineWidth = 1 * this.borderScaleFactor;
                    n.globalAlpha = this.isMoving ? this.borderOpacityWhenMoving : 1;
                    this.group && this.group === this.canvas.getActiveGroup() ? (n.rotate(r(u.angle)), this.drawBordersInGroup(n, u)) : (n.rotate(r(this.angle)), this.drawBorders(n));
                    this.drawControls(n);
                    n.restore()
                }
            },
            _setShadow: function(n) {
                if (this.shadow) {
                    var r = this.canvas && this.canvas.viewportTransform[0] || 1,
                        u = this.canvas && this.canvas.viewportTransform[3] || 1,
                        i = this.getObjectScaling();
                    this.canvas && this.canvas._isRetinaScaling() && (r *= t.devicePixelRatio, u *= t.devicePixelRatio);
                    n.shadowColor = this.shadow.color;
                    n.shadowBlur = this.shadow.blur * (r + u) * (i.scaleX + i.scaleY) / 4;
                    n.shadowOffsetX = this.shadow.offsetX * r * i.scaleX;
                    n.shadowOffsetY = this.shadow.offsetY * u * i.scaleY
                }
            },
            _removeShadow: function(n) {
                this.shadow && (n.shadowColor = "", n.shadowBlur = n.shadowOffsetX = n.shadowOffsetY = 0)
            },
            _renderFill: function(n) {
                if (this.fill) {
                    if (n.save(), this.fill.gradientTransform) {
                        var t = this.fill.gradientTransform;
                        n.transform.apply(n, t)
                    }
                    this.fill.toLive && n.translate(-this.width / 2 + this.fill.offsetX || 0, -this.height / 2 + this.fill.offsetY || 0);
                    this.fillRule === "evenodd" ? n.fill("evenodd") : n.fill();
                    n.restore()
                }
            },
            _renderStroke: function(n) {
                if (this.stroke && this.strokeWidth !== 0) {
                    if (this.shadow && !this.shadow.affectStroke && this._removeShadow(n), n.save(), this._setLineDash(n, this.strokeDashArray, this._renderDashedStroke), this.stroke.gradientTransform) {
                        var t = this.stroke.gradientTransform;
                        n.transform.apply(n, t)
                    }
                    this.stroke.toLive && n.translate(-this.width / 2 + this.stroke.offsetX || 0, -this.height / 2 + this.stroke.offsetY || 0);
                    n.stroke();
                    n.restore()
                }
            },
            clone: function(n, i) {
                return this.constructor.fromObject ? this.constructor.fromObject(this.toObject(i), n) : new t.Object(this.toObject(i))
            },
            cloneAsImage: function(n, i) {
                var r = this.toDataURL(i);
                return t.util.loadImage(r, function(i) {
                    n && n(new t.Image(i))
                }), this
            },
            toDataURL: function(n) {
                var r, u, i, f, e, o;
                return n || (n = {}), r = t.util.createCanvasElement(), u = this.getBoundingRect(), r.width = u.width, r.height = u.height, t.util.wrapElement(r, "div"), i = new t.StaticCanvas(r, {
                    enableRetinaScaling: n.enableRetinaScaling
                }), n.format === "jpg" && (n.format = "jpeg"), n.format === "jpeg" && (i.backgroundColor = "#fff"), f = {
                    active: this.get("active"),
                    left: this.getLeft(),
                    top: this.getTop()
                }, this.set("active", !1), this.setPositionByOrigin(new t.Point(i.getWidth() / 2, i.getHeight() / 2), "center", "center"), e = this.canvas, i.add(this), o = i.toDataURL(n), this.set(f).setCoords(), this.canvas = e, i.dispose(), i = null, o
            },
            isType: function(n) {
                return this.type === n
            },
            complexity: function() {
                return 0
            },
            toJSON: function(n) {
                return this.toObject(n)
            },
            setGradient: function(n, i) {
                var r, u, f;
                i || (i = {});
                r = {
                    colorStops: []
                };
                r.type = i.type || (i.r1 || i.r2 ? "radial" : "linear");
                r.coords = {
                    x1: i.x1,
                    y1: i.y1,
                    x2: i.x2,
                    y2: i.y2
                };
                (i.r1 || i.r2) && (r.coords.r1 = i.r1, r.coords.r2 = i.r2);
                i.gradientTransform && (r.gradientTransform = i.gradientTransform);
                for (u in i.colorStops) f = new t.Color(i.colorStops[u]), r.colorStops.push({
                    offset: u,
                    color: f.toRgb(),
                    opacity: f.getAlpha()
                });
                return this.set(n, t.Gradient.forObject(this, r))
            },
            setPatternFill: function(n) {
                return this.set("fill", new t.Pattern(n))
            },
            setShadow: function(n) {
                return this.set("shadow", n ? new t.Shadow(n) : null)
            },
            setColor: function(n) {
                return this.set("fill", n), this
            },
            setAngle: function(n) {
                var t = (this.originX !== "center" || this.originY !== "center") && this.centeredRotation;
                return t && this._setOriginToCenter(), this.set("angle", n), t && this._resetOrigin(), this
            },
            centerH: function() {
                return this.canvas && this.canvas.centerObjectH(this), this
            },
            viewportCenterH: function() {
                return this.canvas && this.canvas.viewportCenterObjectH(this), this
            },
            centerV: function() {
                return this.canvas && this.canvas.centerObjectV(this), this
            },
            viewportCenterV: function() {
                return this.canvas && this.canvas.viewportCenterObjectV(this), this
            },
            center: function() {
                return this.canvas && this.canvas.centerObject(this), this
            },
            viewportCenter: function() {
                return this.canvas && this.canvas.viewportCenterObject(this), this
            },
            remove: function() {
                return this.canvas && this.canvas.remove(this), this
            },
            getLocalPointer: function(n, i) {
                i = i || this.canvas.getPointer(n);
                var r = new t.Point(i.x, i.y),
                    u = this._getLeftTopCoords();
                return this.angle && (r = t.util.rotatePoint(r, u, t.util.degreesToRadians(-this.angle))), {
                    x: r.x - u.x,
                    y: r.y - u.y
                }
            },
            _setupCompositeOperation: function(n) {
                this.globalCompositeOperation && (n.globalCompositeOperation = this.globalCompositeOperation)
            }
        }), t.util.createAccessors(t.Object), t.Object.prototype.rotate = t.Object.prototype.setAngle, u(t.Object.prototype, t.Observable), t.Object.NUM_FRACTION_DIGITS = 2, t.Object.__uid = 0)
    }(typeof exports != "undefined" ? exports : this),
    function() {
        var n = fabric.util.degreesToRadians,
            t = {
                left: -.5,
                center: 0,
                right: .5
            },
            i = {
                top: -.5,
                center: 0,
                bottom: .5
            };
        fabric.util.object.extend(fabric.Object.prototype, {
            translateToGivenOrigin: function(n, r, u, f, e) {
                var c = n.x,
                    l = n.y,
                    o, s, h;
                return typeof r == "string" ? r = t[r] : r -= .5, typeof f == "string" ? f = t[f] : f -= .5, o = f - r, typeof u == "string" ? u = i[u] : u -= .5, typeof e == "string" ? e = i[e] : e -= .5, s = e - u, (o || s) && (h = this._getTransformedDimensions(), c = n.x + o * h.x, l = n.y + s * h.y), new fabric.Point(c, l)
            },
            translateToCenterPoint: function(t, i, r) {
                var u = this.translateToGivenOrigin(t, i, r, "center", "center");
                return this.angle ? fabric.util.rotatePoint(u, t, n(this.angle)) : u
            },
            translateToOriginPoint: function(t, i, r) {
                var u = this.translateToGivenOrigin(t, "center", "center", i, r);
                return this.angle ? fabric.util.rotatePoint(u, t, n(this.angle)) : u
            },
            getCenterPoint: function() {
                var n = new fabric.Point(this.left, this.top);
                return this.translateToCenterPoint(n, this.originX, this.originY)
            },
            getPointByOrigin: function(n, t) {
                var i = this.getCenterPoint();
                return this.translateToOriginPoint(i, n, t)
            },
            toLocalPoint: function(t, i, r) {
                var f = this.getCenterPoint(),
                    e, u;
                return e = typeof i != "undefined" && typeof r != "undefined" ? this.translateToGivenOrigin(f, "center", "center", i, r) : new fabric.Point(this.left, this.top), u = new fabric.Point(t.x, t.y), this.angle && (u = fabric.util.rotatePoint(u, f, -n(this.angle))), u.subtractEquals(e)
            },
            setPositionByOrigin: function(n, t, i) {
                var u = this.translateToCenterPoint(n, t, i),
                    r = this.translateToOriginPoint(u, this.originX, this.originY);
                this.set("left", r.x);
                this.set("top", r.y)
            },
            adjustPosition: function(i) {
                var f = n(this.angle),
                    e = this.getWidth(),
                    o = Math.cos(f) * e,
                    s = Math.sin(f) * e,
                    r, u;
                r = typeof this.originX == "string" ? t[this.originX] : this.originX - .5;
                u = typeof i == "string" ? t[i] : i - .5;
                this.left += o * (u - r);
                this.top += s * (u - r);
                this.setCoords();
                this.originX = i
            },
            _setOriginToCenter: function() {
                this._originalOriginX = this.originX;
                this._originalOriginY = this.originY;
                var n = this.getCenterPoint();
                this.originX = "center";
                this.originY = "center";
                this.left = n.x;
                this.top = n.y
            },
            _resetOrigin: function() {
                var n = this.translateToOriginPoint(this.getCenterPoint(), this._originalOriginX, this._originalOriginY);
                this.originX = this._originalOriginX;
                this.originY = this._originalOriginY;
                this.left = n.x;
                this.top = n.y;
                this._originalOriginX = null;
                this._originalOriginY = null
            },
            _getLeftTopCoords: function() {
                return this.translateToOriginPoint(this.getCenterPoint(), "left", "top")
            }
        })
    }(),
    function() {
        function t(n) {
            return [new fabric.Point(n.tl.x, n.tl.y), new fabric.Point(n.tr.x, n.tr.y), new fabric.Point(n.br.x, n.br.y), new fabric.Point(n.bl.x, n.bl.y)]
        }
        var i = fabric.util.degreesToRadians,
            n = fabric.util.multiplyTransformMatrices;
        fabric.util.object.extend(fabric.Object.prototype, {
            oCoords: null,
            intersectsWithRect: function(n, i) {
                var r = t(this.oCoords),
                    u = fabric.Intersection.intersectPolygonRectangle(r, n, i);
                return u.status === "Intersection"
            },
            intersectsWithObject: function(n) {
                var i = fabric.Intersection.intersectPolygonPolygon(t(this.oCoords), t(n.oCoords));
                return i.status === "Intersection" || n.isContainedWithinObject(this) || this.isContainedWithinObject(n)
            },
            isContainedWithinObject: function(n) {
                for (var r = t(this.oCoords), i = 0; i < 4; i++)
                    if (!n.containsPoint(r[i])) return !1;
                return !0
            },
            isContainedWithinRect: function(n, t) {
                var i = this.getBoundingRect();
                return i.left >= n.x && i.left + i.width <= t.x && i.top >= n.y && i.top + i.height <= t.y
            },
            containsPoint: function(n) {
                this.oCoords || this.setCoords();
                var i = this._getImageLines(this.oCoords),
                    t = this._findCrossPoints(n, i);
                return t !== 0 && t % 2 == 1
            },
            _getImageLines: function(n) {
                return {
                    topline: {
                        o: n.tl,
                        d: n.tr
                    },
                    rightline: {
                        o: n.tr,
                        d: n.br
                    },
                    bottomline: {
                        o: n.br,
                        d: n.bl
                    },
                    leftline: {
                        o: n.bl,
                        d: n.tl
                    }
                }
            },
            _findCrossPoints: function(n, t) {
                var r, u, o, s, f, e = 0,
                    i;
                for (var h in t)
                    if ((i = t[h], !(i.o.y < n.y) || !(i.d.y < n.y)) && (!(i.o.y >= n.y) || !(i.d.y >= n.y)) && (i.o.x === i.d.x && i.o.x >= n.x ? f = i.o.x : (r = 0, u = (i.d.y - i.o.y) / (i.d.x - i.o.x), o = n.y - r * n.x, s = i.o.y - u * i.o.x, f = -(o - s) / (r - u)), f >= n.x && (e += 1), e === 2)) break;
                return e
            },
            getBoundingRectWidth: function() {
                return this.getBoundingRect().width
            },
            getBoundingRectHeight: function() {
                return this.getBoundingRect().height
            },
            getBoundingRect: function() {
                return this.oCoords || this.setCoords(), fabric.util.makeBoundingBoxFromPoints([this.oCoords.tl, this.oCoords.tr, this.oCoords.br, this.oCoords.bl])
            },
            getWidth: function() {
                return this._getTransformedDimensions().x
            },
            getHeight: function() {
                return this._getTransformedDimensions().y
            },
            _constrainScale: function(n) {
                return Math.abs(n) < this.minScaleLimit ? n < 0 ? -this.minScaleLimit : this.minScaleLimit : n
            },
            scale: function(n) {
                return n = this._constrainScale(n), n < 0 && (this.flipX = !this.flipX, this.flipY = !this.flipY, n *= -1), this.scaleX = n, this.scaleY = n, this.setCoords(), this
            },
            scaleToWidth: function(n) {
                var t = this.getBoundingRect().width / this.getWidth();
                return this.scale(n / this.width / t)
            },
            scaleToHeight: function(n) {
                var t = this.getBoundingRect().height / this.getHeight();
                return this.scale(n / this.height / t)
            },
            setCoords: function() {
                var e = i(this.angle),
                    b = this.getViewportTransform(),
                    v = this._calculateCurrentDimensions(),
                    t = v.x,
                    s = v.y;
                t < 0 && (t = Math.abs(t));
                var h = Math.sin(e),
                    c = Math.cos(e),
                    l = t > 0 ? Math.atan(s / t) : 0,
                    y = t / Math.cos(l) / 2,
                    p = Math.cos(l + e) * y,
                    w = Math.sin(l + e) * y,
                    o = fabric.util.transformPoint(this.getCenterPoint(), b),
                    n = new fabric.Point(o.x - p, o.y - w),
                    r = new fabric.Point(n.x + t * c, n.y + t * h),
                    u = new fabric.Point(n.x - s * h, n.y + s * c),
                    f = new fabric.Point(o.x + p, o.y + w),
                    k = new fabric.Point((n.x + u.x) / 2, (n.y + u.y) / 2),
                    a = new fabric.Point((r.x + n.x) / 2, (r.y + n.y) / 2),
                    d = new fabric.Point((f.x + r.x) / 2, (f.y + r.y) / 2),
                    g = new fabric.Point((f.x + u.x) / 2, (f.y + u.y) / 2),
                    nt = new fabric.Point(a.x + h * this.rotatingPointOffset, a.y - c * this.rotatingPointOffset);
                return this.oCoords = {
                    tl: n,
                    tr: r,
                    br: f,
                    bl: u,
                    ml: k,
                    mt: a,
                    mr: d,
                    mb: g,
                    mtr: nt
                }, this._setCornerCoords && this._setCornerCoords(), this
            },
            _calcRotateMatrix: function() {
                if (this.angle) {
                    var n = i(this.angle),
                        t = Math.cos(n),
                        r = Math.sin(n);
                    return [t, r, -r, t, 0, 0]
                }
                return [1, 0, 0, 1, 0, 0]
            },
            calcTransformMatrix: function() {
                var i = this.getCenterPoint(),
                    r = [1, 0, 0, 1, i.x, i.y],
                    u = this._calcRotateMatrix(),
                    f = this._calcDimensionsTransformMatrix(this.skewX, this.skewY, !0),
                    t = this.group ? this.group.calcTransformMatrix() : [1, 0, 0, 1, 0, 0];
                return t = n(t, r), t = n(t, u), n(t, f)
            },
            _calcDimensionsTransformMatrix: function(t, r, u) {
                var f = [1, 0, Math.tan(i(t)), 1],
                    e = [1, Math.tan(i(r)), 0, 1],
                    o = this.scaleX * (u && this.flipX ? -1 : 1),
                    s = this.scaleY * (u && this.flipY ? -1 : 1),
                    h = [o, 0, 0, s],
                    c = n(h, f, !0);
                return n(c, e, !0)
            }
        })
    }();
fabric.util.object.extend(fabric.Object.prototype, {
        sendToBack: function() {
            return this.group ? fabric.StaticCanvas.prototype.sendToBack.call(this.group, this) : this.canvas.sendToBack(this), this
        },
        bringToFront: function() {
            return this.group ? fabric.StaticCanvas.prototype.bringToFront.call(this.group, this) : this.canvas.bringToFront(this), this
        },
        sendBackwards: function(n) {
            return this.group ? fabric.StaticCanvas.prototype.sendBackwards.call(this.group, this, n) : this.canvas.sendBackwards(this, n), this
        },
        bringForward: function(n) {
            return this.group ? fabric.StaticCanvas.prototype.bringForward.call(this.group, this, n) : this.canvas.bringForward(this, n), this
        },
        moveTo: function(n) {
            return this.group ? fabric.StaticCanvas.prototype.moveTo.call(this.group, this, n) : this.canvas.moveTo(this, n), this
        }
    }),
    function() {
        function n(n, t) {
            if (t) {
                if (t.toLive) return n + ": url(#SVGID_" + t.id + "); ";
                var i = new fabric.Color(t),
                    r = n + ": " + i.toRgb() + "; ",
                    u = i.getAlpha();
                return u !== 1 && (r += n + "-opacity: " + u.toString() + "; "), r
            }
            return n + ": none; "
        }
        fabric.util.object.extend(fabric.Object.prototype, {
            getSvgStyles: function(t) {
                var i = this.fillRule,
                    r = this.strokeWidth ? this.strokeWidth : "0",
                    u = this.strokeDashArray ? this.strokeDashArray.join(" ") : "none",
                    f = this.strokeLineCap ? this.strokeLineCap : "butt",
                    e = this.strokeLineJoin ? this.strokeLineJoin : "miter",
                    o = this.strokeMiterLimit ? this.strokeMiterLimit : "4",
                    s = typeof this.opacity != "undefined" ? this.opacity : "1",
                    h = this.visible ? "" : " visibility: hidden;",
                    c = t ? "" : this.getSvgFilter(),
                    l = n("fill", this.fill),
                    a = n("stroke", this.stroke);
                return [a, "stroke-width: ", r, "; ", "stroke-dasharray: ", u, "; ", "stroke-linecap: ", f, "; ", "stroke-linejoin: ", e, "; ", "stroke-miterlimit: ", o, "; ", l, "fill-rule: ", i, "; ", "opacity: ", s, ";", c, h].join("")
            },
            getSvgFilter: function() {
                return this.shadow ? "filter: url(#SVGID_" + this.shadow.id + ");" : ""
            },
            getSvgId: function() {
                return this.id ? 'id="' + this.id + '" ' : ""
            },
            getSvgTransform: function() {
                if (this.group && this.group.type === "path-group") return "";
                var n = fabric.util.toFixed,
                    i = this.getAngle(),
                    r = this.getSkewX() % 360,
                    u = this.getSkewY() % 360,
                    f = this.getCenterPoint(),
                    t = fabric.Object.NUM_FRACTION_DIGITS,
                    e = this.type === "path-group" ? "" : "translate(" + n(f.x, t) + " " + n(f.y, t) + ")",
                    o = i !== 0 ? " rotate(" + n(i, t) + ")" : "",
                    s = this.scaleX === 1 && this.scaleY === 1 ? "" : " scale(" + n(this.scaleX, t) + " " + n(this.scaleY, t) + ")",
                    h = r !== 0 ? " skewX(" + n(r, t) + ")" : "",
                    c = u !== 0 ? " skewY(" + n(u, t) + ")" : "",
                    l = this.type === "path-group" ? this.width : 0,
                    a = this.flipX ? " matrix(-1 0 0 1 " + l + " 0) " : "",
                    v = this.type === "path-group" ? this.height : 0,
                    y = this.flipY ? " matrix(1 0 0 -1 0 " + v + ")" : "";
                return [e, o, s, a, y, h, c].join("")
            },
            getSvgTransformMatrix: function() {
                return this.transformMatrix ? " matrix(" + this.transformMatrix.join(" ") + ") " : ""
            },
            _createBaseSVGMarkup: function() {
                var n = [];
                return this.fill && this.fill.toLive && n.push(this.fill.toSVG(this, !1)), this.stroke && this.stroke.toLive && n.push(this.stroke.toSVG(this, !1)), this.shadow && n.push(this.shadow.toSVG(this)), n
            }
        })
    }(),
    function() {
        function t(n, t, r) {
            var u = {};
            r.forEach(function(t) {
                u[t] = n[t]
            });
            i(n[t], u, !0)
        }

        function n(t, i) {
            var u, f, r;
            if (!fabric.isLikelyNode && t instanceof Element) return t === i;
            if (t instanceof Array) return t.length !== i.length ? !1 : (u = i.concat().sort(), f = t.concat().sort(), !f.some(function(t, i) {
                return !n(u[i], t)
            }));
            if (t instanceof Object) {
                for (r in t)
                    if (!n(t[r], i[r])) return !1;
                return !0
            }
            return t === i
        }
        var i = fabric.util.object.extend;
        fabric.util.object.extend(fabric.Object.prototype, {
            hasStateChanged: function() {
                return !n(this.originalState, this)
            },
            saveState: function(n) {
                return t(this, "originalState", this.stateProperties), n && n.stateProperties && t(this, "originalState", n.stateProperties), this
            },
            setupState: function(n) {
                return this.originalState = {}, this.saveState(n), this
            }
        })
    }(),
    function() {
        var n = fabric.util.degreesToRadians,
            t = function() {
                return typeof G_vmlCanvasManager != "undefined"
            };
        fabric.util.object.extend(fabric.Object.prototype, {
            _controlsVisibility: null,
            _findTargetCorner: function(n) {
                var r, u, i, f, t;
                if (!this.hasControls || !this.active) return !1;
                r = n.x;
                u = n.y;
                this.__corner = 0;
                for (t in this.oCoords)
                    if (this.isControlVisible(t) && (t !== "mtr" || this.hasRotatingPoint) && (!this.get("lockUniScaling") || t !== "mt" && t !== "mr" && t !== "mb" && t !== "ml") && (f = this._getImageLines(this.oCoords[t].corner), i = this._findCrossPoints({
                            x: r,
                            y: u
                        }, f), i !== 0 && i % 2 == 1)) return this.__corner = t, t;
                return !1
            },
            _setCornerCoords: function() {
                var r = this.oCoords,
                    o = n(45 - this.angle),
                    s = this.cornerSize * .707106,
                    u = s * Math.cos(o),
                    f = s * Math.sin(o),
                    t, i;
                for (var e in r) t = r[e].x, i = r[e].y, r[e].corner = {
                    tl: {
                        x: t - f,
                        y: i - u
                    },
                    tr: {
                        x: t + u,
                        y: i - f
                    },
                    bl: {
                        x: t - u,
                        y: i + f
                    },
                    br: {
                        x: t + f,
                        y: i + u
                    }
                }
            },
            _getNonTransformedDimensions: function() {
                var n = this.strokeWidth,
                    t = this.width,
                    i = this.height,
                    r = !0,
                    u = !0;
                return this.type === "line" && this.strokeLineCap === "butt" && (u = t, r = i), u && (i += i < 0 ? -n : n), r && (t += t < 0 ? -n : n), {
                    x: t,
                    y: i
                }
            },
            _getTransformedDimensions: function(n, t) {
                typeof n == "undefined" && (n = this.skewX);
                typeof t == "undefined" && (t = this.skewY);
                for (var o = this._getNonTransformedDimensions(), r = o.x / 2, u = o.y / 2, f = [{
                        x: -r,
                        y: -u
                    }, {
                        x: r,
                        y: -u
                    }, {
                        x: -r,
                        y: u
                    }, {
                        x: r,
                        y: u
                    }], s = this._calcDimensionsTransformMatrix(n, t, !1), e, i = 0; i < f.length; i++) f[i] = fabric.util.transformPoint(f[i], s);
                return e = fabric.util.makeBoundingBoxFromPoints(f), {
                    x: e.width,
                    y: e.height
                }
            },
            _calculateCurrentDimensions: function() {
                var t = this.getViewportTransform(),
                    n = this._getTransformedDimensions(),
                    i = n.x,
                    r = n.y,
                    u = fabric.util.transformPoint(new fabric.Point(i, r), t, !0);
                return u.scalarAdd(2 * this.padding)
            },
            drawSelectionBackground: function(t) {
                if (!this.selectionBackgroundColor || this.group || !this.active) return this;
                t.save();
                var r = this.getCenterPoint(),
                    i = this._calculateCurrentDimensions(),
                    u = this.canvas.viewportTransform;
                return t.translate(r.x, r.y), t.scale(1 / u[0], 1 / u[3]), t.rotate(n(this.angle)), t.fillStyle = this.selectionBackgroundColor, t.fillRect(-i.x / 2, -i.y / 2, i.x, i.y), t.restore(), this
            },
            drawBorders: function(n) {
                var i;
                if (!this.hasBorders) return this;
                var r = this._calculateCurrentDimensions(),
                    u = 1 / this.borderScaleFactor,
                    f = r.x + u,
                    t = r.y + u;
                return n.save(), n.strokeStyle = this.borderColor, this._setLineDash(n, this.borderDashArray, null), n.strokeRect(-f / 2, -t / 2, f, t), this.hasRotatingPoint && this.isControlVisible("mtr") && !this.get("lockRotation") && this.hasControls && (i = -t / 2, n.beginPath(), n.moveTo(0, i), n.lineTo(0, i - this.rotatingPointOffset), n.closePath(), n.stroke()), n.restore(), this
            },
            drawBordersInGroup: function(n, t) {
                if (!this.hasBorders) return this;
                var e = this._getNonTransformedDimensions(),
                    o = fabric.util.customTransformMatrix(t.scaleX, t.scaleY, t.skewX),
                    i = fabric.util.transformPoint(e, o),
                    r = 1 / this.borderScaleFactor,
                    u = i.x + r + 2 * this.padding,
                    f = i.y + r + 2 * this.padding;
                return n.save(), this._setLineDash(n, this.borderDashArray, null), n.strokeStyle = this.borderColor, n.strokeRect(-u / 2, -f / 2, u, f), n.restore(), this
            },
            drawControls: function(n) {
                if (!this.hasControls) return this;
                var e = this._calculateCurrentDimensions(),
                    u = e.x,
                    f = e.y,
                    o = this.cornerSize,
                    t = -(u + o) / 2,
                    i = -(f + o) / 2,
                    r = this.transparentCorners ? "stroke" : "fill";
                return n.save(), n.strokeStyle = n.fillStyle = this.cornerColor, this.transparentCorners || (n.strokeStyle = this.cornerStrokeColor), this._setLineDash(n, this.cornerDashArray, null), this._drawControl("tl", n, r, t, i), this._drawControl("tr", n, r, t + u, i), this._drawControl("bl", n, r, t, i + f), this._drawControl("br", n, r, t + u, i + f), this.get("lockUniScaling") || (this._drawControl("mt", n, r, t + u / 2, i), this._drawControl("mb", n, r, t + u / 2, i + f), this._drawControl("mr", n, r, t + u, i + f / 2), this._drawControl("ml", n, r, t, i + f / 2)), this.hasRotatingPoint && this._drawControl("mtr", n, r, t + u / 2, i - this.rotatingPointOffset), n.restore(), this
            },
            _drawControl: function(n, i, r, u, f) {
                if (this.isControlVisible(n)) {
                    var e = this.cornerSize,
                        o = !this.transparentCorners && this.cornerStrokeColor;
                    switch (this.cornerStyle) {
                        case "circle":
                            i.beginPath();
                            i.arc(u + e / 2, f + e / 2, e / 2, 0, 2 * Math.PI, !1);
                            i[r]();
                            o && i.stroke();
                            break;
                        default:
                            t() || this.transparentCorners || i.clearRect(u, f, e, e);
                            i[r + "Rect"](u, f, e, e);
                            o && i.strokeRect(u, f, e, e)
                    }
                }
            },
            isControlVisible: function(n) {
                return this._getControlsVisibility()[n]
            },
            setControlVisible: function(n, t) {
                return this._getControlsVisibility()[n] = t, this
            },
            setControlsVisibility: function(n) {
                n || (n = {});
                for (var t in n) this.setControlVisible(t, n[t]);
                return this
            },
            _getControlsVisibility: function() {
                return this._controlsVisibility || (this._controlsVisibility = {
                    tl: !0,
                    tr: !0,
                    br: !0,
                    bl: !0,
                    ml: !0,
                    mt: !0,
                    mr: !0,
                    mb: !0,
                    mtr: !0
                }), this._controlsVisibility
            }
        })
    }();
fabric.util.object.extend(fabric.StaticCanvas.prototype, {
    FX_DURATION: 500,
    fxCenterObjectH: function(n, t) {
        t = t || {};
        var i = function() {},
            r = t.onComplete || i,
            u = t.onChange || i,
            f = this;
        return fabric.util.animate({
            startValue: n.get("left"),
            endValue: this.getCenter().left,
            duration: this.FX_DURATION,
            onChange: function(t) {
                n.set("left", t);
                f.renderAll();
                u()
            },
            onComplete: function() {
                n.setCoords();
                r()
            }
        }), this
    },
    fxCenterObjectV: function(n, t) {
        t = t || {};
        var i = function() {},
            r = t.onComplete || i,
            u = t.onChange || i,
            f = this;
        return fabric.util.animate({
            startValue: n.get("top"),
            endValue: this.getCenter().top,
            duration: this.FX_DURATION,
            onChange: function(t) {
                n.set("top", t);
                f.renderAll();
                u()
            },
            onComplete: function() {
                n.setCoords();
                r()
            }
        }), this
    },
    fxRemove: function(n, t) {
        t = t || {};
        var i = function() {},
            u = t.onComplete || i,
            f = t.onChange || i,
            r = this;
        return fabric.util.animate({
            startValue: n.get("opacity"),
            endValue: 0,
            duration: this.FX_DURATION,
            onStart: function() {
                n.set("active", !1)
            },
            onChange: function(t) {
                n.set("opacity", t);
                r.renderAll();
                f()
            },
            onComplete: function() {
                r.remove(n);
                u()
            }
        }), this
    }
});
fabric.util.object.extend(fabric.Object.prototype, {
        animate: function() {
            var i, n, u, t, r;
            if (arguments[0] && typeof arguments[0] == "object") {
                i = [];
                for (n in arguments[0]) i.push(n);
                for (t = 0, r = i.length; t < r; t++) n = i[t], u = t !== r - 1, this._animate(n, arguments[0][n], arguments[1], u)
            } else this._animate.apply(this, arguments);
            return this
        },
        _animate: function(n, t, i, r) {
            var f = this,
                u, e;
            t = t.toString();
            i = i ? fabric.util.object.clone(i) : {};
            ~n.indexOf(".") && (u = n.split("."));
            e = u ? this.get(u[0])[u[1]] : this.get(n);
            "from" in i || (i.from = e);
            t = ~t.indexOf("=") ? e + parseFloat(t.replace("=", "")) : parseFloat(t);
            fabric.util.animate({
                startValue: i.from,
                endValue: t,
                byValue: i.by,
                easing: i.easing,
                duration: i.duration,
                abort: i.abort && function() {
                    return i.abort.call(f)
                },
                onChange: function(t) {
                    (u ? f[u[0]][u[1]] = t : f.set(n, t), r) || i.onChange && i.onChange()
                },
                onComplete: function() {
                    r || (f.setCoords(), i.onComplete && i.onComplete())
                }
            })
        }
    }),
    function(n) {
        "use strict";

        function r(n, t) {
            var u = n.origin,
                i = n.axis1,
                r = n.axis2,
                f = n.dimension,
                e = t.nearest,
                o = t.center,
                s = t.farthest;
            return function() {
                switch (this.get(u)) {
                    case e:
                        return Math.min(this.get(i), this.get(r));
                    case o:
                        return Math.min(this.get(i), this.get(r)) + .5 * this.get(f);
                    case s:
                        return Math.max(this.get(i), this.get(r))
                }
            }
        }
        var t = n.fabric || (n.fabric = {}),
            i = t.util.object.extend,
            u = {
                x1: 1,
                x2: 1,
                y1: 1,
                y2: 1
            },
            f = t.StaticCanvas.supports("setLineDash");
        if (t.Line) {
            t.warn("fabric.Line is already defined");
            return
        }
        t.Line = t.util.createClass(t.Object, {
            type: "line",
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 0,
            initialize: function(n, t) {
                t = t || {};
                n || (n = [0, 0, 0, 0]);
                this.callSuper("initialize", t);
                this.set("x1", n[0]);
                this.set("y1", n[1]);
                this.set("x2", n[2]);
                this.set("y2", n[3]);
                this._setWidthHeight(t)
            },
            _setWidthHeight: function(n) {
                n || (n = {});
                this.width = Math.abs(this.x2 - this.x1);
                this.height = Math.abs(this.y2 - this.y1);
                this.left = "left" in n ? n.left : this._getLeftToOriginX();
                this.top = "top" in n ? n.top : this._getTopToOriginY()
            },
            _set: function(n, t) {
                return this.callSuper("_set", n, t), typeof u[n] != "undefined" && this._setWidthHeight(), this
            },
            _getLeftToOriginX: r({
                origin: "originX",
                axis1: "x1",
                axis2: "x2",
                dimension: "width"
            }, {
                nearest: "left",
                center: "center",
                farthest: "right"
            }),
            _getTopToOriginY: r({
                origin: "originY",
                axis1: "y1",
                axis2: "y2",
                dimension: "height"
            }, {
                nearest: "top",
                center: "center",
                farthest: "bottom"
            }),
            _render: function(n, t) {
                var r, i, u;
                n.beginPath();
                t && (r = this.getCenterPoint(), n.translate(r.x - this.strokeWidth / 2, r.y - this.strokeWidth / 2));
                (!this.strokeDashArray || this.strokeDashArray && f) && (i = this.calcLinePoints(), n.moveTo(i.x1, i.y1), n.lineTo(i.x2, i.y2));
                n.lineWidth = this.strokeWidth;
                u = n.strokeStyle;
                n.strokeStyle = this.stroke || n.fillStyle;
                this.stroke && this._renderStroke(n);
                n.strokeStyle = u
            },
            _renderDashedStroke: function(n) {
                var i = this.calcLinePoints();
                n.beginPath();
                t.util.drawDashedLine(n, i.x1, i.y1, i.x2, i.y2, this.strokeDashArray);
                n.closePath()
            },
            toObject: function(n) {
                return i(this.callSuper("toObject", n), this.calcLinePoints())
            },
            calcLinePoints: function() {
                var n = this.x1 <= this.x2 ? -1 : 1,
                    t = this.y1 <= this.y2 ? -1 : 1,
                    i = n * this.width * .5,
                    r = t * this.height * .5,
                    u = n * this.width * -.5,
                    f = t * this.height * -.5;
                return {
                    x1: i,
                    x2: u,
                    y1: r,
                    y2: f
                }
            },
            toSVG: function(n) {
                var i = this._createBaseSVGMarkup(),
                    t = {
                        x1: this.x1,
                        x2: this.x2,
                        y1: this.y1,
                        y2: this.y2
                    };
                return this.group && this.group.type === "path-group" || (t = this.calcLinePoints()), i.push("<line ", this.getSvgId(), 'x1="', t.x1, '" y1="', t.y1, '" x2="', t.x2, '" y2="', t.y2, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), this.getSvgTransformMatrix(), '"/>\n'), n ? n(i.join("")) : i.join("")
            },
            complexity: function() {
                return 1
            }
        });
        t.Line.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat("x1 y1 x2 y2".split(" "));
        t.Line.fromElement = function(n, r) {
            var u = t.parseAttributes(n, t.Line.ATTRIBUTE_NAMES),
                f = [u.x1 || 0, u.y1 || 0, u.x2 || 0, u.y2 || 0];
            return new t.Line(f, i(u, r))
        };
        t.Line.fromObject = function(n, i) {
            var u = [n.x1, n.y1, n.x2, n.y2],
                r = new t.Line(u, n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";

        function u(n) {
            return "radius" in n && n.radius >= 0
        }
        var t = n.fabric || (n.fabric = {}),
            i = Math.PI,
            r = t.util.object.extend;
        if (t.Circle) {
            t.warn("fabric.Circle is already defined.");
            return
        }
        t.Circle = t.util.createClass(t.Object, {
            type: "circle",
            radius: 0,
            startAngle: 0,
            endAngle: i * 2,
            initialize: function(n) {
                n = n || {};
                this.callSuper("initialize", n);
                this.set("radius", n.radius || 0);
                this.startAngle = n.startAngle || this.startAngle;
                this.endAngle = n.endAngle || this.endAngle
            },
            _set: function(n, t) {
                return this.callSuper("_set", n, t), n === "radius" && this.setRadius(t), this
            },
            toObject: function(n) {
                return r(this.callSuper("toObject", n), {
                    radius: this.get("radius"),
                    startAngle: this.startAngle,
                    endAngle: this.endAngle
                })
            },
            toSVG: function(n) {
                var t = this._createBaseSVGMarkup(),
                    r = 0,
                    u = 0,
                    f = (this.endAngle - this.startAngle) % (2 * i);
                if (f === 0) this.group && this.group.type === "path-group" && (r = this.left + this.radius, u = this.top + this.radius), t.push("<circle ", this.getSvgId(), 'cx="' + r + '" cy="' + u + '" ', 'r="', this.radius, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), " ", this.getSvgTransformMatrix(), '"/>\n');
                else {
                    var e = Math.cos(this.startAngle) * this.radius,
                        o = Math.sin(this.startAngle) * this.radius,
                        s = Math.cos(this.endAngle) * this.radius,
                        h = Math.sin(this.endAngle) * this.radius,
                        c = f > i ? "1" : "0";
                    t.push('<path d="M ' + e + " " + o, " A " + this.radius + " " + this.radius, " 0 ", +c + " 1", " " + s + " " + h, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), " ", this.getSvgTransformMatrix(), '"/>\n')
                }
                return n ? n(t.join("")) : t.join("")
            },
            _render: function(n, t) {
                n.beginPath();
                n.arc(t ? this.left + this.radius : 0, t ? this.top + this.radius : 0, this.radius, this.startAngle, this.endAngle, !1);
                this._renderFill(n);
                this._renderStroke(n)
            },
            getRadiusX: function() {
                return this.get("radius") * this.get("scaleX")
            },
            getRadiusY: function() {
                return this.get("radius") * this.get("scaleY")
            },
            setRadius: function(n) {
                return this.radius = n, this.set("width", n * 2).set("height", n * 2)
            },
            complexity: function() {
                return 1
            }
        });
        t.Circle.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat("cx cy r".split(" "));
        t.Circle.fromElement = function(n, i) {
            var f, e;
            if (i || (i = {}), f = t.parseAttributes(n, t.Circle.ATTRIBUTE_NAMES), !u(f)) throw new Error("value of `r` attribute is required and can not be negative");
            return f.left = f.left || 0, f.top = f.top || 0, e = new t.Circle(r(f, i)), e.left -= e.radius, e.top -= e.radius, e
        };
        t.Circle.fromObject = function(n, i) {
            var r = new t.Circle(n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {});
        if (t.Triangle) {
            t.warn("fabric.Triangle is already defined");
            return
        }
        t.Triangle = t.util.createClass(t.Object, {
            type: "triangle",
            initialize: function(n) {
                n = n || {};
                this.callSuper("initialize", n);
                this.set("width", n.width || 100).set("height", n.height || 100)
            },
            _render: function(n) {
                var i = this.width / 2,
                    t = this.height / 2;
                n.beginPath();
                n.moveTo(-i, t);
                n.lineTo(0, -t);
                n.lineTo(i, t);
                n.closePath();
                this._renderFill(n);
                this._renderStroke(n)
            },
            _renderDashedStroke: function(n) {
                var r = this.width / 2,
                    i = this.height / 2;
                n.beginPath();
                t.util.drawDashedLine(n, -r, i, 0, -i, this.strokeDashArray);
                t.util.drawDashedLine(n, 0, -i, r, i, this.strokeDashArray);
                t.util.drawDashedLine(n, r, i, -r, i, this.strokeDashArray);
                n.closePath()
            },
            toSVG: function(n) {
                var t = this._createBaseSVGMarkup(),
                    r = this.width / 2,
                    i = this.height / 2,
                    u = [-r + " " + i, "0 " + -i, r + " " + i].join(",");
                return t.push("<polygon ", this.getSvgId(), 'points="', u, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), '"/>'), n ? n(t.join("")) : t.join("")
            },
            complexity: function() {
                return 1
            }
        });
        t.Triangle.fromObject = function(n, i) {
            var r = new t.Triangle(n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = Math.PI * 2,
            i = t.util.object.extend;
        if (t.Ellipse) {
            t.warn("fabric.Ellipse is already defined.");
            return
        }
        t.Ellipse = t.util.createClass(t.Object, {
            type: "ellipse",
            rx: 0,
            ry: 0,
            initialize: function(n) {
                n = n || {};
                this.callSuper("initialize", n);
                this.set("rx", n.rx || 0);
                this.set("ry", n.ry || 0)
            },
            _set: function(n, t) {
                this.callSuper("_set", n, t);
                switch (n) {
                    case "rx":
                        this.rx = t;
                        this.set("width", t * 2);
                        break;
                    case "ry":
                        this.ry = t;
                        this.set("height", t * 2)
                }
                return this
            },
            getRx: function() {
                return this.get("rx") * this.get("scaleX")
            },
            getRy: function() {
                return this.get("ry") * this.get("scaleY")
            },
            toObject: function(n) {
                return i(this.callSuper("toObject", n), {
                    rx: this.get("rx"),
                    ry: this.get("ry")
                })
            },
            toSVG: function(n) {
                var t = this._createBaseSVGMarkup(),
                    i = 0,
                    r = 0;
                return this.group && this.group.type === "path-group" && (i = this.left + this.rx, r = this.top + this.ry), t.push("<ellipse ", this.getSvgId(), 'cx="', i, '" cy="', r, '" ', 'rx="', this.rx, '" ry="', this.ry, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), this.getSvgTransformMatrix(), '"/>\n'), n ? n(t.join("")) : t.join("")
            },
            _render: function(n, t) {
                n.beginPath();
                n.save();
                n.transform(1, 0, 0, this.ry / this.rx, 0, 0);
                n.arc(t ? this.left + this.rx : 0, t ? (this.top + this.ry) * this.rx / this.ry : 0, this.rx, 0, r, !1);
                n.restore();
                this._renderFill(n);
                this._renderStroke(n)
            },
            complexity: function() {
                return 1
            }
        });
        t.Ellipse.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat("cx cy rx ry".split(" "));
        t.Ellipse.fromElement = function(n, r) {
            var u, f;
            return r || (r = {}), u = t.parseAttributes(n, t.Ellipse.ATTRIBUTE_NAMES), u.left = u.left || 0, u.top = u.top || 0, f = new t.Ellipse(i(u, r)), f.top -= f.ry, f.left -= f.rx, f
        };
        t.Ellipse.fromObject = function(n, i) {
            var r = new t.Ellipse(n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i;
        if (t.Rect) {
            t.warn("fabric.Rect is already defined");
            return
        }
        i = t.Object.prototype.stateProperties.concat();
        i.push("rx", "ry", "x", "y");
        t.Rect = t.util.createClass(t.Object, {
            stateProperties: i,
            type: "rect",
            rx: 0,
            ry: 0,
            strokeDashArray: null,
            initialize: function(n) {
                n = n || {};
                this.callSuper("initialize", n);
                this._initRxRy()
            },
            _initRxRy: function() {
                this.rx && !this.ry ? this.ry = this.rx : this.ry && !this.rx && (this.rx = this.ry)
            },
            _render: function(n, t) {
                if (this.width === 1 && this.height === 1) {
                    n.fillRect(-.5, -.5, 1, 1);
                    return
                }
                var u = this.rx ? Math.min(this.rx, this.width / 2) : 0,
                    f = this.ry ? Math.min(this.ry, this.height / 2) : 0,
                    e = this.width,
                    o = this.height,
                    i = t ? this.left : -this.width / 2,
                    r = t ? this.top : -this.height / 2,
                    h = u !== 0 || f !== 0,
                    s = 1 - .5522847498;
                n.beginPath();
                n.moveTo(i + u, r);
                n.lineTo(i + e - u, r);
                h && n.bezierCurveTo(i + e - s * u, r, i + e, r + s * f, i + e, r + f);
                n.lineTo(i + e, r + o - f);
                h && n.bezierCurveTo(i + e, r + o - s * f, i + e - s * u, r + o, i + e - u, r + o);
                n.lineTo(i + u, r + o);
                h && n.bezierCurveTo(i + s * u, r + o, i, r + o - s * f, i, r + o - f);
                n.lineTo(i, r + f);
                h && n.bezierCurveTo(i, r + s * f, i + s * u, r, i + u, r);
                n.closePath();
                this._renderFill(n);
                this._renderStroke(n)
            },
            _renderDashedStroke: function(n) {
                var i = -this.width / 2,
                    r = -this.height / 2,
                    u = this.width,
                    f = this.height;
                n.beginPath();
                t.util.drawDashedLine(n, i, r, i + u, r, this.strokeDashArray);
                t.util.drawDashedLine(n, i + u, r, i + u, r + f, this.strokeDashArray);
                t.util.drawDashedLine(n, i + u, r + f, i, r + f, this.strokeDashArray);
                t.util.drawDashedLine(n, i, r + f, i, r, this.strokeDashArray);
                n.closePath()
            },
            toObject: function(n) {
                var t = r(this.callSuper("toObject", n), {
                    rx: this.get("rx") || 0,
                    ry: this.get("ry") || 0
                });
                return this.includeDefaultValues || this._removeDefaultValues(t), t
            },
            toSVG: function(n) {
                var t = this._createBaseSVGMarkup(),
                    i = this.left,
                    r = this.top;
                return this.group && this.group.type === "path-group" || (i = -this.width / 2, r = -this.height / 2), t.push("<rect ", this.getSvgId(), 'x="', i, '" y="', r, '" rx="', this.get("rx"), '" ry="', this.get("ry"), '" width="', this.width, '" height="', this.height, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), this.getSvgTransformMatrix(), '"/>\n'), n ? n(t.join("")) : t.join("")
            },
            complexity: function() {
                return 1
            }
        });
        t.Rect.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat("x y rx ry width height".split(" "));
        t.Rect.fromElement = function(n, i) {
            var u, f;
            return n ? (i = i || {}, u = t.parseAttributes(n, t.Rect.ATTRIBUTE_NAMES), u.left = u.left || 0, u.top = u.top || 0, f = new t.Rect(r(i ? t.util.object.clone(i) : {}, u)), f.visible = f.visible && f.width > 0 && f.height > 0, f) : null
        };
        t.Rect.fromObject = function(n, i) {
            var r = new t.Rect(n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {});
        if (t.Polyline) {
            t.warn("fabric.Polyline is already defined");
            return
        }
        t.Polyline = t.util.createClass(t.Object, {
            type: "polyline",
            points: null,
            minX: 0,
            minY: 0,
            initialize: function(n, i) {
                return t.Polygon.prototype.initialize.call(this, n, i)
            },
            _calcDimensions: function() {
                return t.Polygon.prototype._calcDimensions.call(this)
            },
            toObject: function(n) {
                return t.Polygon.prototype.toObject.call(this, n)
            },
            toSVG: function(n) {
                return t.Polygon.prototype.toSVG.call(this, n)
            },
            _render: function(n, i) {
                t.Polygon.prototype.commonRender.call(this, n, i) && (this._renderFill(n), this._renderStroke(n))
            },
            _renderDashedStroke: function(n) {
                var r, u, i, f;
                for (n.beginPath(), i = 0, f = this.points.length; i < f; i++) r = this.points[i], u = this.points[i + 1] || r, t.util.drawDashedLine(n, r.x, r.y, u.x, u.y, this.strokeDashArray)
            },
            complexity: function() {
                return this.get("points").length
            }
        });
        t.Polyline.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat();
        t.Polyline.fromElement = function(n, i) {
            if (!n) return null;
            i || (i = {});
            var r = t.parsePointsAttribute(n.getAttribute("points")),
                u = t.parseAttributes(n, t.Polyline.ATTRIBUTE_NAMES);
            return new t.Polyline(r, t.util.object.extend(u, i))
        };
        t.Polyline.fromObject = function(n, i) {
            var r = new t.Polyline(n.points, n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.util.object.extend,
            r = t.util.array.min,
            u = t.util.array.max,
            f = t.util.toFixed;
        if (t.Polygon) {
            t.warn("fabric.Polygon is already defined");
            return
        }
        t.Polygon = t.util.createClass(t.Object, {
            type: "polygon",
            points: null,
            minX: 0,
            minY: 0,
            initialize: function(n, t) {
                t = t || {};
                this.points = n || [];
                this.callSuper("initialize", t);
                this._calcDimensions();
                "top" in t || (this.top = this.minY);
                "left" in t || (this.left = this.minX);
                this.pathOffset = {
                    x: this.minX + this.width / 2,
                    y: this.minY + this.height / 2
                }
            },
            _calcDimensions: function() {
                var n = this.points,
                    t = r(n, "x"),
                    i = r(n, "y"),
                    f = u(n, "x"),
                    e = u(n, "y");
                this.width = f - t || 0;
                this.height = e - i || 0;
                this.minX = t || 0;
                this.minY = i || 0
            },
            toObject: function(n) {
                return i(this.callSuper("toObject", n), {
                    points: this.points.concat()
                })
            },
            toSVG: function(n) {
                for (var r = [], u, i = this._createBaseSVGMarkup(), t = 0, e = this.points.length; t < e; t++) r.push(f(this.points[t].x, 2), ",", f(this.points[t].y, 2), " ");
                return this.group && this.group.type === "path-group" || (u = " translate(" + -this.pathOffset.x + ", " + -this.pathOffset.y + ") "), i.push("<", this.type, " ", this.getSvgId(), 'points="', r.join(""), '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), u, " ", this.getSvgTransformMatrix(), '"/>\n'), n ? n(i.join("")) : i.join("")
            },
            _render: function(n, t) {
                this.commonRender(n, t) && (this._renderFill(n), (this.stroke || this.strokeDashArray) && (n.closePath(), this._renderStroke(n)))
            },
            commonRender: function(n, t) {
                var r, u = this.points.length,
                    i;
                if (!u || isNaN(this.points[u - 1].y)) return !1;
                for (t || n.translate(-this.pathOffset.x, -this.pathOffset.y), n.beginPath(), n.moveTo(this.points[0].x, this.points[0].y), i = 0; i < u; i++) r = this.points[i], n.lineTo(r.x, r.y);
                return !0
            },
            _renderDashedStroke: function(n) {
                t.Polyline.prototype._renderDashedStroke.call(this, n);
                n.closePath()
            },
            complexity: function() {
                return this.points.length
            }
        });
        t.Polygon.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat();
        t.Polygon.fromElement = function(n, r) {
            if (!n) return null;
            r || (r = {});
            var u = t.parsePointsAttribute(n.getAttribute("points")),
                f = t.parseAttributes(n, t.Polygon.ATTRIBUTE_NAMES);
            return new t.Polygon(u, i(f, r))
        };
        t.Polygon.fromObject = function(n, i) {
            var r = new t.Polygon(n.points, n);
            return i && i(r), r
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.util.array.min,
            r = t.util.array.max,
            u = t.util.object.extend,
            e = Object.prototype.toString,
            f = t.util.drawArc,
            o = {
                m: 2,
                l: 2,
                h: 1,
                v: 1,
                c: 6,
                s: 4,
                q: 4,
                t: 2,
                a: 7
            },
            s = {
                m: "l",
                M: "L"
            };
        if (t.Path) {
            t.warn("fabric.Path is already defined");
            return
        }
        t.Path = t.util.createClass(t.Object, {
            type: "path",
            path: null,
            minX: 0,
            minY: 0,
            initialize: function(n, t) {
                t = t || {};
                this.setOptions(t);
                n || (n = []);
                var i = e.call(n) === "[object Array]";
                (this.path = i ? n : n.match && n.match(/[mzlhvcsqta][^mzlhvcsqta]*/gi), this.path) && (i || (this.path = this._parsePath()), this._setPositionDimensions(t), t.sourcePath && this.setSourcePath(t.sourcePath))
            },
            _setPositionDimensions: function(n) {
                var t = this._parseDimensions();
                this.minX = t.left;
                this.minY = t.top;
                this.width = t.width;
                this.height = t.height;
                typeof n.left == "undefined" && (this.left = t.left + (this.originX === "center" ? this.width / 2 : this.originX === "right" ? this.width : 0));
                typeof n.top == "undefined" && (this.top = t.top + (this.originY === "center" ? this.height / 2 : this.originY === "bottom" ? this.height : 0));
                this.pathOffset = this.pathOffset || {
                    x: this.minX + this.width / 2,
                    y: this.minY + this.height / 2
                }
            },
            _renderPathCommands: function(n) {
                var t, l = null,
                    v = 0,
                    y = 0,
                    i = 0,
                    r = 0,
                    o = 0,
                    s = 0,
                    h, c, u = -this.pathOffset.x,
                    e = -this.pathOffset.y,
                    a, p;
                for (this.group && this.group.type === "path-group" && (u = 0, e = 0), n.beginPath(), a = 0, p = this.path.length; a < p; ++a) {
                    t = this.path[a];
                    switch (t[0]) {
                        case "l":
                            i += t[1];
                            r += t[2];
                            n.lineTo(i + u, r + e);
                            break;
                        case "L":
                            i = t[1];
                            r = t[2];
                            n.lineTo(i + u, r + e);
                            break;
                        case "h":
                            i += t[1];
                            n.lineTo(i + u, r + e);
                            break;
                        case "H":
                            i = t[1];
                            n.lineTo(i + u, r + e);
                            break;
                        case "v":
                            r += t[1];
                            n.lineTo(i + u, r + e);
                            break;
                        case "V":
                            r = t[1];
                            n.lineTo(i + u, r + e);
                            break;
                        case "m":
                            i += t[1];
                            r += t[2];
                            v = i;
                            y = r;
                            n.moveTo(i + u, r + e);
                            break;
                        case "M":
                            i = t[1];
                            r = t[2];
                            v = i;
                            y = r;
                            n.moveTo(i + u, r + e);
                            break;
                        case "c":
                            h = i + t[5];
                            c = r + t[6];
                            o = i + t[3];
                            s = r + t[4];
                            n.bezierCurveTo(i + t[1] + u, r + t[2] + e, o + u, s + e, h + u, c + e);
                            i = h;
                            r = c;
                            break;
                        case "C":
                            i = t[5];
                            r = t[6];
                            o = t[3];
                            s = t[4];
                            n.bezierCurveTo(t[1] + u, t[2] + e, o + u, s + e, i + u, r + e);
                            break;
                        case "s":
                            h = i + t[3];
                            c = r + t[4];
                            l[0].match(/[CcSs]/) === null ? (o = i, s = r) : (o = 2 * i - o, s = 2 * r - s);
                            n.bezierCurveTo(o + u, s + e, i + t[1] + u, r + t[2] + e, h + u, c + e);
                            o = i + t[1];
                            s = r + t[2];
                            i = h;
                            r = c;
                            break;
                        case "S":
                            h = t[3];
                            c = t[4];
                            l[0].match(/[CcSs]/) === null ? (o = i, s = r) : (o = 2 * i - o, s = 2 * r - s);
                            n.bezierCurveTo(o + u, s + e, t[1] + u, t[2] + e, h + u, c + e);
                            i = h;
                            r = c;
                            o = t[1];
                            s = t[2];
                            break;
                        case "q":
                            h = i + t[3];
                            c = r + t[4];
                            o = i + t[1];
                            s = r + t[2];
                            n.quadraticCurveTo(o + u, s + e, h + u, c + e);
                            i = h;
                            r = c;
                            break;
                        case "Q":
                            h = t[3];
                            c = t[4];
                            n.quadraticCurveTo(t[1] + u, t[2] + e, h + u, c + e);
                            i = h;
                            r = c;
                            o = t[1];
                            s = t[2];
                            break;
                        case "t":
                            h = i + t[1];
                            c = r + t[2];
                            l[0].match(/[QqTt]/) === null ? (o = i, s = r) : (o = 2 * i - o, s = 2 * r - s);
                            n.quadraticCurveTo(o + u, s + e, h + u, c + e);
                            i = h;
                            r = c;
                            break;
                        case "T":
                            h = t[1];
                            c = t[2];
                            l[0].match(/[QqTt]/) === null ? (o = i, s = r) : (o = 2 * i - o, s = 2 * r - s);
                            n.quadraticCurveTo(o + u, s + e, h + u, c + e);
                            i = h;
                            r = c;
                            break;
                        case "a":
                            f(n, i + u, r + e, [t[1], t[2], t[3], t[4], t[5], t[6] + i + u, t[7] + r + e]);
                            i += t[6];
                            r += t[7];
                            break;
                        case "A":
                            f(n, i + u, r + e, [t[1], t[2], t[3], t[4], t[5], t[6] + u, t[7] + e]);
                            i = t[6];
                            r = t[7];
                            break;
                        case "z":
                        case "Z":
                            i = v;
                            r = y;
                            n.closePath()
                    }
                    l = t
                }
            },
            _render: function(n) {
                this._renderPathCommands(n);
                this._renderFill(n);
                this._renderStroke(n)
            },
            toString: function() {
                return "#<fabric.Path (" + this.complexity() + '): { "top": ' + this.top + ', "left": ' + this.left + " }>"
            },
            toObject: function(n) {
                var t = u(this.callSuper("toObject", n), {
                    path: this.path.map(function(n) {
                        return n.slice()
                    }),
                    pathOffset: this.pathOffset
                });
                return this.sourcePath && (t.sourcePath = this.sourcePath), this.transformMatrix && (t.transformMatrix = this.transformMatrix), t
            },
            toDatalessObject: function(n) {
                var t = this.toObject(n);
                return this.sourcePath && (t.path = this.sourcePath), delete t.sourcePath, t
            },
            toSVG: function(n) {
                for (var f, r = [], t = this._createBaseSVGMarkup(), u = "", i = 0, e = this.path.length; i < e; i++) r.push(this.path[i].join(" "));
                return f = r.join(" "), this.group && this.group.type === "path-group" || (u = " translate(" + -this.pathOffset.x + ", " + -this.pathOffset.y + ") "), t.push("<path ", this.getSvgId(), 'd="', f, '" style="', this.getSvgStyles(), '" transform="', this.getSvgTransform(), u, this.getSvgTransformMatrix(), '" stroke-linecap="round" ', "/>\n"), n ? n(t.join("")) : t.join("")
            },
            complexity: function() {
                return this.path.length
            },
            _parsePath: function() {
                for (var u, y, i, p, f = [], r = [], e, h, w = /([-+]?((\d+\.\d+)|((\d+)|(\.\d+)))(?:e[-+]?\d+)?)/ig, a, v, c = 0, n, b = this.path.length; c < b; c++) {
                    for (e = this.path[c], v = e.slice(1).trim(), r.length = 0; a = w.exec(v);) r.push(a[0]);
                    for (n = [e.charAt(0)], u = 0, y = r.length; u < y; u++) h = parseFloat(r[u]), isNaN(h) || n.push(h);
                    var t = n[0],
                        l = o[t.toLowerCase()],
                        k = s[t] || t;
                    if (n.length - 1 > l)
                        for (i = 1, p = n.length; i < p; i += l) f.push([t].concat(n.slice(i, i + l))), t = k;
                    else f.push(n)
                }
                return f
            },
            _parseDimensions: function() {
                for (var a = [], v = [], n, l = null, y = 0, p = 0, u = 0, f = 0, e = 0, o = 0, h, c, s, w = 0, d = this.path.length; w < d; ++w) {
                    n = this.path[w];
                    switch (n[0]) {
                        case "l":
                            u += n[1];
                            f += n[2];
                            s = [];
                            break;
                        case "L":
                            u = n[1];
                            f = n[2];
                            s = [];
                            break;
                        case "h":
                            u += n[1];
                            s = [];
                            break;
                        case "H":
                            u = n[1];
                            s = [];
                            break;
                        case "v":
                            f += n[1];
                            s = [];
                            break;
                        case "V":
                            f = n[1];
                            s = [];
                            break;
                        case "m":
                            u += n[1];
                            f += n[2];
                            y = u;
                            p = f;
                            s = [];
                            break;
                        case "M":
                            u = n[1];
                            f = n[2];
                            y = u;
                            p = f;
                            s = [];
                            break;
                        case "c":
                            h = u + n[5];
                            c = f + n[6];
                            e = u + n[3];
                            o = f + n[4];
                            s = t.util.getBoundsOfCurve(u, f, u + n[1], f + n[2], e, o, h, c);
                            u = h;
                            f = c;
                            break;
                        case "C":
                            u = n[5];
                            f = n[6];
                            e = n[3];
                            o = n[4];
                            s = t.util.getBoundsOfCurve(u, f, n[1], n[2], e, o, u, f);
                            break;
                        case "s":
                            h = u + n[3];
                            c = f + n[4];
                            l[0].match(/[CcSs]/) === null ? (e = u, o = f) : (e = 2 * u - e, o = 2 * f - o);
                            s = t.util.getBoundsOfCurve(u, f, e, o, u + n[1], f + n[2], h, c);
                            e = u + n[1];
                            o = f + n[2];
                            u = h;
                            f = c;
                            break;
                        case "S":
                            h = n[3];
                            c = n[4];
                            l[0].match(/[CcSs]/) === null ? (e = u, o = f) : (e = 2 * u - e, o = 2 * f - o);
                            s = t.util.getBoundsOfCurve(u, f, e, o, n[1], n[2], h, c);
                            u = h;
                            f = c;
                            e = n[1];
                            o = n[2];
                            break;
                        case "q":
                            h = u + n[3];
                            c = f + n[4];
                            e = u + n[1];
                            o = f + n[2];
                            s = t.util.getBoundsOfCurve(u, f, e, o, e, o, h, c);
                            u = h;
                            f = c;
                            break;
                        case "Q":
                            e = n[1];
                            o = n[2];
                            s = t.util.getBoundsOfCurve(u, f, e, o, e, o, n[3], n[4]);
                            u = n[3];
                            f = n[4];
                            break;
                        case "t":
                            h = u + n[1];
                            c = f + n[2];
                            l[0].match(/[QqTt]/) === null ? (e = u, o = f) : (e = 2 * u - e, o = 2 * f - o);
                            s = t.util.getBoundsOfCurve(u, f, e, o, e, o, h, c);
                            u = h;
                            f = c;
                            break;
                        case "T":
                            h = n[1];
                            c = n[2];
                            l[0].match(/[QqTt]/) === null ? (e = u, o = f) : (e = 2 * u - e, o = 2 * f - o);
                            s = t.util.getBoundsOfCurve(u, f, e, o, e, o, h, c);
                            u = h;
                            f = c;
                            break;
                        case "a":
                            s = t.util.getBoundsOfArc(u, f, n[1], n[2], n[3], n[4], n[5], n[6] + u, n[7] + f);
                            u += n[6];
                            f += n[7];
                            break;
                        case "A":
                            s = t.util.getBoundsOfArc(u, f, n[1], n[2], n[3], n[4], n[5], n[6], n[7]);
                            u = n[6];
                            f = n[7];
                            break;
                        case "z":
                        case "Z":
                            u = y;
                            f = p
                    }
                    l = n;
                    s.forEach(function(n) {
                        a.push(n.x);
                        v.push(n.y)
                    });
                    a.push(u);
                    v.push(f)
                }
                var b = i(a) || 0,
                    k = i(v) || 0,
                    g = r(a) || 0,
                    nt = r(v) || 0,
                    tt = g - b,
                    it = nt - k;
                return {
                    left: b,
                    top: k,
                    width: tt,
                    height: it
                }
            }
        });
        t.Path.fromObject = function(n, i) {
            var r;
            if (typeof n.path == "string") t.loadSVGFromURL(n.path, function(u) {
                var f = n.path;
                r = u[0];
                delete n.path;
                t.util.object.extend(r, n);
                r.setSourcePath(f);
                i && i(r)
            });
            else return r = new t.Path(n.path, n), i && i(r), r
        };
        t.Path.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat(["d"]);
        t.Path.fromElement = function(n, i, r) {
            var f = t.parseAttributes(n, t.Path.ATTRIBUTE_NAMES);
            i && i(new t.Path(f.d, u(f, r)))
        };
        t.Path.async = !0
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.util.object.extend,
            r = t.util.array.invoke,
            u = t.Object.prototype.toObject;
        if (t.PathGroup) {
            t.warn("fabric.PathGroup is already defined");
            return
        }
        t.PathGroup = t.util.createClass(t.Path, {
            type: "path-group",
            fill: "",
            initialize: function(n, t) {
                t = t || {};
                this.paths = n || [];
                for (var i = this.paths.length; i--;) this.paths[i].group = this;
                t.toBeParsed && (this.parseDimensionsFromPaths(t), delete t.toBeParsed);
                this.setOptions(t);
                this.setCoords();
                t.sourcePath && this.setSourcePath(t.sourcePath)
            },
            parseDimensionsFromPaths: function(n) {
                for (var u, f, r, c = [], l = [], i, e, o, s, h = this.paths.length; h--;)
                    for (i = this.paths[h], e = i.height + i.strokeWidth, o = i.width + i.strokeWidth, f = [{
                            x: i.left,
                            y: i.top
                        }, {
                            x: i.left + o,
                            y: i.top
                        }, {
                            x: i.left,
                            y: i.top + e
                        }, {
                            x: i.left + o,
                            y: i.top + e
                        }], s = this.paths[h].transformMatrix, u = 0; u < f.length; u++) r = f[u], s && (r = t.util.transformPoint(r, s, !1)), c.push(r.x), l.push(r.y);
                n.width = Math.max.apply(null, c);
                n.height = Math.max.apply(null, l)
            },
            render: function(n) {
                if (this.visible) {
                    n.save();
                    this.transformMatrix && n.transform.apply(n, this.transformMatrix);
                    this.transform(n);
                    this._setShadow(n);
                    this.clipTo && t.util.clipContext(this, n);
                    n.translate(-this.width / 2, -this.height / 2);
                    for (var i = 0, r = this.paths.length; i < r; ++i) this.paths[i].render(n, !0);
                    this.clipTo && n.restore();
                    n.restore()
                }
            },
            _set: function(n, t) {
                if (n === "fill" && t && this.isSameColor())
                    for (var i = this.paths.length; i--;) this.paths[i]._set(n, t);
                return this.callSuper("_set", n, t)
            },
            toObject: function(n) {
                var t = i(u.call(this, n), {
                    paths: r(this.getObjects(), "toObject", n)
                });
                return this.sourcePath && (t.sourcePath = this.sourcePath), t
            },
            toDatalessObject: function(n) {
                var t = this.toObject(n);
                return this.sourcePath && (t.paths = this.sourcePath), t
            },
            toSVG: function(n) {
                var r = this.getObjects(),
                    u = this.getPointByOrigin("left", "top"),
                    e = "translate(" + u.x + " " + u.y + ")",
                    t = this._createBaseSVGMarkup(),
                    i, f;
                for (t.push("<g ", this.getSvgId(), 'style="', this.getSvgStyles(), '" ', 'transform="', this.getSvgTransformMatrix(), e, this.getSvgTransform(), '" ', ">\n"), i = 0, f = r.length; i < f; i++) t.push("\t", r[i].toSVG(n));
                return t.push("<\/g>\n"), n ? n(t.join("")) : t.join("")
            },
            toString: function() {
                return "#<fabric.PathGroup (" + this.complexity() + "): { top: " + this.top + ", left: " + this.left + " }>"
            },
            isSameColor: function() {
                var n = this.getObjects()[0].get("fill") || "";
                return typeof n != "string" ? !1 : (n = n.toLowerCase(), this.getObjects().every(function(t) {
                    var i = t.get("fill") || "";
                    return typeof i == "string" && i.toLowerCase() === n
                }))
            },
            complexity: function() {
                return this.paths.reduce(function(n, t) {
                    return n + (t && t.complexity ? t.complexity() : 0)
                }, 0)
            },
            getObjects: function() {
                return this.paths
            }
        });
        t.PathGroup.fromObject = function(n, i) {
            typeof n.paths == "string" ? t.loadSVGFromURL(n.paths, function(r) {
                var f = n.paths,
                    u;
                delete n.paths;
                u = t.util.groupSVGElements(r, n, f);
                i(u)
            }) : t.util.enlivenObjects(n.paths, function(r) {
                delete n.paths;
                i(new t.PathGroup(r, n))
            })
        };
        t.PathGroup.async = !0
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            f = t.util.object.extend,
            i = t.util.array.min,
            r = t.util.array.max,
            e = t.util.array.invoke,
            u;
        t.Group || (u = {
            lockMovementX: !0,
            lockMovementY: !0,
            lockRotation: !0,
            lockScalingX: !0,
            lockScalingY: !0,
            lockUniScaling: !0
        }, t.Group = t.util.createClass(t.Object, t.Collection, {
            type: "group",
            strokeWidth: 0,
            subTargetCheck: !1,
            initialize: function(n, t, i) {
                t = t || {};
                this._objects = [];
                i && this.callSuper("initialize", t);
                this._objects = n || [];
                for (var r = this._objects.length; r--;) this._objects[r].group = this;
                this.originalState = {};
                t.originX && (this.originX = t.originX);
                t.originY && (this.originY = t.originY);
                i ? this._updateObjectsCoords(!0) : (this._calcBounds(), this._updateObjectsCoords(), this.callSuper("initialize", t));
                this.setCoords();
                this.saveCoords()
            },
            _updateObjectsCoords: function(n) {
                for (var t = this._objects.length; t--;) this._updateObjectCoords(this._objects[t], n)
            },
            _updateObjectCoords: function(n, t) {
                if (n.__origHasControls = n.hasControls, n.hasControls = !1, !t) {
                    var i = n.getLeft(),
                        r = n.getTop(),
                        u = this.getCenterPoint();
                    n.set({
                        originalLeft: i,
                        originalTop: r,
                        left: i - u.x,
                        top: r - u.y
                    });
                    n.setCoords()
                }
            },
            toString: function() {
                return "#<fabric.Group: (" + this.complexity() + ")>"
            },
            addWithUpdate: function(n) {
                return this._restoreObjectsState(), t.util.resetObjectTransform(this), n && (this._objects.push(n), n.group = this, n._set("canvas", this.canvas)), this.forEachObject(this._setObjectActive, this), this._calcBounds(), this._updateObjectsCoords(), this
            },
            _setObjectActive: function(n) {
                n.set("active", !0);
                n.group = this
            },
            removeWithUpdate: function(n) {
                return this._restoreObjectsState(), t.util.resetObjectTransform(this), this.forEachObject(this._setObjectActive, this), this.remove(n), this._calcBounds(), this._updateObjectsCoords(), this
            },
            _onObjectAdded: function(n) {
                n.group = this;
                n._set("canvas", this.canvas)
            },
            _onObjectRemoved: function(n) {
                delete n.group;
                n.set("active", !1)
            },
            delegatedProperties: {
                fill: !0,
                stroke: !0,
                strokeWidth: !0,
                fontFamily: !0,
                fontWeight: !0,
                fontSize: !0,
                fontStyle: !0,
                lineHeight: !0,
                textDecoration: !0,
                textAlign: !0,
                backgroundColor: !0
            },
            _set: function(n, t) {
                var i = this._objects.length;
                if (this.delegatedProperties[n] || n === "canvas")
                    while (i--) this._objects[i].set(n, t);
                else
                    while (i--) this._objects[i].setOnGroup(n, t);
                this.callSuper("_set", n, t)
            },
            toObject: function(n) {
                return f(this.callSuper("toObject", n), {
                    objects: e(this._objects, "toObject", n)
                })
            },
            render: function(n) {
                if (this.visible) {
                    n.save();
                    this.transformMatrix && n.transform.apply(n, this.transformMatrix);
                    this.transform(n);
                    this._setShadow(n);
                    this.clipTo && t.util.clipContext(this, n);
                    this._transformDone = !0;
                    for (var i = 0, r = this._objects.length; i < r; i++) this._renderObject(this._objects[i], n);
                    this.clipTo && n.restore();
                    n.restore();
                    this._transformDone = !1
                }
            },
            _renderControls: function(n, t) {
                this.callSuper("_renderControls", n, t);
                for (var i = 0, r = this._objects.length; i < r; i++) this._objects[i]._renderControls(n)
            },
            _renderObject: function(n, t) {
                if (n.visible) {
                    var i = n.hasRotatingPoint;
                    n.hasRotatingPoint = !1;
                    n.render(t);
                    n.hasRotatingPoint = i
                }
            },
            _restoreObjectsState: function() {
                return this._objects.forEach(this._restoreObjectState, this), this
            },
            realizeTransform: function(n) {
                var r = n.calcTransformMatrix(),
                    i = t.util.qrDecompose(r),
                    u = new t.Point(i.translateX, i.translateY);
                return n.scaleX = i.scaleX, n.scaleY = i.scaleY, n.skewX = i.skewX, n.skewY = i.skewY, n.angle = i.angle, n.flipX = !1, n.flipY = !1, n.setPositionByOrigin(u, "center", "center"), n
            },
            _restoreObjectState: function(n) {
                return this.realizeTransform(n), n.setCoords(), n.hasControls = n.__origHasControls, delete n.__origHasControls, n.set("active", !1), delete n.group, this
            },
            destroy: function() {
                return this._restoreObjectsState()
            },
            saveCoords: function() {
                return this._originalLeft = this.get("left"), this._originalTop = this.get("top"), this
            },
            hasMoved: function() {
                return this._originalLeft !== this.get("left") || this._originalTop !== this.get("top")
            },
            setObjectsCoords: function() {
                return this.forEachObject(function(n) {
                    n.setCoords()
                }), this
            },
            _calcBounds: function(n) {
                for (var f = [], e = [], t, r, o = ["tr", "br", "bl", "tl"], u = 0, s = this._objects.length, i, h = o.length; u < s; ++u)
                    for (t = this._objects[u], t.setCoords(), i = 0; i < h; i++) r = o[i], f.push(t.oCoords[r].x), e.push(t.oCoords[r].y);
                this.set(this._getBounds(f, e, n))
            },
            _getBounds: function(n, u, f) {
                var s = t.util.invertTransform(this.getViewportTransform()),
                    o = t.util.transformPoint(new t.Point(i(n), i(u)), s),
                    h = t.util.transformPoint(new t.Point(r(n), r(u)), s),
                    e = {
                        width: h.x - o.x || 0,
                        height: h.y - o.y || 0
                    };
                return f || (e.left = o.x || 0, e.top = o.y || 0, this.originX === "center" && (e.left += e.width / 2), this.originX === "right" && (e.left += e.width), this.originY === "center" && (e.top += e.height / 2), this.originY === "bottom" && (e.top += e.height)), e
            },
            toSVG: function(n) {
                var t = this._createBaseSVGMarkup(),
                    i, r;
                for (t.push("<g ", this.getSvgId(), 'transform="', this.getSvgTransform(), this.getSvgTransformMatrix(), '" style="', this.getSvgFilter(), '">\n'), i = 0, r = this._objects.length; i < r; i++) t.push("\t", this._objects[i].toSVG(n));
                return t.push("<\/g>\n"), n ? n(t.join("")) : t.join("")
            },
            get: function(n) {
                if (n in u) {
                    if (this[n]) return this[n];
                    for (var t = 0, i = this._objects.length; t < i; t++)
                        if (this._objects[t][n]) return !0;
                    return !1
                }
                return n in this.delegatedProperties ? this._objects[0] && this._objects[0].get(n) : this[n]
            }
        }), t.Group.fromObject = function(n, i) {
            t.util.enlivenObjects(n.objects, function(r) {
                delete n.objects;
                i && i(new t.Group(r, n, !0))
            })
        }, t.Group.async = !0)
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = fabric.util.object.extend,
            i;
        if (n.fabric || (n.fabric = {}), n.fabric.Image) {
            fabric.warn("fabric.Image is already defined.");
            return
        }
        i = fabric.Object.prototype.stateProperties.concat();
        i.push("alignX", "alignY", "meetOrSlice");
        fabric.Image = fabric.util.createClass(fabric.Object, {
            type: "image",
            crossOrigin: "",
            alignX: "none",
            alignY: "none",
            meetOrSlice: "meet",
            strokeWidth: 0,
            _lastScaleX: 1,
            _lastScaleY: 1,
            minimumScaleTrigger: .5,
            stateProperties: i,
            initialize: function(n, t, i) {
                t || (t = {});
                this.filters = [];
                this.resizeFilters = [];
                this.callSuper("initialize", t);
                this._initElement(n, t, i)
            },
            getElement: function() {
                return this._element
            },
            setElement: function(n, t, i) {
                var r, u;
                return this._element = n, this._originalElement = n, this._initConfig(i), this.resizeFilters.length === 0 ? r = t : (u = this, r = function() {
                    u.applyFilters(t, u.resizeFilters, u._filteredEl || u._originalElement, !0)
                }), this.filters.length !== 0 ? this.applyFilters(r) : r && r(this), this
            },
            setCrossOrigin: function(n) {
                return this.crossOrigin = n, this._element.crossOrigin = n, this
            },
            getOriginalSize: function() {
                var n = this.getElement();
                return {
                    width: n.width,
                    height: n.height
                }
            },
            _stroke: function(n) {
                if (this.stroke && this.strokeWidth !== 0) {
                    var t = this.width / 2,
                        i = this.height / 2;
                    n.beginPath();
                    n.moveTo(-t, -i);
                    n.lineTo(t, -i);
                    n.lineTo(t, i);
                    n.lineTo(-t, i);
                    n.lineTo(-t, -i);
                    n.closePath()
                }
            },
            _renderDashedStroke: function(n) {
                var t = -this.width / 2,
                    i = -this.height / 2,
                    r = this.width,
                    u = this.height;
                n.save();
                this._setStrokeStyles(n);
                n.beginPath();
                fabric.util.drawDashedLine(n, t, i, t + r, i, this.strokeDashArray);
                fabric.util.drawDashedLine(n, t + r, i, t + r, i + u, this.strokeDashArray);
                fabric.util.drawDashedLine(n, t + r, i + u, t, i + u, this.strokeDashArray);
                fabric.util.drawDashedLine(n, t, i + u, t, i, this.strokeDashArray);
                n.closePath();
                n.restore()
            },
            toObject: function(n) {
                var r = [],
                    u = [],
                    f = 1,
                    e = 1,
                    i;
                return this.filters.forEach(function(n) {
                    n && (n.type === "Resize" && (f *= n.scaleX, e *= n.scaleY), r.push(n.toObject()))
                }), this.resizeFilters.forEach(function(n) {
                    n && u.push(n.toObject())
                }), i = t(this.callSuper("toObject", n), {
                    src: this.getSrc(),
                    filters: r,
                    resizeFilters: u,
                    crossOrigin: this.crossOrigin,
                    alignX: this.alignX,
                    alignY: this.alignY,
                    meetOrSlice: this.meetOrSlice
                }), i.width /= f, i.height /= e, this.includeDefaultValues || this._removeDefaultValues(i), i
            },
            toSVG: function(n) {
                var t = this._createBaseSVGMarkup(),
                    i = -this.width / 2,
                    r = -this.height / 2,
                    u = "none",
                    f;
                return this.group && this.group.type === "path-group" && (i = this.left, r = this.top), this.alignX !== "none" && this.alignY !== "none" && (u = "x" + this.alignX + "Y" + this.alignY + " " + this.meetOrSlice), t.push('<g transform="', this.getSvgTransform(), this.getSvgTransformMatrix(), '">\n', "<image ", this.getSvgId(), 'xlink:href="', this.getSvgSrc(!0), '" x="', i, '" y="', r, '" style="', this.getSvgStyles(), '" width="', this.width, '" height="', this.height, '" preserveAspectRatio="', u, '"', "><\/image>\n"), (this.stroke || this.strokeDashArray) && (f = this.fill, this.fill = null, t.push("<rect ", 'x="', i, '" y="', r, '" width="', this.width, '" height="', this.height, '" style="', this.getSvgStyles(), '"/>\n'), this.fill = f), t.push("<\/g>\n"), n ? n(t.join("")) : t.join("")
            },
            getSrc: function(n) {
                var t = n ? this._element : this._originalElement;
                return t ? fabric.isLikelyNode ? t._src : t.src : this.src || ""
            },
            setSrc: function(n, t, i) {
                fabric.util.loadImage(n, function(n) {
                    return this.setElement(n, t, i)
                }, this, i && i.crossOrigin)
            },
            toString: function() {
                return '#<fabric.Image: { src: "' + this.getSrc() + '" }>'
            },
            applyFilters: function(n, t, i, r) {
                var f;
                if (t = t || this.filters, i = i || this._originalElement, i) {
                    var e = fabric.util.createImage(),
                        o = this.canvas ? this.canvas.getRetinaScaling() : fabric.devicePixelRatio,
                        c = this.minimumScaleTrigger / o,
                        u = this,
                        s, h;
                    return t.length === 0 ? (this._element = i, n && n(this), i) : (f = fabric.util.createCanvasElement(), f.width = i.width, f.height = i.height, f.getContext("2d").drawImage(i, 0, 0, i.width, i.height), t.forEach(function(n) {
                        n && (r ? (s = u.scaleX < c ? u.scaleX : 1, h = u.scaleY < c ? u.scaleY : 1, s * o < 1 && (s *= o), h * o < 1 && (h *= o)) : (s = n.scaleX, h = n.scaleY), n.applyTo(f, s, h), r || n.type !== "Resize" || (u.width *= n.scaleX, u.height *= n.scaleY))
                    }), e.width = f.width, e.height = f.height, fabric.isLikelyNode ? (e.src = f.toBuffer(undefined, fabric.Image.pngCompression), u._element = e, r || (u._filteredEl = e), n && n(u)) : (e.onload = function() {
                        u._element = e;
                        r || (u._filteredEl = e);
                        n && n(u);
                        e.onload = f = null
                    }, e.src = f.toDataURL("image/png")), f)
                }
            },
            _render: function(n, t) {
                var u, f, i = this._findMargins(),
                    r;
                u = t ? this.left : -this.width / 2;
                f = t ? this.top : -this.height / 2;
                this.meetOrSlice === "slice" && (n.beginPath(), n.rect(u, f, this.width, this.height), n.clip());
                this.isMoving === !1 && this.resizeFilters.length && this._needsResize() ? (this._lastScaleX = this.scaleX, this._lastScaleY = this.scaleY, r = this.applyFilters(null, this.resizeFilters, this._filteredEl || this._originalElement, !0)) : r = this._element;
                r && n.drawImage(r, u + i.marginX, f + i.marginY, i.width, i.height);
                this._stroke(n);
                this._renderStroke(n)
            },
            _needsResize: function() {
                return this.scaleX !== this._lastScaleX || this.scaleY !== this._lastScaleY
            },
            _findMargins: function() {
                var n = this.width,
                    t = this.height,
                    i, r, u = 0,
                    f = 0;
                return (this.alignX !== "none" || this.alignY !== "none") && (i = [this.width / this._element.width, this.height / this._element.height], r = this.meetOrSlice === "meet" ? Math.min.apply(null, i) : Math.max.apply(null, i), n = this._element.width * r, t = this._element.height * r, this.alignX === "Mid" && (u = (this.width - n) / 2), this.alignX === "Max" && (u = this.width - n), this.alignY === "Mid" && (f = (this.height - t) / 2), this.alignY === "Max" && (f = this.height - t)), {
                    width: n,
                    height: t,
                    marginX: u,
                    marginY: f
                }
            },
            _resetWidthHeight: function() {
                var n = this.getElement();
                this.set("width", n.width);
                this.set("height", n.height)
            },
            _initElement: function(n, t, i) {
                this.setElement(fabric.util.getById(n), i, t);
                fabric.util.addClass(this.getElement(), fabric.Image.CSS_CANVAS)
            },
            _initConfig: function(n) {
                n || (n = {});
                this.setOptions(n);
                this._setWidthHeight(n);
                this._element && this.crossOrigin && (this._element.crossOrigin = this.crossOrigin)
            },
            _initFilters: function(n, t) {
                n && n.length ? fabric.util.enlivenObjects(n, function(n) {
                    t && t(n)
                }, "fabric.Image.filters") : t && t()
            },
            _setWidthHeight: function(n) {
                this.width = "width" in n ? n.width : this.getElement() ? this.getElement().width || 0 : 0;
                this.height = "height" in n ? n.height : this.getElement() ? this.getElement().height || 0 : 0
            },
            complexity: function() {
                return 1
            }
        });
        fabric.Image.CSS_CANVAS = "canvas-img";
        fabric.Image.prototype.getSvgSrc = fabric.Image.prototype.getSrc;
        fabric.Image.fromObject = function(n, t) {
            fabric.util.loadImage(n.src, function(i) {
                fabric.Image.prototype._initFilters.call(n, n.filters, function(r) {
                    n.filters = r || [];
                    fabric.Image.prototype._initFilters.call(n, n.resizeFilters, function(r) {
                        return n.resizeFilters = r || [], new fabric.Image(i, n, t)
                    })
                })
            }, null, n.crossOrigin)
        };
        fabric.Image.fromURL = function(n, t, i) {
            fabric.util.loadImage(n, function(n) {
                t && t(new fabric.Image(n, i))
            }, null, i && i.crossOrigin)
        };
        fabric.Image.ATTRIBUTE_NAMES = fabric.SHARED_ATTRIBUTES.concat("x y width height preserveAspectRatio xlink:href".split(" "));
        fabric.Image.fromElement = function(n, i, r) {
            var u = fabric.parseAttributes(n, fabric.Image.ATTRIBUTE_NAMES),
                f;
            u.preserveAspectRatio && (f = fabric.util.parsePreserveAspectRatioAttribute(u.preserveAspectRatio), t(u, f));
            fabric.Image.fromURL(u["xlink:href"], i, t(r ? fabric.util.object.clone(r) : {}, u))
        };
        fabric.Image.async = !0;
        fabric.Image.pngCompression = 1
    }(typeof exports != "undefined" ? exports : this);
fabric.util.object.extend(fabric.Object.prototype, {
    _getAngleValueForStraighten: function() {
        var n = this.getAngle() % 360;
        return n > 0 ? Math.round((n - 1) / 90) * 90 : Math.round(n / 90) * 90
    },
    straighten: function() {
        return this.setAngle(this._getAngleValueForStraighten()), this
    },
    fxStraighten: function(n) {
        n = n || {};
        var i = function() {},
            r = n.onComplete || i,
            u = n.onChange || i,
            t = this;
        return fabric.util.animate({
            startValue: this.get("angle"),
            endValue: this._getAngleValueForStraighten(),
            duration: this.FX_DURATION,
            onChange: function(n) {
                t.setAngle(n);
                u()
            },
            onComplete: function() {
                t.setCoords();
                r()
            },
            onStart: function() {
                t.set("active", !1)
            }
        }), this
    }
});
fabric.util.object.extend(fabric.StaticCanvas.prototype, {
    straightenObject: function(n) {
        return n.straighten(), this.renderAll(), this
    },
    fxStraightenObject: function(n) {
        return n.fxStraighten({
            onChange: this.renderAll.bind(this)
        }), this
    }
});
fabric.Image.filters = fabric.Image.filters || {};
fabric.Image.filters.BaseFilter = fabric.util.createClass({
        type: "BaseFilter",
        initialize: function(n) {
            n && this.setOptions(n)
        },
        setOptions: function(n) {
            for (var t in n) this[t] = n[t]
        },
        toObject: function() {
            return {
                type: this.type
            }
        },
        toJSON: function() {
            return this.toObject()
        }
    }),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Brightness = u(i.BaseFilter, {
            type: "Brightness",
            initialize: function(n) {
                n = n || {};
                this.brightness = n.brightness || 0
            },
            applyTo: function(n) {
                for (var u = n.getContext("2d"), f = u.getImageData(0, 0, n.width, n.height), i = f.data, r = this.brightness, t = 0, e = i.length; t < e; t += 4) i[t] += r, i[t + 1] += r, i[t + 2] += r;
                u.putImageData(f, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    brightness: this.brightness
                })
            }
        });
        t.Image.filters.Brightness.fromObject = function(n) {
            return new t.Image.filters.Brightness(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Convolute = u(i.BaseFilter, {
            type: "Convolute",
            initialize: function(n) {
                n = n || {};
                this.opaque = n.opaque;
                this.matrix = n.matrix || [0, 0, 0, 0, 1, 0, 0, 0, 0]
            },
            applyTo: function(n) {
                for (var f, e, o, nt = this.matrix, p = n.getContext("2d"), w = p.getImageData(0, 0, n.width, n.height), s = Math.round(Math.sqrt(nt.length)), tt = Math.floor(s / 2), h = w.data, t = w.width, b = w.height, it = p.createImageData(t, b), c = it.data, rt = this.opaque ? 1 : 0, k, d, g, l, i, a, v, r, u, y = 0; y < b; y++)
                    for (f = 0; f < t; f++) {
                        for (i = (y * t + f) * 4, k = 0, d = 0, g = 0, l = 0, e = 0; e < s; e++)
                            for (o = 0; o < s; o++)(v = y + e - tt, a = f + o - tt, v < 0 || v > b || a < 0 || a > t) || (r = (v * t + a) * 4, u = nt[e * s + o], k += h[r] * u, d += h[r + 1] * u, g += h[r + 2] * u, l += h[r + 3] * u);
                        c[i] = k;
                        c[i + 1] = d;
                        c[i + 2] = g;
                        c[i + 3] = l + rt * (255 - l)
                    }
                p.putImageData(it, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    opaque: this.opaque,
                    matrix: this.matrix
                })
            }
        });
        t.Image.filters.Convolute.fromObject = function(n) {
            return new t.Image.filters.Convolute(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.GradientTransparency = u(i.BaseFilter, {
            type: "GradientTransparency",
            initialize: function(n) {
                n = n || {};
                this.threshold = n.threshold || 100
            },
            applyTo: function(n) {
                for (var r = n.getContext("2d"), u = r.getImageData(0, 0, n.width, n.height), i = u.data, e = this.threshold, f = i.length, t = 0, o = i.length; t < o; t += 4) i[t + 3] = e + 255 * (f - t) / f;
                r.putImageData(u, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    threshold: this.threshold
                })
            }
        });
        t.Image.filters.GradientTransparency.fromObject = function(n) {
            return new t.Image.filters.GradientTransparency(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.Image.filters,
            r = t.util.createClass;
        i.Grayscale = r(i.BaseFilter, {
            type: "Grayscale",
            applyTo: function(n) {
                for (var f = n.getContext("2d"), r = f.getImageData(0, 0, n.width, n.height), i = r.data, e = r.width * r.height * 4, t = 0, u; t < e;) u = (i[t] + i[t + 1] + i[t + 2]) / 3, i[t] = u, i[t + 1] = u, i[t + 2] = u, t += 4;
                f.putImageData(r, 0, 0)
            }
        });
        t.Image.filters.Grayscale.fromObject = function() {
            return new t.Image.filters.Grayscale
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.Image.filters,
            r = t.util.createClass;
        i.Invert = r(i.BaseFilter, {
            type: "Invert",
            applyTo: function(n) {
                for (var r = n.getContext("2d"), u = r.getImageData(0, 0, n.width, n.height), i = u.data, f = i.length, t = 0; t < f; t += 4) i[t] = 255 - i[t], i[t + 1] = 255 - i[t + 1], i[t + 2] = 255 - i[t + 2];
                r.putImageData(u, 0, 0)
            }
        });
        t.Image.filters.Invert.fromObject = function() {
            return new t.Image.filters.Invert
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Mask = u(i.BaseFilter, {
            type: "Mask",
            initialize: function(n) {
                n = n || {};
                this.mask = n.mask;
                this.channel = [0, 1, 2, 3].indexOf(n.channel) > -1 ? n.channel : 0
            },
            applyTo: function(n) {
                var e, o;
                if (this.mask) {
                    var f = n.getContext("2d"),
                        r = f.getImageData(0, 0, n.width, n.height),
                        s = r.data,
                        h = this.mask.getElement(),
                        u = t.util.createCanvasElement(),
                        c = this.channel,
                        i, l = r.width * r.height * 4;
                    for (u.width = n.width, u.height = n.height, u.getContext("2d").drawImage(h, 0, 0, n.width, n.height), e = u.getContext("2d").getImageData(0, 0, n.width, n.height), o = e.data, i = 0; i < l; i += 4) s[i + 3] = o[i + c];
                    f.putImageData(r, 0, 0)
                }
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    mask: this.mask.toObject(),
                    channel: this.channel
                })
            }
        });
        t.Image.filters.Mask.fromObject = function(n, i) {
            t.util.loadImage(n.mask.src, function(r) {
                n.mask = new t.Image(r, n.mask);
                i && i(new t.Image.filters.Mask(n))
            })
        };
        t.Image.filters.Mask.async = !0
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Noise = u(i.BaseFilter, {
            type: "Noise",
            initialize: function(n) {
                n = n || {};
                this.noise = n.noise || 0
            },
            applyTo: function(n) {
                for (var u = n.getContext("2d"), f = u.getImageData(0, 0, n.width, n.height), i = f.data, e = this.noise, r, t = 0, o = i.length; t < o; t += 4) r = (.5 - Math.random()) * e, i[t] += r, i[t + 1] += r, i[t + 2] += r;
                u.putImageData(f, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    noise: this.noise
                })
            }
        });
        t.Image.filters.Noise.fromObject = function(n) {
            return new t.Image.filters.Noise(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Pixelate = u(i.BaseFilter, {
            type: "Pixelate",
            initialize: function(n) {
                n = n || {};
                this.blocksize = n.blocksize || 4
            },
            applyTo: function(n) {
                for (var h = n.getContext("2d"), f = h.getImageData(0, 0, n.width, n.height), i = f.data, w = f.height, s = f.width, t, u, c, l, a, v, e, y, o, p, r = 0; r < w; r += this.blocksize)
                    for (u = 0; u < s; u += this.blocksize)
                        for (t = r * 4 * s + u * 4, c = i[t], l = i[t + 1], a = i[t + 2], v = i[t + 3], e = r, y = r + this.blocksize; e < y; e++)
                            for (o = u, p = u + this.blocksize; o < p; o++) t = e * 4 * s + o * 4, i[t] = c, i[t + 1] = l, i[t + 2] = a, i[t + 3] = v;
                h.putImageData(f, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    blocksize: this.blocksize
                })
            }
        });
        t.Image.filters.Pixelate.fromObject = function(n) {
            return new t.Image.filters.Pixelate(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.RemoveWhite = u(i.BaseFilter, {
            type: "RemoveWhite",
            initialize: function(n) {
                n = n || {};
                this.threshold = n.threshold || 30;
                this.distance = n.distance || 20
            },
            applyTo: function(n) {
                for (var h = n.getContext("2d"), c = h.getImageData(0, 0, n.width, n.height), i = c.data, l = this.threshold, e = this.distance, o = 255 - l, s = Math.abs, r, u, f, t = 0, a = i.length; t < a; t += 4) r = i[t], u = i[t + 1], f = i[t + 2], r > o && u > o && f > o && s(r - u) < e && s(r - f) < e && s(u - f) < e && (i[t + 3] = 0);
                h.putImageData(c, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    threshold: this.threshold,
                    distance: this.distance
                })
            }
        });
        t.Image.filters.RemoveWhite.fromObject = function(n) {
            return new t.Image.filters.RemoveWhite(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.Image.filters,
            r = t.util.createClass;
        i.Sepia = r(i.BaseFilter, {
            type: "Sepia",
            applyTo: function(n) {
                for (var u = n.getContext("2d"), f = u.getImageData(0, 0, n.width, n.height), i = f.data, e = i.length, r, t = 0; t < e; t += 4) r = .3 * i[t] + .59 * i[t + 1] + .11 * i[t + 2], i[t] = r + 100, i[t + 1] = r + 50, i[t + 2] = r + 255;
                u.putImageData(f, 0, 0)
            }
        });
        t.Image.filters.Sepia.fromObject = function() {
            return new t.Image.filters.Sepia
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.Image.filters,
            r = t.util.createClass;
        i.Sepia2 = r(i.BaseFilter, {
            type: "Sepia2",
            applyTo: function(n) {
                for (var e = n.getContext("2d"), o = e.getImageData(0, 0, n.width, n.height), i = o.data, s = i.length, r, u, f, t = 0; t < s; t += 4) r = i[t], u = i[t + 1], f = i[t + 2], i[t] = (r * .393 + u * .769 + f * .189) / 1.351, i[t + 1] = (r * .349 + u * .686 + f * .168) / 1.203, i[t + 2] = (r * .272 + u * .534 + f * .131) / 2.14;
                e.putImageData(o, 0, 0)
            }
        });
        t.Image.filters.Sepia2.fromObject = function() {
            return new t.Image.filters.Sepia2
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Tint = u(i.BaseFilter, {
            type: "Tint",
            initialize: function(n) {
                n = n || {};
                this.color = n.color || "#000000";
                this.opacity = typeof n.opacity != "undefined" ? n.opacity : new t.Color(this.color).getAlpha()
            },
            applyTo: function(n) {
                var e = n.getContext("2d"),
                    o = e.getImageData(0, 0, n.width, n.height),
                    r = o.data,
                    y = r.length,
                    i, s, h, c, l, a, v, u, f;
                for (f = new t.Color(this.color).getSource(), s = f[0] * this.opacity, h = f[1] * this.opacity, c = f[2] * this.opacity, u = 1 - this.opacity, i = 0; i < y; i += 4) l = r[i], a = r[i + 1], v = r[i + 2], r[i] = s + l * u, r[i + 1] = h + a * u, r[i + 2] = c + v * u;
                e.putImageData(o, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    color: this.color,
                    opacity: this.opacity
                })
            }
        });
        t.Image.filters.Tint.fromObject = function(n) {
            return new t.Image.filters.Tint(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Multiply = u(i.BaseFilter, {
            type: "Multiply",
            initialize: function(n) {
                n = n || {};
                this.color = n.color || "#000000"
            },
            applyTo: function(n) {
                for (var f = n.getContext("2d"), e = f.getImageData(0, 0, n.width, n.height), r = e.data, o = r.length, u = new t.Color(this.color).getSource(), i = 0; i < o; i += 4) r[i] *= u[0] / 255, r[i + 1] *= u[1] / 255, r[i + 2] *= u[2] / 255;
                f.putImageData(e, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    color: this.color
                })
            }
        });
        t.Image.filters.Multiply.fromObject = function(n) {
            return new t.Image.filters.Multiply(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric,
            i = t.Image.filters,
            r = t.util.createClass;
        i.Blend = r(i.BaseFilter, {
            type: "Blend",
            initialize: function(n) {
                n = n || {};
                this.color = n.color || "#000";
                this.image = n.image || !1;
                this.mode = n.mode || "multiply";
                this.alpha = n.alpha || 1
            },
            applyTo: function(n) {
                var w = n.getContext("2d"),
                    b = w.getImageData(0, 0, n.width, n.height),
                    r = b.data,
                    u, f, e, o, s, h, v, y, p, c, k = !1,
                    a, l, d, i, g;
                for (this.image ? (k = !0, a = t.util.createCanvasElement(), a.width = this.image.width, a.height = this.image.height, l = new t.StaticCanvas(a), l.add(this.image), d = l.getContext("2d"), c = d.getImageData(0, 0, l.width, l.height).data) : (c = new t.Color(this.color).getSource(), u = c[0] * this.alpha, f = c[1] * this.alpha, e = c[2] * this.alpha), i = 0, g = r.length; i < g; i += 4) {
                    o = r[i];
                    s = r[i + 1];
                    h = r[i + 2];
                    k && (u = c[i] * this.alpha, f = c[i + 1] * this.alpha, e = c[i + 2] * this.alpha);
                    switch (this.mode) {
                        case "multiply":
                            r[i] = o * u / 255;
                            r[i + 1] = s * f / 255;
                            r[i + 2] = h * e / 255;
                            break;
                        case "screen":
                            r[i] = 1 - (1 - o) * (1 - u);
                            r[i + 1] = 1 - (1 - s) * (1 - f);
                            r[i + 2] = 1 - (1 - h) * (1 - e);
                            break;
                        case "add":
                            r[i] = Math.min(255, o + u);
                            r[i + 1] = Math.min(255, s + f);
                            r[i + 2] = Math.min(255, h + e);
                            break;
                        case "diff":
                        case "difference":
                            r[i] = Math.abs(o - u);
                            r[i + 1] = Math.abs(s - f);
                            r[i + 2] = Math.abs(h - e);
                            break;
                        case "subtract":
                            v = o - u;
                            y = s - f;
                            p = h - e;
                            r[i] = v < 0 ? 0 : v;
                            r[i + 1] = y < 0 ? 0 : y;
                            r[i + 2] = p < 0 ? 0 : p;
                            break;
                        case "darken":
                            r[i] = Math.min(o, u);
                            r[i + 1] = Math.min(s, f);
                            r[i + 2] = Math.min(h, e);
                            break;
                        case "lighten":
                            r[i] = Math.max(o, u);
                            r[i + 1] = Math.max(s, f);
                            r[i + 2] = Math.max(h, e);
                            break;
                        case "overlay":
                            r[i] = 255 - (255 - o) * 2 + 127 * (u / 255);
                            r[i + 1] = 255 - (255 - s) * 2 + 127 * (f / 255);
                            r[i + 2] = 255 - (255 - h) * 2 + 127 * (e / 255)
                    }
                }
                w.putImageData(b, 0, 0)
            },
            toObject: function() {
                return {
                    color: this.color,
                    image: this.image,
                    mode: this.mode,
                    alpha: this.alpha
                }
            }
        });
        t.Image.filters.Blend.fromObject = function(n) {
            return new t.Image.filters.Blend(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var i = n.fabric || (n.fabric = {}),
            e = Math.pow,
            t = Math.floor,
            o = Math.sqrt,
            r = Math.abs,
            u = Math.max,
            s = Math.round,
            h = Math.sin,
            f = Math.ceil,
            c = i.Image.filters,
            l = i.util.createClass;
        c.Resize = l(c.BaseFilter, {
            type: "Resize",
            resizeType: "hermite",
            scaleX: 0,
            scaleY: 0,
            lanczosLobes: 3,
            applyTo: function(n, t, i) {
                if (t !== 1 || i !== 1) {
                    this.rcpScaleX = 1 / t;
                    this.rcpScaleY = 1 / i;
                    var r = n.width,
                        u = n.height,
                        f = s(r * t),
                        e = s(u * i),
                        o;
                    this.resizeType === "sliceHack" && (o = this.sliceByTwo(n, r, u, f, e));
                    this.resizeType === "hermite" && (o = this.hermiteFastResize(n, r, u, f, e));
                    this.resizeType === "bilinear" && (o = this.bilinearFiltering(n, r, u, f, e));
                    this.resizeType === "lanczos" && (o = this.lanczosResize(n, r, u, f, e));
                    n.width = f;
                    n.height = e;
                    n.getContext("2d").putImageData(o, 0, 0)
                }
            },
            sliceByTwo: function(n, r, f, e, o) {
                var c = n.getContext("2d"),
                    l, v = .5,
                    y = .5,
                    p = 1,
                    w = 1,
                    b = !1,
                    k = !1,
                    s = r,
                    h = f,
                    a = i.util.createCanvasElement(),
                    d = a.getContext("2d");
                for (e = t(e), o = t(o), a.width = u(e, r), a.height = u(o, f), e > r && (v = 2, p = -1), o > f && (y = 2, w = -1), l = c.getImageData(0, 0, r, f), n.width = u(e, r), n.height = u(o, f), c.putImageData(l, 0, 0); !b || !k;) r = s, f = h, e * p < t(s * v * p) ? s = t(s * v) : (s = e, b = !0), o * w < t(h * y * w) ? h = t(h * y) : (h = o, k = !0), l = c.getImageData(0, 0, r, f), d.putImageData(l, 0, 0), c.clearRect(0, 0, s, h), c.drawImage(a, 0, 0, r, f, 0, 0, s, h);
                return c.getImageData(0, 0, e, o)
            },
            lanczosResize: function(n, i, u, s, c) {
                function it(n) {
                    return function(t) {
                        if (t > n) return 0;
                        if (t *= Math.PI, r(t) < 1e-16) return 1;
                        var i = t / n;
                        return h(t) * h(i) / t / i
                    }
                }

                function w(n) {
                    var st, h, b, f, ot, ct, lt, at, vt, it, ht, rt;
                    for (l.x = (n + .5) * d, a.x = t(l.x), st = 0; st < c; st++) {
                        for (l.y = (st + .5) * g, a.y = t(l.y), ot = 0, ct = 0, lt = 0, at = 0, vt = 0, h = a.x - nt; h <= a.x + nt; h++)
                            if (!(h < 0) && !(h >= i))
                                for (it = t(1e3 * r(h - l.x)), v[it] || (v[it] = {}), rt = a.y - tt; rt <= a.y + tt; rt++) rt < 0 || rt >= u || (ht = t(1e3 * r(rt - l.y)), v[it][ht] || (v[it][ht] = ut(o(e(it * ft, 2) + e(ht * et, 2)) / 1e3)), b = v[it][ht], b > 0 && (f = (rt * i + h) * 4, ot += b, ct += b * y[f], lt += b * y[f + 1], at += b * y[f + 2], vt += b * y[f + 3]));
                        f = (st * s + n) * 4;
                        p[f] = ct / ot;
                        p[f + 1] = lt / ot;
                        p[f + 2] = at / ot;
                        p[f + 3] = vt / ot
                    }
                    return ++n < s ? w(n) : k
                }
                var b = n.getContext("2d"),
                    rt = b.getImageData(0, 0, i, u),
                    k = b.getImageData(0, 0, s, c),
                    y = rt.data,
                    p = k.data,
                    ut = it(this.lanczosLobes),
                    d = this.rcpScaleX,
                    g = this.rcpScaleY,
                    ft = 2 / this.rcpScaleX,
                    et = 2 / this.rcpScaleY,
                    nt = f(d * this.lanczosLobes / 2),
                    tt = f(g * this.lanczosLobes / 2),
                    v = {},
                    l = {},
                    a = {};
                return w(0)
            },
            bilinearFiltering: function(n, i, r, u, f) {
                for (var p, w, b, k, v, y, s, h, c, e, d, ut = 0, l, g = this.rcpScaleX, nt = this.rcpScaleY, tt = n.getContext("2d"), it = 4 * (i - 1), ft = tt.getImageData(0, 0, i, r), a = ft.data, rt = tt.getImageData(0, 0, u, f), et = rt.data, o = 0; o < f; o++)
                    for (s = 0; s < u; s++)
                        for (v = t(g * s), y = t(nt * o), h = g * s - v, c = nt * o - y, l = 4 * (y * i + v), e = 0; e < 4; e++) p = a[l + e], w = a[l + 4 + e], b = a[l + it + e], k = a[l + it + 4 + e], d = p * (1 - h) * (1 - c) + w * h * (1 - c) + b * c * (1 - h) + k * h * c, et[ut++] = d;
                return rt
            },
            hermiteFastResize: function(n, i, u, e, s) {
                for (var a, p, w, c, l, b = this.rcpScaleX, k = this.rcpScaleY, ht = f(b / 2), ct = f(k / 2), tt = n.getContext("2d"), lt = tt.getImageData(0, 0, i, u), v = lt.data, it = tt.getImageData(0, 0, e, s), d = it.data, y = 0; y < s; y++)
                    for (a = 0; a < e; a++) {
                        var g = (a + y * e) * 4,
                            h = 0,
                            nt = 0,
                            rt = 0,
                            ut = 0,
                            ft = 0,
                            et = 0,
                            ot = 0,
                            at = (y + .5) * k;
                        for (p = t(y * k); p < (y + 1) * k; p++) {
                            var st = r(at - (p + .5)) / ct,
                                vt = (a + .5) * b,
                                yt = st * st;
                            for (w = t(a * b); w < (a + 1) * b; w++)(c = r(vt - (w + .5)) / ht, l = o(yt + c * c), l > 1 && l < -1) || (h = 2 * l * l * l - 3 * l * l + 1, h > 0 && (c = 4 * (w + p * i), ot += h * v[c + 3], rt += h, v[c + 3] < 255 && (h = h * v[c + 3] / 250), ut += h * v[c], ft += h * v[c + 1], et += h * v[c + 2], nt += h))
                        }
                        d[g] = ut / nt;
                        d[g + 1] = ft / nt;
                        d[g + 2] = et / nt;
                        d[g + 3] = ot / rt
                    }
                return it
            },
            toObject: function() {
                return {
                    type: this.type,
                    scaleX: this.scaleX,
                    scaleY: this.scaleY,
                    resizeType: this.resizeType,
                    lanczosLobes: this.lanczosLobes
                }
            }
        });
        i.Image.filters.Resize.fromObject = function(n) {
            return new i.Image.filters.Resize(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.ColorMatrix = u(i.BaseFilter, {
            type: "ColorMatrix",
            initialize: function(n) {
                n || (n = {});
                this.matrix = n.matrix || [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0]
            },
            applyTo: function(n) {
                for (var s = n.getContext("2d"), h = s.getImageData(0, 0, n.width, n.height), r = h.data, c = r.length, u, f, e, o, t = this.matrix, i = 0; i < c; i += 4) u = r[i], f = r[i + 1], e = r[i + 2], o = r[i + 3], r[i] = u * t[0] + f * t[1] + e * t[2] + o * t[3] + t[4], r[i + 1] = u * t[5] + f * t[6] + e * t[7] + o * t[8] + t[9], r[i + 2] = u * t[10] + f * t[11] + e * t[12] + o * t[13] + t[14], r[i + 3] = u * t[15] + f * t[16] + e * t[17] + o * t[18] + t[19];
                s.putImageData(h, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    type: this.type,
                    matrix: this.matrix
                })
            }
        });
        t.Image.filters.ColorMatrix.fromObject = function(n) {
            return new t.Image.filters.ColorMatrix(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Contrast = u(i.BaseFilter, {
            type: "Contrast",
            initialize: function(n) {
                n = n || {};
                this.contrast = n.contrast || 0
            },
            applyTo: function(n) {
                for (var u = n.getContext("2d"), f = u.getImageData(0, 0, n.width, n.height), i = f.data, r = 259 * (this.contrast + 255) / (255 * (259 - this.contrast)), t = 0, e = i.length; t < e; t += 4) i[t] = r * (i[t] - 128) + 128, i[t + 1] = r * (i[t + 1] - 128) + 128, i[t + 2] = r * (i[t + 2] - 128) + 128;
                u.putImageData(f, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    contrast: this.contrast
                })
            }
        });
        t.Image.filters.Contrast.fromObject = function(n) {
            return new t.Image.filters.Contrast(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            r = t.util.object.extend,
            i = t.Image.filters,
            u = t.util.createClass;
        i.Saturate = u(i.BaseFilter, {
            type: "Saturate",
            initialize: function(n) {
                n = n || {};
                this.saturate = n.saturate || 0;
                this.loadProgram()
            },
            applyTo: function(n) {
                for (var f = n.getContext("2d"), e = f.getImageData(0, 0, n.width, n.height), i = e.data, r, u = -this.saturate * .01, t = 0, o = i.length; t < o; t += 4) r = Math.max(i[t], i[t + 1], i[t + 2]), i[t] += r !== i[t] ? (r - i[t]) * u : 0, i[t + 1] += r !== i[t + 1] ? (r - i[t + 1]) * u : 0, i[t + 2] += r !== i[t + 2] ? (r - i[t + 2]) * u : 0;
                f.putImageData(e, 0, 0)
            },
            toObject: function() {
                return r(this.callSuper("toObject"), {
                    saturate: this.saturate
                })
            }
        });
        t.Image.filters.Saturate.fromObject = function(n) {
            return new t.Image.filters.Saturate(n)
        }
    }(typeof exports != "undefined" ? exports : this),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            f = t.util.object.extend,
            e = t.util.object.clone,
            i = t.util.toFixed,
            r = t.Object.NUM_FRACTION_DIGITS,
            o = 2,
            u;
        if (t.Text) {
            t.warn("fabric.Text is already defined");
            return
        }
        u = t.Object.prototype.stateProperties.concat();
        u.push("fontFamily", "fontWeight", "fontSize", "text", "textDecoration", "textAlign", "fontStyle", "lineHeight", "textBackgroundColor");
        t.Text = t.util.createClass(t.Object, {
            _dimensionAffectingProps: {
                fontSize: !0,
                fontWeight: !0,
                fontFamily: !0,
                fontStyle: !0,
                lineHeight: !0,
                text: !0,
                charSpacing: !0,
                textAlign: !0,
                strokeWidth: !1
            },
            _reNewline: /\r?\n/,
            _reSpacesAndTabs: /[ \t\r]+/g,
            type: "text",
            fontSize: 40,
            fontWeight: "normal",
            fontFamily: "Times New Roman",
            textDecoration: "",
            textAlign: "left",
            fontStyle: "",
            lineHeight: 1.16,
            textBackgroundColor: "",
            stateProperties: u,
            stroke: null,
            shadow: null,
            _fontSizeFraction: .25,
            _fontSizeMult: 1.13,
            charSpacing: 0,
            initialize: function(n, t) {
                t = t || {};
                this.text = n;
                this.__skipDimension = !0;
                this.setOptions(t);
                this.__skipDimension = !1;
                this._initDimensions()
            },
            _initDimensions: function(n) {
                this.__skipDimension || (n || (n = t.util.createCanvasElement().getContext("2d"), this._setTextStyles(n)), this._textLines = this._splitTextIntoLines(), this._clearCache(), this.width = this._getTextWidth(n) || this.cursorWidth || o, this.height = this._getTextHeight(n))
            },
            toString: function() {
                return "#<fabric.Text (" + this.complexity() + '): { "text": "' + this.text + '", "fontFamily": "' + this.fontFamily + '" }>'
            },
            _render: function(n) {
                this.clipTo && t.util.clipContext(this, n);
                this._setOpacity(n);
                this._setShadow(n);
                this._setupCompositeOperation(n);
                this._renderTextBackground(n);
                this._setStrokeStyles(n);
                this._setFillStyles(n);
                this._renderText(n);
                this._renderTextDecoration(n);
                this.clipTo && n.restore()
            },
            _renderText: function(n) {
                this._renderTextFill(n);
                this._renderTextStroke(n)
            },
            _setTextStyles: function(n) {
                n.textBaseline = "alphabetic";
                n.font = this._getFontDeclaration()
            },
            _getTextHeight: function() {
                return this._getHeightOfSingleLine() + (this._textLines.length - 1) * this._getHeightOfLine()
            },
            _getTextWidth: function(n) {
                for (var r, t = this._getLineWidth(n, 0), i = 1, u = this._textLines.length; i < u; i++) r = this._getLineWidth(n, i), r > t && (t = r);
                return t
            },
            _getNonTransformedDimensions: function() {
                return {
                    x: this.width,
                    y: this.height
                }
            },
            _renderChars: function(n, t, i, r, u) {
                var f = n.slice(0, -4),
                    o, s, h, c, l, e, a;
                if (this[f].toLive && (h = -this.width / 2 + this[f].offsetX || 0, c = -this.height / 2 + this[f].offsetY || 0, t.save(), t.translate(h, c), r -= h, u -= c), this.charSpacing !== 0)
                    for (l = this._getWidthOfCharSpacing(), i = i.split(""), e = 0, a = i.length; e < a; e++) o = i[e], s = t.measureText(o).width + l, t[n](o, r, u), r += s > 0 ? s : 0;
                else t[n](i, r, u);
                this[f].toLive && t.restore()
            },
            _renderTextLine: function(n, t, i, r, u, f) {
                var c, h, v;
                if (u -= this.fontSize * this._fontSizeFraction, c = this._getLineWidth(t, f), this.textAlign !== "justify" || this.width < c) {
                    this._renderChars(n, t, i, r, u, f);
                    return
                }
                var o = i.split(/\s+/),
                    e = 0,
                    y = this._getWidthOfWords(t, o.join(""), f, 0),
                    p = this.width - y,
                    l = o.length - 1,
                    w = l > 0 ? p / l : 0,
                    a = 0,
                    s;
                for (h = 0, v = o.length; h < v; h++) {
                    while (i[e] === " " && e < i.length) e++;
                    s = o[h];
                    this._renderChars(n, t, s, r + a, u, f, e);
                    a += this._getWidthOfWords(t, s, f, e) + w;
                    e += s.length
                }
            },
            _getWidthOfWords: function(n, t) {
                var i = n.measureText(t).width,
                    r, u;
                return this.charSpacing !== 0 && (r = t.split("").length, u = r * this._getWidthOfCharSpacing(), i += u), i > 0 ? i : 0
            },
            _getLeftOffset: function() {
                return -this.width / 2
            },
            _getTopOffset: function() {
                return -this.height / 2
            },
            isEmptyStyles: function() {
                return !0
            },
            _renderTextCommon: function(n, t) {
                for (var r = 0, f = this._getLeftOffset(), e = this._getTopOffset(), i = 0, o = this._textLines.length; i < o; i++) {
                    var u = this._getHeightOfLine(n, i),
                        s = u / this.lineHeight,
                        h = this._getLineWidth(n, i),
                        c = this._getLineLeftOffset(h);
                    this._renderTextLine(t, n, this._textLines[i], f + c, e + r + s, i);
                    r += u
                }
            },
            _renderTextFill: function(n) {
                (this.fill || !this.isEmptyStyles()) && this._renderTextCommon(n, "fillText")
            },
            _renderTextStroke: function(n) {
                (this.stroke && this.strokeWidth !== 0 || !this.isEmptyStyles()) && (this.shadow && !this.shadow.affectStroke && this._removeShadow(n), n.save(), this._setLineDash(n, this.strokedashArray), n.beginPath(), this._renderTextCommon(n, "strokeText"), n.closePath(), n.restore())
            },
            _getHeightOfLine: function() {
                return this._getHeightOfSingleLine() * this.lineHeight
            },
            _getHeightOfSingleLine: function() {
                return this.fontSize * this._fontSizeMult
            },
            _renderTextBackground: function(n) {
                this._renderBackground(n);
                this._renderTextLinesBackground(n)
            },
            _renderTextLinesBackground: function(n) {
                var r, u, i, f, t, e;
                if (this.textBackgroundColor) {
                    for (r = 0, n.fillStyle = this.textBackgroundColor, t = 0, e = this._textLines.length; t < e; t++) u = this._getHeightOfLine(n, t), i = this._getLineWidth(n, t), i > 0 && (f = this._getLineLeftOffset(i), n.fillRect(this._getLeftOffset() + f, this._getTopOffset() + r, i, u / this.lineHeight)), r += u;
                    this._removeShadow(n)
                }
            },
            _getLineLeftOffset: function(n) {
                return this.textAlign === "center" ? (this.width - n) / 2 : this.textAlign === "right" ? this.width - n : 0
            },
            _clearCache: function() {
                this.__lineWidths = [];
                this.__lineHeights = []
            },
            _shouldClearCache: function() {
                var t = !1,
                    n;
                if (this._forceClearCache) return this._forceClearCache = !1, !0;
                for (n in this._dimensionAffectingProps) this["__" + n] !== this[n] && (this["__" + n] = this[n], t = !0);
                return t
            },
            _getLineWidth: function(n, t) {
                if (this.__lineWidths[t]) return this.__lineWidths[t] === -1 ? this.width : this.__lineWidths[t];
                var i, r, u = this._textLines[t];
                return i = u === "" ? 0 : this._measureLine(n, t), this.__lineWidths[t] = i, i && this.textAlign === "justify" && (r = u.split(/\s+/), r.length > 1 && (this.__lineWidths[t] = -1)), i
            },
            _getWidthOfCharSpacing: function() {
                return this.charSpacing !== 0 ? this.fontSize * this.charSpacing / 1e3 : 0
            },
            _measureLine: function(n, t) {
                var r = this._textLines[t],
                    e = n.measureText(r).width,
                    u = 0,
                    f, i;
                return this.charSpacing !== 0 && (f = r.split("").length, u = (f - 1) * this._getWidthOfCharSpacing()), i = e + u, i > 0 ? i : 0
            },
            _renderTextDecoration: function(n) {
                function u(i) {
                    for (var o = 0, f, h, e, c, l, u = 0, s = t._textLines.length; u < s; u++) {
                        for (e = t._getLineWidth(n, u), c = t._getLineLeftOffset(e), l = t._getHeightOfLine(n, u), f = 0, h = i.length; f < h; f++) n.fillRect(t._getLeftOffset() + c, o + (t._fontSizeMult - 1 + i[f]) * t.fontSize - r, e, t.fontSize / 15);
                        o += l
                    }
                }
                if (this.textDecoration) {
                    var r = this.height / 2,
                        t = this,
                        i = [];
                    this.textDecoration.indexOf("underline") > -1 && i.push(.85);
                    this.textDecoration.indexOf("line-through") > -1 && i.push(.43);
                    this.textDecoration.indexOf("overline") > -1 && i.push(-.12);
                    i.length > 0 && u(i)
                }
            },
            _getFontDeclaration: function() {
                return [t.isLikelyNode ? this.fontWeight : this.fontStyle, t.isLikelyNode ? this.fontStyle : this.fontWeight, this.fontSize + "px", t.isLikelyNode ? '"' + this.fontFamily + '"' : this.fontFamily].join(" ")
            },
            render: function(n, t) {
                this.visible && (n.save(), this._setTextStyles(n), this._shouldClearCache() && this._initDimensions(n), this.drawSelectionBackground(n), t || this.transform(n), this.transformMatrix && n.transform.apply(n, this.transformMatrix), this.group && this.group.type === "path-group" && n.translate(this.left, this.top), this._render(n), n.restore())
            },
            _splitTextIntoLines: function() {
                return this.text.split(this._reNewline)
            },
            toObject: function(n) {
                var t = f(this.callSuper("toObject", n), {
                    text: this.text,
                    fontSize: this.fontSize,
                    fontWeight: this.fontWeight,
                    fontFamily: this.fontFamily,
                    fontStyle: this.fontStyle,
                    lineHeight: this.lineHeight,
                    textDecoration: this.textDecoration,
                    textAlign: this.textAlign,
                    textBackgroundColor: this.textBackgroundColor,
                    charSpacing: this.charSpacing
                });
                return this.includeDefaultValues || this._removeDefaultValues(t), t
            },
            toSVG: function(n) {
                this.ctx || (this.ctx = t.util.createCanvasElement().getContext("2d"));
                var i = this._createBaseSVGMarkup(),
                    r = this._getSVGLeftTopOffsets(this.ctx),
                    u = this._getSVGTextAndBg(r.textTop, r.textLeft);
                return this._wrapSVGTextAndBg(i, u), n ? n(i.join("")) : i.join("")
            },
            _getSVGLeftTopOffsets: function(n) {
                var t = this._getHeightOfLine(n, 0),
                    i = -this.width / 2;
                return {
                    textLeft: i + (this.group && this.group.type === "path-group" ? this.left : 0),
                    textTop: 0 + (this.group && this.group.type === "path-group" ? -this.top : 0),
                    lineTop: t
                }
            },
            _wrapSVGTextAndBg: function(n, t) {
                var i = this.getSvgFilter(),
                    r = i === "" ? "" : ' style="' + i + '"';
                n.push("\t<g ", this.getSvgId(), 'transform="', this.getSvgTransform(), this.getSvgTransformMatrix(), '"', r, ">\n", t.textBgRects.join(""), "\t\t<text ", this.fontFamily ? 'font-family="' + this.fontFamily.replace(/"/g, "'") + '" ' : "", this.fontSize ? 'font-size="' + this.fontSize + '" ' : "", this.fontStyle ? 'font-style="' + this.fontStyle + '" ' : "", this.fontWeight ? 'font-weight="' + this.fontWeight + '" ' : "", this.textDecoration ? 'text-decoration="' + this.textDecoration + '" ' : "", 'style="', this.getSvgStyles(!0), '" >\n', t.textSpans.join(""), "\t\t<\/text>\n", "\t<\/g>\n")
            },
            _getSVGTextAndBg: function(n, t) {
                var f = [],
                    r = [],
                    u = 0,
                    i, e;
                for (this._setSVGBg(r), i = 0, e = this._textLines.length; i < e; i++) this.textBackgroundColor && this._setSVGTextLineBg(r, i, t, n, u), this._setSVGTextLineText(i, f, u, t, n, r), u += this._getHeightOfLine(this.ctx, i);
                return {
                    textSpans: f,
                    textBgRects: r
                }
            },
            _setSVGTextLineText: function(n, u, f, e, o) {
                var s = this.fontSize * (this._fontSizeMult - this._fontSizeFraction) - o + f - this.height / 2;
                if (this.textAlign === "justify") {
                    this._setSVGTextLineJustifed(n, u, s, e);
                    return
                }
                u.push('\t\t\t<tspan x="', i(e + this._getLineLeftOffset(this._getLineWidth(this.ctx, n)), r), '" ', 'y="', i(s, r), '" ', this._getFillAttributes(this.fill), ">", t.util.string.escapeXml(this._textLines[n]), "<\/tspan>\n")
            },
            _setSVGTextLineJustifed: function(n, u, f, e) {
                var o = t.util.createCanvasElement().getContext("2d");
                this._setTextStyles(o);
                var a = this._textLines[n],
                    s = a.split(/\s+/),
                    v = this._getWidthOfWords(o, s.join("")),
                    y = this.width - v,
                    c = s.length - 1,
                    p = c > 0 ? y / c : 0,
                    h, w = this._getFillAttributes(this.fill),
                    l;
                for (e += this._getLineLeftOffset(this._getLineWidth(o, n)), n = 0, l = s.length; n < l; n++) h = s[n], u.push('\t\t\t<tspan x="', i(e, r), '" ', 'y="', i(f, r), '" ', w, ">", t.util.string.escapeXml(h), "<\/tspan>\n"), e += this._getWidthOfWords(o, h) + p
            },
            _setSVGTextLineBg: function(n, t, u, f, e) {
                n.push("\t\t<rect ", this._getFillAttributes(this.textBackgroundColor), ' x="', i(u + this._getLineLeftOffset(this._getLineWidth(this.ctx, t)), r), '" y="', i(e - this.height / 2, r), '" width="', i(this._getLineWidth(this.ctx, t), r), '" height="', i(this._getHeightOfLine(this.ctx, t) / this.lineHeight, r), '"><\/rect>\n')
            },
            _setSVGBg: function(n) {
                this.backgroundColor && n.push("\t\t<rect ", this._getFillAttributes(this.backgroundColor), ' x="', i(-this.width / 2, r), '" y="', i(-this.height / 2, r), '" width="', i(this.width, r), '" height="', i(this.height, r), '"><\/rect>\n')
            },
            _getFillAttributes: function(n) {
                var i = n && typeof n == "string" ? new t.Color(n) : "";
                return !i || !i.getSource() || i.getAlpha() === 1 ? 'fill="' + n + '"' : 'opacity="' + i.getAlpha() + '" fill="' + i.setAlpha(1).toRgb() + '"'
            },
            _set: function(n, t) {
                this.callSuper("_set", n, t);
                n in this._dimensionAffectingProps && (this._initDimensions(), this.setCoords())
            },
            complexity: function() {
                return 1
            }
        });
        t.Text.ATTRIBUTE_NAMES = t.SHARED_ATTRIBUTES.concat("x y dx dy font-family font-style font-weight font-size text-decoration text-anchor".split(" "));
        t.Text.DEFAULT_SVG_FONT_SIZE = 16;
        t.Text.fromElement = function(n, i) {
            var u, f;
            if (!n) return null;
            u = t.parseAttributes(n, t.Text.ATTRIBUTE_NAMES);
            i = t.util.object.extend(i ? t.util.object.clone(i) : {}, u);
            i.top = i.top || 0;
            i.left = i.left || 0;
            "dx" in u && (i.left += u.dx);
            "dy" in u && (i.top += u.dy);
            "fontSize" in i || (i.fontSize = t.Text.DEFAULT_SVG_FONT_SIZE);
            i.originX || (i.originX = "left");
            f = "";
            "textContent" in n ? f = n.textContent : "firstChild" in n && n.firstChild !== null && "data" in n.firstChild && n.firstChild.data !== null && (f = n.firstChild.data);
            f = f.replace(/^\s+|\s+$|\n+/g, "").replace(/\s+/g, " ");
            var r = new t.Text(f, i),
                o = r.getHeight() / r.height,
                s = (r.height + r.strokeWidth) * r.lineHeight - r.height,
                h = s * o,
                c = r.getHeight() + h,
                e = 0;
            return r.originX === "left" && (e = r.getWidth() / 2), r.originX === "right" && (e = -r.getWidth() / 2), r.set({
                left: r.getLeft() + e,
                top: r.getTop() - c / 2 + r.fontSize * (.18 + r._fontSizeFraction) / r.lineHeight
            }), r
        };
        t.Text.fromObject = function(n, i) {
            var r = new t.Text(n.text, e(n));
            return i && i(r), r
        };
        t.util.createAccessors(t.Text)
    }(typeof exports != "undefined" ? exports : this),
    function() {
        var n = fabric.util.object.clone;
        fabric.IText = fabric.util.createClass(fabric.Text, fabric.Observable, {
            type: "i-text",
            selectionStart: 0,
            selectionEnd: 0,
            selectionColor: "rgba(17,119,255,0.3)",
            isEditing: !1,
            editable: !0,
            editingBorderColor: "rgba(102,153,255,0.25)",
            cursorWidth: 2,
            cursorColor: "#333",
            cursorDelay: 1e3,
            cursorDuration: 600,
            styles: null,
            caching: !0,
            _reSpace: /\s|\n/,
            _currentCursorOpacity: 0,
            _selectionDirection: null,
            _abortCursorAnimation: !1,
            __widthOfSpace: [],
            initialize: function(n, t) {
                this.styles = t ? t.styles || {} : {};
                this.callSuper("initialize", n, t);
                this.initBehavior()
            },
            _clearCache: function() {
                this.callSuper("_clearCache");
                this.__widthOfSpace = []
            },
            isEmptyStyles: function() {
                var n, t, i, r;
                if (!this.styles) return !0;
                n = this.styles;
                for (t in n)
                    for (i in n[t])
                        for (r in n[t][i]) return !1;
                return !0
            },
            setSelectionStart: function(n) {
                n = Math.max(n, 0);
                this._updateAndFire("selectionStart", n)
            },
            setSelectionEnd: function(n) {
                n = Math.min(n, this.text.length);
                this._updateAndFire("selectionEnd", n)
            },
            _updateAndFire: function(n, t) {
                this[n] !== t && (this._fireSelectionChanged(), this[n] = t);
                this._updateTextarea()
            },
            _fireSelectionChanged: function() {
                this.fire("selection:changed");
                this.canvas && this.canvas.fire("text:selection:changed", {
                    target: this
                })
            },
            getSelectionStyles: function(n, t) {
                var r, i, u, f;
                if (arguments.length === 2) {
                    for (r = [], i = n; i < t; i++) r.push(this.getSelectionStyles(i));
                    return r
                }
                return u = this.get2DCursorLocation(n), f = this._getStyleDeclaration(u.lineIndex, u.charIndex), f || {}
            },
            setSelectionStyles: function(n) {
                if (this.selectionStart === this.selectionEnd) this._extendStyles(this.selectionStart, n);
                else
                    for (var t = this.selectionStart; t < this.selectionEnd; t++) this._extendStyles(t, n);
                return this._forceClearCache = !0, this
            },
            _extendStyles: function(n, t) {
                var i = this.get2DCursorLocation(n);
                this._getLineStyle(i.lineIndex) || this._setLineStyle(i.lineIndex, {});
                this._getStyleDeclaration(i.lineIndex, i.charIndex) || this._setStyleDeclaration(i.lineIndex, i.charIndex, {});
                fabric.util.object.extend(this._getStyleDeclaration(i.lineIndex, i.charIndex), t)
            },
            _render: function(n) {
                this.oldWidth = this.width;
                this.oldHeight = this.height;
                this.callSuper("_render", n);
                this.ctx = n;
                this.cursorOffsetCache = {};
                this.renderCursorOrSelection()
            },
            renderCursorOrSelection: function() {
                if (this.active && this.isEditing) {
                    var i = this.text.split(""),
                        t, n;
                    this.canvas.contextTop ? (n = this.canvas.contextTop, n.save(), n.transform.apply(n, this.canvas.viewportTransform), this.transform(n), this.transformMatrix && n.transform.apply(n, this.transformMatrix), this._clearTextArea(n)) : (n = this.ctx, n.save());
                    this.selectionStart === this.selectionEnd ? (t = this._getCursorBoundaries(i, "cursor"), this.renderCursor(t, n)) : (t = this._getCursorBoundaries(i, "selection"), this.renderSelection(i, t, n));
                    n.restore()
                }
            },
            _clearTextArea: function(n) {
                var t = this.oldWidth + 4,
                    i = this.oldHeight + 4;
                n.clearRect(-t / 2, -i / 2, t, i)
            },
            get2DCursorLocation: function(n) {
                var i, t;
                for (typeof n == "undefined" && (n = this.selectionStart), i = this._textLines.length, t = 0; t < i; t++) {
                    if (n <= this._textLines[t].length) return {
                        lineIndex: t,
                        charIndex: n
                    };
                    n -= this._textLines[t].length + 1
                }
                return {
                    lineIndex: t - 1,
                    charIndex: this._textLines[t - 1].length < n ? this._textLines[t - 1].length : n
                }
            },
            getCurrentCharStyle: function(n, t) {
                var i = this._getStyleDeclaration(n, t === 0 ? 0 : t - 1);
                return {
                    fontSize: i && i.fontSize || this.fontSize,
                    fill: i && i.fill || this.fill,
                    textBackgroundColor: i && i.textBackgroundColor || this.textBackgroundColor,
                    textDecoration: i && i.textDecoration || this.textDecoration,
                    fontFamily: i && i.fontFamily || this.fontFamily,
                    fontWeight: i && i.fontWeight || this.fontWeight,
                    fontStyle: i && i.fontStyle || this.fontStyle,
                    stroke: i && i.stroke || this.stroke,
                    strokeWidth: i && i.strokeWidth || this.strokeWidth
                }
            },
            getCurrentCharFontSize: function(n, t) {
                var i = this._getStyleDeclaration(n, t === 0 ? 0 : t - 1);
                return i && i.fontSize ? i.fontSize : this.fontSize
            },
            getCurrentCharColor: function(n, t) {
                var i = this._getStyleDeclaration(n, t === 0 ? 0 : t - 1);
                return i && i.fill ? i.fill : this.cursorColor
            },
            _getCursorBoundaries: function(n, t) {
                var r = Math.round(this._getLeftOffset()),
                    u = this._getTopOffset(),
                    i = this._getCursorBoundariesOffsets(n, t);
                return {
                    left: r,
                    top: u,
                    leftOffset: i.left + i.lineLeft,
                    topOffset: i.top
                }
            },
            _getCursorBoundariesOffsets: function(n, t) {
                var f;
                if (this.cursorOffsetCache && "top" in this.cursorOffsetCache) return this.cursorOffsetCache;
                var o = 0,
                    i = 0,
                    r = 0,
                    e = 0,
                    u = 0,
                    s;
                for (f = 0; f < this.selectionStart; f++) n[f] === "\n" ? (u = 0, e += this._getHeightOfLine(this.ctx, i), i++, r = 0) : (u += this._getWidthOfChar(this.ctx, n[f], i, r), r++), o = this._getLineLeftOffset(this._getLineWidth(this.ctx, i));
                return t === "cursor" && (e += (1 - this._fontSizeFraction) * this._getHeightOfLine(this.ctx, i) / this.lineHeight - this.getCurrentCharFontSize(i, r) * (1 - this._fontSizeFraction)), this.charSpacing !== 0 && r === this._textLines[i].length && (u -= this._getWidthOfCharSpacing()), s = {
                    top: e,
                    left: u > 0 ? u : 0,
                    lineLeft: o
                }, this.cursorOffsetCache = s, this.cursorOffsetCache
            },
            renderCursor: function(n, t) {
                var u = this.get2DCursorLocation(),
                    i = u.lineIndex,
                    r = u.charIndex,
                    e = this.getCurrentCharFontSize(i, r),
                    o = i === 0 && r === 0 ? this._getLineLeftOffset(this._getLineWidth(t, i)) : n.leftOffset,
                    s = this.scaleX * this.canvas.getZoom(),
                    f = this.cursorWidth / s;
                t.fillStyle = this.getCurrentCharColor(i, r);
                t.globalAlpha = this.__isMousedown ? 1 : this._currentCursorOpacity;
                t.fillRect(n.left + o - f / 2, n.top + n.topOffset, f, e)
            },
            renderSelection: function(n, t, i) {
                var r, u, p, s, w;
                i.fillStyle = this.selectionColor;
                var c = this.get2DCursorLocation(this.selectionStart),
                    h = this.get2DCursorLocation(this.selectionEnd),
                    l = c.lineIndex,
                    o = h.lineIndex;
                for (r = l; r <= o; r++) {
                    var v = this._getLineLeftOffset(this._getLineWidth(i, r)) || 0,
                        a = this._getHeightOfLine(this.ctx, r),
                        y = 0,
                        f = 0,
                        e = this._textLines[r];
                    if (r === l) {
                        for (u = 0, p = e.length; u < p; u++) u >= c.charIndex && (r !== o || u < h.charIndex) && (f += this._getWidthOfChar(i, e[u], r, u)), u < c.charIndex && (v += this._getWidthOfChar(i, e[u], r, u));
                        u === e.length && (f -= this._getWidthOfCharSpacing())
                    } else if (r > l && r < o) f += this._getLineWidth(i, r) || 5;
                    else if (r === o) {
                        for (s = 0, w = h.charIndex; s < w; s++) f += this._getWidthOfChar(i, e[s], r, s);
                        h.charIndex === e.length && (f -= this._getWidthOfCharSpacing())
                    }
                    y = a;
                    (this.lineHeight < 1 || r === o && this.lineHeight > 1) && (a /= this.lineHeight);
                    i.fillRect(t.left + v, t.top + t.topOffset, f > 0 ? f : 0, a);
                    t.topOffset += y
                }
            },
            _renderChars: function(n, t, i, r, u, f, e) {
                var c, s, l, h, o, a;
                if (this.isEmptyStyles()) return this._renderCharsFast(n, t, i, r, u);
                for (e = e || 0, c = this._getHeightOfLine(t, f), h = "", t.save(), u -= c / this.lineHeight * this._fontSizeFraction, o = e, a = i.length + e; o <= a; o++) s = s || this.getCurrentCharStyle(f, o), l = this.getCurrentCharStyle(f, o + 1), (this._hasStyleChanged(s, l) || o === a) && (this._renderChar(n, t, f, o - 1, h, r, u, c), h = "", s = l), h += i[o - e];
                t.restore()
            },
            _renderCharsFast: function(n, t, i, r, u) {
                n === "fillText" && this.fill && this.callSuper("_renderChars", n, t, i, r, u);
                n === "strokeText" && (this.stroke && this.strokeWidth > 0 || this.skipFillStrokeCheck) && this.callSuper("_renderChars", n, t, i, r, u)
            },
            _renderChar: function(n, t, i, r, u, f, e, o) {
                var h, p, l, a, s = this._getStyleDeclaration(i, r),
                    k, c, w, d, b, v, g, y;
                if (s ? (p = this._getHeightOfChar(t, u, i, r), a = s.stroke, l = s.fill, c = s.textDecoration) : p = this.fontSize, a = (a || this.stroke) && n === "strokeText", l = (l || this.fill) && n === "fillText", s && t.save(), h = this._applyCharStylesGetWidth(t, u, i, r, s || null), c = c || this.textDecoration, s && s.textBackgroundColor && this._removeShadow(t), this.charSpacing !== 0)
                    for (d = this._getWidthOfCharSpacing(), w = u.split(""), h = 0, v = 0, g = w.length; v < g; v++) y = w[v], l && t.fillText(y, f + h, e), a && t.strokeText(y, f + h, e), b = t.measureText(y).width + d, h += b > 0 ? b : 0;
                else l && t.fillText(u, f, e), a && t.strokeText(u, f, e);
                (c || c !== "") && (k = this._fontSizeFraction * o / this.lineHeight, this._renderCharDecoration(t, c, f, e, k, h, p));
                s && t.restore();
                t.translate(h, 0)
            },
            _hasStyleChanged: function(n, t) {
                return n.fill !== t.fill || n.fontSize !== t.fontSize || n.textBackgroundColor !== t.textBackgroundColor || n.textDecoration !== t.textDecoration || n.fontFamily !== t.fontFamily || n.fontWeight !== t.fontWeight || n.fontStyle !== t.fontStyle || n.stroke !== t.stroke || n.strokeWidth !== t.strokeWidth
            },
            _renderCharDecoration: function(n, t, i, r, u, f, e) {
                if (t)
                    for (var h = e / 15, l = {
                            underline: r + e / 10,
                            "line-through": r - e * (this._fontSizeFraction + this._fontSizeMult - 1) + h,
                            overline: r - (this._fontSizeMult - this._fontSizeFraction) * e
                        }, c = ["underline", "line-through", "overline"], s, o = 0; o < c.length; o++) s = c[o], t.indexOf(s) > -1 && n.fillRect(i, l[s], f, h)
            },
            _renderTextLine: function(n, t, i, r, u, f) {
                this.isEmptyStyles() || (u += this.fontSize * (this._fontSizeFraction + .03));
                this.callSuper("_renderTextLine", n, t, i, r, u, f)
            },
            _renderTextDecoration: function(n) {
                if (this.isEmptyStyles()) return this.callSuper("_renderTextDecoration", n)
            },
            _renderTextLinesBackground: function(n) {
                var t, c, i, l;
                this.callSuper("_renderTextLinesBackground", n);
                var e = 0,
                    r, o, s, a = this._getLeftOffset(),
                    v = this._getTopOffset(),
                    u, h, f;
                for (t = 0, c = this._textLines.length; t < c; t++) {
                    if (r = this._getHeightOfLine(n, t), u = this._textLines[t], u === "" || !this.styles || !this._getLineStyle(t)) {
                        e += r;
                        continue
                    }
                    for (o = this._getLineWidth(n, t), s = this._getLineLeftOffset(o), i = 0, l = u.length; i < l; i++)(f = this._getStyleDeclaration(t, i), f && f.textBackgroundColor) && (h = u[i], n.fillStyle = f.textBackgroundColor, n.fillRect(a + s + this._getWidthOfCharsAt(n, t, i), v + e, this._getWidthOfChar(n, h, t, i) + 1, r / this.lineHeight));
                    e += r
                }
            },
            _getCacheProp: function(n, t) {
                return n + t.fontSize + t.fontWeight + t.fontStyle
            },
            _getFontCache: function(n) {
                return fabric.charWidthsCache[n] || (fabric.charWidthsCache[n] = {}), fabric.charWidthsCache[n]
            },
            _applyCharStylesGetWidth: function(t, i, r, u, f) {
                var l = f || this._getStyleDeclaration(r, u),
                    e = n(l),
                    c, o, s, h;
                return (this._applyFontStyles(e), s = this._getFontCache(e.fontFamily), o = this._getCacheProp(i, e), !l && s[o] && this.caching) ? s[o] : (typeof e.shadow == "string" && (e.shadow = new fabric.Shadow(e.shadow)), h = e.fill || this.fill, t.fillStyle = h.toLive ? h.toLive(t, this) : h, e.stroke && (t.strokeStyle = e.stroke && e.stroke.toLive ? e.stroke.toLive(t, this) : e.stroke), t.lineWidth = e.strokeWidth || this.strokeWidth, t.font = this._getFontDeclaration.call(e), e.shadow && (e.scaleX = this.scaleX, e.scaleY = this.scaleY, e.canvas = this.canvas, e.getObjectScaling = this.getObjectScaling, this._setShadow.call(e, t)), !this.caching || !s[o]) ? (c = t.measureText(i).width, this.caching && (s[o] = c), c) : s[o]
            },
            _applyFontStyles: function(n) {
                n.fontFamily || (n.fontFamily = this.fontFamily);
                n.fontSize || (n.fontSize = this.fontSize);
                n.fontWeight || (n.fontWeight = this.fontWeight);
                n.fontStyle || (n.fontStyle = this.fontStyle)
            },
            _getStyleDeclaration: function(t, i, r) {
                return r ? this.styles[t] && this.styles[t][i] ? n(this.styles[t][i]) : {} : this.styles[t] && this.styles[t][i] ? this.styles[t][i] : null
            },
            _setStyleDeclaration: function(n, t, i) {
                this.styles[n][t] = i
            },
            _deleteStyleDeclaration: function(n, t) {
                delete this.styles[n][t]
            },
            _getLineStyle: function(n) {
                return this.styles[n]
            },
            _setLineStyle: function(n, t) {
                this.styles[n] = t
            },
            _deleteLineStyle: function(n) {
                delete this.styles[n]
            },
            _getWidthOfChar: function(n, t, i, r) {
                if (!this._isMeasuring && this.textAlign === "justify" && this._reSpacesAndTabs.test(t)) return this._getWidthOfSpace(n, i);
                n.save();
                var u = this._applyCharStylesGetWidth(n, t, i, r);
                return this.charSpacing !== 0 && (u += this._getWidthOfCharSpacing()), n.restore(), u > 0 ? u : 0
            },
            _getHeightOfChar: function(n, t, i) {
                var r = this._getStyleDeclaration(t, i);
                return r && r.fontSize ? r.fontSize : this.fontSize
            },
            _getWidthOfCharsAt: function(n, t, i) {
                for (var u = 0, f, r = 0; r < i; r++) f = this._textLines[t][r], u += this._getWidthOfChar(n, f, t, r);
                return u
            },
            _measureLine: function(n, t) {
                this._isMeasuring = !0;
                var i = this._getWidthOfCharsAt(n, t, this._textLines[t].length);
                return this.charSpacing !== 0 && (i -= this._getWidthOfCharSpacing()), this._isMeasuring = !1, i > 0 ? i : 0
            },
            _getWidthOfSpace: function(n, t) {
                if (this.__widthOfSpace[t]) return this.__widthOfSpace[t];
                var i = this._textLines[t],
                    u = this._getWidthOfWords(n, i, t, 0),
                    f = this.width - u,
                    e = i.length - i.replace(this._reSpacesAndTabs, "").length,
                    r = Math.max(f / e, n.measureText(" ").width);
                return this.__widthOfSpace[t] = r, r
            },
            _getWidthOfWords: function(n, t, i, r) {
                for (var f, e = 0, u = 0; u < t.length; u++) f = t[u], f.match(/\s/) || (e += this._getWidthOfChar(n, f, i, u + r));
                return e
            },
            _getHeightOfLine: function(n, t) {
                var f, i, r, e, u;
                if (this.__lineHeights[t]) return this.__lineHeights[t];
                for (f = this._textLines[t], i = this._getHeightOfChar(n, t, 0), r = 1, e = f.length; r < e; r++) u = this._getHeightOfChar(n, t, r), u > i && (i = u);
                return this.__lineHeights[t] = i * this.lineHeight * this._fontSizeMult, this.__lineHeights[t]
            },
            _getTextHeight: function(n) {
                for (var i, r = 0, t = 0, u = this._textLines.length; t < u; t++) i = this._getHeightOfLine(n, t), r += t === u - 1 ? i / this.lineHeight : i;
                return r
            },
            toObject: function(t) {
                var r = {},
                    i, u, f;
                for (i in this.styles) {
                    f = this.styles[i];
                    r[i] = {};
                    for (u in f) r[i][u] = n(f[u])
                }
                return fabric.util.object.extend(this.callSuper("toObject", t), {
                    styles: r
                })
            }
        });
        fabric.IText.fromObject = function(t, i) {
            var r = new fabric.IText(t.text, n(t));
            return i && i(r), r
        }
    }(),
    function() {
        var n = fabric.util.object.clone;
        fabric.util.object.extend(fabric.IText.prototype, {
            initBehavior: function() {
                this.initAddedHandler();
                this.initRemovedHandler();
                this.initCursorSelectionHandlers();
                this.initDoubleClickSimulation();
                this.mouseMoveHandler = this.mouseMoveHandler.bind(this)
            },
            initSelectedHandler: function() {
                this.on("selected", function() {
                    var n = this;
                    setTimeout(function() {
                        n.selected = !0
                    }, 100)
                })
            },
            initAddedHandler: function() {
                var n = this;
                this.on("added", function() {
                    var t = n.canvas;
                    t && (t._hasITextHandlers || (t._hasITextHandlers = !0, n._initCanvasHandlers(t)), t._iTextInstances = t._iTextInstances || [], t._iTextInstances.push(n))
                })
            },
            initRemovedHandler: function() {
                var n = this;
                this.on("removed", function() {
                    var t = n.canvas;
                    t && (t._iTextInstances = t._iTextInstances || [], fabric.util.removeFromArray(t._iTextInstances, n), t._iTextInstances.length === 0 && (t._hasITextHandlers = !1, n._removeCanvasHandlers(t)))
                })
            },
            _initCanvasHandlers: function(n) {
                n._canvasITextSelectionClearedHanlder = function() {
                    fabric.IText.prototype.exitEditingOnOthers(n)
                }.bind(this);
                n._mouseUpITextHandler = function() {
                    n._iTextInstances && n._iTextInstances.forEach(function(n) {
                        n.__isMousedown = !1
                    })
                }.bind(this);
                n.on("selection:cleared", n._canvasITextSelectionClearedHanlder);
                n.on("object:selected", n._canvasITextSelectionClearedHanlder);
                n.on("mouse:up", n._mouseUpITextHandler)
            },
            _removeCanvasHandlers: function(n) {
                n.off("selection:cleared", n._canvasITextSelectionClearedHanlder);
                n.off("object:selected", n._canvasITextSelectionClearedHanlder);
                n.off("mouse:up", n._mouseUpITextHandler)
            },
            _tick: function() {
                this._currentTickState = this._animateCursor(this, 1, this.cursorDuration, "_onTickComplete")
            },
            _animateCursor: function(n, t, i, r) {
                var u;
                return u = {
                    isAborted: !1,
                    abort: function() {
                        this.isAborted = !0
                    }
                }, n.animate("_currentCursorOpacity", t, {
                    duration: i,
                    onComplete: function() {
                        u.isAborted || n[r]()
                    },
                    onChange: function() {
                        n.canvas && n.selectionStart === n.selectionEnd && n.renderCursorOrSelection()
                    },
                    abort: function() {
                        return u.isAborted
                    }
                }), u
            },
            _onTickComplete: function() {
                var n = this;
                this._cursorTimeout1 && clearTimeout(this._cursorTimeout1);
                this._cursorTimeout1 = setTimeout(function() {
                    n._currentTickCompleteState = n._animateCursor(n, 0, this.cursorDuration / 2, "_tick")
                }, 100)
            },
            initDelayedCursor: function(n) {
                var t = this,
                    i = n ? 0 : this.cursorDelay;
                this.abortCursorAnimation();
                this._currentCursorOpacity = 1;
                this._cursorTimeout2 = setTimeout(function() {
                    t._tick()
                }, i)
            },
            abortCursorAnimation: function() {
                var n = this._currentTickState || this._currentTickCompleteState;
                this._currentTickState && this._currentTickState.abort();
                this._currentTickCompleteState && this._currentTickCompleteState.abort();
                clearTimeout(this._cursorTimeout1);
                clearTimeout(this._cursorTimeout2);
                this._currentCursorOpacity = 0;
                n && this.canvas && this.canvas.clearContext(this.canvas.contextTop || this.ctx)
            },
            selectAll: function() {
                this.selectionStart = 0;
                this.selectionEnd = this.text.length;
                this._fireSelectionChanged();
                this._updateTextarea()
            },
            getSelectedText: function() {
                return this.text.slice(this.selectionStart, this.selectionEnd)
            },
            findWordBoundaryLeft: function(n) {
                var i = 0,
                    t = n - 1;
                if (this._reSpace.test(this.text.charAt(t)))
                    while (this._reSpace.test(this.text.charAt(t))) i++, t--;
                while (/\S/.test(this.text.charAt(t)) && t > -1) i++, t--;
                return n - i
            },
            findWordBoundaryRight: function(n) {
                var i = 0,
                    t = n;
                if (this._reSpace.test(this.text.charAt(t)))
                    while (this._reSpace.test(this.text.charAt(t))) i++, t++;
                while (/\S/.test(this.text.charAt(t)) && t < this.text.length) i++, t++;
                return n + i
            },
            findLineBoundaryLeft: function(n) {
                for (var i = 0, t = n - 1; !/\n/.test(this.text.charAt(t)) && t > -1;) i++, t--;
                return n - i
            },
            findLineBoundaryRight: function(n) {
                for (var i = 0, t = n; !/\n/.test(this.text.charAt(t)) && t < this.text.length;) i++, t++;
                return n + i
            },
            getNumNewLinesInSelectedText: function() {
                for (var t = this.getSelectedText(), i = 0, n = 0, r = t.length; n < r; n++) t[n] === "\n" && i++;
                return i
            },
            searchWordBoundary: function(n, t) {
                for (var i = this._reSpace.test(this.text.charAt(n)) ? n - 1 : n, r = this.text.charAt(i), u = /[ \n\.,;!\?\-]/; !u.test(r) && i > 0 && i < this.text.length;) i += t, r = this.text.charAt(i);
                return u.test(r) && r !== "\n" && (i += t === 1 ? 0 : 1), i
            },
            selectWord: function(n) {
                n = n || this.selectionStart;
                var t = this.searchWordBoundary(n, -1),
                    i = this.searchWordBoundary(n, 1);
                this.selectionStart = t;
                this.selectionEnd = i;
                this._fireSelectionChanged();
                this._updateTextarea();
                this.renderCursorOrSelection()
            },
            selectLine: function(n) {
                n = n || this.selectionStart;
                var t = this.findLineBoundaryLeft(n),
                    i = this.findLineBoundaryRight(n);
                this.selectionStart = t;
                this.selectionEnd = i;
                this._fireSelectionChanged();
                this._updateTextarea()
            },
            enterEditing: function(n) {
                if (!this.isEditing && this.editable) return (this.canvas && this.exitEditingOnOthers(this.canvas), this.isEditing = !0, this.initHiddenTextarea(n), this.hiddenTextarea.focus(), this._updateTextarea(), this._saveEditingProps(), this._setEditingProps(), this._textBeforeEdit = this.text, this._tick(), this.fire("editing:entered"), !this.canvas) ? this : (this.canvas.fire("text:editing:entered", {
                    target: this
                }), this.initMouseMoveHandler(), this.canvas.renderAll(), this)
            },
            exitEditingOnOthers: function(n) {
                n._iTextInstances && n._iTextInstances.forEach(function(n) {
                    n.selected = !1;
                    n.isEditing && n.exitEditing()
                })
            },
            initMouseMoveHandler: function() {
                this.canvas.on("mouse:move", this.mouseMoveHandler)
            },
            mouseMoveHandler: function(n) {
                if (this.__isMousedown && this.isEditing) {
                    var t = this.getSelectionStartFromPointer(n.e),
                        i = this.selectionStart,
                        r = this.selectionEnd;
                    t !== this.__selectionStartOnMouseDown && (t > this.__selectionStartOnMouseDown ? (this.selectionStart = this.__selectionStartOnMouseDown, this.selectionEnd = t) : (this.selectionStart = t, this.selectionEnd = this.__selectionStartOnMouseDown), (this.selectionStart !== i || this.selectionEnd !== r) && (this._fireSelectionChanged(), this._updateTextarea(), this.renderCursorOrSelection()))
                }
            },
            _setEditingProps: function() {
                this.hoverCursor = "text";
                this.canvas && (this.canvas.defaultCursor = this.canvas.moveCursor = "text");
                this.borderColor = this.editingBorderColor;
                this.hasControls = this.selectable = !1;
                this.lockMovementX = this.lockMovementY = !0
            },
            _updateTextarea: function() {
                if (this.hiddenTextarea && !this.inCompositionMode && (this.cursorOffsetCache = {}, this.hiddenTextarea.value = this.text, this.hiddenTextarea.selectionStart = this.selectionStart, this.hiddenTextarea.selectionEnd = this.selectionEnd, this.selectionStart === this.selectionEnd)) {
                    var n = this._calcTextareaPosition();
                    this.hiddenTextarea.style.left = n.left;
                    this.hiddenTextarea.style.top = n.top;
                    this.hiddenTextarea.style.fontSize = n.fontSize
                }
            },
            _calcTextareaPosition: function() {
                if (!this.canvas) return {
                    x: 1,
                    y: 1
                };
                var h = this.text.split(""),
                    t = this._getCursorBoundaries(h, "cursor"),
                    u = this.get2DCursorLocation(),
                    r = u.lineIndex,
                    f = u.charIndex,
                    i = this.getCurrentCharFontSize(r, f),
                    c = r === 0 && f === 0 ? this._getLineLeftOffset(this._getLineWidth(this.ctx, r)) : t.leftOffset,
                    l = this.calcTransformMatrix(),
                    n = {
                        x: t.left + c,
                        y: t.top + t.topOffset + i
                    },
                    e = this.canvas.upperCanvasEl,
                    o = e.width - i,
                    s = e.height - i;
                return n = fabric.util.transformPoint(n, l), n = fabric.util.transformPoint(n, this.canvas.viewportTransform), n.x < 0 && (n.x = 0), n.x > o && (n.x = o), n.y < 0 && (n.y = 0), n.y > s && (n.y = s), n.x += this.canvas._offset.left, n.y += this.canvas._offset.top, {
                    left: n.x + "px",
                    top: n.y + "px",
                    fontSize: i
                }
            },
            _saveEditingProps: function() {
                this._savedProps = {
                    hasControls: this.hasControls,
                    borderColor: this.borderColor,
                    lockMovementX: this.lockMovementX,
                    lockMovementY: this.lockMovementY,
                    hoverCursor: this.hoverCursor,
                    defaultCursor: this.canvas && this.canvas.defaultCursor,
                    moveCursor: this.canvas && this.canvas.moveCursor
                }
            },
            _restoreEditingProps: function() {
                this._savedProps && (this.hoverCursor = this._savedProps.overCursor, this.hasControls = this._savedProps.hasControls, this.borderColor = this._savedProps.borderColor, this.lockMovementX = this._savedProps.lockMovementX, this.lockMovementY = this._savedProps.lockMovementY, this.canvas && (this.canvas.defaultCursor = this._savedProps.defaultCursor, this.canvas.moveCursor = this._savedProps.moveCursor))
            },
            exitEditing: function() {
                var n = this._textBeforeEdit !== this.text;
                return this.selected = !1, this.isEditing = !1, this.selectable = !0, this.selectionEnd = this.selectionStart, this.hiddenTextarea && this.canvas && this.hiddenTextarea.parentNode.removeChild(this.hiddenTextarea), this.hiddenTextarea = null, this.abortCursorAnimation(), this._restoreEditingProps(), this._currentCursorOpacity = 0, this.fire("editing:exited"), n && this.fire("modified"), this.canvas && (this.canvas.off("mouse:move", this.mouseMoveHandler), this.canvas.fire("text:editing:exited", {
                    target: this
                }), n && this.canvas.fire("object:modified", {
                    target: this
                })), this
            },
            _removeExtraneousStyles: function() {
                for (var n in this.styles) this._textLines[n] || delete this.styles[n]
            },
            _removeCharsFromTo: function(n, t) {
                while (t !== n) this._removeSingleCharAndStyle(n + 1), t--;
                this.selectionStart = n;
                this.selectionEnd = n
            },
            _removeSingleCharAndStyle: function(n) {
                var t = this.text[n - 1] === "\n",
                    i = t ? n : n - 1;
                this.removeStyleObject(t, i);
                this.text = this.text.slice(0, n - 1) + this.text.slice(n);
                this._textLines = this._splitTextIntoLines()
            },
            insertChars: function(n, t) {
                var u, i, r;
                if (this.selectionEnd - this.selectionStart > 1 && this._removeCharsFromTo(this.selectionStart, this.selectionEnd), !t && this.isEmptyStyles()) {
                    this.insertChar(n, !1);
                    return
                }
                for (i = 0, r = n.length; i < r; i++) t && (u = fabric.copiedTextStyle[i]), this.insertChar(n[i], i < r - 1, u)
            },
            insertChar: function(n, t, i) {
                var r = this.text[this.selectionStart] === "\n";
                (this.text = this.text.slice(0, this.selectionStart) + n + this.text.slice(this.selectionEnd), this._textLines = this._splitTextIntoLines(), this.insertStyleObjects(n, r, i), this.selectionStart += n.length, this.selectionEnd = this.selectionStart, t) || (this._updateTextarea(), this.setCoords(), this._fireSelectionChanged(), this.fire("changed"), this.canvas && this.canvas.fire("text:changed", {
                    target: this
                }), this.canvas && this.canvas.renderAll())
            },
            insertNewlineStyleObject: function(t, i, r) {
                var e, u, f;
                if (this.shiftLineStyles(t, 1), this.styles[t + 1] || (this.styles[t + 1] = {}), e = {}, u = {}, this.styles[t] && this.styles[t][i - 1] && (e = this.styles[t][i - 1]), r) u[0] = n(e), this.styles[t + 1] = u;
                else {
                    for (f in this.styles[t]) parseInt(f, 10) >= i && (u[parseInt(f, 10) - i] = this.styles[t][f], delete this.styles[t][f]);
                    this.styles[t + 1] = u
                }
                this._forceClearCache = !0
            },
            insertCharStyleObject: function(t, i, r) {
                var f = this.styles[t],
                    e = n(f),
                    o, u;
                i !== 0 || r || (i = 1);
                for (o in e) u = parseInt(o, 10), u >= i && (f[u + 1] = e[u], e[u - 1] || delete f[u]);
                this.styles[t][i] = r || n(f[i - 1]);
                this._forceClearCache = !0
            },
            insertStyleObjects: function(n, t, i) {
                var u = this.get2DCursorLocation(),
                    r = u.lineIndex,
                    f = u.charIndex;
                this._getLineStyle(r) || this._setLineStyle(r, {});
                n === "\n" ? this.insertNewlineStyleObject(r, f, t) : this.insertCharStyleObject(r, f, i)
            },
            shiftLineStyles: function(t, i) {
                var u = n(this.styles),
                    f, r;
                for (f in this.styles) r = parseInt(f, 10), r > t && (this.styles[r + i] = u[r], u[r - i] || delete this.styles[r])
            },
            removeStyleObject: function(n, t) {
                var i = this.get2DCursorLocation(t),
                    r = i.lineIndex,
                    u = i.charIndex;
                this._removeStyleObject(n, i, r, u)
            },
            _getTextOnPreviousLine: function(n) {
                return this._textLines[n - 1]
            },
            _removeStyleObject: function(t, i, r, u) {
                var o, h, f, s, c, e;
                if (t) {
                    o = this._getTextOnPreviousLine(i.lineIndex);
                    h = o ? o.length : 0;
                    this.styles[r - 1] || (this.styles[r - 1] = {});
                    for (u in this.styles[r]) this.styles[r - 1][parseInt(u, 10) + h] = this.styles[r][u];
                    this.shiftLineStyles(i.lineIndex, -1)
                } else {
                    f = this.styles[r];
                    f && delete f[u];
                    s = n(f);
                    for (c in s) e = parseInt(c, 10), e >= u && e !== 0 && (f[e - 1] = s[e], delete f[e])
                }
            },
            insertNewline: function() {
                this.insertChars("\n")
            },
            setSelectionStartEndWithShift: function(n, t, i) {
                i <= n ? (t === n ? this._selectionDirection = "left" : this._selectionDirection === "right" && (this._selectionDirection = "left", this.selectionEnd = n), this.selectionStart = i) : i > n && i < t ? this._selectionDirection === "right" ? this.selectionEnd = i : this.selectionStart = i : (t === n ? this._selectionDirection = "right" : this._selectionDirection === "left" && (this._selectionDirection = "right", this.selectionStart = t), this.selectionEnd = i)
            },
            setSelectionInBoundaries: function() {
                var n = this.text.length;
                this.selectionStart > n ? this.selectionStart = n : this.selectionStart < 0 && (this.selectionStart = 0);
                this.selectionEnd > n ? this.selectionEnd = n : this.selectionEnd < 0 && (this.selectionEnd = 0)
            }
        })
    }();
fabric.util.object.extend(fabric.IText.prototype, {
    initDoubleClickSimulation: function() {
        this.__lastClickTime = +new Date;
        this.__lastLastClickTime = +new Date;
        this.__lastPointer = {};
        this.on("mousedown", this.onMouseDown.bind(this))
    },
    onMouseDown: function(n) {
        this.__newClickTime = +new Date;
        var t = this.canvas.getPointer(n.e);
        this.isTripleClick(t) ? (this.fire("tripleclick", n), this._stopEvent(n.e)) : this.isDoubleClick(t) && (this.fire("dblclick", n), this._stopEvent(n.e));
        this.__lastLastClickTime = this.__lastClickTime;
        this.__lastClickTime = this.__newClickTime;
        this.__lastPointer = t;
        this.__lastIsEditing = this.isEditing;
        this.__lastSelected = this.selected
    },
    isDoubleClick: function(n) {
        return this.__newClickTime - this.__lastClickTime < 500 && this.__lastPointer.x === n.x && this.__lastPointer.y === n.y && this.__lastIsEditing
    },
    isTripleClick: function(n) {
        return this.__newClickTime - this.__lastClickTime < 500 && this.__lastClickTime - this.__lastLastClickTime < 500 && this.__lastPointer.x === n.x && this.__lastPointer.y === n.y
    },
    _stopEvent: function(n) {
        n.preventDefault && n.preventDefault();
        n.stopPropagation && n.stopPropagation()
    },
    initCursorSelectionHandlers: function() {
        this.initSelectedHandler();
        this.initMousedownHandler();
        this.initMouseupHandler();
        this.initClicks()
    },
    initClicks: function() {
        this.on("dblclick", function(n) {
            this.selectWord(this.getSelectionStartFromPointer(n.e))
        });
        this.on("tripleclick", function(n) {
            this.selectLine(this.getSelectionStartFromPointer(n.e))
        })
    },
    initMousedownHandler: function() {
        this.on("mousedown", function(n) {
            if (this.editable) {
                var t = this.canvas.getPointer(n.e);
                this.__mousedownX = t.x;
                this.__mousedownY = t.y;
                this.__isMousedown = !0;
                this.selected && this.setCursorByClick(n.e);
                this.isEditing && (this.__selectionStartOnMouseDown = this.selectionStart, this.selectionStart === this.selectionEnd && this.abortCursorAnimation(), this.renderCursorOrSelection())
            }
        })
    },
    _isObjectMoved: function(n) {
        var t = this.canvas.getPointer(n);
        return this.__mousedownX !== t.x || this.__mousedownY !== t.y
    },
    initMouseupHandler: function() {
        this.on("mouseup", function(n) {
            (this.__isMousedown = !1, this.editable && !this._isObjectMoved(n.e)) && (this.__lastSelected && !this.__corner && (this.enterEditing(n.e), this.selectionStart === this.selectionEnd ? this.initDelayedCursor(!0) : this.renderCursorOrSelection()), this.selected = !0)
        })
    },
    setCursorByClick: function(n) {
        var t = this.getSelectionStartFromPointer(n),
            i = this.selectionStart,
            r = this.selectionEnd;
        n.shiftKey ? this.setSelectionStartEndWithShift(i, r, t) : (this.selectionStart = t, this.selectionEnd = t);
        this._fireSelectionChanged();
        this._updateTextarea()
    },
    getSelectionStartFromPointer: function(n) {
        for (var c, l, r, f, u = this.getLocalPointer(n), e = 0, i = 0, o = 0, s = 0, a, h, t = 0, v = this._textLines.length; t < v; t++) {
            for (h = this._textLines[t], o += this._getHeightOfLine(this.ctx, t) * this.scaleY, c = this._getLineWidth(this.ctx, t), l = this._getLineLeftOffset(c), i = l * this.scaleX, r = 0, f = h.length; r < f; r++) {
                if (e = i, i += this._getWidthOfChar(this.ctx, h[r], t, this.flipX ? f - r : r) * this.scaleX, o <= u.y || i <= u.x) {
                    s++;
                    continue
                }
                return this._getNewSelectionStartFromOffset(u, e, i, s + t, f)
            }
            if (u.y < o) return this._getNewSelectionStartFromOffset(u, e, i, s + t - 1, f)
        }
        if (typeof a == "undefined") return this.text.length
    },
    _getNewSelectionStartFromOffset: function(n, t, i, r, u) {
        var e = n.x - t,
            o = i - n.x,
            s = o > e ? 0 : 1,
            f = r + s;
        return this.flipX && (f = u - f), f > this.text.length && (f = this.text.length), f
    }
});
fabric.util.object.extend(fabric.IText.prototype, {
        initHiddenTextarea: function() {
            this.hiddenTextarea = fabric.document.createElement("textarea");
            this.hiddenTextarea.setAttribute("autocapitalize", "off");
            var n = this._calcTextareaPosition();
            this.hiddenTextarea.style.cssText = "position: absolute; top: " + n.top + "; left: " + n.left + "; opacity: 0; width: 0px; height: 0px; z-index: -999;";
            fabric.document.body.appendChild(this.hiddenTextarea);
            fabric.util.addListener(this.hiddenTextarea, "keydown", this.onKeyDown.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "keyup", this.onKeyUp.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "input", this.onInput.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "copy", this.copy.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "cut", this.cut.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "paste", this.paste.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "compositionstart", this.onCompositionStart.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "compositionupdate", this.onCompositionUpdate.bind(this));
            fabric.util.addListener(this.hiddenTextarea, "compositionend", this.onCompositionEnd.bind(this));
            !this._clickHandlerInitialized && this.canvas && (fabric.util.addListener(this.canvas.upperCanvasEl, "click", this.onClick.bind(this)), this._clickHandlerInitialized = !0)
        },
        _keysMap: {
            8: "removeChars",
            9: "exitEditing",
            27: "exitEditing",
            13: "insertNewline",
            33: "moveCursorUp",
            34: "moveCursorDown",
            35: "moveCursorRight",
            36: "moveCursorLeft",
            37: "moveCursorLeft",
            38: "moveCursorUp",
            39: "moveCursorRight",
            40: "moveCursorDown",
            46: "forwardDelete"
        },
        _ctrlKeysMapUp: {
            67: "copy",
            88: "cut"
        },
        _ctrlKeysMapDown: {
            65: "selectAll"
        },
        onClick: function() {
            this.hiddenTextarea && this.hiddenTextarea.focus()
        },
        onKeyDown: function(n) {
            if (this.isEditing) {
                if (n.keyCode in this._keysMap) this[this._keysMap[n.keyCode]](n);
                else if (n.keyCode in this._ctrlKeysMapDown && (n.ctrlKey || n.metaKey)) this[this._ctrlKeysMapDown[n.keyCode]](n);
                else return;
                n.stopImmediatePropagation();
                n.preventDefault();
                this.canvas && this.canvas.renderAll()
            }
        },
        onKeyUp: function(n) {
            if (!this.isEditing || this._copyDone) {
                this._copyDone = !1;
                return
            }
            if (n.keyCode in this._ctrlKeysMapUp && (n.ctrlKey || n.metaKey)) this[this._ctrlKeysMapUp[n.keyCode]](n);
            else return;
            n.stopImmediatePropagation();
            n.preventDefault();
            this.canvas && this.canvas.renderAll()
        },
        onInput: function(n) {
            if (this.isEditing && !this.inCompositionMode) {
                var t = this.selectionStart || 0,
                    o = this.selectionEnd || 0,
                    r = this.text.length,
                    u = this.hiddenTextarea.value.length,
                    i, f, e;
                u > r ? (e = this._selectionDirection === "left" ? o : t, i = u - r, f = this.hiddenTextarea.value.slice(e, e + i)) : (i = u - r + o - t, f = this.hiddenTextarea.value.slice(t, t + i));
                this.insertChars(f);
                n.stopPropagation()
            }
        },
        onCompositionStart: function() {
            this.inCompositionMode = !0;
            this.prevCompositionLength = 0;
            this.compositionStart = this.selectionStart
        },
        onCompositionEnd: function() {
            this.inCompositionMode = !1
        },
        onCompositionUpdate: function(n) {
            var t = n.data;
            this.selectionStart = this.compositionStart;
            this.selectionEnd = this.selectionEnd === this.selectionStart ? this.compositionStart + this.prevCompositionLength : this.selectionEnd;
            this.insertChars(t, !1);
            this.prevCompositionLength = t.length
        },
        forwardDelete: function(n) {
            if (this.selectionStart === this.selectionEnd) {
                if (this.selectionStart === this.text.length) return;
                this.moveCursorRight(n)
            }
            this.removeChars(n)
        },
        copy: function(n) {
            if (this.selectionStart !== this.selectionEnd) {
                var t = this.getSelectedText(),
                    i = this._getClipboardData(n);
                i && i.setData("text", t);
                fabric.copiedText = t;
                fabric.copiedTextStyle = this.getSelectionStyles(this.selectionStart, this.selectionEnd);
                n.stopImmediatePropagation();
                n.preventDefault();
                this._copyDone = !0
            }
        },
        paste: function(n) {
            var t = null,
                i = this._getClipboardData(n),
                r = !0;
            i ? (t = i.getData("text").replace(/\r/g, ""), fabric.copiedTextStyle && fabric.copiedText === t || (r = !1)) : t = fabric.copiedText;
            t && this.insertChars(t, r);
            n.stopImmediatePropagation();
            n.preventDefault()
        },
        cut: function(n) {
            this.selectionStart !== this.selectionEnd && (this.copy(n), this.removeChars(n))
        },
        _getClipboardData: function(n) {
            return n && n.clipboardData || fabric.window.clipboardData
        },
        _getWidthBeforeCursor: function(n, t) {
            for (var r = this._textLines[n].slice(0, t), e = this._getLineWidth(this.ctx, n), u = this._getLineLeftOffset(e), f, i = 0, o = r.length; i < o; i++) f = r[i], u += this._getWidthOfChar(this.ctx, f, n, i);
            return u
        },
        getDownCursorOffset: function(n, t) {
            var r = this._getSelectionForOffset(n, t),
                u = this.get2DCursorLocation(r),
                i = u.lineIndex;
            if (i === this._textLines.length - 1 || n.metaKey || n.keyCode === 34) return this.text.length - r;
            var f = u.charIndex,
                e = this._getWidthBeforeCursor(i, f),
                o = this._getIndexOnLine(i + 1, e),
                s = this._textLines[i].slice(f);
            return s.length + o + 2
        },
        _getSelectionForOffset: function(n, t) {
            return n.shiftKey && this.selectionStart !== this.selectionEnd && t ? this.selectionEnd : this.selectionStart
        },
        getUpCursorOffset: function(n, t) {
            var r = this._getSelectionForOffset(n, t),
                u = this.get2DCursorLocation(r),
                i = u.lineIndex;
            if (i === 0 || n.metaKey || n.keyCode === 33) return -r;
            var f = u.charIndex,
                e = this._getWidthBeforeCursor(i, f),
                o = this._getIndexOnLine(i - 1, e),
                s = this._textLines[i].slice(0, f);
            return -this._textLines[i - 1].length + o - s.length
        },
        _getIndexOnLine: function(n, t) {
            for (var s, e, h = this._getLineWidth(this.ctx, n), u = this._textLines[n], c = this._getLineLeftOffset(h), r = c, f = 0, o, i = 0, l = u.length; i < l; i++)
                if (s = u[i], e = this._getWidthOfChar(this.ctx, s, n, i), r += e, r > t) {
                    o = !0;
                    var a = r - e,
                        v = r,
                        y = Math.abs(a - t),
                        p = Math.abs(v - t);
                    f = p < y ? i : i - 1;
                    break
                }
            return o || (f = u.length - 1), f
        },
        moveCursorDown: function(n) {
            this.selectionStart >= this.text.length && this.selectionEnd >= this.text.length || this._moveCursorUpOrDown("Down", n)
        },
        moveCursorUp: function(n) {
            (this.selectionStart !== 0 || this.selectionEnd !== 0) && this._moveCursorUpOrDown("Up", n)
        },
        _moveCursorUpOrDown: function(n, t) {
            var r = "get" + n + "CursorOffset",
                i = this[r](t, this._selectionDirection === "right");
            t.shiftKey ? this.moveCursorWithShift(i) : this.moveCursorWithoutShift(i);
            i !== 0 && (this.setSelectionInBoundaries(), this.abortCursorAnimation(), this._currentCursorOpacity = 1, this.initDelayedCursor(), this._fireSelectionChanged(), this._updateTextarea())
        },
        moveCursorWithShift: function(n) {
            var t = this._selectionDirection === "left" ? this.selectionStart + n : this.selectionEnd + n;
            return this.setSelectionStartEndWithShift(this.selectionStart, this.selectionEnd, t), n !== 0
        },
        moveCursorWithoutShift: function(n) {
            return n < 0 ? (this.selectionStart += n, this.selectionEnd = this.selectionStart) : (this.selectionEnd += n, this.selectionStart = this.selectionEnd), n !== 0
        },
        moveCursorLeft: function(n) {
            (this.selectionStart !== 0 || this.selectionEnd !== 0) && this._moveCursorLeftOrRight("Left", n)
        },
        _move: function(n, t, i) {
            var r;
            if (n.altKey) r = this["findWordBoundary" + i](this[t]);
            else if (n.metaKey || n.keyCode === 35 || n.keyCode === 36) r = this["findLineBoundary" + i](this[t]);
            else return this[t] += i === "Left" ? -1 : 1, !0;
            if (typeof r !== undefined && this[t] !== r) return this[t] = r, !0
        },
        _moveLeft: function(n, t) {
            return this._move(n, t, "Left")
        },
        _moveRight: function(n, t) {
            return this._move(n, t, "Right")
        },
        moveCursorLeftWithoutShift: function(n) {
            var t = !0;
            return this._selectionDirection = "left", this.selectionEnd === this.selectionStart && this.selectionStart !== 0 && (t = this._moveLeft(n, "selectionStart")), this.selectionEnd = this.selectionStart, t
        },
        moveCursorLeftWithShift: function(n) {
            return this._selectionDirection === "right" && this.selectionStart !== this.selectionEnd ? this._moveLeft(n, "selectionEnd") : this.selectionStart !== 0 ? (this._selectionDirection = "left", this._moveLeft(n, "selectionStart")) : void 0
        },
        moveCursorRight: function(n) {
            this.selectionStart >= this.text.length && this.selectionEnd >= this.text.length || this._moveCursorLeftOrRight("Right", n)
        },
        _moveCursorLeftOrRight: function(n, t) {
            var i = "moveCursor" + n + "With";
            this._currentCursorOpacity = 1;
            i += t.shiftKey ? "Shift" : "outShift";
            this[i](t) && (this.abortCursorAnimation(), this.initDelayedCursor(), this._fireSelectionChanged(), this._updateTextarea())
        },
        moveCursorRightWithShift: function(n) {
            return this._selectionDirection === "left" && this.selectionStart !== this.selectionEnd ? this._moveRight(n, "selectionStart") : this.selectionEnd !== this.text.length ? (this._selectionDirection = "right", this._moveRight(n, "selectionEnd")) : void 0
        },
        moveCursorRightWithoutShift: function(n) {
            var t = !0;
            return this._selectionDirection = "right", this.selectionStart === this.selectionEnd ? (t = this._moveRight(n, "selectionStart"), this.selectionEnd = this.selectionStart) : this.selectionStart = this.selectionEnd, t
        },
        removeChars: function(n) {
            this.selectionStart === this.selectionEnd ? this._removeCharsNearCursor(n) : this._removeCharsFromTo(this.selectionStart, this.selectionEnd);
            this.setSelectionEnd(this.selectionStart);
            this._removeExtraneousStyles();
            this.canvas && this.canvas.renderAll();
            this.setCoords();
            this.fire("changed");
            this.canvas && this.canvas.fire("text:changed", {
                target: this
            })
        },
        _removeCharsNearCursor: function(n) {
            var t, i;
            this.selectionStart !== 0 && (n.metaKey ? (t = this.findLineBoundaryLeft(this.selectionStart), this._removeCharsFromTo(t, this.selectionStart), this.setSelectionStart(t)) : n.altKey ? (i = this.findWordBoundaryLeft(this.selectionStart), this._removeCharsFromTo(i, this.selectionStart), this.setSelectionStart(i)) : (this._removeSingleCharAndStyle(this.selectionStart), this.setSelectionStart(this.selectionStart - 1)))
        }
    }),
    function() {
        var n = fabric.util.toFixed,
            t = fabric.Object.NUM_FRACTION_DIGITS;
        fabric.util.object.extend(fabric.IText.prototype, {
            _setSVGTextLineText: function(n, t, i, r, u, f) {
                this._getLineStyle(n) ? this._setSVGTextLineChars(n, t, i, r, f) : fabric.Text.prototype._setSVGTextLineText.call(this, n, t, i, r, u)
            },
            _setSVGTextLineChars: function(n, t, i, r, u) {
                for (var e, c, o = this._textLines[n], s = 0, l = this._getLineLeftOffset(this._getLineWidth(this.ctx, n)) - this.width / 2, h = this._getSVGLineTopOffset(n), a = this._getHeightOfLine(this.ctx, n), f = 0, v = o.length; f < v; f++) e = this._getStyleDeclaration(n, f) || {}, t.push(this._createTextCharSpan(o[f], e, l, h.lineTop + h.offset, s)), c = this._getWidthOfChar(this.ctx, o[f], n, f), e.textBackgroundColor && u.push(this._createTextCharBg(e, l, h.lineTop, a, c, s)), s += c
            },
            _getSVGLineTopOffset: function(n) {
                for (var i = 0, r = 0, t = 0; t < n; t++) i += this._getHeightOfLine(this.ctx, t);
                return r = this._getHeightOfLine(this.ctx, t), {
                    lineTop: i,
                    offset: (this._fontSizeMult - this._fontSizeFraction) * r / (this.lineHeight * this._fontSizeMult)
                }
            },
            _createTextCharBg: function(i, r, u, f, e, o) {
                return ['\t\t<rect fill="', i.textBackgroundColor, '" x="', n(r + o, t), '" y="', n(u - this.height / 2, t), '" width="', n(e, t), '" height="', n(f / this.lineHeight, t), '"><\/rect>\n'].join("")
            },
            _createTextCharSpan: function(i, r, u, f, e) {
                var o = this.getSvgStyles.call(fabric.util.object.extend({
                    visible: !0,
                    fill: this.fill,
                    stroke: this.stroke,
                    type: "text",
                    getSvgFilter: fabric.Object.prototype.getSvgFilter
                }, r));
                return ['\t\t\t<tspan x="', n(u + e, t), '" y="', n(f - this.height / 2, t), '" ', r.fontFamily ? 'font-family="' + r.fontFamily.replace(/"/g, "'") + '" ' : "", r.fontSize ? 'font-size="' + r.fontSize + '" ' : "", r.fontStyle ? 'font-style="' + r.fontStyle + '" ' : "", r.fontWeight ? 'font-weight="' + r.fontWeight + '" ' : "", r.textDecoration ? 'text-decoration="' + r.textDecoration + '" ' : "", 'style="', o, '">', fabric.util.string.escapeXml(i), "<\/tspan>\n"].join("")
            }
        })
    }(),
    function(n) {
        "use strict";
        var t = n.fabric || (n.fabric = {}),
            i = t.util.object.clone;
        t.Textbox = t.util.createClass(t.IText, t.Observable, {
            type: "textbox",
            minWidth: 20,
            dynamicMinWidth: 2,
            __cachedLines: null,
            lockScalingY: !0,
            lockScalingFlip: !0,
            initialize: function(n, i) {
                this.ctx = t.util.createCanvasElement().getContext("2d");
                this.callSuper("initialize", n, i);
                this.setControlsVisibility(t.Textbox.getTextboxControlVisibility());
                this._dimensionAffectingProps.width = !0
            },
            _initDimensions: function(n) {
                this.__skipDimension || (n || (n = t.util.createCanvasElement().getContext("2d"), this._setTextStyles(n)), this.dynamicMinWidth = 0, this._textLines = this._splitTextIntoLines(), this.dynamicMinWidth > this.width && this._set("width", this.dynamicMinWidth), this._clearCache(), this.height = this._getTextHeight(n))
            },
            _generateStyleMap: function() {
                for (var r = 0, i = 0, t = 0, u = {}, n = 0; n < this._textLines.length; n++) this.text[t] === "\n" && n > 0 ? (i = 0, t++, r++) : this.text[t] === " " && n > 0 && (i++, t++), u[n] = {
                    line: r,
                    offset: i
                }, t += this._textLines[n].length, i += this._textLines[n].length;
                return u
            },
            _getStyleDeclaration: function(n, t, i) {
                if (this._styleMap) {
                    var r = this._styleMap[n];
                    if (!r) return i ? {} : null;
                    n = r.line;
                    t = r.offset + t
                }
                return this.callSuper("_getStyleDeclaration", n, t, i)
            },
            _setStyleDeclaration: function(n, t, i) {
                var r = this._styleMap[n];
                n = r.line;
                t = r.offset + t;
                this.styles[n][t] = i
            },
            _deleteStyleDeclaration: function(n, t) {
                var i = this._styleMap[n];
                n = i.line;
                t = i.offset + t;
                delete this.styles[n][t]
            },
            _getLineStyle: function(n) {
                var t = this._styleMap[n];
                return this.styles[t.line]
            },
            _setLineStyle: function(n, t) {
                var i = this._styleMap[n];
                this.styles[i.line] = t
            },
            _deleteLineStyle: function(n) {
                var t = this._styleMap[n];
                delete this.styles[t.line]
            },
            _wrapText: function(n, t) {
                for (var u = t.split(this._reNewline), r = [], i = 0; i < u.length; i++) r = r.concat(this._wrapLine(n, u[i], i));
                return r
            },
            _measureText: function(n, t, i, r) {
                var f = 0,
                    u, e;
                for (r = r || 0, u = 0, e = t.length; u < e; u++) f += this._getWidthOfChar(n, t[u], i, u + r);
                return f
            },
            _wrapLine: function(n, t, i) {
                for (var f = 0, l = [], r = "", v = t.split(" "), e = "", o = 0, y = " ", u = 0, p = 0, s = 0, h = !0, a = this._getWidthOfCharSpacing(), c = 0; c < v.length; c++) e = v[c], u = this._measureText(n, e, i, o), o += e.length, f += p + u - a, f >= this.width && !h ? (l.push(r), r = "", f = u, h = !0) : f += a, h || (r += y), r += e, p = this._measureText(n, y, i, o), o++, h = !1, u > s && (s = u);
                return c && l.push(r), s > this.dynamicMinWidth && (this.dynamicMinWidth = s - a), l
            },
            _splitTextIntoLines: function() {
                var t = this.textAlign,
                    n;
                return this.ctx.save(), this._setTextStyles(this.ctx), this.textAlign = "left", n = this._wrapText(this.ctx, this.text), this.textAlign = t, this.ctx.restore(), this._textLines = n, this._styleMap = this._generateStyleMap(), n
            },
            setOnGroup: function(n, t) {
                n === "scaleX" && (this.set("scaleX", Math.abs(1 / t)), this.set("width", this.get("width") * t / (typeof this.__oldScaleX == "undefined" ? 1 : this.__oldScaleX)), this.__oldScaleX = t)
            },
            get2DCursorLocation: function(n) {
                var r, t, i, f, u;
                for (typeof n == "undefined" && (n = this.selectionStart), r = this._textLines.length, t = 0, i = 0; i < r; i++) {
                    if (f = this._textLines[i], u = f.length, n <= t + u) return {
                        lineIndex: i,
                        charIndex: n - t
                    };
                    t += u;
                    (this.text[t] === "\n" || this.text[t] === " ") && t++
                }
                return {
                    lineIndex: r - 1,
                    charIndex: this._textLines[r - 1].length
                }
            },
            _getCursorBoundariesOffsets: function(n, t) {
                for (var u = 0, f = 0, i = this.get2DCursorLocation(), e = this._textLines[i.lineIndex].split(""), o = this._getLineLeftOffset(this._getLineWidth(this.ctx, i.lineIndex)), r = 0; r < i.charIndex; r++) f += this._getWidthOfChar(this.ctx, e[r], i.lineIndex, r);
                for (r = 0; r < i.lineIndex; r++) u += this._getHeightOfLine(this.ctx, r);
                return t === "cursor" && (u += (1 - this._fontSizeFraction) * this._getHeightOfLine(this.ctx, i.lineIndex) / this.lineHeight - this.getCurrentCharFontSize(i.lineIndex, i.charIndex) * (1 - this._fontSizeFraction)), {
                    top: u,
                    left: f,
                    lineLeft: o
                }
            },
            getMinWidth: function() {
                return Math.max(this.minWidth, this.dynamicMinWidth)
            },
            toObject: function(n) {
                return t.util.object.extend(this.callSuper("toObject", n), {
                    minWidth: this.minWidth
                })
            }
        });
        t.Textbox.fromObject = function(n, r) {
            var u = new t.Textbox(n.text, i(n));
            return r && r(u), u
        };
        t.Textbox.getTextboxControlVisibility = function() {
            return {
                tl: !1,
                tr: !1,
                br: !1,
                bl: !1,
                ml: !0,
                mt: !1,
                mr: !0,
                mb: !1,
                mtr: !0
            }
        }
    }(typeof exports != "undefined" ? exports : this),
    function() {
        var t = fabric.Canvas.prototype._setObjectScale,
            n;
        fabric.Canvas.prototype._setObjectScale = function(n, i, r, u, f, e, o) {
            var s = i.target,
                h;
            if (s instanceof fabric.Textbox) {
                if (h = s.width * (n.x / i.scaleX / (s.width + s.strokeWidth)), h >= s.getMinWidth()) return s.set("width", h), !0
            } else return t.call(fabric.Canvas.prototype, n, i, r, u, f, e, o)
        };
        fabric.Group.prototype._refreshControlsVisibility = function() {
            if (typeof fabric.Textbox != "undefined")
                for (var n = this._objects.length; n--;)
                    if (this._objects[n] instanceof fabric.Textbox) {
                        this.setControlsVisibility(fabric.Textbox.getTextboxControlVisibility());
                        return
                    }
        };
        n = fabric.util.object.clone;
        fabric.util.object.extend(fabric.Textbox.prototype, {
            _removeExtraneousStyles: function() {
                for (var n in this._styleMap) this._textLines[n] || delete this.styles[this._styleMap[n].line]
            },
            insertCharStyleObject: function(n, t, i) {
                var r = this._styleMap[n];
                n = r.line;
                t = r.offset + t;
                fabric.IText.prototype.insertCharStyleObject.apply(this, [n, t, i])
            },
            insertNewlineStyleObject: function(n, t, i) {
                var r = this._styleMap[n];
                n = r.line;
                t = r.offset + t;
                fabric.IText.prototype.insertNewlineStyleObject.apply(this, [n, t, i])
            },
            shiftLineStyles: function(t, i) {
                var u = n(this.styles),
                    e = this._styleMap[t],
                    f, r;
                t = e.line;
                for (f in this.styles) r = parseInt(f, 10), r > t && (this.styles[r + i] = u[r], u[r - i] || delete this.styles[r])
            },
            _getTextOnPreviousLine: function(n) {
                for (var t = this._textLines[n - 1]; this._styleMap[n - 2] && this._styleMap[n - 2].line === this._styleMap[n - 1].line;) t = this._textLines[n - 2] + t, n--;
                return t
            },
            removeStyleObject: function(n, t) {
                var i = this.get2DCursorLocation(t),
                    r = this._styleMap[i.lineIndex],
                    u = r.line,
                    f = r.offset + i.charIndex;
                this._removeStyleObject(n, i, u, f)
            }
        })
    }(),
    function() {
        var n = fabric.IText.prototype._getNewSelectionStartFromOffset;
        fabric.IText.prototype._getNewSelectionStartFromOffset = function(t, i, r, u, f) {
            var o, e, s;
            for (u = n.call(this, t, i, r, u, f), o = 0, e = 0, s = 0; s < this._textLines.length; s++) {
                if (o += this._textLines[s].length, o + e >= u) break;
                (this.text[o + e] === "\n" || this.text[o + e] === " ") && e++
            }
            return u - s + e
        }
    }(),
    function() {
        function t(n, t, i) {
            var r = e.parse(n),
                f, u;
            r.port || (r.port = r.protocol.indexOf("https:") === 0 ? 443 : 80);
            f = r.protocol.indexOf("https:") === 0 ? s : o;
            u = f.request({
                hostname: r.hostname,
                port: r.port,
                path: r.path,
                method: "GET"
            }, function(n) {
                var r = "";
                t && n.setEncoding(t);
                n.on("end", function() {
                    i(r)
                });
                n.on("data", function(t) {
                    n.statusCode === 200 && (r += t)
                })
            });
            u.on("error", function(n) {
                n.errno === process.ECONNREFUSED ? fabric.log("ECONNREFUSED: connection refused to " + r.hostname + ":" + r.port) : fabric.log(n.message);
                i(null)
            });
            u.end()
        }

        function i(n, t) {
            var i = require("fs");
            i.readFile(n, function(n, i) {
                if (n) {
                    fabric.log(n);
                    throw n;
                } else t(i)
            })
        }
        var r, u;
        if (typeof document == "undefined" || typeof window == "undefined") {
            var f = require("xmldom").DOMParser,
                e = require("url"),
                o = require("http"),
                s = require("https"),
                n = require("canvas"),
                h = require("canvas").Image;
            fabric.util.loadImage = function(n, r, u) {
                function e(t) {
                    t ? (f.src = new Buffer(t, "binary"), f._src = n, r && r.call(u, f)) : (f = null, r && r.call(u, null, !0))
                }
                var f = new h;
                n && (n instanceof Buffer || n.indexOf("data") === 0) ? (f.src = f._src = n, r && r.call(u, f)) : n && n.indexOf("http") !== 0 ? i(n, e) : n ? t(n, "binary", e) : r && r.call(u, n)
            };
            fabric.loadSVGFromURL = function(n, r, u) {
                n = n.replace(/^\n\s*/, "").replace(/\?.*$/, "").trim();
                n.indexOf("http") !== 0 ? i(n, function(n) {
                    fabric.loadSVGFromString(n.toString(), r, u)
                }) : t(n, "", function(n) {
                    fabric.loadSVGFromString(n, r, u)
                })
            };
            fabric.loadSVGFromString = function(n, t, i) {
                var r = (new f).parseFromString(n);
                fabric.parseSVGDocument(r.documentElement, function(n, i) {
                    t && t(n, i)
                }, i)
            };
            fabric.util.getScript = function(n, i) {
                t(n, "", function(body) {
                    eval(body);
                    i && i()
                })
            };
            fabric.createCanvasForNode = function(t, i, r, u) {
                var h, f;
                u = u || r;
                var o = fabric.document.createElement("canvas"),
                    e = new n(t || 600, i || 600, u),
                    s = new n(t || 600, i || 600, u);
                return o.style = {}, o.width = e.width, o.height = e.height, r = r || {}, r.nodeCanvas = e, r.nodeCacheCanvas = s, h = fabric.Canvas || fabric.StaticCanvas, f = new h(o, r), f.nodeCanvas = e, f.nodeCacheCanvas = s, f.contextContainer = e.getContext("2d"), f.contextCache = s.getContext("2d"), f.Font = n.Font, f
            };
            r = fabric.StaticCanvas.prototype._initStatic;
            fabric.StaticCanvas.prototype._initStatic = function(t, i) {
                t = t || fabric.document.createElement("canvas");
                this.nodeCanvas = new n(t.width, t.height);
                this.nodeCacheCanvas = new n(t.width, t.height);
                r.call(this, t, i);
                this.contextContainer = this.nodeCanvas.getContext("2d");
                this.contextCache = this.nodeCacheCanvas.getContext("2d");
                this.Font = n.Font
            };
            fabric.StaticCanvas.prototype.createPNGStream = function() {
                return this.nodeCanvas.createPNGStream()
            };
            fabric.StaticCanvas.prototype.createJPEGStream = function(n) {
                return this.nodeCanvas.createJPEGStream(n)
            };
            fabric.StaticCanvas.prototype._initRetinaScaling = function() {
                if (this._isRetinaScaling()) return this.lowerCanvasEl.setAttribute("width", this.width * fabric.devicePixelRatio), this.lowerCanvasEl.setAttribute("height", this.height * fabric.devicePixelRatio), this.nodeCanvas.width = this.width * fabric.devicePixelRatio, this.nodeCanvas.height = this.height * fabric.devicePixelRatio, this.contextContainer.scale(fabric.devicePixelRatio, fabric.devicePixelRatio), this
            };
            fabric.Canvas && (fabric.Canvas.prototype._initRetinaScaling = fabric.StaticCanvas.prototype._initRetinaScaling);
            u = fabric.StaticCanvas.prototype._setBackstoreDimension;
            fabric.StaticCanvas.prototype._setBackstoreDimension = function(n, t) {
                return u.call(this, n, t), this.nodeCanvas[n] = t, this
            };
            fabric.Canvas && (fabric.Canvas.prototype._setBackstoreDimension = fabric.StaticCanvas.prototype._setBackstoreDimension)
        }
    }(),
    function(n) {
        "use strict";
        typeof define == "function" && define.amd ? define(["jquery"], n) : typeof exports == "object" && typeof module == "object" ? module.exports = n(require("jquery")) : n(jQuery)
    }(function(n, t) {
        "use strict";

        function s(t, i, r, u) {
            for (var e, f, h, c, a, v, o = [], s = 0; s < t.length; s++) e = t[s], e ? (f = tinycolor(e), h = f.toHsl().l < .5 ? "sp-thumb-el sp-thumb-dark" : "sp-thumb-el sp-thumb-light", h += tinycolor.equals(i, e) ? " sp-thumb-active" : "", c = f.toString(u.preferredFormat || "rgb"), a = l ? "background-color:" + f.toRgbString() : "filter:" + f.toFilter(), o.push('<span title="' + c + '" data-color="' + f.toRgbString() + '" class="' + h + '"><span class="sp-thumb-inner" style="' + a + ';" /><\/span>')) : (v = "sp-clear-display", o.push(n("<div />").append(n('<span data-color="" style="background-color:transparent;" class="' + v + '"><\/span>').attr("title", u.noColorSelectedText)).html()));
            return "<div class='sp-cf " + r + "'>" + o.join("") + "<\/div>"
        }

        function y() {
            for (var n = 0; n < i.length; n++) i[n] && i[n].hide()
        }

        function p(t, i) {
            var r = n.extend({}, c, t);
            return r.callbacks = {
                move: f(r.move, i),
                change: f(r.change, i),
                show: f(r.show, i),
                hide: f(r.hide, i),
                beforeShow: f(r.beforeShow, i)
            }, r
        }

        function w(u, f) {
            function fr() {
                var t, i, r;
                if (h.showPaletteOnly && (h.showPalette = !0), rr.text(h.showPaletteOnly ? h.togglePaletteMoreText : h.togglePaletteLessText), h.palette)
                    for (ai = h.palette.slice(0), ei = n.isArray(ai[0]) ? ai : [ai], vi = {}, t = 0; t < ei.length; t++)
                        for (i = 0; i < ei[t].length; i++) r = tinycolor(ei[t][i]).toRgbString(), vi[r] = !0;
                c.toggleClass("sp-flat", ut);
                c.toggleClass("sp-input-disabled", !h.showInput);
                c.toggleClass("sp-alpha-enabled", h.showAlpha);
                c.toggleClass("sp-clear-enabled", ht);
                c.toggleClass("sp-buttons-disabled", !h.showButtons);
                c.toggleClass("sp-palette-buttons-disabled", !h.togglePaletteOnly);
                c.toggleClass("sp-palette-disabled", !h.showPalette);
                c.toggleClass("sp-palette-only", h.showPaletteOnly);
                c.toggleClass("sp-initial-disabled", !h.showInitial);
                c.addClass(h.className).addClass(h.containerClassName);
                at()
            }

            function pu() {
                function u(t) {
                    return t.data && t.data.ignore ? (ct(n(t.target).closest(".sp-thumb-el").data("color")), ni()) : (ct(n(t.target).closest(".sp-thumb-el").data("color")), ni(), lt(!0), h.hideAfterPaletteSelect && ot()), !1
                }
                var t, i;
                r && c.find("*:not(input)").attr("unselectable", "on");
                fr();
                ur && w.after(bt).hide();
                ht || ir.hide();
                ut ? w.after(c).hide() : (t = h.appendTo === "parent" ? w.parent() : n(h.appendTo), t.length !== 1 && (t = n("body")), t.append(c));
                nu();
                si.bind("click.spectrum touchstart.spectrum", function(t) {
                    nr || ru();
                    t.stopPropagation();
                    n(t.target).is("input") || t.preventDefault()
                });
                (w.is(":disabled") || h.disabled === !0) && su();
                c.click(k);
                it.change(hr);
                it.bind("paste", function() {
                    setTimeout(hr, 1)
                });
                it.keydown(function(n) {
                    n.keyCode == 13 && hr()
                });
                dr.text(h.cancelText);
                dr.bind("click.spectrum", function(n) {
                    n.stopPropagation();
                    n.preventDefault();
                    eu();
                    ot()
                });
                ir.attr("title", h.clearText);
                ir.bind("click.spectrum", function(n) {
                    n.stopPropagation();
                    n.preventDefault();
                    et = !0;
                    ni();
                    ut && lt(!0)
                });
                gr.text(h.chooseText);
                gr.bind("click.spectrum", function(n) {
                    n.stopPropagation();
                    n.preventDefault();
                    r && it.is(":focus") && it.trigger("change");
                    bu() && (lt(!0), ot())
                });
                rr.text(h.showPaletteOnly ? h.togglePaletteMoreText : h.togglePaletteLessText);
                rr.bind("click.spectrum", function(n) {
                    n.stopPropagation();
                    n.preventDefault();
                    h.showPaletteOnly = !h.showPaletteOnly;
                    h.showPaletteOnly || ut || c.css("left", "-=" + (au.outerWidth(!0) + 5));
                    fr()
                });
                o(wr, function(n, t, i) {
                    nt = n / gi;
                    et = !1;
                    i.shiftKey && (nt = Math.round(nt * 10) / 10);
                    ni()
                }, or, sr);
                o(tr, function(n, t) {
                    ri = parseFloat(t / li);
                    et = !1;
                    h.showAlpha || (nt = 1);
                    ni()
                }, or, sr);
                o(yi, function(n, t, i) {
                    var r, u;
                    if (i.shiftKey) {
                        if (!ft) {
                            var f = ui * pt,
                                e = rt - fi * rt,
                                o = Math.abs(n - f) > Math.abs(t - e);
                            ft = o ? "x" : "y"
                        }
                    } else ft = null;
                    r = !ft || ft === "x";
                    u = !ft || ft === "y";
                    r && (ui = parseFloat(n / pt));
                    u && (fi = parseFloat((rt - t) / rt));
                    et = !1;
                    h.showAlpha || (nt = 1);
                    ni()
                }, or, sr);
                hi ? (ct(hi), ti(), gt = h.preferredFormat || tinycolor(hi).format, er(hi)) : ti();
                ut && cr();
                i = r ? "mousedown.spectrum" : "click.spectrum touchstart.spectrum";
                br.delegate(".sp-thumb-el", i, u);
                kr.delegate(".sp-thumb-el:nth-child(1)", i, {
                    ignore: !0
                }, u)
            }

            function nu() {
                if (vt && window.localStorage) {
                    try {
                        var t = window.localStorage[vt].split(",#");
                        t.length > 1 && (delete window.localStorage[vt], n.each(t, function(n, t) {
                            er(t)
                        }))
                    } catch (i) {}
                    try {
                        tt = window.localStorage[vt].split(";")
                    } catch (i) {}
                }
            }

            function er(t) {
                if (hu) {
                    var i = tinycolor(t).toRgbString();
                    if (!vi[i] && n.inArray(i, tt) === -1)
                        for (tt.push(i); tt.length > lu;) tt.shift();
                    if (vt && window.localStorage) try {
                        window.localStorage[vt] = tt.join(";")
                    } catch (r) {}
                }
            }

            function wu() {
                var t = [],
                    n, i;
                if (h.showPalette)
                    for (n = 0; n < tt.length; n++) i = tinycolor(tt[n]).toRgbString(), vi[i] || t.push(tt[n]);
                return t.reverse().slice(0, h.maxSelectionSize)
            }

            function tu() {
                var t = g(),
                    i = n.map(ei, function(n, i) {
                        return s(n, t, "sp-palette-row sp-palette-row-" + i, h)
                    });
                nu();
                tt && i.push(s(wu(), t, "sp-palette-row sp-palette-row-selection", h));
                br.html(i.join(""))
            }

            function iu() {
                if (h.showInitial) {
                    var t = dt,
                        n = g();
                    kr.html(s([t, n], n, "sp-palette-row-initial", h))
                }
            }

            function or() {
                (rt <= 0 || pt <= 0 || li <= 0) && at();
                di = !0;
                c.addClass(pr);
                ft = null;
                w.trigger("dragstart.spectrum", [g()])
            }

            function sr() {
                di = !1;
                c.removeClass(pr);
                w.trigger("dragstop.spectrum", [g()])
            }

            function hr() {
                var n = it.val(),
                    t;
                (n === null || n === "") && ht ? (ct(null), lt(!0)) : (t = tinycolor(n), t.isValid() ? (ct(t), lt(!0)) : it.addClass("sp-validation-error"))
            }

            function ru() {
                yt ? ot() : cr()
            }

            function cr() {
                var t = n.Event("beforeShow.spectrum");
                if (yt) {
                    at();
                    return
                }(w.trigger(t, [g()]), ii.beforeShow(g()) === !1 || t.isDefaultPrevented()) || (y(), yt = !0, n(wt).bind("keydown.spectrum", uu), n(wt).bind("click.spectrum", fu), n(window).bind("resize.spectrum", ar), bt.addClass("sp-active"), c.removeClass("sp-hidden"), at(), ti(), dt = g(), iu(), ii.show(dt), w.trigger("show.spectrum", [dt]))
            }

            function uu(n) {
                n.keyCode === 27 && ot()
            }

            function fu(n) {
                n.button != 2 && (di || (yu ? lt(!0) : eu(), ot()))
            }

            function ot() {
                yt && !ut && (yt = !1, n(wt).unbind("keydown.spectrum", uu), n(wt).unbind("click.spectrum", fu), n(window).unbind("resize.spectrum", ar), bt.removeClass("sp-active"), c.addClass("sp-hidden"), ii.hide(g()), w.trigger("hide.spectrum", [g()]))
            }

            function eu() {
                ct(dt, !0)
            }

            function ct(n, t) {
                if (tinycolor.equals(n, g())) {
                    ti();
                    return
                }
                var i, r;
                !n && ht ? et = !0 : (et = !1, i = tinycolor(n), r = i.toHsv(), ri = r.h % 360 / 360, ui = r.s, fi = r.v, nt = r.a);
                ti();
                i && i.isValid() && !t && (gt = h.preferredFormat || i.getFormat())
            }

            function g(n) {
                return (n = n || {}, ht && et) ? null : tinycolor.fromRatio({
                    h: ri,
                    s: ui,
                    v: fi,
                    a: Math.round(nt * 100) / 100
                }, {
                    format: n.format || gt
                })
            }

            function bu() {
                return !it.hasClass("sp-validation-error")
            }

            function ni() {
                ti();
                ii.move(g());
                w.trigger("move.spectrum", [g()])
            }

            function ti() {
                var s, n, t, e, i, c, o, u, f;
                it.removeClass("sp-validation-error");
                ou();
                s = tinycolor.fromRatio({
                    h: ri,
                    s: 1,
                    v: 1
                });
                yi.css("background-color", s.toHexString());
                n = gt;
                nt < 1 && !(nt === 0 && n === "name") && (n === "hex" || n === "hex3" || n === "hex6" || n === "name") && (n = "rgb");
                t = g({
                    format: n
                });
                e = "";
                kt.removeClass("sp-clear-display");
                kt.css("background-color", "transparent");
                !t && ht ? kt.addClass("sp-clear-display") : (i = t.toHexString(), c = t.toRgbString(), l || t.alpha === 1 ? kt.css("background-color", c) : (kt.css("background-color", "transparent"), kt.css("filter", t.toFilter())), h.showAlpha && (o = t.toRgb(), o.a = 0, u = tinycolor(o).toRgbString(), f = "linear-gradient(left, " + u + ", " + i + ")", r ? oi.css("filter", tinycolor(u).toFilter({
                    gradientType: 1
                }, i)) : (oi.css("background", "-webkit-" + f), oi.css("background", "-moz-" + f), oi.css("background", "-ms-" + f), oi.css("background", "linear-gradient(to right, " + u + ", " + i + ")"))), e = t.toString(n));
                h.showInput && it.val(e);
                h.showPalette && tu();
                iu()
            }

            function ou() {
                var u = ui,
                    f = fi,
                    n, t, i, r;
                ht && et ? (bi.hide(), wi.hide(), pi.hide()) : (bi.show(), wi.show(), pi.show(), n = u * pt, t = rt - f * rt, n = Math.max(-st, Math.min(pt - st, n - st)), t = Math.max(-st, Math.min(rt - st, t - st)), pi.css({
                    top: t + "px",
                    left: n + "px"
                }), i = nt * gi, bi.css({
                    left: i - vr / 2 + "px"
                }), r = ri * li, wi.css({
                    top: r - yr + "px"
                }))
            }

            function lt(n) {
                var t = g(),
                    i = "",
                    r = !tinycolor.equals(t, dt);
                t && (i = t.toString(gt), er(t));
                ki && w.val(i);
                n && r && (ii.change(t), w.trigger("change", [t]))
            }

            function at() {
                yt && (pt = yi.width(), rt = yi.height(), st = pi.height(), cu = tr.width(), li = tr.height(), yr = wi.height(), gi = wr.width(), vr = bi.width(), ut || (c.css("position", "absolute"), h.offset ? c.offset(h.offset) : c.offset(b(c, si))), ou(), h.showPalette && tu(), w.trigger("reflow.spectrum"))
            }

            function ku() {
                w.show();
                si.unbind("click.spectrum touchstart.spectrum");
                c.remove();
                bt.remove();
                i[ci.id] = null
            }

            function du(i, r) {
                if (i === t) return n.extend({}, h);
                if (r === t) return h[i];
                h[i] = r;
                i === "preferredFormat" && (gt = h.preferredFormat);
                fr()
            }

            function gu() {
                nr = !1;
                w.attr("disabled", !1);
                si.removeClass("sp-disabled")
            }

            function su() {
                ot();
                nr = !0;
                w.attr("disabled", !0);
                si.addClass("sp-disabled")
            }

            function nf(n) {
                h.offset = n;
                at()
            }
            var h = p(f, u),
                ut = h.flat,
                hu = h.showSelectionPalette,
                vt = h.localStorageKey,
                lr = h.theme,
                ii = h.callbacks,
                ar = d(at, 10),
                yt = !1,
                di = !1,
                pt = 0,
                rt = 0,
                st = 0,
                li = 0,
                cu = 0,
                gi = 0,
                vr = 0,
                yr = 0,
                ri = 0,
                ui = 0,
                fi = 0,
                nt = 1,
                ai = [],
                ei = [],
                vi = {},
                tt = h.selectionPalette.slice(0),
                lu = h.maxSelectionSize,
                pr = "sp-dragging",
                ft = null,
                wt = u.ownerDocument,
                tf = wt.body,
                w = n(u),
                nr = !1,
                c = n(v, wt).addClass(lr),
                au = c.find(".sp-picker-container"),
                yi = c.find(".sp-color"),
                pi = c.find(".sp-dragger"),
                tr = c.find(".sp-hue"),
                wi = c.find(".sp-slider"),
                oi = c.find(".sp-alpha-inner"),
                wr = c.find(".sp-alpha"),
                bi = c.find(".sp-alpha-handle"),
                it = c.find(".sp-input"),
                br = c.find(".sp-palette"),
                kr = c.find(".sp-initial"),
                dr = c.find(".sp-cancel"),
                ir = c.find(".sp-clear"),
                gr = c.find(".sp-choose"),
                rr = c.find(".sp-palette-toggle"),
                ki = w.is("input"),
                vu = ki && w.attr("type") === "color" && e(),
                ur = ki && !ut,
                bt = ur ? n(a).addClass(lr).addClass(h.className).addClass(h.replacerClassName) : n([]),
                si = ur ? bt : w,
                kt = bt.find(".sp-preview-inner"),
                hi = h.color || ki && w.val(),
                dt = !1,
                gt = h.preferredFormat,
                yu = !h.showButtons || h.clickoutFiresChange,
                et = !hi,
                ht = h.allowEmpty && !vu,
                ci;
            return pu(), ci = {
                show: cr,
                hide: ot,
                toggle: ru,
                reflow: at,
                option: du,
                enable: gu,
                disable: su,
                offset: nf,
                set: function(n) {
                    ct(n);
                    lt()
                },
                get: g,
                destroy: ku,
                container: c
            }, ci.id = i.push(ci) - 1, ci
        }

        function b(t, i) {
            var s = 0,
                u = t.outerWidth(),
                f = t.outerHeight(),
                h = i.outerHeight(),
                e = t[0].ownerDocument,
                c = e.documentElement,
                o = c.clientWidth + n(e).scrollLeft(),
                l = c.clientHeight + n(e).scrollTop(),
                r = i.offset();
            return r.top += h, r.left -= Math.min(r.left, r.left + u > o && o > u ? Math.abs(r.left + u - o) : 0), r.top -= Math.min(r.top, r.top + f > l && l > f ? Math.abs(f + h - s) : s), r
        }

        function u() {}

        function k(n) {
            n.stopPropagation()
        }

        function f(n, t) {
            var i = Array.prototype.slice,
                r = i.call(arguments, 2);
            return function() {
                return n.apply(t, r.concat(i.call(arguments)))
            }
        }

        function o(t, i, u, f) {
            function h(n) {
                n.stopPropagation && n.stopPropagation();
                n.preventDefault && n.preventDefault();
                n.returnValue = !1
            }

            function v(n) {
                if (s) {
                    if (r && o.documentMode < 9 && !n.button) return y();
                    var u = n.originalEvent && n.originalEvent.touches && n.originalEvent.touches[0],
                        f = u && u.pageX || n.pageX,
                        e = u && u.pageY || n.pageY,
                        v = Math.max(0, Math.min(f - c.left, a)),
                        w = Math.max(0, Math.min(e - c.top, l));
                    p && h(n);
                    i.apply(t, [v, w, n])
                }
            }

            function w(i) {
                var r = i.which ? i.which == 3 : i.button == 2;
                r || s || u.apply(t, arguments) !== !1 && (s = !0, l = n(t).height(), a = n(t).width(), c = n(t).offset(), n(o).bind(e), n(o.body).addClass("sp-dragging"), v(i), h(i))
            }

            function y() {
                s && (n(o).unbind(e), n(o.body).removeClass("sp-dragging"), setTimeout(function() {
                    f.apply(t, arguments)
                }, 0));
                s = !1
            }
            i = i || function() {};
            u = u || function() {};
            f = f || function() {};
            var o = document,
                s = !1,
                c = {},
                l = 0,
                a = 0,
                p = "ontouchstart" in window,
                e = {};
            e.selectstart = h;
            e.dragstart = h;
            e["touchmove mousemove"] = v;
            e["touchend mouseup"] = y;
            n(t).bind("touchstart mousedown", w)
        }

        function d(n, t, i) {
            var r;
            return function() {
                var u = this,
                    f = arguments,
                    e = function() {
                        r = null;
                        n.apply(u, f)
                    };
                i && clearTimeout(r);
                (i || !r) && (r = setTimeout(e, t))
            }
        }

        function e() {
            return n.fn.spectrum.inputTypeColorSupport()
        }
        var c = {
                beforeShow: u,
                move: u,
                change: u,
                show: u,
                hide: u,
                color: !1,
                flat: !1,
                showInput: !1,
                allowEmpty: !1,
                showButtons: !0,
                clickoutFiresChange: !0,
                showInitial: !1,
                showPalette: !1,
                showPaletteOnly: !1,
                hideAfterPaletteSelect: !1,
                togglePaletteOnly: !1,
                showSelectionPalette: !0,
                localStorageKey: !1,
                appendTo: "body",
                maxSelectionSize: 7,
                cancelText: "cancel",
                chooseText: "choose",
                togglePaletteMoreText: "more",
                togglePaletteLessText: "less",
                clearText: "Clear Color Selection",
                noColorSelectedText: "No Color Selected",
                preferredFormat: !1,
                className: "",
                containerClassName: "",
                replacerClassName: "",
                showAlpha: !1,
                theme: "sp-light",
                palette: [
                    ["#ffffff", "#000000", "#ff0000", "#ff8000", "#ffff00", "#008000", "#0000ff", "#4b0082", "#9400d3"]
                ],
                selectionPalette: [],
                disabled: !1,
                offset: null
            },
            i = [],
            r = !!/msie/i.exec(window.navigator.userAgent),
            l = function() {
                function t(n, t) {
                    return !!~("" + n).indexOf(t)
                }
                var i = document.createElement("div"),
                    n = i.style;
                return n.cssText = "background-color:rgba(0,0,0,.5)", t(n.backgroundColor, "rgba") || t(n.backgroundColor, "hsla")
            }(),
            a = "<div class='sp-replacer'><div class='sp-preview'><div class='sp-preview-inner'><\/div><\/div><div class='sp-dd'>▼<\/div><\/div>",
            v = function() {
                var t = "",
                    n;
                if (r)
                    for (n = 1; n <= 6; n++) t += "<div class='sp-" + n + "'><\/div>";
                return ["<div class='sp-container sp-hidden'>", "<div class='sp-palette-container'>", "<div class='sp-palette sp-thumb sp-cf'><\/div>", "<div class='sp-palette-button-container sp-cf'>", "<button type='button' class='sp-palette-toggle'><\/button>", "<\/div>", "<\/div>", "<div class='sp-picker-container'>", "<div class='sp-top sp-cf'>", "<div class='sp-fill'><\/div>", "<div class='sp-top-inner'>", "<div class='sp-color'>", "<div class='sp-sat'>", "<div class='sp-val'>", "<div class='sp-dragger'><\/div>", "<\/div>", "<\/div>", "<\/div>", "<div class='sp-clear sp-clear-display'>", "<\/div>", "<div class='sp-hue'>", "<div class='sp-slider'><\/div>", t, "<\/div>", "<\/div>", "<div class='sp-alpha'><div class='sp-alpha-inner'><div class='sp-alpha-handle'><\/div><\/div><\/div>", "<\/div>", "<div class='sp-input-container sp-cf'>", "<input class='sp-input' type='text' spellcheck='false'  />", "<\/div>", "<div class='sp-initial sp-thumb sp-cf'><\/div>", "<div class='sp-button-container sp-cf'>", "<a class='sp-cancel' href='#'><\/a>", "<button type='button' class='sp-choose'><\/button>", "<\/div>", "<\/div>", "<\/div>"].join("")
            }(),
            h = "spectrum.id";
        n.fn.spectrum = function(t) {
            if (typeof t == "string") {
                var r = this,
                    u = Array.prototype.slice.call(arguments, 1);
                return this.each(function() {
                    var f = i[n(this).data(h)],
                        e;
                    if (f) {
                        if (e = f[t], !e) throw new Error("Spectrum: no such method: '" + t + "'");
                        t == "get" ? r = f.get() : t == "container" ? r = f.container : t == "option" ? r = f.option.apply(f, u) : t == "destroy" ? (f.destroy(), n(this).removeData(h)) : e.apply(f, u)
                    }
                }), r
            }
            return this.spectrum("destroy").each(function() {
                var i = n.extend({}, t, n(this).data()),
                    r = w(this, i);
                n(this).data(h, r.id)
            })
        };
        n.fn.spectrum.load = !0;
        n.fn.spectrum.loadOpts = {};
        n.fn.spectrum.draggable = o;
        n.fn.spectrum.defaults = c;
        n.fn.spectrum.inputTypeColorSupport = function e() {
            if (typeof e._cachedResult == "undefined") {
                var t = n("<input type='color'/>")[0];
                e._cachedResult = t.type === "color" && t.value !== ""
            }
            return e._cachedResult
        };
        n.spectrum = {};
        n.spectrum.localization = {};
        n.spectrum.palettes = {};
        n.fn.spectrum.processNativeColorInputs = function() {
                var t = n("input[type=color]");
                t.length && !e() && t.spectrum({
                    preferredFormat: "hex6"
                })
            },
            function() {
                function tt(n) {
                    var t = {
                            r: 0,
                            g: 0,
                            b: 0
                        },
                        i = 1,
                        f = !1,
                        e = !1;
                    return typeof n == "string" && (n = ii(n)), typeof n == "object" && (n.hasOwnProperty("r") && n.hasOwnProperty("g") && n.hasOwnProperty("b") ? (t = it(n.r, n.g, n.b), f = !0, e = String(n.r).substr(-1) === "%" ? "prgb" : "rgb") : n.hasOwnProperty("h") && n.hasOwnProperty("s") && n.hasOwnProperty("v") ? (n.s = h(n.s), n.v = h(n.v), t = ut(n.h, n.s, n.v), f = !0, e = "hsv") : n.hasOwnProperty("h") && n.hasOwnProperty("s") && n.hasOwnProperty("l") && (n.s = h(n.s), n.l = h(n.l), t = rt(n.h, n.s, n.l), f = !0, e = "hsl"), n.hasOwnProperty("a") && (i = n.a)), i = k(i), {
                        ok: f,
                        format: n.format || e,
                        r: r(255, u(t.r, 0)),
                        g: r(255, u(t.g, 0)),
                        b: r(255, u(t.b, 0)),
                        a: i
                    }
                }

                function it(n, t, r) {
                    return {
                        r: i(n, 255) * 255,
                        g: i(t, 255) * 255,
                        b: i(r, 255) * 255
                    }
                }

                function v(n, t, f) {
                    var s;
                    n = i(n, 255);
                    t = i(t, 255);
                    f = i(f, 255);
                    var e = u(n, t, f),
                        h = r(n, t, f),
                        o, c, l = (e + h) / 2;
                    if (e == h) o = c = 0;
                    else {
                        s = e - h;
                        c = l > .5 ? s / (2 - e - h) : s / (e + h);
                        switch (e) {
                            case n:
                                o = (t - f) / s + (t < f ? 6 : 0);
                                break;
                            case t:
                                o = (f - n) / s + 2;
                                break;
                            case f:
                                o = (n - t) / s + 4
                        }
                        o /= 6
                    }
                    return {
                        h: o,
                        s: c,
                        l: l
                    }
                }

                function rt(n, t, r) {
                    function h(n, t, i) {
                        return (i < 0 && (i += 1), i > 1 && (i -= 1), i < 1 / 6) ? n + (t - n) * 6 * i : i < 1 / 2 ? t : i < 2 / 3 ? n + (t - n) * (2 / 3 - i) * 6 : n
                    }
                    var e, o, s, u, f;
                    return n = i(n, 360), t = i(t, 100), r = i(r, 100), t === 0 ? e = o = s = r : (u = r < .5 ? r * (1 + t) : r + t - r * t, f = 2 * r - u, e = h(f, u, n + 1 / 3), o = h(f, u, n), s = h(f, u, n - 1 / 3)), {
                        r: e * 255,
                        g: o * 255,
                        b: s * 255
                    }
                }

                function y(n, t, f) {
                    n = i(n, 255);
                    t = i(t, 255);
                    f = i(f, 255);
                    var e = u(n, t, f),
                        h = r(n, t, f),
                        o, c, l = e,
                        s = e - h;
                    if (c = e === 0 ? 0 : s / e, e == h) o = 0;
                    else {
                        switch (e) {
                            case n:
                                o = (t - f) / s + (t < f ? 6 : 0);
                                break;
                            case t:
                                o = (f - n) / s + 2;
                                break;
                            case f:
                                o = (n - t) / s + 4
                        }
                        o /= 6
                    }
                    return {
                        h: o,
                        s: c,
                        v: l
                    }
                }

                function ut(n, t, r) {
                    n = i(n, 360) * 6;
                    t = i(t, 100);
                    r = i(r, 100);
                    var h = s.floor(n),
                        c = n - h,
                        u = r * (1 - t),
                        f = r * (1 - c * t),
                        e = r * (1 - (1 - c) * t),
                        o = h % 6,
                        l = [r, f, u, u, e, r][o],
                        a = [e, r, r, f, u, u][o],
                        v = [u, u, e, r, r, f][o];
                    return {
                        r: l * 255,
                        g: a * 255,
                        b: v * 255
                    }
                }

                function p(n, i, r, u) {
                    var f = [o(t(n).toString(16)), o(t(i).toString(16)), o(t(r).toString(16))];
                    return u && f[0].charAt(0) == f[0].charAt(1) && f[1].charAt(0) == f[1].charAt(1) && f[2].charAt(0) == f[2].charAt(1) ? f[0].charAt(0) + f[1].charAt(0) + f[2].charAt(0) : f.join("")
                }

                function w(n, i, r, u) {
                    var f = [o(ni(u)), o(t(n).toString(16)), o(t(i).toString(16)), o(t(r).toString(16))];
                    return f.join("")
                }

                function ft(t, i) {
                    i = i === 0 ? 0 : i || 10;
                    var r = n(t).toHsl();
                    return r.s -= i / 100, r.s = l(r.s), n(r)
                }

                function et(t, i) {
                    i = i === 0 ? 0 : i || 10;
                    var r = n(t).toHsl();
                    return r.s += i / 100, r.s = l(r.s), n(r)
                }

                function ot(t) {
                    return n(t).desaturate(100)
                }

                function st(t, i) {
                    i = i === 0 ? 0 : i || 10;
                    var r = n(t).toHsl();
                    return r.l += i / 100, r.l = l(r.l), n(r)
                }

                function ht(i, f) {
                    f = f === 0 ? 0 : f || 10;
                    var e = n(i).toRgb();
                    return e.r = u(0, r(255, e.r - t(255 * -(f / 100)))), e.g = u(0, r(255, e.g - t(255 * -(f / 100)))), e.b = u(0, r(255, e.b - t(255 * -(f / 100)))), n(e)
                }

                function ct(t, i) {
                    i = i === 0 ? 0 : i || 10;
                    var r = n(t).toHsl();
                    return r.l -= i / 100, r.l = l(r.l), n(r)
                }

                function lt(i, r) {
                    var u = n(i).toHsl(),
                        f = (t(u.h) + r) % 360;
                    return u.h = f < 0 ? 360 + f : f, n(u)
                }

                function at(t) {
                    var i = n(t).toHsl();
                    return i.h = (i.h + 180) % 360, n(i)
                }

                function vt(t) {
                    var i = n(t).toHsl(),
                        r = i.h;
                    return [n(t), n({
                        h: (r + 120) % 360,
                        s: i.s,
                        l: i.l
                    }), n({
                        h: (r + 240) % 360,
                        s: i.s,
                        l: i.l
                    })]
                }

                function yt(t) {
                    var i = n(t).toHsl(),
                        r = i.h;
                    return [n(t), n({
                        h: (r + 90) % 360,
                        s: i.s,
                        l: i.l
                    }), n({
                        h: (r + 180) % 360,
                        s: i.s,
                        l: i.l
                    }), n({
                        h: (r + 270) % 360,
                        s: i.s,
                        l: i.l
                    })]
                }

                function pt(t) {
                    var i = n(t).toHsl(),
                        r = i.h;
                    return [n(t), n({
                        h: (r + 72) % 360,
                        s: i.s,
                        l: i.l
                    }), n({
                        h: (r + 216) % 360,
                        s: i.s,
                        l: i.l
                    })]
                }

                function wt(t, i, r) {
                    i = i || 6;
                    r = r || 30;
                    var u = n(t).toHsl(),
                        f = 360 / r,
                        e = [n(t)];
                    for (u.h = (u.h - (f * i >> 1) + 720) % 360; --i;) u.h = (u.h + f) % 360, e.push(n(u));
                    return e
                }

                function bt(t, i) {
                    i = i || 6;
                    for (var r = n(t).toHsv(), e = r.h, o = r.s, u = r.v, f = [], s = 1 / i; i--;) f.push(n({
                        h: e,
                        s: o,
                        v: u
                    })), u = (u + s) % 1;
                    return f
                }

                function kt(n) {
                    var i = {};
                    for (var t in n) n.hasOwnProperty(t) && (i[n[t]] = t);
                    return i
                }

                function k(n) {
                    return n = parseFloat(n), (isNaN(n) || n < 0 || n > 1) && (n = 1), n
                }

                function i(n, t) {
                    dt(n) && (n = "100%");
                    var i = gt(n);
                    return (n = r(t, u(0, parseFloat(n))), i && (n = parseInt(n * t, 10) / 100), s.abs(n - t) < 1e-6) ? 1 : n % t / parseFloat(t)
                }

                function l(n) {
                    return r(1, u(0, n))
                }

                function f(n) {
                    return parseInt(n, 16)
                }

                function dt(n) {
                    return typeof n == "string" && n.indexOf(".") != -1 && parseFloat(n) === 1
                }

                function gt(n) {
                    return typeof n == "string" && n.indexOf("%") != -1
                }

                function o(n) {
                    return n.length == 1 ? "0" + n : "" + n
                }

                function h(n) {
                    return n <= 1 && (n = n * 100 + "%"), n
                }

                function ni(n) {
                    return Math.round(parseFloat(n) * 255).toString(16)
                }

                function ti(n) {
                    return f(n) / 255
                }

                function ii(n) {
                    var i, t;
                    if (n = n.replace(d, "").replace(g, "").toLowerCase(), i = !1, c[n]) n = c[n], i = !0;
                    else if (n == "transparent") return {
                        r: 0,
                        g: 0,
                        b: 0,
                        a: 0,
                        format: "name"
                    };
                    return (t = e.rgb.exec(n)) ? {
                        r: t[1],
                        g: t[2],
                        b: t[3]
                    } : (t = e.rgba.exec(n)) ? {
                        r: t[1],
                        g: t[2],
                        b: t[3],
                        a: t[4]
                    } : (t = e.hsl.exec(n)) ? {
                        h: t[1],
                        s: t[2],
                        l: t[3]
                    } : (t = e.hsla.exec(n)) ? {
                        h: t[1],
                        s: t[2],
                        l: t[3],
                        a: t[4]
                    } : (t = e.hsv.exec(n)) ? {
                        h: t[1],
                        s: t[2],
                        v: t[3]
                    } : (t = e.hsva.exec(n)) ? {
                        h: t[1],
                        s: t[2],
                        v: t[3],
                        a: t[4]
                    } : (t = e.hex8.exec(n)) ? {
                        a: ti(t[1]),
                        r: f(t[2]),
                        g: f(t[3]),
                        b: f(t[4]),
                        format: i ? "name" : "hex8"
                    } : (t = e.hex6.exec(n)) ? {
                        r: f(t[1]),
                        g: f(t[2]),
                        b: f(t[3]),
                        format: i ? "name" : "hex"
                    } : (t = e.hex3.exec(n)) ? {
                        r: f(t[1] + "" + t[1]),
                        g: f(t[2] + "" + t[2]),
                        b: f(t[3] + "" + t[3]),
                        format: i ? "name" : "hex"
                    } : !1
                }
                var d = /^[\s,#]+/,
                    g = /\s+$/,
                    nt = 0,
                    s = Math,
                    t = s.round,
                    r = s.min,
                    u = s.max,
                    a = s.random,
                    n = function(i, r) {
                        if (i = i ? i : "", r = r || {}, i instanceof n) return i;
                        if (!(this instanceof n)) return new n(i, r);
                        var u = tt(i);
                        this._originalInput = i;
                        this._r = u.r;
                        this._g = u.g;
                        this._b = u.b;
                        this._a = u.a;
                        this._roundA = t(100 * this._a) / 100;
                        this._format = r.format || u.format;
                        this._gradientType = r.gradientType;
                        this._r < 1 && (this._r = t(this._r));
                        this._g < 1 && (this._g = t(this._g));
                        this._b < 1 && (this._b = t(this._b));
                        this._ok = u.ok;
                        this._tc_id = nt++
                    },
                    c, b, e;
                n.prototype = {
                    isDark: function() {
                        return this.getBrightness() < 128
                    },
                    isLight: function() {
                        return !this.isDark()
                    },
                    isValid: function() {
                        return this._ok
                    },
                    getOriginalInput: function() {
                        return this._originalInput
                    },
                    getFormat: function() {
                        return this._format
                    },
                    getAlpha: function() {
                        return this._a
                    },
                    getBrightness: function() {
                        var n = this.toRgb();
                        return (n.r * 299 + n.g * 587 + n.b * 114) / 1e3
                    },
                    setAlpha: function(n) {
                        return this._a = k(n), this._roundA = t(100 * this._a) / 100, this
                    },
                    toHsv: function() {
                        var n = y(this._r, this._g, this._b);
                        return {
                            h: n.h * 360,
                            s: n.s,
                            v: n.v,
                            a: this._a
                        }
                    },
                    toHsvString: function() {
                        var n = y(this._r, this._g, this._b),
                            i = t(n.h * 360),
                            r = t(n.s * 100),
                            u = t(n.v * 100);
                        return this._a == 1 ? "hsv(" + i + ", " + r + "%, " + u + "%)" : "hsva(" + i + ", " + r + "%, " + u + "%, " + this._roundA + ")"
                    },
                    toHsl: function() {
                        var n = v(this._r, this._g, this._b);
                        return {
                            h: n.h * 360,
                            s: n.s,
                            l: n.l,
                            a: this._a
                        }
                    },
                    toHslString: function() {
                        var n = v(this._r, this._g, this._b),
                            i = t(n.h * 360),
                            r = t(n.s * 100),
                            u = t(n.l * 100);
                        return this._a == 1 ? "hsl(" + i + ", " + r + "%, " + u + "%)" : "hsla(" + i + ", " + r + "%, " + u + "%, " + this._roundA + ")"
                    },
                    toHex: function(n) {
                        return p(this._r, this._g, this._b, n)
                    },
                    toHexString: function(n) {
                        return "#" + this.toHex(n)
                    },
                    toHex8: function() {
                        return w(this._r, this._g, this._b, this._a)
                    },
                    toHex8String: function() {
                        return "#" + this.toHex8()
                    },
                    toRgb: function() {
                        return {
                            r: t(this._r),
                            g: t(this._g),
                            b: t(this._b),
                            a: this._a
                        }
                    },
                    toRgbString: function() {
                        return this._a == 1 ? "rgb(" + t(this._r) + ", " + t(this._g) + ", " + t(this._b) + ")" : "rgba(" + t(this._r) + ", " + t(this._g) + ", " + t(this._b) + ", " + this._roundA + ")"
                    },
                    toPercentageRgb: function() {
                        return {
                            r: t(i(this._r, 255) * 100) + "%",
                            g: t(i(this._g, 255) * 100) + "%",
                            b: t(i(this._b, 255) * 100) + "%",
                            a: this._a
                        }
                    },
                    toPercentageRgbString: function() {
                        return this._a == 1 ? "rgb(" + t(i(this._r, 255) * 100) + "%, " + t(i(this._g, 255) * 100) + "%, " + t(i(this._b, 255) * 100) + "%)" : "rgba(" + t(i(this._r, 255) * 100) + "%, " + t(i(this._g, 255) * 100) + "%, " + t(i(this._b, 255) * 100) + "%, " + this._roundA + ")"
                    },
                    toName: function() {
                        return this._a === 0 ? "transparent" : this._a < 1 ? !1 : b[p(this._r, this._g, this._b, !0)] || !1
                    },
                    toFilter: function(t) {
                        var i = "#" + w(this._r, this._g, this._b, this._a),
                            r = i,
                            f = this._gradientType ? "GradientType = 1, " : "",
                            u;
                        return t && (u = n(t), r = u.toHex8String()), "progid:DXImageTransform.Microsoft.gradient(" + f + "startColorstr=" + i + ",endColorstr=" + r + ")"
                    },
                    toString: function(n) {
                        var i = !!n;
                        n = n || this._format;
                        var t = !1,
                            r = this._a < 1 && this._a >= 0,
                            u = !i && r && (n === "hex" || n === "hex6" || n === "hex3" || n === "name");
                        return u ? n === "name" && this._a === 0 ? this.toName() : this.toRgbString() : (n === "rgb" && (t = this.toRgbString()), n === "prgb" && (t = this.toPercentageRgbString()), (n === "hex" || n === "hex6") && (t = this.toHexString()), n === "hex3" && (t = this.toHexString(!0)), n === "hex8" && (t = this.toHex8String()), n === "name" && (t = this.toName()), n === "hsl" && (t = this.toHslString()), n === "hsv" && (t = this.toHsvString()), t || this.toHexString())
                    },
                    _applyModification: function(n, t) {
                        var i = n.apply(null, [this].concat([].slice.call(t)));
                        return this._r = i._r, this._g = i._g, this._b = i._b, this.setAlpha(i._a), this
                    },
                    lighten: function() {
                        return this._applyModification(st, arguments)
                    },
                    brighten: function() {
                        return this._applyModification(ht, arguments)
                    },
                    darken: function() {
                        return this._applyModification(ct, arguments)
                    },
                    desaturate: function() {
                        return this._applyModification(ft, arguments)
                    },
                    saturate: function() {
                        return this._applyModification(et, arguments)
                    },
                    greyscale: function() {
                        return this._applyModification(ot, arguments)
                    },
                    spin: function() {
                        return this._applyModification(lt, arguments)
                    },
                    _applyCombination: function(n, t) {
                        return n.apply(null, [this].concat([].slice.call(t)))
                    },
                    analogous: function() {
                        return this._applyCombination(wt, arguments)
                    },
                    complement: function() {
                        return this._applyCombination(at, arguments)
                    },
                    monochromatic: function() {
                        return this._applyCombination(bt, arguments)
                    },
                    splitcomplement: function() {
                        return this._applyCombination(pt, arguments)
                    },
                    triad: function() {
                        return this._applyCombination(vt, arguments)
                    },
                    tetrad: function() {
                        return this._applyCombination(yt, arguments)
                    }
                };
                n.fromRatio = function(t, i) {
                    var u, r;
                    if (typeof t == "object") {
                        u = {};
                        for (r in t) t.hasOwnProperty(r) && (u[r] = r === "a" ? t[r] : h(t[r]));
                        t = u
                    }
                    return n(t, i)
                };
                n.equals = function(t, i) {
                    return !t || !i ? !1 : n(t).toRgbString() == n(i).toRgbString()
                };
                n.random = function() {
                    return n.fromRatio({
                        r: a(),
                        g: a(),
                        b: a()
                    })
                };
                n.mix = function(t, i, r) {
                    var s, l;
                    r = r === 0 ? 0 : r || 50;
                    var f = n(t).toRgb(),
                        e = n(i).toRgb(),
                        h = r / 100,
                        o = h * 2 - 1,
                        c = e.a - f.a,
                        u;
                    return u = o * c == -1 ? o : (o + c) / (1 + o * c), u = (u + 1) / 2, s = 1 - u, l = {
                        r: e.r * u + f.r * s,
                        g: e.g * u + f.g * s,
                        b: e.b * u + f.b * s,
                        a: e.a * h + f.a * (1 - h)
                    }, n(l)
                };
                n.readability = function(t, i) {
                    var f = n(t),
                        e = n(i),
                        r = f.toRgb(),
                        u = e.toRgb(),
                        o = f.getBrightness(),
                        s = e.getBrightness(),
                        h = Math.max(r.r, u.r) - Math.min(r.r, u.r) + Math.max(r.g, u.g) - Math.min(r.g, u.g) + Math.max(r.b, u.b) - Math.min(r.b, u.b);
                    return {
                        brightness: Math.abs(o - s),
                        color: h
                    }
                };
                n.isReadable = function(t, i) {
                    var r = n.readability(t, i);
                    return r.brightness > 125 && r.color > 500
                };
                n.mostReadable = function(t, i) {
                    for (var h = null, o = 0, r = !1, u = 0; u < i.length; u++) {
                        var f = n.readability(t, i[u]),
                            e = f.brightness > 125 && f.color > 500,
                            s = 3 * (f.brightness / 125) + f.color / 500;
                        (e && !r || e && r && s > o || !e && !r && s > o) && (r = e, o = s, h = n(i[u]))
                    }
                    return h
                };
                c = n.names = {
                    aliceblue: "f0f8ff",
                    antiquewhite: "faebd7",
                    aqua: "0ff",
                    aquamarine: "7fffd4",
                    azure: "f0ffff",
                    beige: "f5f5dc",
                    bisque: "ffe4c4",
                    black: "000",
                    blanchedalmond: "ffebcd",
                    blue: "00f",
                    blueviolet: "8a2be2",
                    brown: "a52a2a",
                    burlywood: "deb887",
                    burntsienna: "ea7e5d",
                    cadetblue: "5f9ea0",
                    chartreuse: "7fff00",
                    chocolate: "d2691e",
                    coral: "ff7f50",
                    cornflowerblue: "6495ed",
                    cornsilk: "fff8dc",
                    crimson: "dc143c",
                    cyan: "0ff",
                    darkblue: "00008b",
                    darkcyan: "008b8b",
                    darkgoldenrod: "b8860b",
                    darkgray: "a9a9a9",
                    darkgreen: "006400",
                    darkgrey: "a9a9a9",
                    darkkhaki: "bdb76b",
                    darkmagenta: "8b008b",
                    darkolivegreen: "556b2f",
                    darkorange: "ff8c00",
                    darkorchid: "9932cc",
                    darkred: "8b0000",
                    darksalmon: "e9967a",
                    darkseagreen: "8fbc8f",
                    darkslateblue: "483d8b",
                    darkslategray: "2f4f4f",
                    darkslategrey: "2f4f4f",
                    darkturquoise: "00ced1",
                    darkviolet: "9400d3",
                    deeppink: "ff1493",
                    deepskyblue: "00bfff",
                    dimgray: "696969",
                    dimgrey: "696969",
                    dodgerblue: "1e90ff",
                    firebrick: "b22222",
                    floralwhite: "fffaf0",
                    forestgreen: "228b22",
                    fuchsia: "f0f",
                    gainsboro: "dcdcdc",
                    ghostwhite: "f8f8ff",
                    gold: "ffd700",
                    goldenrod: "daa520",
                    gray: "808080",
                    green: "008000",
                    greenyellow: "adff2f",
                    grey: "808080",
                    honeydew: "f0fff0",
                    hotpink: "ff69b4",
                    indianred: "cd5c5c",
                    indigo: "4b0082",
                    ivory: "fffff0",
                    khaki: "f0e68c",
                    lavender: "e6e6fa",
                    lavenderblush: "fff0f5",
                    lawngreen: "7cfc00",
                    lemonchiffon: "fffacd",
                    lightblue: "add8e6",
                    lightcoral: "f08080",
                    lightcyan: "e0ffff",
                    lightgoldenrodyellow: "fafad2",
                    lightgray: "d3d3d3",
                    lightgreen: "90ee90",
                    lightgrey: "d3d3d3",
                    lightpink: "ffb6c1",
                    lightsalmon: "ffa07a",
                    lightseagreen: "20b2aa",
                    lightskyblue: "87cefa",
                    lightslategray: "789",
                    lightslategrey: "789",
                    lightsteelblue: "b0c4de",
                    lightyellow: "ffffe0",
                    lime: "0f0",
                    limegreen: "32cd32",
                    linen: "faf0e6",
                    magenta: "f0f",
                    maroon: "800000",
                    mediumaquamarine: "66cdaa",
                    mediumblue: "0000cd",
                    mediumorchid: "ba55d3",
                    mediumpurple: "9370db",
                    mediumseagreen: "3cb371",
                    mediumslateblue: "7b68ee",
                    mediumspringgreen: "00fa9a",
                    mediumturquoise: "48d1cc",
                    mediumvioletred: "c71585",
                    midnightblue: "191970",
                    mintcream: "f5fffa",
                    mistyrose: "ffe4e1",
                    moccasin: "ffe4b5",
                    navajowhite: "ffdead",
                    navy: "000080",
                    oldlace: "fdf5e6",
                    olive: "808000",
                    olivedrab: "6b8e23",
                    orange: "ffa500",
                    orangered: "ff4500",
                    orchid: "da70d6",
                    palegoldenrod: "eee8aa",
                    palegreen: "98fb98",
                    paleturquoise: "afeeee",
                    palevioletred: "db7093",
                    papayawhip: "ffefd5",
                    peachpuff: "ffdab9",
                    peru: "cd853f",
                    pink: "ffc0cb",
                    plum: "dda0dd",
                    powderblue: "b0e0e6",
                    purple: "800080",
                    rebeccapurple: "663399",
                    red: "f00",
                    rosybrown: "bc8f8f",
                    royalblue: "4169e1",
                    saddlebrown: "8b4513",
                    salmon: "fa8072",
                    sandybrown: "f4a460",
                    seagreen: "2e8b57",
                    seashell: "fff5ee",
                    sienna: "a0522d",
                    silver: "c0c0c0",
                    skyblue: "87ceeb",
                    slateblue: "6a5acd",
                    slategray: "708090",
                    slategrey: "708090",
                    snow: "fffafa",
                    springgreen: "00ff7f",
                    steelblue: "4682b4",
                    tan: "d2b48c",
                    teal: "008080",
                    thistle: "d8bfd8",
                    tomato: "ff6347",
                    turquoise: "40e0d0",
                    violet: "ee82ee",
                    wheat: "f5deb3",
                    white: "fff",
                    whitesmoke: "f5f5f5",
                    yellow: "ff0",
                    yellowgreen: "9acd32"
                };
                b = n.hexNames = kt(c);
                e = function() {
                    var n = "(?:[-\\+]?\\d*\\.\\d+%?)|(?:[-\\+]?\\d+%?)",
                        t = "[\\s|\\(]+(" + n + ")[,|\\s]+(" + n + ")[,|\\s]+(" + n + ")\\s*\\)?",
                        i = "[\\s|\\(]+(" + n + ")[,|\\s]+(" + n + ")[,|\\s]+(" + n + ")[,|\\s]+(" + n + ")\\s*\\)?";
                    return {
                        rgb: new RegExp("rgb" + t),
                        rgba: new RegExp("rgba" + i),
                        hsl: new RegExp("hsl" + t),
                        hsla: new RegExp("hsla" + i),
                        hsv: new RegExp("hsv" + t),
                        hsva: new RegExp("hsva" + i),
                        hex3: /^([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,
                        hex6: /^([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/,
                        hex8: /^([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/
                    }
                }();
                window.tinycolor = n
            }();
        n(function() {
            n.fn.spectrum.load && n.fn.spectrum.processNativeColorInputs()
        })
    }),
    function(n) {
        n.fn.extend({
            leanModal: function(t) {
                function i(t) {
                    n("#lean_overlay").fadeOut(200);
                    n(t).css({
                        display: "none"
                    })
                }
                var r = n("<div id='lean_overlay'><\/div>");
                return n("body").append(r), t = n.extend({
                    top: 100,
                    overlay: .5,
                    closeButton: null
                }, t), this.each(function() {
                    var r = t;
                    n(this).click(function(t) {
                        var u = n(this).attr("href"),
                            e, f;
                        if (r.callback && r.callback(t, u) == !1) {
                            t.preventDefault();
                            return
                        }
                        n("#lean_overlay").click(function() {
                            i(u)
                        });
                        n(r.closeButton).click(function() {
                            i(u)
                        });
                        e = n(u).outerHeight();
                        f = n(u).outerWidth();
                        n("#lean_overlay").css({
                            display: "block",
                            opacity: 0
                        });
                        n("#lean_overlay").fadeTo(200, r.overlay);
                        n(u).css({
                            display: "block",
                            position: "fixed",
                            opacity: 0,
                            "z-index": 11e3,
                            left: "50%",
                            "margin-left": -(f / 2) + "px",
                            top: r.top + "px"
                        });
                        n(u).fadeTo(200, 1);
                        t.preventDefault()
                    })
                })
            }
        });
        n.fn.extend({
            openLeanModal: function(t, i) {
                function f(t) {
                    n("#lean_overlay").fadeOut(200);
                    n(t).css({
                        display: "none"
                    })
                }
                var r = n.extend({
                        top: 100,
                        overlay: .5,
                        closeButton: null
                    }, i),
                    e, u;
                n("#lean_overlay").click(function() {
                    f(t)
                });
                n(r.closeButton).click(function() {
                    f(t)
                });
                e = n(t).outerHeight();
                u = n(t).outerWidth();
                n("#lean_overlay").css({
                    display: "block",
                    opacity: 0
                });
                n("#lean_overlay").fadeTo(200, r.overlay);
                n(t).css({
                    display: "block",
                    position: "fixed",
                    opacity: 0,
                    "z-index": 11e3,
                    left: "50%",
                    "margin-left": -(u / 2) + "px",
                    top: r.top + "px"
                });
                n(t).fadeTo(200, 1)
            }
        })
    }(jQuery);
var $mainVehicleStage = $("#vtws-mainVehicle"),
    $mainWheelleStage = $("#vtws-mainWheel"),
    $uploadVehicle = document.getElementById("imgLoader"),
    clientImageUpload = !1,
    $editBrightness = $("#vtws-brightness"),
    $brightnessSlider = $("#vtws-brightnessSlider"),
    $brightnessSliderInput = $("#vtws-brightnessSliderInput"),
    $contrastSliderInput = $("#vtws-contrastSliderInput"),
    wvF_main, wvF_window, wvF_face, wvfWheelGroup = {},
    wvR_main, wvR_window, wvR_face, wvrWheelGroup = {},
    baseVehicleWidth = 2175,
    baseVehicleHeight = 1140,
    vwiDir = "https://apps.velocity-tech.com/Content/wheel-images/",
    vehicleStageScale = $mainVehicleStage.width() / baseVehicleWidth,
    vehicleWheelScale = vehicleStageScale,
    handleSize = 15,
    handleColor = "#0f0",
    paintLayerAlpha = .85,
    wheelColorSet = !1,
    wheelColorLayer, wheelColorMap = {},
    wheelColor, flipWheelToggle = !1,
    c_mainVehicle = null;
$("#v").length > 0 && (c_mainVehicle = new fabric.Canvas("v"));
var c_mainWheel, img_vc, group_wvF, group_wvR, resultHitCount = 0,
    sortingFiltering = !1,
    currentWheelResults = null,
    currentFilter = {},
    lastVehicleId = 0,
    vehicleImageId = null,
    sizeUpRatio = 1;
$("#sizeUp").click(function() {
    sizeWheel("up")
});
$("#sizeDown").click(function() {
    sizeWheel("down")
});
$editBrightness.click(function() {
    $brightnessSlider.slideToggle("fast")
});
$brightnessSliderInput.change(function() {
    setBrightness(wvF_main, this.value);
    setBrightness(wvR_main, this.value)
});
$contrastSliderInput.change(function() {
    setContrast(wvF_main, this.value);
    setContrast(wvR_main, this.value)
});
var defaultWheel = vwiDir + "VPS-306",
    o_wheel1 = {
        vehicleID: 0,
        frontWheelBase: defaultWheel + "/layers/wvF_main.png",
        frontWheelFace: defaultWheel + "/layers/wvF_face.png",
        frontWheelWindow: defaultWheel + "/layers/wvF_window.png",
        rearWheelBase: defaultWheel + "/layers/wvR_main.png",
        rearWheelFace: defaultWheel + "/layers/wvR_face.png",
        rearWheelWindow: defaultWheel + "/layers/wvR_window.png",
        wvF_left: c_mainVehicle.width * .534,
        wvF_top: c_mainVehicle.height * .595,
        wvF_width: 150 * vehicleStageScale,
        wvF_height: 240 * vehicleStageScale,
        wvF_angle: .18,
        wvR_left: c_mainVehicle.width * .888,
        wvR_top: c_mainVehicle.height * .527,
        wvR_width: 69 * vehicleStageScale,
        wvR_height: 175 * vehicleStageScale,
        wvR_angle: 3.6
    },
    default_wheel_info = {
        vehicleID: 0,
        frontWheelBase: defaultWheel + "/layers/wvF_main.png",
        frontWheelFace: defaultWheel + "/layers/wvF_face.png",
        frontWheelWindow: defaultWheel + "/layers/wvF_window.png",
        rearWheelBase: defaultWheel + "/layers/wvR_main.png",
        rearWheelFace: defaultWheel + "/layers/wvR_face.png",
        rearWheelWindow: defaultWheel + "/layers/wvR_window.png",
        wvF_left: c_mainVehicle.width * .534,
        wvF_top: c_mainVehicle.height * .595,
        wvF_width: 150 * vehicleStageScale,
        wvF_height: 240 * vehicleStageScale,
        wvF_angle: .18,
        wvR_left: c_mainVehicle.width * .888,
        wvR_top: c_mainVehicle.height * .527,
        wvR_width: 69 * vehicleStageScale,
        wvR_height: 175 * vehicleStageScale,
        wvR_angle: 3.6
    },
    setVehicleStageScale = function(n, t) {
        c_mainVehicle.setWidth(n * vehicleStageScale);
        c_mainVehicle.setHeight(t * vehicleStageScale)
    },
    setVehicleStageScaleToDefault = function() {
        vehicleStageScale = $mainVehicleStage.width() / baseVehicleWidth;
        vehicleWheelScale = vehicleStageScale;
        setVehicleStageScale(baseVehicleWidth, baseVehicleHeight)
    };
$(function() {
        "use strict";

        function t(n) {
            n.find("a.vtws-vehicle-list-selector").click(function(n) {
                n.preventDefault();
                var t = $(this),
                    i = t.data("vtwsVehicleImageApiid");
                i === null || i === undefined || i !== 4 ? vtwsSelectVehicle(t.data("vtwsVehicleYear"), t.data("vtwsVehicleMake"), t.data("vtwsVehicleModel"), t.data("vtwsVehicleBodyStyle"), t.data("vtwsVehicleSubModel"), null, !1, null, !1) : (prepareVehicleArea(), getVehicleImage(null, !1, t.data("vtwsVehicleImageApiid"), t.data("vtwsVehicleImageFileName"), t.data("vtwsVehicleImageId")))
            })
        }

        function i(n) {
            var f = $("#vtws-vehicleThumbTiles"),
                r = f.find(".vtws-vehicle-list-image-section").clone(),
                i = r.find(".vtws-vehicle-list-selector"),
                u;
            return i.attr("data-vtws-vehicle-year", n.Year), i.attr("data-vtws-vehicle-make", n.Make), i.attr("data-vtws-vehicle-model", n.Model), i.attr("data-vtws-vehicle-body-style", n.BodyStyle), i.attr("data-vtws-vehicle-sub-model", n.SubModel), i.attr("data-vtws-vehicle-image-id", n.VehicleImageID), i.attr("data-vtws-vehicle-image-file-name", n.FileName), i.attr("data-vtws-vehicle-image-apiid", n.ApiId), u = r.find(".vtws-vehicle-list-image"), u.attr("src", n.Thumbnail), u.attr("alt", n.Year + " " + n.Make + " " + n.Model + " " + n.BodyStyle + " " + n.SubModel), t(r), r
        }
        if (console.log("studio_v2d.js Startup"), c_mainVehicle) {
            setVehicleStageScaleToDefault();
            setVehicleBackground(c_mainVehicle, "");
            var n = "stage";
            $(document).on("click", ".previewWheelBtn", function() {
                var t = $(this).data("wheelid");
                n === "top"
            });
            $mainWheelleStage.length && (c_mainWheel = new fabric.Canvas("w"), c_mainWheel.setHeight(277).setWidth(300), console.log($mainWheelleStage.height() + "X" + $mainWheelleStage.width()));
            $("#vtws-flipx").click(function() {
                var t = group_wvF.getAngle(),
                    i = group_wvR.getAngle(),
                    n = c_mainVehicle.getWidth(),
                    r = group_wvF.getLeft(),
                    u = n - r,
                    f = group_wvR.getLeft(),
                    e = n - f;
                group_wvF.toggle("flipX").set({
                    angle: -t,
                    left: u
                }).setCoords();
                group_wvR.toggle("flipX").set({
                    angle: -i,
                    left: e
                }).setCoords();
                c_mainVehicle.renderAll();
                flipWheelToggle = !flipWheelToggle
            });
            $("#vtws-vehicleSelect .vtws-close-button").click(function() {
                $("#vtws-vehicleSelect").hide();
                $("#vtws-mainImage").removeClass("vtws-hide")
            });
            $("#vtws-changeVehicle").click(function() {
                var f = $("#vtws-vehicle-year").val(),
                    e = $("#vtws-vehicle-make").val(),
                    o = $("#vtws-vehicle-model").val(),
                    n, t, r, u;
                $("#vtws-vehicle-tips-section").addClass("vtws-hide");
                $("#vtws-use-own-image-tips").removeClass("vtws-hide");
                n = $("#vtws-studio-photos");
                t = $("#vtws-location-shoots");
                n.hasClass("vtws-hide") || n.addClass("vtws-hide");
                t.hasClass("vtws-hide") || t.addClass("vtws-hide");
                r = $(".studioVehicleList");
                r.html("");
                u = $(".customStudioVehicleList");
                u.html("");
                $.get(baseURL + "/Vehicle/GetVehicleThumbs?y=" + f + "&m=" + e + "&mdl=" + o, function(f) {
                    var e, o, c, l, h, s, a;
                    if (f.Error == null) {
                        for (e = $("#vtws-vehicleThumbTiles"), e = e.clone(), e.html(""), o = $("#vtws-vehicleThumbTiles"), o = o.clone(), o.html(""), c = !1, l = !1, h = 0; h < f.length; h++) s = f[h], a = i(s), s.ApiId === null || s.ApiId === undefined || s.ApiId === 1 ? (e.append(a), c = !0) : (o.append(a), l = !0);
                        c && (r.html(e), n.removeClass("vtws-hide"));
                        l && (u.html(o), t.removeClass("vtws-hide"))
                    } else console.log(f.Error);
                    $("#vtws-vehicleSelect").show();
                    $("#vtws-mainImage").addClass("vtws-hide")
                }).fail(function() {
                    console.log("failed to thumbnails for year, make model")
                })
            });
            $uploadVehicle && ($uploadVehicle.onchange = function(n) {
                $("#vtws-swatches").hide();
                var t = new FileReader;
                t.onload = function(n) {
                    resetVehicleCanvas();
                    var t = new Image;
                    t.src = n.target.result;
                    t.onload = function() {
                        $("#vtws-secondaryVehicle").hide();
                        vehicleStageScale = $mainVehicleStage.width() / this.width;
                        vehicleWheelScale = $mainVehicleStage.width() / baseVehicleWidth;
                        setVehicleStageScale(this.width, this.height);
                        setVehicleBackground(c_mainVehicle, t.src);
                        clientImageUpload = !0;
                        loadWheelPosition()
                    }
                };
                t.readAsDataURL(n.target.files[0]);
                $uploadVehicle.value = "";
                $("#vtws-vehicleSelect .vtws-close-button").click()
            });
            $(document).on("click", "#vtws-swatches a", loadSwatch);
            $("#vtws-secondaryVehicle").click(changeOrientation);
            $("button[rel*=leanModal]").leanModal({
                closeButton: ".vtws-close-button"
            })
        }
    }),
    function() {
        var n = 0;
        $.extend({
            loadingSpinner: function() {
                if (0 === n) $('<div id="custom-loading-overlay" class="loading spin-modal"><\/div>').appendTo("body");
                n++
            },
            removeLoadingSpinner: function() {
                n--;
                n <= 0 && ($("#custom-loading-overlay").remove(), n = 0)
            }
        })
    }();
baseURL = "https://apps.velocity-tech.com";
var autoSelect = !1,
    autoSelectYear = 2017,
    autoSelectMake = "Ford",
    autoSelectModel = "Mustang",
    autoSelectBodyType = "Coupe",
    autoSelectSubModel = "V6",
    vehicleList = null,
    vehicleYears = [];
$(function() {
    var t, i, n;
    if (console.log("vt-vehicle-selector.js Startup"), $("#vtws-selected-vehicle").hide(), $("#vtws-change-vehicle").click(vtwsChangeVehicle), $("#vtws-vehicle-year").change(getMakes), $("#vtws-vehicle-make").change(getModels), $("#vtws-vehicle-model").change(getBodyTypes), $("#vtws-vehicle-body-type").change(getSubModels), $("#vtws-vehicle-sub-model").change(subModelSelected), $("#vtws-change-vehicle").click(vtwsChangeVehicle), t = qs("b"), i = qs("v"), i && i != "") {
        if (n = i.split("|"), n && n.length == 5) {
            var r = n[0],
                u = n[1],
                f = n[2],
                e = n[3],
                o = n[4];
            vtwsSelectVehicle(r, u, f, e, o, null, !1, t)
        }
    } else t && t != "" && searchWheels({
        brand: t
    }), $("#vtws-select-menus").is(":visible") && getYears(!0)
})
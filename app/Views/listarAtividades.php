<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<style>
    th {
        color: #092e48;
        text-align: left;
        margin-top: 20px;
        font: caption;
    }

    h2 {
        color: #092e48;
    }

    h3 {
        margin-top: 50px;
        text-align: center;
        color: red;
    }

    #cad,
    #cad1 {
        width: 40px;
        background-color: #008CBA;
        font-size: 12px;
        border-radius: 8px;
        border: 2px solid;
        text-align: center;
        margin-left: -5px;
    }

    #cad:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<main>
    <div class="container bg-white" style="padding-bottom: 10em;">

        <div class="row">
            <div class="col-12">
                <h2 style="text-align: center; font-size:30px">Atividades</h2>
                <?php if ($data) { ?>
                    <table class="table table-hover" id="atividades">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Data</th> <!-- abrir um popup ou card  / BD dt inicio-->
<th scope="col">Certificado</th> <!-- check box / BD tipo-->
<th scope="col">Ação</th> <!-- check box / BD tipo-->
</tr>
</thead>
<tbody>
    <?php
                    foreach ($data as $key => $atividade) {
                        if ($atividade['tipo'] == '1') {
                            $tipo = 'Sim';
                        } else {
                            $tipo = 'Não';
                        }
                        echo '<tr><td>' . $atividade['id'] . '</td><td>' . $atividade['titulo'] . '</td><td>' . $atividade['dtInicio'] . '</td><td>' . $tipo . '</td>

                               ';

                        if (date($atividade['dtFim']) > date("Y-m-d H:i:s")) {
                            echo '<td><a class="btn btn-primary" id="cad" href= ' . base_url('/atividades/inscreverAtividade') . "/" . $atividade['id'] . ' onclick="inscreverAtividade(' . $atividade['id'] . ');"  role="button" >Ir </a></td></tr>';
                        } else {
                            echo '<td><a type="button" id="cad" class=" cad btn btn-primary" data-toggle="modal" data-target="#sobreModal">
                                    Ir
                                </a></td></tr>';
                        }
                    }
    ?>

</tbody>
</table>
</div>
</div>

<div class="modal fade" data-backdrop="static" id="sobreModal" tabindex="-1" aria-labelledby="sobreModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sobreModalLabel">Atividade</h5>
                <button type="button" class="close cad" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Infelizmente está atividade já encerrou!
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<?php

                } else {
                    echo "<h3>Não esta cadastrado em nenhum atividade!</h3>";
                }

?>
</div>
</main>
<script>
    function inscreverAtividade($id) {
        var link = '<?php echo (base_url("/atividades/inscreverAtividade") . "/");  ?>';
        document.getElementById("cad").href = link + $id;

    }
</script> -->


<!DOCTYPE html>
<html style="font-size: 10px;font-family: Roboto, Arial, sans-serif;">

<head>
    <base target="_top">
    <script nonce="bIY8zI+dM2etfwWkLKp1kw">
        var ytcfg = {
            d: function() {
                return window.yt && yt.config_ || ytcfg.data_ || (ytcfg.data_ = {})
            },
            get: function(k, o) {
                return k in ytcfg.d() ? ytcfg.d()[k] : o
            },
            set: function() {
                var a = arguments;
                if (a.length > 1) ytcfg.d()[a[0]] = a[1];
                else
                    for (var k in a[0]) ytcfg.d()[k] = a[0][k]
            }
        };
        window.ytcfg.set('EMERGENCY_BASE_URL', '\/error_204?t\x3djserror\x26level\x3dERROR\x26client.name\x3d1\x26client.version\x3d2.20210817.00.00');
    </script>
    <script nonce="bIY8zI+dM2etfwWkLKp1kw">
        (function() {
            window.yterr = window.yterr || true;
            window.unhandledErrorMessages = {};
            window.unhandledErrorCount = 0;
            window.onerror = function(msg, url, line, columnNumber, error) {
                var err;
                if (error) err = error;
                else {
                    err = new Error;
                    err.stack = "";
                    err.message = msg;
                    err.fileName = url;
                    err.lineNumber = line;
                    if (!isNaN(columnNumber)) err["columnNumber"] = columnNumber
                }
                var message = String(err.message);
                if (!err.message || message in window.unhandledErrorMessages || window.unhandledErrorCount >= 5) return;
                window.unhandledErrorCount += 1;
                window.unhandledErrorMessages[message] = true;
                var img = new Image;
                window.emergencyTimeoutImg = img;
                img.onload = img.onerror = function() {
                    delete window.emergencyTimeoutImg
                };
                var combinedLineAndColumn = err.lineNumber;
                if (!isNaN(err["columnNumber"])) combinedLineAndColumn += ":" + err["columnNumber"];
                var stack = err.stack || "";
                var values = {
                    "msg": message,
                    "type": err.name,
                    "client.params": "unhandled window error",
                    "file": err.fileName,
                    "line": combinedLineAndColumn,
                    "stack": stack.substr(0, 500)
                };
                var thirdPartyScript = !err.fileName || err.fileName === "<anonymous>" || stack.indexOf("extension://") >= 0;
                var replaced = stack.replace(/https:\/\/www.youtube.com\//g, "");
                if (replaced.match(/https?:\/\/[^/]+\//)) thirdPartyScript =
                    true;
                else if (stack.indexOf("trapProp") >= 0 && stack.indexOf("trapChain") >= 0) thirdPartyScript = true;
                else if (message.indexOf("redefine non-configurable") >= 0 && message.indexOf("userAgent") >= 0) thirdPartyScript = true;
                var baseUrl = window["ytcfg"].get("EMERGENCY_BASE_URL", "https://www.youtube.com/error_204?t=jserror&level=ERROR");
                var unsupported = message.indexOf("window.customElements is undefined") >= 0;
                if (thirdPartyScript || unsupported) baseUrl = baseUrl.replace("level=ERROR", "level=WARNING");
                var parts = [baseUrl];
                for (var key in values) {
                    var value =
                        values[key];
                    if (value) parts.push(key + "=" + encodeURIComponent(value))
                }
                img.src = parts.join("&")
            };
            (function() {
                function _getExtendedNativePrototype(tag) {
                    var p = this._nativePrototypes[tag];
                    if (!p) {
                        p = Object.create(this.getNativePrototype(tag));
                        var p$ = Object.getOwnPropertyNames(window["Polymer"].Base);
                        for (var i = 0, n = void 0; i < p$.length && (n = p$[i]); i++)
                            if (!window["Polymer"].BaseDescriptors[n]) try {
                                p[n] = window["Polymer"].Base[n]
                            } catch (e) {
                                throw new Error("Error while copying property: " + n + ". Tag is " + tag);
                            }
                        try {
                            Object.defineProperties(p, window["Polymer"].BaseDescriptors)
                        } catch (e$0) {
                            throw new Error("Polymer define property failed for " +
                                Object.keys(p));
                        }
                        this._nativePrototypes[tag] = p
                    }
                    return p
                }

                function handlePolymerError(msg) {
                    window.onerror(msg, window.location.href, 0, 0, new Error(Array.prototype.join.call(arguments, ",")))
                }
                var origPolymer = window["Polymer"];
                var newPolymer = function(config) {
                    if (!origPolymer._ytIntercepted && window["Polymer"].Base) {
                        origPolymer._ytIntercepted = true;
                        window["Polymer"].Base._getExtendedNativePrototype = _getExtendedNativePrototype;
                        window["Polymer"].Base._error = handlePolymerError;
                        window["Polymer"].Base._warn = handlePolymerError
                    }
                    return origPolymer.apply(this,
                        arguments)
                };
                var origDescriptor = Object.getOwnPropertyDescriptor(window, "Polymer");
                Object.defineProperty(window, "Polymer", {
                    set: function(p) {
                        if (origDescriptor && origDescriptor.set && origDescriptor.get) {
                            origDescriptor.set(p);
                            origPolymer = origDescriptor.get()
                        } else origPolymer = p;
                        if (typeof origPolymer === "function") Object.defineProperty(window, "Polymer", {
                            value: origPolymer,
                            configurable: true,
                            enumerable: true,
                            writable: true
                        })
                    },
                    get: function() {
                        return typeof origPolymer === "function" ? newPolymer : origPolymer
                    },
                    configurable: true,
                    enumerable: true
                })
            })();
        }).call(this);
    </script>
    <script nonce="bIY8zI+dM2etfwWkLKp1kw">
        window.Polymer = window.Polymer || {};
        window.Polymer.legacyOptimizations = true;
        window.Polymer.setPassiveTouchGestures = true;
        window.ShadyDOM = {
            force: true,
            preferPerformance: true,
            noPatch: true
        };
        window.ShadyCSS = {
            disableRuntime: true
        };
    </script>
    <style name="www-roboto" nonce="jgxCyK9SpEekmDO/sPD7cA">
        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu72xKOzY.woff2)format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu5mxKOzY.woff2)format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7mxKOzY.woff2)format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4WxKOzY.woff2)format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7WxKOzY.woff2)format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu7GxKOzY.woff2)format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: url(//fonts.gstatic.com/s/roboto/v18/KFOmCnqEu92Fr1Mu4mxK.woff2)format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
    </style>
    <script name="www-roboto" nonce="bIY8zI+dM2etfwWkLKp1kw">
        if (document.fonts && document.fonts.load) {
            document.fonts.load("400 10pt Roboto", "P");
            document.fonts.load("500 10pt Roboto", "P");
        }
    </script>
    <style class="global_styles" nonce="jgxCyK9SpEekmDO/sPD7cA">
        body {
            padding: 0;
            margin: 0;
            overflow-y: scroll
        }

        body.autoscroll {
            overflow-y: auto
        }

        body.no-scroll {
            overflow: hidden
        }

        body.no-y-scroll {
            overflow-y: hidden
        }

        .hidden {
            display: none
        }

        textarea {
            --paper-input-container-input_-_white-space: pre-wrap
        }

        .grecaptcha-badge {
            visibility: hidden
        }
    </style>
    <style nonce="jgxCyK9SpEekmDO/sPD7cA">
        body {
            overflow: hidden;
        }
    </style>
    <script src="https://www.youtube.com/s/desktop/d6715535/jsbin/scheduler.vflset/scheduler.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
    <script src="https://www.youtube.com/s/desktop/d6715535/jsbin/network.vflset/network.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
    <script src="https://www.youtube.com/s/desktop/d6715535/jsbin/web-animations-next-lite.min.vflset/web-animations-next-lite.min.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
    <script src="https://www.youtube.com/s/desktop/d6715535/jsbin/custom-elements-es5-adapter.vflset/custom-elements-es5-adapter.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
    <script src="https://www.youtube.com/s/desktop/d6715535/jsbin/webcomponents-sd.vflset/webcomponents-sd.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
    <script nonce="bIY8zI+dM2etfwWkLKp1kw">
        ytcfg.set({
            "DEVICE": "cbr\u003dChrome\u0026cbrver\u003d92.0.4515.159\u0026ceng\u003dWebKit\u0026cengver\u003d537.36\u0026cos\u003dWindows\u0026cosver\u003d10.0\u0026cplatform\u003dDESKTOP",
            "DISABLE_YT_IMG_DELAY_LOADING": false,
            "EVENT_ID": "zkMdYab_Gvz21sQPuruHmAw",
            "EXPERIMENT_FLAGS": {
                "element_pool_populator_auto_abort": true,
                "kevlar_hide_pp_url_param": true,
                "desktop_add_to_playlist_renderer_dialog_popup": true,
                "kevlar_update_topbar_logo_on_create": true,
                "kevlar_resolve_playlist_endpoint_as_watch_endpoint": true,
                "enable_service_ajax_csn": true,
                "kevlar_player_response_swf_config_wrapper_killswitch": true,
                "kevlar_calculate_grid_collapsible": true,
                "service_worker_subscribe_with_vapid_key": true,
                "kevlar_watch_skeleton": true,
                "kevlar_command_handler_toggle_buttons": true,
                "disable_simple_mixed_direction_formatted_strings": true,
                "desktop_animate_miniplayer": true,
                "enable_topsoil_wta_for_halftime_live_infra": true,
                "kevlar_woffle_use_offlineability_util": true,
                "nwl_sw_health_payloads": true,
                "web_prs_testing_mode_killswitch": true,
                "web_enable_ad_signals_in_it_context": true,
                "desktop_search_prominent_thumbs": true,
                "enable_share_panel_page_as_screen_layer": true,
                "kevlar_thumbnail_fluid": true,
                "kevlar_keyboard_button_focus": true,
                "enable_ytc_self_serve_refunds": true,
                "kevlar_hide_time_continue_url_param": true,
                "kevlar_miniplayer_play_pause_on_scrim": true,
                "global_spacebar_pause": true,
                "kevlar_client_save_subs_preferences": true,
                "player_allow_autonav_after_playlist": true,
                "kevlar_playback_associated_queue": true,
                "web_clean_sw_logs_store": true,
                "enable_get_account_switcher_endpoint_on_webfe": true,
                "kevlar_persistent_response_store": true,
                "enable_web_ketchup_hero_animation": true,
                "kevlar_lazy_list_resume_for_autofill": true,
                "kevlar_player_playlist_use_local_index": true,
                "serve_pdp_at_canonical_url": true,
                "web_visitorid_in_datasync": true,
                "enable_button_behavior_reuse": true,
                "reload_without_polymer_innertube": true,
                "web_compact_video_single_line": true,
                "use_oneplatform_for_video_preview": true,
                "desktop_mix_use_sampled_color_for_bottom_bar_search": true,
                "ytidb_is_supported_cache_success_result": true,
                "kevlar_service_command_check": true,
                "shared_pes_killswitch": true,
                "web_gel_timeout_cap": true,
                "enable_memberships_and_purchases": true,
                "kevlar_woffle_dl_manager": true,
                "endpoint_handler_logging_cleanup_killswitch": true,
                "mdx_enable_privacy_disclosure_ui": true,
                "kevlar_voice_logging_fix": true,
                "is_mweb_wexit_main_launch": true,
                "enable_servlet_errors_streamz": true,
                "kevlar_watch_drag_handles": true,
                "kevlar_guide_store": true,
                "html5_pacf_enable_dai": true,
                "polymer_warm_thumbnail_preload": true,
                "kevlar_droppable_prefetchable_requests": true,
                "live_chat_use_punctual": true,
                "disable_legacy_desktop_remote_queue": true,
                "kevlar_typography_update": true,
                "kevlar_prepare_player_on_miniplayer_activation": true,
                "defer_overlays": true,
                "enable_polymer_resin": true,
                "kevlar_disable_formatted_string_empty_style_class": true,
                "kevlar_center_search_results": true,
                "kevlar_web_response_context_yt_config_deprecation": true,
                "kevlar_miniplayer_no_update_on_deactivate": true,
                "log_final_payload": true,
                "polymer_verifiy_app_state": true,
                "kevlar_scrollbar_rework": true,
                "kevlar_player_watch_endpoint_navigation": true,
                "kevlar_decorate_endpoint_with_onesie_config": true,
                "suppress_error_204_logging": true,
                "warm_load_nav_start_web": true,
                "allow_https_streaming_for_all": true,
                "player_enable_playback_playlist_change": true,
                "kevlar_mealbar_above_player": true,
                "is_part_of_any_user_engagement_experiment": true,
                "vss_final_ping_send_and_write": true,
                "kevlar_player_cached_load_config": true,
                "kevlar_rendererstamper_event_listener": true,
                "nwl_trigger_throttle_after_reset": true,
                "kevlar_three_dot_ink": true,
                "desktop_mix_use_sampled_color_for_bottom_bar_watch_next": true,
                "kevlar_populate_command_on_download_button": true,
                "kevlar_player_disable_rvs_update": true,
                "web_autonav_allow_off_by_default": true,
                "ytidb_analyze_is_supported": true,
                "memberships_page_continuation_migrate": true,
                "rich_grid_content_visibility_optimization": true,
                "pdg_disable_web_super_vod_explicit_click_logging": true,
                "kevlar_tuner_should_defer_detach": true,
                "kevlar_standard_scrollbar_color": true,
                "player_endscreen_ellipsis_fix": true,
                "enable_programmed_playlist_redesign": true,
                "desktop_adjust_touch_target": true,
                "kevlar_cache_on_ttl_player": true,
                "desktop_fix_carousel_video_timeout": true,
                "kevlar_background_color_update": true,
                "desktop_sparkles_light_cta_button": true,
                "kevlar_command_handler": true,
                "autoescape_tempdata_url": true,
                "kevlar_js_fixes": true,
                "kevlar_no_redirect_to_classic_ks": true,
                "kevlar_passive_event_listeners": true,
                "your_data_entrypoint": true,
                "kevlar_masthead_store": true,
                "mdx_load_cast_api_bootstrap_script": true,
                "html5_enable_video_overlay_on_inplayer_slot_for_tv": true,
                "kevlar_collect_battery_network_status": true,
                "player_doubletap_to_seek": true,
                "desktop_swipeable_guide": true,
                "record_app_crashed_web": true,
                "check_user_lact_at_prompt_shown_time_on_web": true,
                "live_chat_attestation_signal": true,
                "kevlar_use_player_response_for_updates": true,
                "kevlar_no_autoscroll_on_playlist_hover": true,
                "live_chat_show_ongoing_poll_results_in_banner": true,
                "kevlar_watch_increased_width_threshold": true,
                "botguard_periodic_refresh": true,
                "fill_web_player_context_config": true,
                "web_offline_promo_via_get_player": true,
                "enable_polymer_resin_migration": true,
                "enable_post_scheduling": true,
                "kevlar_ctrl_tap_fix": true,
                "kevlar_local_innertube_response": true,
                "ytidb_stop_transaction_commit": true,
                "kevlar_include_query_in_search_endpoint": true,
                "kevlar_watch_navigation_clear_autoplay_count_session_data": true,
                "kevlar_fluid_touch_scroll": true,
                "polymer_bad_build_labels": true,
                "kevlar_playlist_drag_handles": true,
                "kevlar_enable_reorderable_playlists": true,
                "web_move_autoplay_video_under_chip": true,
                "kevlar_gel_error_routing": true,
                "include_autoplay_count_in_playlists": true,
                "enable_client_sli_logging": true,
                "kevlar_larger_three_dot_tap": true,
                "kevlar_client_side_screens": true,
                "desktop_text_ads_blue_cta_button": true,
                "enable_mentions_in_reposts": true,
                "kevlar_guide_lock_scrollbar": true,
                "kevlar_home_skeleton_hide_later": true,
                "log_heartbeat_with_lifecycles": true,
                "web_yt_config_context": true,
                "trigger_nsm_validation_checks_with_nwl": true,
                "kevlar_disable_background_prefetch": true,
                "kevlar_queue_use_update_api": true,
                "use_better_post_dismissals": true,
                "desktop_enable_wcr_multi_stage_canary": true,
                "kevlar_updated_logo_icons": true,
                "kevlar_miniplayer": true,
                "kevlar_use_one_platform_for_queue_refresh": true,
                "web_dont_cancel_pending_navigation_same_url": true,
                "kevlar_frontend_queue_recover": true,
                "kevlar_playlist_autonav_loop_fix": true,
                "kevlar_copy_playlist": true,
                "kevlar_cache_on_ttl": true,
                "disable_dependency_injection": true,
                "live_chat_over_playlist": true,
                "cold_missing_history": true,
                "kevlar_app_initializer_cleanup": true,
                "use_document_lifecycles": true,
                "kevlar_shell_for_downloads_page": true,
                "kevlar_mix_handle_first_endpoint_different": true,
                "kevlar_allow_playlist_reorder": true,
                "disable_child_node_auto_formatted_strings": true,
                "kevlar_continue_playback_without_player_response": true,
                "kevlar_inlined_html_templates_polymer_flags": true,
                "web_use_cache_for_image_fallback": true,
                "enable_streamline_repost_flow": true,
                "decorate_autoplay_renderer": true,
                "nwl_throttling_race_fix": true,
                "kevlar_op_watch_offline_fallback": true,
                "kevlar_client_side_filler_data": true,
                "kevlar_touch_feedback": true,
                "networkless_gel": true,
                "web_api_url": true,
                "web_playlist_watch_panel_overflow_with_add_to": true,
                "kevlar_home_skeleton": true,
                "kevlar_one_pick_add_video_to_playlist": true,
                "kevlar_frontend_video_list_actions": true,
                "web_lifecycles": true,
                "log_web_endpoint_to_layer": true,
                "kevlar_prefetch": true,
                "web_log_player_watch_next_ticks": true,
                "kevlar_fix_playlist_continuation": true,
                "export_networkless_options": true,
                "warm_op_csn_cleanup": true,
                "pageid_as_header_web": true,
                "kevlar_save_queue": true,
                "enable_comments_continuation_command_for_web": true,
                "kevlar_allow_queue_reorder": true,
                "web_appshell_refresh_trigger": true,
                "web_player_touch_mode_improvements": true,
                "enable_ypc_spinners": true,
                "screen_manager_log_servlet_ei": true,
                "kevlar_enable_editable_playlists": true,
                "kevlar_picker_ajax_migration": true,
                "kevlar_op_warm_pages": true,
                "flush_gel": true,
                "polymer2_element_pool_properties": true,
                "web_open_guide_items_in_new_tab": true,
                "search_ui_enable_pve_buy_button": true,
                "kevlar_autonav_miniplayer_fix": true,
                "enable_nwl_cleaning_logic": true,
                "kevlar_clean_up": true,
                "desktop_player_touch_gestures": true,
                "enable_topic_channel_tabs": true,
                "kevlar_no_early_init_unpause": true,
                "kevlar_use_endpoint_for_channel_creation_form": true,
                "enable_docked_chat_messages": true,
                "web_favicon_image_update": true,
                "enable_servlet_streamz": true,
                "validate_network_status": true,
                "web_player_move_autonav_toggle": true,
                "enable_ytc_refunds_submit_form_signal_action": true,
                "kevlar_injector": true,
                "kevlar_voice_search": true,
                "kevlar_watch_gesture_pandown": true,
                "disable_features_for_supex": true,
                "kevlar_enable_parent_tools_integration": true,
                "polymer2_polyfill_manual_flush": true,
                "topbar_persistent_store_fallback": true,
                "kevlar_use_response_ttl_to_invalidate_cache": true,
                "kevlar_disable_html_imports": true,
                "kevlar_watch_js_panel_height": true,
                "enable_call_to_action_clarification_renderer_bottom_section_conditions": true,
                "external_fullscreen": true,
                "rich_grid_mini_mode": true,
                "kevlar_entities_processor": true,
                "polymer_task_manager_proxied_promise": true,
                "ytidb_fetch_datasync_ids_for_data_cleanup": true,
                "kevlar_cache_on_ttl_search": true,
                "web_inline_player_disable_scrubbing": true,
                "kevlar_autonav_popup_filtering": true,
                "desktop_keyboard_capture_keydown_killswitch": true,
                "csi_on_gel": true,
                "kevlar_nitrate_driven_tooltips": true,
                "kevlar_typography_spacing_update": true,
                "enable_names_handles_account_switcher": true,
                "kevlar_dragdrop_fast_scroll": true,
                "searchbox_reporting": true,
                "desktop_suggest_dropdown_fix": true,
                "kevlar_should_maintain_stable_list": true,
                "desktop_crisis_onebox_restyle": true,
                "kevlar_cancel_scheduled_comment_jobs_on_navigate": true,
                "kevlar_miniplayer_queue_user_activation": true,
                "web_hide_autonav_keyline": true,
                "kevlar_op_infra": true,
                "use_undefined_csn_any_layer": true,
                "kevlar_log_initial_screen": true,
                "defer_rendering_outside_visible_area": true,
                "web_hide_autonav_headline": true,
                "kevlar_guide_ajax_migration": true,
                "enable_web_poster_hover_animation": true,
                "enable_mixed_direction_formatted_strings": true,
                "skip_endpoint_param_comparison": true,
                "enable_main_app_client_sli_logging": true,
                "player_bootstrap_method": true,
                "kevlar_channel_trailer_multi_attach": true,
                "polymer_video_renderer_defer_menu": true,
                "web_enable_history_cache_map": true,
                "kevlar_use_page_data_will_update": true,
                "enable_premium_voluntary_pause": true,
                "web_response_processor_support": true,
                "kevlar_channels_player_handle_missing_swfconfig": true,
                "kevlar_collect_hover_touch_support": true,
                "desktop_mic_background": true,
                "cache_utc_offset_minutes_in_pref_cookie": true,
                "browse_next_continuations_migration_playlist": true,
                "kevlar_scroll_chips_on_touch": true,
                "disable_thumbnail_preloading": true,
                "desktop_mix_use_sampled_color_for_bottom_bar": true,
                "kevlar_topbar_logo_fallback_home": true,
                "kevlar_queue_use_dedicated_list_type": true,
                "kevlar_no_url_params": true,
                "kevlar_update_youtube_sans": true,
                "gfeedback_for_signed_out_users_enabled": true,
                "kevlar_next_cold_on_auth_change_detected": true,
                "kevlar_snap_state_refresh": true,
                "kevlar_eager_shell_boot_via_one_platform": true,
                "kevlar_fetch_networkless_support": true,
                "kevlar_set_internal_player_size": true,
                "use_source_element_if_present_for_actions": true,
                "kevlar_transcript_engagement_panel": true,
                "web_appshell_purge_trigger": true,
                "deprecate_pair_servlet_enabled": true,
                "kevlar_command_url": true,
                "desktop_touch_gestures_usage_log": true,
                "kevlar_autofocus_menu_on_keyboard_nav": true,
                "kevlar_help_use_locale": true,
                "enable_gel_log_commands": true,
                "live_chat_unicode_emoji_skintone_update": true,
                "offline_error_handling": true,
                "spf_kevlar_assume_chunked": true,
                "kevlar_transcript_panel_refreshed_styles": true,
                "nwl_use_ytidb_partitioning": true,
                "enable_business_email_reveal_servlet_migration": true,
                "kevlar_hide_download_button_on_client": true,
                "vss_send_then_write": true,
                "state_machine_dynamic_events_lifecycles": true,
                "enable_signals": true,
                "enable_auto_play_param_fix_for_masthead_ad": true,
                "kevlar_fix_miniplayer_logging": true,
                "should_clear_video_data_on_player_cued_unstarted": true,
                "kevlar_miniplayer_set_element_early": true,
                "defer_menus": true,
                "kevlar_hide_playlist_playback_status": true,
                "kevlar_pandown_polyfill": true,
                "nwl_send_fast_on_unload": true,
                "kevlar_logged_out_topbar_menu_migration": true,
                "drop_st_cookie_before_cb": true,
                "web_forward_command_on_pbj": true,
                "kevlar_appshell_service_worker": true,
                "kevlar_exit_fullscreen_leaving_watch": true,
                "live_chat_increased_min_height": true,
                "kevlar_variable_youtube_sans": true,
                "external_fullscreen_with_edu": true,
                "web_always_load_chat_support": true,
                "kevlar_clear_non_displayable_url_params": true,
                "desktop_persistent_menu": true,
                "kevlar_use_page_command_url": true,
                "use_screen_manager_util": true,
                "enable_poll_choice_border_on_web": true,
                "kevlar_enable_slis": true,
                "kevlar_miniplayer_set_watch_next": true,
                "kevlar_playlist_responsive": true,
                "kevlar_cache_on_ttl_browse": true,
                "kevlar_macro_markers_keyboard_shortcut": true,
                "enable_purchase_activity_in_paid_memberships": true,
                "allow_skip_networkless": true,
                "web_use_overflow_menu_for_playlist_watch_panel": true,
                "kevlar_command_handler_init_plugin": true,
                "kevlar_watch_next_chips_continuations_migration": true,
                "enable_masthead_quartile_ping_fix": true,
                "kevlar_flexible_menu": true,
                "enable_offer_suppression": true,
                "networkless_logging": true,
                "kevlar_watch_color_update": true,
                "kevlar_chapters_list_view_seek_by_chapter": true,
                "kevlar_touch_gesture_ves": true,
                "search_ui_official_cards_enable_paid_virtual_event_buy_button": true,
                "kevlar_enable_parent_tools_onboarding": true,
                "kevlar_fallback_to_page_data_root_ve": true,
                "web_player_enable_ipp": true,
                "web_player_watch_next_response": true,
                "kevlar_tuner_run_default_comments_delay": true,
                "enable_yoodle": true,
                "kevlar_remove_prepopulator": true,
                "enable_microformat_data": true,
                "kevlar_miniplayer_expand_top": true,
                "kevlar_dropdown_fix": true,
                "pes_enable_association_store": true,
                "enable_client_streamz_web": true,
                "enable_channel_creation_avatar_editing": true,
                "kevlar_use_ytd_player": true,
                "desktop_themeable_vulcan": true,
                "enable_yto_window": true,
                "kevlar_themed_standardized_scrollbar": true,
                "web_deprecate_service_ajax_map_dependency": true,
                "service_worker_push_home_page_prompt": true,
                "service_worker_enabled": true,
                "desktop_notification_high_priority_ignore_push": true,
                "use_watch_fragments2": true,
                "kevlar_guide_refresh": true,
                "log_vis_on_tab_change": true,
                "desktop_notification_set_title_bar": true,
                "cancel_pending_navs": true,
                "enable_watch_next_pause_autoplay_lact": true,
                "service_worker_push_enabled": true,
                "service_worker_push_watch_page_prompt": true,
                "is_browser_support_for_webcam_streaming": true,
                "no_sub_count_on_sub_button": true,
                "desktop_client_release": true,
                "polymer_report_missing_web_navigation_endpoint_rate": 0.001,
                "kevlar_tuner_thumbnail_factor": 1.0,
                "nwl_cleaning_rate": 0.1,
                "web_system_health_fraction": 0.01,
                "browse_ajax_log_warning_fraction": 1.0,
                "polymer_report_client_url_requested_rate": 0.001,
                "kevlar_tuner_clamp_device_pixel_ratio": 2.0,
                "log_window_onerror_fraction": 0.1,
                "addto_ajax_log_warning_fraction": 0.1,
                "ytidb_transaction_ended_event_rate_limit": 0.02,
                "autoplay_pause_by_lact_sampling_fraction": 0.0,
                "log_web_meta_interval_ms": 0,
                "user_engagement_experiments_rate_limit_ms": 86400000,
                "autoplay_time_for_music_content": 3000,
                "desktop_search_suggestion_tap_target": 0,
                "initial_gel_batch_timeout": 2000,
                "kevlar_watch_flexy_metadata_height": 136,
                "post_type_icons_rearrange": 0,
                "live_chat_incremental_emoji_rendering_target_framerate": 60,
                "kevlar_persistent_guide_width_threshold": 1312,
                "botguard_async_snapshot_timeout_ms": 3000,
                "kevlar_watch_metadata_refresh_description_lines": 2,
                "kevlar_tuner_default_comments_delay": 1000,
                "min_mouse_still_duration": 100,
                "kevlar_time_caching_start_threshold": 15,
                "leader_election_check_interval": 9000,
                "viewport_load_collection_wait_time": 0,
                "autoplay_time_for_music_content_after_autoplayed_video": -1,
                "minimum_duration_to_consider_mouseover_as_hover": 500,
                "ytidb_transaction_try_count": 3,
                "kevlar_tuner_scheduler_soft_state_timer_ms": 800,
                "kevlar_mini_guide_width_threshold": 791,
                "leader_election_renewal_interval": 6000,
                "html5_experiment_id_label_live_infra": 0,
                "leader_election_lease_ttl": 10000,
                "client_streamz_web_flush_count": 100,
                "network_polling_interval": 30000,
                "html5_experiment_id_label": 0,
                "kevlar_tooltip_impression_cap": 2,
                "pbj_navigate_limit": -1,
                "high_priority_flyout_frequency": 3,
                "max_duration_to_consider_mouseover_as_hover": 600000,
                "visibility_time_between_jobs_ms": 100,
                "client_streamz_web_flush_interval_seconds": 60,
                "external_fullscreen_button_shown_threshold": 10,
                "user_mention_suggestions_edu_impression_cap": 10,
                "external_fullscreen_button_click_threshold": 2,
                "web_inline_player_triggering_delay": 1000,
                "yoodle_start_time_utc": 0,
                "kevlar_time_caching_end_threshold": 15,
                "web_foreground_heartbeat_interval_ms": 28000,
                "web_emulated_idle_callback_delay": 0,
                "kevlar_tuner_visibility_time_between_jobs_ms": 100,
                "web_gel_debounce_ms": 10000,
                "check_navigator_accuracy_timeout_ms": 0,
                "get_async_timeout_ms": 60000,
                "autoplay_time": 8000,
                "yoodle_end_time_utc": 0,
                "prefetch_comments_ms_after_video": 0,
                "web_logging_max_batch": 150,
                "watch_next_pause_autoplay_lact_sec": 4500,
                "autoplay_pause_by_lact_sec": 0,
                "service_worker_push_prompt_cap": -1,
                "service_worker_push_prompt_delay_microseconds": 3888000000000,
                "service_worker_push_logged_out_prompt_watches": -1,
                "desktop_suggestion_box_style": "default",
                "desktop_search_prominent_thumbs_style": "DEFAULT",
                "web_client_version_override": "",
                "yoodle_alt_text_locale": "",
                "debug_forced_internalcountrycode": "",
                "yoodle_base_url": "",
                "yoodle_alt_text": "",
                "polymer_task_manager_status": "production",
                "desktop_searchbar_style": "default",
                "yoodle_webp_base_url": "",
                "kevlar_link_capturing_mode": "",
                "cb_v2_uxe": "23983171",
                "live_chat_unicode_emoji_json_url": "https://www.gstatic.com/youtube/img/emojis/emojis-svg-7.json",
                "WebClientReleaseProcessCritical__youtube_web_client_version_override": "",
                "thumbnail_overlay_deferral_priority": "LOW",
                "desktop_web_client_version_override": "",
                "kevlar_next_up_next_edu_emoji": "",
                "service_worker_scope": "/",
                "service_worker_push_force_notification_prompt_tag": "1",
                "guide_business_info_countries": ["KR"],
                "web_op_endpoint_banlist": [],
                "web_op_signal_type_banlist": [],
                "kevlar_op_browse_sampled_prefix_ids": [],
                "ten_video_reordering": [0, 1, 2, 3, 6, 4, 5, 7, 8, 9],
                "kevlar_page_service_url_prefix_carveouts": [],
                "conditional_lab_ids": [],
                "guide_legal_footer_enabled_countries": ["NL", "ES"],
                "web_op_continuation_type_banlist": [],
                "kevlar_command_handler_command_banlist": [],
                "twelve_video_reordering": [0, 1, 2, 4, 7, 8, 3, 5, 6, 9, 10, 11]
            },
            "GAPI_HINT_PARAMS": "m;/_/scs/abc-static/_/js/k\u003dgapi.gapi.en.2cdKFnNWjuc.O/d\u003d1/rs\u003dAHpOoo-rZMnae0kdWLu9CWmKEzOTJj_h7w/m\u003d__features__",
            "GAPI_HOST": "https://apis.google.com",
            "GAPI_LOCALE": "pt_BR",
            "GL": "BR",
            "GOOGLE_FEEDBACK_PRODUCT_ID": "59",
            "GOOGLE_FEEDBACK_PRODUCT_DATA": {
                "polymer": "active",
                "polymer2": "active",
                "accept_language": "pt-BR,pt;q\u003d0.9,en-US;q\u003d0.8,en;q\u003d0.7"
            },
            "HL": "pt",
            "HTML_DIR": "ltr",
            "HTML_LANG": "pt-BR",
            "ID_TOKEN": "QUFFLUhqa0pQUHRVQU5qQmN6SG1hcGcyN2MyZnNCMldPQXw\u003d",
            "INNERTUBE_API_KEY": "AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8",
            "INNERTUBE_API_VERSION": "v1",
            "INNERTUBE_CLIENT_NAME": "WEB",
            "INNERTUBE_CLIENT_VERSION": "2.20210817.00.00",
            "INNERTUBE_CONTEXT": {
                "client": {
                    "hl": "pt",
                    "gl": "BR",
                    "remoteHost": "200.229.234.2",
                    "deviceMake": "",
                    "deviceModel": "",
                    "visitorData": "Cgt5NS1YdDZBVUFudyjOh_WIBg%3D%3D",
                    "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36,gzip(gfe)",
                    "clientName": "WEB",
                    "clientVersion": "2.20210817.00.00",
                    "osName": "Windows",
                    "osVersion": "10.0",
                    "originalUrl": "https://www.youtube.com/live_chat?continuation\u003d0ofMyANxGlhDaWtxSndvWVZVTktOR014TmtsU1NUbE9ZWFl0ZERaak0yOXNTMEozRWdzeU5VOUdiRlpQZERGbE9Cb1Q2cWpkdVFFTkNnc3lOVTlHYkZaUGRERmxPQ0FCMAGCAQIIBIgBAaAB6rOl2Iy78gKyAQA%253D",
                    "platform": "DESKTOP",
                    "clientFormFactor": "UNKNOWN_FORM_FACTOR",
                    "timeZone": "America/Bahia",
                    "browserName": "Chrome",
                    "browserVersion": "92.0.4515.159"
                },
                "user": {
                    "lockedSafetyMode": false
                },
                "request": {
                    "useSsl": true
                },
                "clickTracking": {
                    "clickTrackingParams": "IhMIpp6T34y78gIVfLuVAh263QHD"
                }
            },
            "INNERTUBE_CONTEXT_CLIENT_NAME": 1,
            "INNERTUBE_CONTEXT_CLIENT_VERSION": "2.20210817.00.00",
            "INNERTUBE_CONTEXT_GL": "BR",
            "INNERTUBE_CONTEXT_HL": "pt",
            "LATEST_ECATCHER_SERVICE_TRACKING_PARAMS": {
                "client.name": "WEB"
            },
            "LOGGED_IN": true,
            "PAGE_BUILD_LABEL": "youtube.desktop.web_20210817_00_RC00",
            "PAGE_CL": 391216175,
            "SERVER_NAME": "WebFE",
            "SESSION_INDEX": "0",
            "VISITOR_DATA": "Cgt5NS1YdDZBVUFudyjOh_WIBg%3D%3D",
            "XSRF_FIELD_NAME": "session_token",
            "XSRF_TOKEN": "QUFFLUhqbXVxZGdsc25hR3hPNm4yTmNFZFczZXZCT3dzQXxBQ3Jtc0tudTMtSUhfZTBrd0R4RlotX0IwZ2lPdmU5X0FyN21kc2Z1eThxMVFhWGVUTWx6aDhmWlF6eXVocmNwUDJzeFBBN21maWJ1UTM0THhTOHN5VFMtRzBwSkc1TmZJNjBiYi1oQ013RUF1ZkpUTFJqbEpRSQ\u003d\u003d",
            "YPC_MB_URL": "https://payments.youtube.com/payments/v4/js/integrator.js?ss\u003dmd",
            "YTR_FAMILY_CREATION_URL": "https://families.google.com/webcreation?usegapi\u003d1",
            "SERVER_VERSION": "prod",
            "SERIALIZED_CLIENT_CONFIG_DATA": "CM6H9YgGELjLrQUQ0cCtBRDFrv0SENi-rQUQkfj8Eg%3D%3D",
            "LIVE_CHAT_BASE_TANGO_CONFIG": {
                "apiKey": "AIzaSyDZNkyC-AtROwMBpLfevIvqYk-Gfi8ZOeo",
                "channelUri": "https://client-channel.google.com/client-channel/client",
                "clientName": "yt-live-comments",
                "requiresAuthToken": false,
                "senderUri": "https://clients4.google.com/invalidation/lcs/client",
                "useNewTango": true
            },
            "LIVE_CHAT_SEND_MESSAGE_ACTION": "live_chat/watch_page/send",
            "CLIENT_PROTOCOL": "h2",
            "CLIENT_TRANSPORT": "tcp",
            "LIVE_CHAT_ALLOW_DARK_MODE": true,
            "POST_TO_PARENT_DOMAIN": "https://www.youtube.com/"
        });
    </script>
    <script src="https://www.gstatic.com/external_hosted/lottie/lottie_light.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
</head>

<body dir="ltr">
    <script src="https://www.youtube.com/s/desktop/d6715535/jsbin/live_chat_polymer.vflset/live_chat_polymer.js" nonce="bIY8zI+dM2etfwWkLKp1kw"></script>
    <script nonce="bIY8zI+dM2etfwWkLKp1kw">
        window["ytInitialData"] = {
            "responseContext": {
                "serviceTrackingParams": [{
                    "service": "CSI",
                    "params": [{
                        "key": "c",
                        "value": "WEB"
                    }, {
                        "key": "cver",
                        "value": "2.20210817.00.00"
                    }, {
                        "key": "yt_li",
                        "value": "1"
                    }, {
                        "key": "GetLiveChat_rid",
                        "value": "0x848e969601ed579d"
                    }]
                }, {
                    "service": "GFEEDBACK",
                    "params": [{
                        "key": "logged_in",
                        "value": "1"
                    }, {
                        "key": "e",
                        "value": "24007790,24061215,23884386,23804281,24083163,23934970,24044366,23946420,23996830,24037794,24082661,1714251,24057238,23983296,24007246,24084071,24056274,24083188,23882685,24004644,24045470,24001373,23735347,24059508,24089135,23966208,24077266,23857949,24083162,23984879,23744176,23944779,23974595,24069651,24086974,24089771,24060921,24002025,24059444,24058380,24053866,24071956,24016284,24087062,23886489,24036947,24045469,24049820,24050503,23968386,24083189,23998056,24079702,24078329,24080738,23858057,23986025,23918597,24028143,24002022"
                    }]
                }, {
                    "service": "GUIDED_HELP",
                    "params": [{
                        "key": "logged_in",
                        "value": "1"
                    }]
                }, {
                    "service": "ECATCHER",
                    "params": [{
                        "key": "client.version",
                        "value": "2.20210817"
                    }, {
                        "key": "client.name",
                        "value": "WEB"
                    }]
                }],
                "mainAppWebResponseContext": {
                    "datasyncId": "103046384863175901047||",
                    "loggedOut": false
                },
                "webResponseContextExtensionData": {
                    "hasDecorated": true
                }
            },
            "continuationContents": {
                "liveChatContinuation": {
                    "continuations": [{
                        "invalidationContinuationData": {
                            "invalidationId": {
                                "objectSource": 1056,
                                "objectId": "Y2hhdH4yNU9GbFZPdDFlOH41NDMxMDI3",
                                "topic": "chat~25OFlVOt1e8~5431027",
                                "subscribeToGcmTopics": true,
                                "protoCreationTimestampMs": "1629307854521"
                            },
                            "timeoutMs": 10000,
                            "continuation": "0ofMyAOmARpYQ2lrcUp3b1lWVU5LTkdNeE5rbFNTVGxPWVhZdGREWmpNMjlzUzBKM0Vnc3lOVTlHYkZaUGRERmxPQm9UNnFqZHVRRU5DZ3N5TlU5R2JGWlBkREZsT0NBQiiqxevcjLvyAjAAQAJKFggAGAAgAFDWlpXfjLvyAlgDeACiAQBQ-ZSZ3Yy78gJYnsbaov668gKCAQIIBIgBAKABhIiY34y78gKyAQA%3D",
                            "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O"
                        }
                    }],
                    "actions": [{
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "alguém pode me doar uma cesta básica? estou desempregada, passando dificuldades."
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Amanda Martins"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQzaYUg3-j3cCyLV56lHP6j6PxXTmRrOH3cyfu3=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQzaYUg3-j3cCyLV56lHP6j6PxXTmRrOH3cyfu3=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHd6UXpSTU1reDFYMGxEUm1VMGEzSlJXV1IxYVZWRVYxRVNKME5QVjJ4cE9XVkxkVjlKUTBaVFR6RnNVVWxrTW5VNFQzZG5NVFl5T1RNd056VXhOVE16TlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUzJWS2VreFhPV3BJY214UVJsWTNPR0V5UXkxcmR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMM0M0TDJMdV9JQ0ZlNGtyUVlkdWlVRFdREidDT1dsaTllS3VfSUNGU08xbFFJZDJ1OE93ZzE2MjkzMDc1MTUzMzU%3D",
                                    "timestampUsec": "1629307515969895",
                                    "authorExternalChannelId": "UCKeJzLW9jHrlPFV78a2C-kw",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COWli9eKu_ICFSO1lQId2u8Owg1629307515335"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "verdad Mary"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHgxTkhoeU5reDFYMGxEUmxOWmJYSlJXV1JwTFRoQ1NuY1NKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056VXhPRE0yTkJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMdTR4cjZMdV9JQ0ZTWW1yUVlkaS04Qkp3EidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc1MTgzNjQ%3D",
                                    "timestampUsec": "1629307517639784",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307518364"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "tudo bem Josi"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Luiz Pimenta Rodrigued"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQk_Yk_mr0kNeCxqf-55lQB9RoIrMo5WXiZ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQk_Yk_mr0kNeCxqf-55lQB9RoIrMo5WXiZ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHRMT0doTUxVeDFYMGxEUmxKM1pISlJXV1F3ZVRoRlVsRVNKME5LYlRoNU5XRk1kVjlKUTBaUlpYWnNVVWxrU2xGalFuaG5NVFl5T1RNd056VXpNVFU0TnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlRKWWFFWTFaM2MyTmtkaFdWWkxVMHhSVURkYVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLSzhoTC1MdV9JQ0ZSd2RyUVlkMHk4RVJREidDSm04eTVhTHVfSUNGUWV2bFFJZEpRY0J4ZzE2MjkzMDc1MzE1ODc%3D",
                                    "timestampUsec": "1629307518656120",
                                    "authorExternalChannelId": "UCE2XhF5gw66GaYVKSLQP7ZQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CJm8y5aLu_ICFQevlQIdJQcBxg1629307531587"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "o no mundo da Dalvinha e tudo fake"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "zoeira Rj"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/L8PncOCDQbyUNMbqTn-6Vo6yCPcQqzGJemoIOU3Yn8Xn_Q7xk8RUYX9o0WB7zeu6myAZ1XZr=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/L8PncOCDQbyUNMbqTn-6Vo6yCPcQqzGJemoIOU3Yn8Xn_Q7xk8RUYX9o0WB7zeu6myAZ1XZr=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJtUzJkalIweDFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5PTTFGNVNtRkxkVjlKUTBaVmJXMXNVVWxrZGxSTlRsRkJNVFl5T1RNd056VXlNVGcwTlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEZDE5NmRISkhWVUpLYmxoRWR6QlRURjlOYzBsaVp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQZktnY0dMdV9JQ0ZjVU5yUVlkTl9nQk9nEidDTjNReUphS3VfSUNGVW1tbFFJZHZUTU5RQTE2MjkzMDc1MjE4NDU%3D",
                                    "timestampUsec": "1629307522803106",
                                    "authorExternalChannelId": "UCw_ztrGUBJnXDw0SL_MsIbg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CN3QyJaKu_ICFUmmlQIdvTMNQA1629307521845"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Dalvinha 😂😂"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Marília Gabriella"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/aXhT02F5mIllyUoMaVS5XSAqUCFq5uKSKbWvb1d864xuc0V9T1A7oeKAQJ165IWRrlsczWFABg=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/aXhT02F5mIllyUoMaVS5XSAqUCFq5uKSKbWvb1d864xuc0V9T1A7oeKAQJ165IWRrlsczWFABg=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGxYZEd0alMweDFYMGxEUmxVNFZISlJXV1E0YUZWRWQxRVNKME5OTWxRemIybElkVjlKUTBabVNVTklaMEZrTkVkTlN6VjNNVFl5T1RNd056VXhORFkyT0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEWW1weFRXczBVMDVGVkVaMlRGUTJhWGhzTTJselp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJV3RrY0tMdV9JQ0ZVOFRyUVlkOGhVRHdREidDTTJUM29pSHVfSUNGZklDSGdBZDRHTUs1dzE2MjkzMDc1MTQ2Njg%3D",
                                    "timestampUsec": "1629307525158599",
                                    "authorExternalChannelId": "UCbjqMk4SNETFvLT6ixl3isg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CM2T3oiHu_ICFfICHgAd4GMK5w1629307514668"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "🤣🤣🤣🤣"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Marília Gabriella"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/aXhT02F5mIllyUoMaVS5XSAqUCFq5uKSKbWvb1d864xuc0V9T1A7oeKAQJ165IWRrlsczWFABg=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/aXhT02F5mIllyUoMaVS5XSAqUCFq5uKSKbWvb1d864xuc0V9T1A7oeKAQJ165IWRrlsczWFABg=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHBpUVRZNFUweDFYMGxEUmxOWmJYSlJXV1JwTFRoQ1NuY1NKME5OTWxRemIybElkVjlKUTBabVNVTklaMEZrTkVkTlN6VjNNVFl5T1RNd056VXlNRE0wTnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEWW1weFRXczBVMDVGVkVaMlRGUTJhWGhzTTJselp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKYkE2OFNMdV9JQ0ZTWW1yUVlkaS04Qkp3EidDTTJUM29pSHVfSUNGZklDSGdBZDRHTUs1dzE2MjkzMDc1MjAzNDc%3D",
                                    "timestampUsec": "1629307530829889",
                                    "authorExternalChannelId": "UCbjqMk4SNETFvLT6ixl3isg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CM2T3oiHu_ICFfICHgAd4GMK5w1629307520347"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Luiz Pimenta, tudo jóia! e com você?"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDlVYmpVNFpVeDFYMGxEUmxadlVISlJXV1EzYVc5RlUxRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056VXpOVEF3TnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPVG41OGVMdV9JQ0ZWb1ByUVlkN2lvRVNREidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc1MzUwMDc%3D",
                                    "timestampUsec": "1629307537060920",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307535007"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "estou ótimo thalia"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJmZUMxamJVeDFYMGxEUm1VMGEzSlJXV1IxYVZWRVYxRVNKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056VXdOakkyTWhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQX3gtY21MdV9JQ0ZlNGtyUVlkdWlVRFdREidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc1MDYyNjI%3D",
                                    "timestampUsec": "1629307541551429",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307506262"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Jocy não precisa moça pode mim chamar só de Charles"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Charles Alves"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGw2Y2pKemVVeDFYMGxEUm1OTlptWlJiMlJVU1RoRVQzY1NKME5OVDFKNFkyVkJkVjlKUTBaVVUzcHNVVWxrTFRnNFExTlJNVFl5T1RNd056VTBOVGN5TXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETld0M05UWnlWWG96ZFhsU2IySm9iRnBTYTNoMFFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJenIyc3lMdV9JQ0ZjTWZmUW9kVEk4RE93EidDTU9SeGNlQXVfSUNGVFN6bFFJZC04OENTUTE2MjkzMDc1NDU3MjM%3D",
                                    "timestampUsec": "1629307547334083",
                                    "authorExternalChannelId": "UC5kw56rUz3uyRobhlZRkxtA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CMORxceAu_ICFTSzlQId-88CSQ1629307545723"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "e vc thalia"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGxsTmpNNExVeDFYMGxEUmxOSlF6VjNiMlJpU1UxRk1HY1NKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056VXhPRFF3TlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJZTYzOC1MdV9JQ0ZTSUM1d29kYklNRTBnEidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc1MTg0MDU%3D",
                                    "timestampUsec": "1629307553701193",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307518405"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "fui"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHBwZHpWT1MweDFYMGxEUm1WVmNuSlJXV1JIVmpoRFlrRVNKME5NTW5Sell6Sk1kVjlKUTBaVlQzZHNVVWxrU2xWalJYbFJNVFl5T1RNd056VTJNRFF6TXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKaXc1TktMdV9JQ0ZlVXJyUVlkR1Y4Q2JBEidDTDJ0c2MyTHVfSUNGVU93bFFJZEpVY0V5UTE2MjkzMDc1NjA0MzM%3D",
                                    "timestampUsec": "1629307560073297",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CL2tsc2Lu_ICFUOwlQIdJUcEyQ1629307560433"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Daniel, quente heim!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDFxTlhCT1QweDFYMGxEUmxadlVISlJXV1EzYVc5RlUxRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056VTFPVEE1TVJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNajVwTk9MdV9JQ0ZWb1ByUVlkN2lvRVNREidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc1NTkwOTE%3D",
                                    "timestampUsec": "1629307561131269",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307559091"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "como tão as. coisas daniel"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJ5TVhCT1QweDFYMGxEUmxadlVISlJXV1EzYVc5RlUxRVNKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056TXpNREE1T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQcjFwTk9MdV9JQ0ZWb1ByUVlkN2lvRVNREidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDczMzAwOTk%3D",
                                    "timestampUsec": "1629307561130823",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307330099"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Charles Alves, rs"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHB0TnpSa2RVeDFYMGxEUm1OcmFISlJXV1J5WkhOSFJYY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056VTNOamcwTnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKbTc0ZHVMdV9JQ0Zja2hyUVlkcmRzR0V3EidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc1NzY4NDc%3D",
                                    "timestampUsec": "1629307578899952",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307576847"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "sim josy mucho"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGt5VG5WT2VVeDFYMGxEUmxwSVFYZG5VV1JpUWtGTldsRVNKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056VTRNVEEyTmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJMk51TnlMdV9JQ0ZaSEF3Z1FkYkJBTVpREidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc1ODEwNjY%3D",
                                    "timestampUsec": "1629307580319443",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307581066"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Oi mary"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGsyUkd3NU1reDFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056VTBOalU0TUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJNkRsOTJMdV9JQ0ZjVU5yUVlkTl9nQk9nEidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc1NDY1ODA%3D",
                                    "timestampUsec": "1629307581874623",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307546580"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Josy tudo bem, só curtindo esses modao"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Luiz Pimenta Rodrigued"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQk_Yk_mr0kNeCxqf-55lQB9RoIrMo5WXiZ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQk_Yk_mr0kNeCxqf-55lQB9RoIrMo5WXiZ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGw1VXkxa0xVeDFYMGxEUmxkM1VuSlJXV1JKUm05TVpWRVNKME5LYlRoNU5XRk1kVjlKUTBaUlpYWnNVVWxrU2xGalFuaG5NVFl5T1RNd056WXdNRFl3T0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlRKWWFFWTFaM2MyTmtkaFdWWkxVMHhSVURkYVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJeVMtZC1MdV9JQ0ZXd1JyUVlkSUZvTGVREidDSm04eTVhTHVfSUNGUWV2bFFJZEpRY0J4ZzE2MjkzMDc2MDA2MDg%3D",
                                    "timestampUsec": "1629307587676483",
                                    "authorExternalChannelId": "UCE2XhF5gw66GaYVKSLQP7ZQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CJm8y5aLu_ICFQevlQIdJQcBxg1629307600608"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Eu tô bem Breno"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "THALIA"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUEyZG1wbFMweDFYMGxEUmxOak1uSlJXV1JEVFhOR01IY1NKME5LTFdoMU9XRk1kVjlKUTBaUlIwUnNVVWxrYjBnMFR6VjNNVFl5T1RNd056Y3hNak14TmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEWDJ0TFZFMXBlRU5KYTJkalVsSlNNek5XTkhSTFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQNnZqZUtMdV9JQ0ZTYzJyUVlkQ01zRjB3EidDSi1odTlhTHVfSUNGUUdEbFFJZG9INE81dzE2MjkzMDc3MTIzMTY%3D",
                                    "timestampUsec": "1629307592202277",
                                    "authorExternalChannelId": "UC_kKTMixCIkgcRRR33V4tKg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CJ-hu9aLu_ICFQGDlQIdoH4O5w1629307712316"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Oi josy"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDVxUmpWUFMweDFYMGxEUm1WVmNuSlJXV1JIVmpoRFlrRVNKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056VTFPREkyTVJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOakY1T0tMdV9JQ0ZlVXJyUVlkR1Y4Q2JBEidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc1NTgyNjE%3D",
                                    "timestampUsec": "1629307593630504",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307558261"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "oi Breno"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHhQT0RaUFUweDFYMGxEUm1WNlJIZG5VV1F6YWxWSk1YY1NKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056TTJOamN3TlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMTzg2T1NMdV9JQ0ZlekR3Z1FkM2pVSTF3EidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDczNjY3MDU%3D",
                                    "timestampUsec": "1629307597889126",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307366705"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Luiz Pimenta, bacana!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDl5Tm5abFlVeDFYMGxEUm1VMGEzSlJXV1IxYVZWRVYxRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056VTVPVE0wTXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPcjZ2ZWFMdV9JQ0ZlNGtyUVlkdWlVRFdREidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc1OTkzNDM%3D",
                                    "timestampUsec": "1629307601386931",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307599343"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "todo bienn mary y vc"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDUyTXpGbFpVeDFYMGxEUmxWRldqVjNiMlF6WWxGSVYxRVNKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056WXdORFUyTXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOdjMxZWVMdV9JQ0ZVRVo1d29kM2JRSFdREidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc2MDQ1NjM%3D",
                                    "timestampUsec": "1629307603876864",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307604563"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Bueno Silva, Olá!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDUyTjNGbGVVeDFYMGxEUm1WVmNuSlJXV1JIVmpoRFlrRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056WXhNVFU0TlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOdjdxZXlMdV9JQ0ZlVXJyUVlkR1Y4Q2JBEidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc2MTE1ODU%3D",
                                    "timestampUsec": "1629307613642264",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307611585"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "tudo bem sim Daniel"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHB5YzNRdE5reDFYMGxEUmxKM1pISlJXV1F3ZVRoRlVsRVNKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056TTROekF6TXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKcnN0LTZMdV9JQ0ZSd2RyUVlkMHk4RVJREidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDczODcwMzM%3D",
                                    "timestampUsec": "1629307618063963",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307387033"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "fui"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHBmY0c0dExVeDFYMGxEUm1SblFYSlJXV1E1T0c5S01HY1NKME5NTW5Sell6Sk1kVjlKUTBaVlQzZHNVVWxrU2xWalJYbFJNVFl5T1RNd056WXlNREUwT1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKX3BuLS1MdV9JQ0ZkZ0FyUVlkOThvSjBnEidDTDJ0c2MyTHVfSUNGVU93bFFJZEpVY0V5UTE2MjkzMDc2MjAxNDk%3D",
                                    "timestampUsec": "1629307619767517",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CL2tsc2Lu_ICFUOwlQIdJUcEyQ1629307620149"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Breno **"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGxZYnpWZlIweDFYMGxEUmxOWmJYSlJXV1JwTFRoQ1NuY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056WXlNekE1TWhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJWG81X0dMdV9JQ0ZTWW1yUVlkaS04Qkp3EidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc2MjMwOTI%3D",
                                    "timestampUsec": "1629307625141305",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307623092"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "dalvi foi vc"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDFYTTJ4bVlVeDFYMGxEUmxsRldHWlJiMlJ0TVVGS2FsRVNKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056WXpOVEF4TWhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNVzNsZmFMdV9JQ0ZZRVhmUW9kbTFBSmpREidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc2MzUwMTI%3D",
                                    "timestampUsec": "1629307634277392",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307635012"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "td joia mary e Brasília está quente 🔥hein"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHd6VUhsUWRVeDFYMGxEUmxOWmJYSlJXV1JwTFRoQ1NuY1NKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056WXhNRE13T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMM1B5UHVMdV9JQ0ZTWW1yUVlkaS04Qkp3EidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc2MTAzMDk%3D",
                                    "timestampUsec": "1629307645601765",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307610309"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Jocy Lacerda é um nome com a personalidade forte"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Charles Alves"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDVJYUhwZk5reDFYMGxEUm1OcmFISlJXV1J5WkhOSFJYY1NKME5OVDFKNFkyVkJkVjlKUTBaVVUzcHNVVWxrTFRnNFExTlJNVFl5T1RNd056WTFNRE01T0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETld0M05UWnlWWG96ZFhsU2IySm9iRnBTYTNoMFFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOSGh6XzZMdV9JQ0Zja2hyUVlkcmRzR0V3EidDTU9SeGNlQXVfSUNGVFN6bFFJZC04OENTUTE2MjkzMDc2NTAzOTg%3D",
                                    "timestampUsec": "1629307652010247",
                                    "authorExternalChannelId": "UC5kw56rUz3uyRobhlZRkxtA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CMORxceAu_ICFTSzlQId-88CSQ1629307650398"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "ja vô"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDl0VVhwWlQwMTFYMGxEUmxVNFZISlJXV1E0YUZWRWQxRVNKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056UXpNVFEwTWhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPbVF6WU9NdV9JQ0ZVOFRyUVlkOGhVRHdREidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDc0MzE0NDI%3D",
                                    "timestampUsec": "1629307662452887",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307431442"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Daniel que"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDkxY0d0SlpVMTFYMGxEUm1VMGEzSlJXV1IxYVZWRVYxRVNKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056WTNNREV6TnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPdXBrSWVNdV9JQ0ZlNGtyUVlkdWlVRFdREidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc2NzAxMzc%3D",
                                    "timestampUsec": "1629307669845273",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307670137"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Charles Alves, sim! tenho a personalidade forte!rsrs"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDFNZDNCWmRVMTFYMGxEUmxWSlIzSlJXV1ExZUVGSFYxRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056WTNOalV6T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNTHdwWXVNdV9JQ0ZVSUdyUVlkNXhBR1dREidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc2NzY1Mzk%3D",
                                    "timestampUsec": "1629307678586999",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307676539"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "oi josy"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Marcelo"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHREY0hkSmVVMTFYMGxEUmxsRldHWlJiMlJ0TVVGS2FsRVNKME5MUjBaNGIwTk5kVjlKUTBaYVEwWnNVVWxrVG5VNFQweG5NVFl5T1RNd056VTBOekV4T0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETnpJM1UwZENZemhUYzJjNUxYRjNWM1JHYzJKUmR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLQ3B3SXlNdV9JQ0ZZRVhmUW9kbTFBSmpREidDS0dGeG9DTXVfSUNGWkNGbFFJZE51OE9MZzE2MjkzMDc1NDcxMTg%3D",
                                    "timestampUsec": "1629307681117421",
                                    "authorExternalChannelId": "UC727SGBc8Ssg9-qwWtFsbQw",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CKGFxoCMu_ICFZCFlQIdNu8OLg1629307547118"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "deixa eu ficar aki🌿👀"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "THALIA"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMGxZWW1sWk1rMTFYMGxEUm1WVmNuSlJXV1JIVmpoRFlrRVNKME5RZVdNMVh6Sk1kVjlKUTBaaWVVMXNVVWxrYkdsblFWcDNNVFl5T1RNd056Z3dNamd3TVJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEWDJ0TFZFMXBlRU5KYTJkalVsSlNNek5XTkhSTFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNJWGJpWTJNdV9JQ0ZlVXJyUVlkR1Y4Q2JBEidDUHljNV8yTHVfSUNGYnlNbFFJZGxpZ0FadzE2MjkzMDc4MDI4MDE%3D",
                                    "timestampUsec": "1629307682319815",
                                    "authorExternalChannelId": "UC_kKTMixCIkgcRRR33V4tKg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPyc5_2Lu_ICFbyMlQIdligAZw1629307802801"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "markChatItemAsDeletedAction": {
                            "deletedStateMessage": {
                                "runs": [{
                                    "text": "[mensagem retratada]"
                                }]
                            },
                            "targetItemId": "CkUKGkNKU2YxSXFNdV9JQ0ZVOFRyUVlkOGhVRHdREidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc2NDE5NjE%3D"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "sii vc se foiii dalvi"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJZVjNaSkxVMTFYMGxEUmxWSlIzSlJXV1ExZUVGSFYxRVNKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056WTRPREV3TlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQWFd2SS1NdV9JQ0ZVSUdyUVlkNXhBR1dREidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc2ODgxMDU%3D",
                                    "timestampUsec": "1629307687349155",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307688105"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "sim"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHRtWVd3MVQwMTFYMGxEUm1OTlptWlJiMlJVU1RoRVQzY1NKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056WTVOVFEyTkJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLZmFsNU9NdV9JQ0ZjTWZmUW9kVEk4RE93EidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc2OTU0NjQ%3D",
                                    "timestampUsec": "1629307695131998",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307695464"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Mary, és de Brasília também?"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHRmY0hrMVYwMTFYMGxEUm1WNlJIZG5VV1F6YWxWSk1YY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056WTVPREV6TkJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLX3B5NVdNdV9JQ0ZlekR3Z1FkM2pVSTF3EidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc2OTgxMzQ%3D",
                                    "timestampUsec": "1629307700180227",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307698134"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "tchauuuuuu"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHgxVW10d1pVMTFYMGxEUmxkM1VuSlJXV1JKUm05TVpWRVNKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056Y3dNemN5TmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMdVJrcGVNdV9JQ0ZXd1JyUVlkSUZvTGVREidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc3MDM3MjY%3D",
                                    "timestampUsec": "1629307703429362",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307703726"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "aa"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDVoTWpKd1pVMTFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056Y3dOVE0yT0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOYTIycGVNdV9JQ0ZjVU5yUVlkTl9nQk9nEidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc3MDUzNjg%3D",
                                    "timestampUsec": "1629307704613772",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307705368"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Marcelo, Olá!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHN5V1drMWNVMTFYMGxEUmxkRlR6VjNiMlJPVEZsUE0xRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056Y3dOelV6T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLMllpNXFNdV9JQ0ZXRU81d29kTkxZTzNREidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc3MDc1Mzk%3D",
                                    "timestampUsec": "1629307709607082",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307707539"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "b"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDlUTm0xS2VVMTFYMGxEUmxWSlIzSlJXV1ExZUVGSFYxRVNKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056Y3hORE0xT1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPUzZtSnlNdV9JQ0ZVSUdyUVlkNXhBR1dREidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc3MTQzNTk%3D",
                                    "timestampUsec": "1629307714018726",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307714359"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "josy vc fala de onde"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHRMUjIwMWVVMTFYMGxEUmxOak1uSlJXV1JEVFhOR01IY1NKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056WTNPRGMzTXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLS0dtNXlNdV9JQ0ZTYzJyUVlkQ01zRjB3EidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc2Nzg3NzM%3D",
                                    "timestampUsec": "1629307714061149",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307678773"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "eu"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHhNWTJwS01rMTFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056UTRNekkzTUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMTGNqSjJNdV9JQ0ZjVU5yUVlkTl9nQk9nEidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDc0ODMyNzA%3D",
                                    "timestampUsec": "1629307715923554",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307483270"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "c"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHh4Ukhod01rMTFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056Y3hOekl3TmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMcUR4cDJNdV9JQ0ZjVU5yUVlkTl9nQk9nEidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc3MTcyMDY%3D",
                                    "timestampUsec": "1629307716862454",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307717206"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "xque"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJ0Tkhwd05rMTFYMGxEUmxOak1uSlJXV1JEVFhOR01IY1NKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056Y3hPVGcwTUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQbTR6cDZNdV9JQ0ZTYzJyUVlkQ01zRjB3EidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc3MTk4NDA%3D",
                                    "timestampUsec": "1629307719097570",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307719840"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "d"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHRRYmpad05rMTFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056Y3hPVGt5TmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLUG42cDZNdV9JQ0ZjVU5yUVlkTl9nQk9nEidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc3MTk5MjY%3D",
                                    "timestampUsec": "1629307719562195",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307719926"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "f"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "🌍️mundo da dalvinha🌍"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/cZP14ZX1ZVg_SYBq9XsF98oNLp8fnf90viwbwBF1eBNcUrEWqF3TNZet4L-ScZ7lRuqs7fcNjQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDk1V0RkTFEwMTFYMGxEUm1SQk0zSlJXV1JZUzAxUVVVRVNKME5NUkRGM05FZE5kVjlKUTBaV1IyaHJRVzlrUm5OSlNYbFJNVFl5T1RNd056Y3lOREV4TUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUm14MExXZDZNbEZFYlVoSFFtd3dhRE4zVEhsNVVRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPeVg3S0NNdV9JQ0ZkQTNyUVlkWEtNUFFBEidDTEQxdzRHTXVfSUNGVkdoa0FvZEZzSUl5UTE2MjkzMDc3MjQxMTA%3D",
                                    "timestampUsec": "1629307723779103",
                                    "authorExternalChannelId": "UCFlt-gz2QDmHGBl0h3wLyyQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CLD1w4GMu_ICFVGhkAodFsIIyQ1629307724110"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Tudo bem moça linda"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Marcelo"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJIZDNrMlIwMTFYMGxEUmxkM1VuSlJXV1JKUm05TVpWRVNKME5MUjBaNGIwTk5kVjlKUTBaYVEwWnNVVWxrVG5VNFQweG5NVFl5T1RNd056VTVNVE01TVJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETnpJM1UwZENZemhUYzJjNUxYRjNWM1JHYzJKUmR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQR3d5NkdNdV9JQ0ZXd1JyUVlkSUZvTGVREidDS0dGeG9DTXVfSUNGWkNGbFFJZE51OE9MZzE2MjkzMDc1OTEzOTE%3D",
                                    "timestampUsec": "1629307725338787",
                                    "authorExternalChannelId": "UC727SGBc8Ssg9-qwWtFsbQw",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CKGFxoCMu_ICFZCFlQIdNu8OLg1629307591391"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Thalia cuidado com está moita"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Charles Alves"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHgyTUdnMlMwMTFYMGxEUm1OcmFISlJXV1J5WkhOSFJYY1NKME5OVDFKNFkyVkJkVjlKUTBaVVUzcHNVVWxrTFRnNFExTlJNVFl5T1RNd056Y3lORFk1TmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETld0M05UWnlWWG96ZFhsU2IySm9iRnBTYTNoMFFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMdjBoNktNdV9JQ0Zja2hyUVlkcmRzR0V3EidDTU9SeGNlQXVfSUNGVFN6bFFJZC04OENTUTE2MjkzMDc3MjQ2OTY%3D",
                                    "timestampUsec": "1629307726330479",
                                    "authorExternalChannelId": "UC5kw56rUz3uyRobhlZRkxtA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CMORxceAu_ICFTSzlQId-88CSQ1629307724696"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Breno Silva, Brasília!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUF5YmpWeFYwMTFYMGxEUmxOak1uSlJXV1JEVFhOR01IY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056Y3pNakV5TXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQMm41cVdNdV9JQ0ZTYzJyUVlkQ01zRjB3EidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc3MzIxMjM%3D",
                                    "timestampUsec": "1629307734168625",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307732123"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Boa tarde povo"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "DINHA.🐟💐"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/fKzohkqhjbAspqddQXmc5CgAlHdJiYxh0clgkzKHTg9uugKRFwxiXLNNBU9aAg3bowzg5zpKzYk=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/fKzohkqhjbAspqddQXmc5CgAlHdJiYxh0clgkzKHTg9uugKRFwxiXLNNBU9aAg3bowzg5zpKzYk=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDgzVGpCaFlVMTFYMGxEUmxadlVISlJXV1EzYVc5RlUxRVNKME5QYmxWcmNGZE5kVjlKUTBaWFN6WnNVVWxrV0ZoalNVNVJNVFl5T1RNd056WTJNalF5T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEZUdwTVRVUjBSbEowU0hsd2NsZE1lVWhqUVZoSlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPN04wYWFNdV9JQ0ZWb1ByUVlkN2lvRVNREidDT25Va3BXTXVfSUNGV0s2bFFJZFhYY0lOUTE2MjkzMDc2NjI0Mjk%3D",
                                    "timestampUsec": "1629307735926581",
                                    "authorExternalChannelId": "UCxjLMDtFRtHyprWLyHcAXIA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COnUkpWMu_ICFWK6lQIdXXcINQ1629307662429"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "josy sou n"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHRpVG5OTFpVMTFYMGxEUmxkM1VuSlJXV1JKUm05TVpWRVNKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056UTVPVFkyTnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNLYk5zS2VNdV9JQ0ZXd1JyUVlkSUZvTGVREidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDc0OTk2Njc%3D",
                                    "timestampUsec": "1629307737482992",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307499667"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Charles zulivre kkkkkkk"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "THALIA"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHBpUkRVMkxVMTFYMGxEUmxwSVFYZG5VV1JpUWtGTldsRVNKME5RZVdNMVh6Sk1kVjlKUTBaaWVVMXNVVWxrYkdsblFWcDNNVFl5T1RNd056ZzNOVFkxTXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEWDJ0TFZFMXBlRU5KYTJkalVsSlNNek5XTkhSTFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKYkQ1Ni1NdV9JQ0ZaSEF3Z1FkYkJBTVpREidDUHljNV8yTHVfSUNGYnlNbFFJZGxpZ0FadzE2MjkzMDc4NzU2NTM%3D",
                                    "timestampUsec": "1629307755160028",
                                    "authorExternalChannelId": "UC_kKTMixCIkgcRRR33V4tKg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPyc5_2Lu_ICFbyMlQIdligAZw1629307875653"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Dinha,boa tarde!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHhoV0dzM1IwMTFYMGxEUm1WVmNuSlJXV1JIVmpoRFlrRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056YzFOVGt5TXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMYVhrN0dNdV9JQ0ZlVXJyUVlkR1Y4Q2JBEidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc3NTU5MjM%3D",
                                    "timestampUsec": "1629307757972486",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307755923"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "sou de Goiânia josy"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDltT0RkTVMwMTFYMGxEUmxkM1VuSlJXV1JKUm05TVpWRVNKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056Y3lOakkzTlJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPZjg3TEtNdV9JQ0ZXd1JyUVlkSUZvTGVREidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc3MjYyNzU%3D",
                                    "timestampUsec": "1629307761540779",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307726275"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Dinha oi boa tarde"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Charles Alves"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUI2TVRNM1UwMTFYMGxEUmxwSVFYZG5VV1JpUWtGTldsRVNKME5OVDFKNFkyVkJkVjlKUTBaVVUzcHNVVWxrTFRnNFExTlJNVFl5T1RNd056YzJNemczTWhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETld0M05UWnlWWG96ZFhsU2IySm9iRnBTYTNoMFFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQejEzN1NNdV9JQ0ZaSEF3Z1FkYkJBTVpREidDTU9SeGNlQXVfSUNGVFN6bFFJZC04OENTUTE2MjkzMDc3NjM4NzI%3D",
                                    "timestampUsec": "1629307765521209",
                                    "authorExternalChannelId": "UC5kw56rUz3uyRobhlZRkxtA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CMORxceAu_ICFTSzlQId-88CSQ1629307763872"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Breno Silva, bacana!"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDFwUnpRM2JVMTFYMGxEUm1SblFYSlJXV1E1T0c5S01HY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056YzNOREF4TUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNaUc0N21NdV9JQ0ZkZ0FyUVlkOThvSjBnEidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc3NzQwMTA%3D",
                                    "timestampUsec": "1629307776058304",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307774010"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "fuiiiiiiii"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Charles Alves"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDF5ZGpGTlIwMTFYMGxEUmxWRldqVjNiMlF6WWxGSVYxRVNKME5OVDFKNFkyVkJkVjlKUTBaVVUzcHNVVWxrTFRnNFExTlJNVFl5T1RNd056YzVNVEF6TUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETld0M05UWnlWWG96ZFhsU2IySm9iRnBTYTNoMFFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNcnYxTUdNdV9JQ0ZVRVo1d29kM2JRSFdREidDTU9SeGNlQXVfSUNGVFN6bFFJZC04OENTUTE2MjkzMDc3OTEwMzA%3D",
                                    "timestampUsec": "1629307792603125",
                                    "authorExternalChannelId": "UC5kw56rUz3uyRobhlZRkxtA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CMORxceAu_ICFTSzlQId-88CSQ1629307791030"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "🌿👀"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "THALIA"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRISoy2P1YbBI8Kat2M0lPSUiVxL_E4mQD-iR6NwQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDlsUlhOTlQwMTFYMGxEUmxKblVISlJXV1JWVFRSSmJsRVNKME5RUjFFeGNuVk5kVjlKUTBaU2NVOXRVVzlrVDNKTlMyRlJNVFl5T1RNd056a3hOamM1TVJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEWDJ0TFZFMXBlRU5KYTJkalVsSlNNek5XTkhSTFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPZUVzTU9NdV9JQ0ZSZ1ByUVlkVU00SW5REidDUEdRMXJ1TXVfSUNGUnFPbVFvZE9yTUthUTE2MjkzMDc5MTY3OTE%3D",
                                    "timestampUsec": "1629307796193940",
                                    "authorExternalChannelId": "UC_kKTMixCIkgcRRR33V4tKg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPGQ1ruMu_ICFRqOmQodOrMKaQ1629307916791"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "que linda música sertaneya"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDVQWlhsTlQwMTFYMGxEUmxsRldHWlJiMlJ0TVVGS2FsRVNKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056YzVOekU1T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOT2V5TU9NdV9JQ0ZZRVhmUW9kbTFBSmpREidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc3OTcxOTk%3D",
                                    "timestampUsec": "1629307796590475",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307797199"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "fuiiii"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHhwVDJsalYwMTFYMGxEUm1OVlRuSlJXV1JPWDJkQ1QyY1NKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056VTJPRGN3T0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMaU9pY1dNdV9JQ0ZjVU5yUVlkTl9nQk9nEidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDc1Njg3MDg%3D",
                                    "timestampUsec": "1629307799750505",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307568708"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Charles boa tde"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "DINHA.🐟💐"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/fKzohkqhjbAspqddQXmc5CgAlHdJiYxh0clgkzKHTg9uugKRFwxiXLNNBU9aAg3bowzg5zpKzYk=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/fKzohkqhjbAspqddQXmc5CgAlHdJiYxh0clgkzKHTg9uugKRFwxiXLNNBU9aAg3bowzg5zpKzYk=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUF0WjE4NFYwMTFYMGxEUm1WQlRuSlJXV1EyUjNkTk1HY1NKME5QYmxWcmNGZE5kVjlKUTBaWFN6WnNVVWxrV0ZoalNVNVJNVFl5T1RNd056Y3lPREU1TnhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEZUdwTVRVUjBSbEowU0hsd2NsZE1lVWhqUVZoSlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQLWdfOFdNdV9JQ0ZlQU5yUVlkNkd3TTBnEidDT25Va3BXTXVfSUNGV0s2bFFJZFhYY0lOUTE2MjkzMDc3MjgxOTc%3D",
                                    "timestampUsec": "1629307801686213",
                                    "authorExternalChannelId": "UCxjLMDtFRtHyprWLyHcAXIA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COnUkpWMu_ICFWK6lQIdXXcINQ1629307728197"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "posso te perguntar josy"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDltY1hSTllVMTFYMGxEUmxwdlZUVjNiMlF3UmtWUExVRVNKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056YzJOekk1TXhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPZnF0TWFNdV9JQ0Zab1U1d29kMEZFTy1BEidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc3NjcyOTM%3D",
                                    "timestampUsec": "1629307802564014",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307767293"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "bem vindo a quentura bruno kkk"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Marcelo"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHB0VURsallVMTFYMGxEUm1WQlRuSlJXV1EyUjNkTk1HY1NKME5MUjBaNGIwTk5kVjlKUTBaYVEwWnNVVWxrVG5VNFQweG5NVFl5T1RNd056WTJPVFk1T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETnpJM1UwZENZemhUYzJjNUxYRjNWM1JHYzJKUmR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKbVA5Y2FNdV9JQ0ZlQU5yUVlkNkd3TTBnEidDS0dGeG9DTXVfSUNGWkNGbFFJZE51OE9MZzE2MjkzMDc2Njk2OTk%3D",
                                    "timestampUsec": "1629307803617258",
                                    "authorExternalChannelId": "UC727SGBc8Ssg9-qwWtFsbQw",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CKGFxoCMu_ICFZCFlQIdNu8OLg1629307669699"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Marcelo, tudo jóia! e com você?"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHB5YzE4NFlVMTFYMGxEUmxKM1pISlJXV1F3ZVRoRlVsRVNKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056Z3dNVGN4T1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNKcnNfOGFNdV9JQ0ZSd2RyUVlkMHk4RVJREidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc4MDE3MTk%3D",
                                    "timestampUsec": "1629307803792974",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307801719"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "xau Daniel"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "mary g s"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/NwEqyNb7O4D-NZ4xfIWRlC-F04HJUFI0Lf2MB4LGLMLFBU3gFWGngAN03LsMtBcub5InDgrs=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMHhRYzNaamJVMTFYMGxEUm1SQk0zSlJXV1JZUzAxUVVVRVNKME5RZGw5cGRsZExkVjlKUTBaVVJ6SnNVVWxrUXpOclRYZG5NVFl5T1RNd056VTNOemsxTVJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUTNBelRsSnNkVlpvVG5aZmMzRnRjRVZqZUhWdlFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNMUHN2Y21NdV9JQ0ZkQTNyUVlkWEtNUFFBEidDUHZfaXZXS3VfSUNGVEcybFFJZEMza013ZzE2MjkzMDc1Nzc5NTE%3D",
                                    "timestampUsec": "1629307809003120",
                                    "authorExternalChannelId": "UCCp3NRluVhNv_sqmpEcxuoA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CPv_ivWKu_ICFTG2lQIdC3kMwg1629307577951"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "vou atender um paciente aqui já eu volto"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Charles Alves"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLQdJbcTeEYt9H_PFhCnmr15_rYOZKlwIsgbd9JDFw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDVVT1Rkak1rMTFYMGxEUmxWSlIzSlJXV1ExZUVGSFYxRVNKME5OVDFKNFkyVkJkVjlKUTBaVVUzcHNVVWxrTFRnNFExTlJNVFl5T1RNd056Z3hOalUzT0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETld0M05UWnlWWG96ZFhsU2IySm9iRnBTYTNoMFFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOVDk3YzJNdV9JQ0ZVSUdyUVlkNXhBR1dREidDTU9SeGNlQXVfSUNGVFN6bFFJZC04OENTUTE2MjkzMDc4MTY1Nzg%3D",
                                    "timestampUsec": "1629307818180351",
                                    "authorExternalChannelId": "UC5kw56rUz3uyRobhlZRkxtA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CMORxceAu_ICFTSzlQId-88CSQ1629307816578"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "chauu mary"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Daniel"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/iXJDMiBB5uDnJMhVyZUCGRSXFJvghvJNXK8KX8epaR8T715pAOkENhy_9DyJJQ7SfX1rRSWOozQ=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDVUVVhJNE5rMTFYMGxEUmxOak1uSlJXV1JEVFhOR01IY1NKME5QYW1SeVpFZExkVjlKUTBaUlVVZElaMEZrV2pSQlJ6VjNNVFl5T1RNd056Z3hPVGcwTkJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEUlVWR1drOU9SMk5RUTNGTFlYUXdjVzlPWTBGdVFRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNOU1FyODZNdV9JQ0ZTYzJyUVlkQ01zRjB3EidDT2pkcmRHS3VfSUNGUVFHSGdBZFo0QUc1dzE2MjkzMDc4MTk4NDQ%3D",
                                    "timestampUsec": "1629307819247794",
                                    "authorExternalChannelId": "UCEEFZONGcPCqKat0qoNcAnA",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "COjdrdGKu_ICFQQGHgAdZ4AG5w1629307819844"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "emoji": {
                                                "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/egJ1XufTKYfegwOo57ewAg",
                                                "shortcuts": [":shelterin:"],
                                                "searchTerms": ["shelterin"],
                                                "image": {
                                                    "thumbnails": [{
                                                        "url": "https://yt3.ggpht.com/KgaktgJ3tmEFB-gMtjUcuHd6UKq50b-S3PbHEOSUbJG7UddPoJSmrIzysXA77jJp5oRNLWG84Q=w24-h24-c-k-nd",
                                                        "width": 24,
                                                        "height": 24
                                                    }, {
                                                        "url": "https://yt3.ggpht.com/KgaktgJ3tmEFB-gMtjUcuHd6UKq50b-S3PbHEOSUbJG7UddPoJSmrIzysXA77jJp5oRNLWG84Q=w48-h48-c-k-nd",
                                                        "width": 48,
                                                        "height": 48
                                                    }],
                                                    "accessibility": {
                                                        "accessibilityData": {
                                                            "label": "shelterin"
                                                        }
                                                    }
                                                },
                                                "isCustomEmoji": true
                                            }
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Maria Lourdes"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLR1n_wPBv5Ewzirviv4oFyAO4OBRV_UNw8PM5oNdg=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLR1n_wPBv5Ewzirviv4oFyAO4OBRV_UNw8PM5oNdg=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDFsYjI4NVUwMTFYMGxEUmxadlVISlJXV1EzYVc5RlUxRVNKME5MTm5vNVRYVk5kVjlKUTBabVpYcHNVVWxrVlhWSlMzaFJNVFl5T1RNd056Z3pNVEk1TUJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVUZCaVoxWlZSWHBrUlV0eE1DMUdXWHB3VkdwT1VRJTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNZW9vOVNNdV9JQ0ZWb1ByUVlkN2lvRVNREidDSzZ6OU11TXVfSUNGZmV6bFFJZFV1SUt4UTE2MjkzMDc4MzEyOTA%3D",
                                    "timestampUsec": "1629307831637134",
                                    "authorExternalChannelId": "UCPPbgVUEzdEKq0-FYzpTjNQ",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CK6z9MuMu_ICFfezlQIdUuIKxQ1629307831290"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "agora melhor falando com vc gatinha"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Marcelo"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/sgVDzwb-aCBSW3qWZwr9H8XrnVk_GJhLRfazCXaRcvT3SJn_uYyozOTTrgxk7G2lm12FPmDv4A=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDlIYTNaT1UwMTFYMGxEUmxWRldqVjNiMlF6WWxGSVYxRVNKME5MUjBaNGIwTk5kVjlKUTBaYVEwWnNVVWxrVG5VNFQweG5NVFl5T1RNd056WTVOems1T0JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZETnpJM1UwZENZemhUYzJjNUxYRjNWM1JHYzJKUmR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNPR2t2TlNNdV9JQ0ZVRVo1d29kM2JRSFdREidDS0dGeG9DTXVfSUNGWkNGbFFJZE51OE9MZzE2MjkzMDc2OTc5OTg%3D",
                                    "timestampUsec": "1629307832046222",
                                    "authorExternalChannelId": "UC727SGBc8Ssg9-qwWtFsbQw",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CKGFxoCMu_ICFZCFlQIdNu8OLg1629307697998"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Breno Silva, sim! pergunte."
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJETlRWMFYwMTFYMGxEUm1WNlJIZG5VV1F6YWxWSk1YY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056Z3pNamM0TkJvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQQzU1dFdNdV9JQ0ZlekR3Z1FkM2pVSTF3EidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc4MzI3ODQ%3D",
                                    "timestampUsec": "1629307834834221",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307832784"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "até mary"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Breno Silva"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLT85AvumpOgWHDFm0bDyrs_HNKSVZ57BnMbl92XZw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMDFpTTI5MGNVMTFYMGxEUm1OcmFISlJXV1J5WkhOSFJYY1NKME5KY2sxd05ESk1kVjlKUTBabGFYVnNVVWxrVDBoVlJITm5NVFl5T1RNd056Z3dPRGt6TmhvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEYURsUU56SmtTalUzU1dRMWJqZDZRVGhEWDBzNGR3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNNYjNvdHFNdV9JQ0Zja2hyUVlkcmRzR0V3EidDSXJNcDQyTHVfSUNGZWl1bFFJZE9IVURzZzE2MjkzMDc4MDg5MzY%3D",
                                    "timestampUsec": "1629307844213766",
                                    "authorExternalChannelId": "UCh9P72dJ57Id5n7zA8C_K8w",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CIrMp42Lu_ICFeiulQIdOHUDsg1629307808936"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatTextMessageRenderer": {
                                    "message": {
                                        "runs": [{
                                            "text": "Marcelo, rs"
                                        }]
                                    },
                                    "authorName": {
                                        "simpleText": "Josy Lacerda"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/hLb04-YIiuvMMwvTBET9OvZ5VXemn79EKPtSyj8l7OAx1iEetQ5V8ZON-ER9PmmVZ74zf8rjyw=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "contextMenuEndpoint": {
                                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "ignoreNavigation": true
                                            }
                                        },
                                        "liveChatItemContextMenuEndpoint": {
                                            "params": "Q2tjS1JRb2FRMUJpUlRZNWVVMTFYMGxEUm1SblFYSlJXV1E1T0c5S01HY1NKME5QTmxsd2NVOUxkVjlKUTBaaVRVVklaMEZrWjFkblRsRlJNVFl5T1RNd056ZzBOelUwT1JvcEtpY0tHRlZEU2pSak1UWkpVa2s1VG1GMkxYUTJZek52YkV0Q2R4SUxNalZQUm14V1QzUXhaVGdnQVNnRU1ob0tHRlZEVW1WT1Z6RlpVVVZzZDJkUlRrdEdkMFpTYTBWNFp3JTNEJTNE"
                                        }
                                    },
                                    "id": "CkUKGkNQYkU2OXlNdV9JQ0ZkZ0FyUVlkOThvSjBnEidDTzZZcHFPS3VfSUNGYk1FSGdBZGdXZ05RUTE2MjkzMDc4NDc1NDk%3D",
                                    "timestampUsec": "1629307849597610",
                                    "authorExternalChannelId": "UCReNW1YQElwgQNKFwFRkExg",
                                    "contextMenuAccessibility": {
                                        "accessibilityData": {
                                            "label": "Ações em comentários"
                                        }
                                    }
                                }
                            },
                            "clientId": "CO6YpqOKu_ICFbMEHgAdgWgNQQ1629307847549"
                        }
                    }, {
                        "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                        "addChatItemAction": {
                            "item": {
                                "liveChatViewerEngagementMessageRenderer": {
                                    "id": "CjEKL0NPTU1VTklUWV9HVUlERUxJTkVTX1ZFTTIwMjEvMDgvMTgtMTA6MzA6NTQuNTIx",
                                    "timestampUsec": "1629307854521329",
                                    "icon": {
                                        "iconType": "YOUTUBE_ROUND"
                                    },
                                    "message": {
                                        "runs": [{
                                            "text": "Curta o chat ao vivo! Não se esqueça de proteger sua privacidade e seguir nossas diretrizes da comunidade."
                                        }]
                                    },
                                    "actionButton": {
                                        "buttonRenderer": {
                                            "style": "STYLE_BLUE_TEXT",
                                            "size": "SIZE_DEFAULT",
                                            "isDisabled": false,
                                            "text": {
                                                "simpleText": "Saiba mais"
                                            },
                                            "navigationEndpoint": {
                                                "clickTrackingParams": "CA8Q8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                                "commandMetadata": {
                                                    "webCommandMetadata": {
                                                        "url": "//support.google.com/youtube/answer/2853856?hl=pt-BR#safe",
                                                        "webPageType": "WEB_PAGE_TYPE_UNKNOWN",
                                                        "rootVe": 83769
                                                    }
                                                },
                                                "urlEndpoint": {
                                                    "url": "//support.google.com/youtube/answer/2853856?hl=pt-BR#safe",
                                                    "target": "TARGET_NEW_WINDOW"
                                                }
                                            },
                                            "trackingParams": "CA8Q8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                            "accessibilityData": {
                                                "accessibilityData": {
                                                    "label": "Saiba mais"
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }],
                    "actionPanel": {
                        "liveChatMessageInputRenderer": {
                            "authorName": {
                                "simpleText": "Karina Souza"
                            },
                            "inputField": {
                                "liveChatTextInputFieldRenderer": {
                                    "placeholder": {
                                        "runs": [{
                                            "text": "Diga algo..."
                                        }]
                                    },
                                    "maxCharacterLimit": 200,
                                    "emojiCharacterCount": 10
                                }
                            },
                            "sendButton": {
                                "buttonRenderer": {
                                    "style": "STYLE_DEFAULT",
                                    "size": "SIZE_DEFAULT",
                                    "isDisabled": false,
                                    "serviceEndpoint": {
                                        "clickTrackingParams": "CA4Q8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                        "commandMetadata": {
                                            "webCommandMetadata": {
                                                "sendPost": true,
                                                "apiUrl": "/youtubei/v1/live_chat/send_message"
                                            }
                                        },
                                        "sendLiveChatMessageEndpoint": {
                                            "params": "Q2lrcUp3b1lWVU5LTkdNeE5rbFNTVGxPWVhZdGREWmpNMjlzUzBKM0Vnc3lOVTlHYkZaUGRERmxPQkFCR0FRJTNE",
                                            "actions": [{
                                                "clickTrackingParams": "CA4Q8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                                "addLiveChatTextMessageFromTemplateAction": {
                                                    "template": {
                                                        "liveChatTextMessageRenderer": {
                                                            "authorName": {
                                                                "simpleText": "Karina Souza"
                                                            },
                                                            "authorPhoto": {
                                                                "thumbnails": [{
                                                                    "url": "https://yt4.ggpht.com/yti/APfAmoEFATNd1nW9rJUbSMOGNvNhxF8AX7iaaAUO=s32-c-k-c0x00ffffff-no-rj",
                                                                    "width": 32,
                                                                    "height": 32
                                                                }, {
                                                                    "url": "https://yt4.ggpht.com/yti/APfAmoEFATNd1nW9rJUbSMOGNvNhxF8AX7iaaAUO=s64-c-k-c0x00ffffff-no-rj",
                                                                    "width": 64,
                                                                    "height": 64
                                                                }]
                                                            },
                                                            "authorExternalChannelId": "UCc0naDsyBCoPAyEfusZYdHg"
                                                        }
                                                    }
                                                }
                                            }],
                                            "clientIdPrefix": "CK6GmN-Mu_ICFTatlQIdAEMOTg"
                                        }
                                    },
                                    "icon": {
                                        "iconType": "SEND"
                                    },
                                    "accessibility": {
                                        "label": "Enviar"
                                    },
                                    "trackingParams": "CA4Q8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                    "accessibilityData": {
                                        "accessibilityData": {
                                            "label": "Enviar"
                                        }
                                    }
                                }
                            },
                            "pickers": [{
                                "emojiPickerRenderer": {
                                    "id": "emoji",
                                    "categories": [{
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "UCkszU2WH9gy1mb0dV-11UJg",
                                            "title": {
                                                "simpleText": "YouTube"
                                            },
                                            "emojiIds": ["UCkszU2WH9gy1mb0dV-11UJg/CIW60IPp_dYCFcuqTgodEu4IlQ", "UCkszU2WH9gy1mb0dV-11UJg/CN2m5cKr49sCFYbFggodDFEKrg", "UCkszU2WH9gy1mb0dV-11UJg/X_zdXMHgJaPa8gTGt4f4Ag", "UCkszU2WH9gy1mb0dV-11UJg/1v50XorRJ8GQ8gTz_prwAg", "UCkszU2WH9gy1mb0dV-11UJg/8P50XuS9Oo7h8wSqtIagBA", "UCkszU2WH9gy1mb0dV-11UJg/Fv90Xq-vJcPq8gTqzreQAQ", "UCkszU2WH9gy1mb0dV-11UJg/Iv90XouTLuOR8gSxxrToBA", "UCkszU2WH9gy1mb0dV-11UJg/Rf90XtDbG8GQ8gTz_prwAg", "UCkszU2WH9gy1mb0dV-11UJg/VP90Xv_wG82o8wTCi7CQAw", "UCkszU2WH9gy1mb0dV-11UJg/dv90XtfhAurw8gTgzar4DA", "UCkszU2WH9gy1mb0dV-11UJg/hf90Xv-jHeOR8gSxxrToBA", "UCkszU2WH9gy1mb0dV-11UJg/lP90XvOhCZGl8wSO1JmgAw", "UCkszU2WH9gy1mb0dV-11UJg/uP90Xq6wNYrK8gTUoo3wAg", "UCkszU2WH9gy1mb0dV-11UJg/fAF1XtDQMIrK8gTUoo3wAg", "UCkszU2WH9gy1mb0dV-11UJg/vQF1XpyaG_XG8gTs77bACQ", "UCkszU2WH9gy1mb0dV-11UJg/ygF1XpGUMMjk8gSDrI2wCw", "UCkszU2WH9gy1mb0dV-11UJg/8gF1Xp_zK8jk8gSDrI2wCw", "UCkszU2WH9gy1mb0dV-11UJg/EAJ1XrS7PMGQ8gTz_prwAg", "UCkszU2WH9gy1mb0dV-11UJg/JAJ1XpGpJYnW8wTupZu4Cw", "UCkszU2WH9gy1mb0dV-11UJg/PAJ1XsOOI4fegwOo57ewAg", "UCkszU2WH9gy1mb0dV-11UJg/egJ1XufTKYfegwOo57ewAg"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "people",
                                            "title": {
                                                "simpleText": "Pessoas"
                                            },
                                            "emojiIds": ["😀", "😃", "😄", "😁", "😆", "😅", "🤣", "😂", "🙂", "🙃", "😉", "😊", "😇", "🥰", "😍", "🤩", "😘", "😗", "☺", "😚", "😙", "🥲", "😋", "😛", "😜", "🤪", "😝", "🤑", "🤗", "🤭", "🤫", "🤔", "🤐", "🤨", "😐", "😑", "😶", "😶‍🌫", "😏", "😒", "🙄", "😬", "😮‍💨", "🤥", "😌", "😔", "😪", "🤤", "😴", "😷", "🤒", "🤕", "🤢", "🤮", "🤧", "🥵", "🥶", "🥴", "😵", "😵‍💫", "🤯", "🤠", "🥳", "🥸", "😎", "🤓", "🧐", "😕", "😟", "🙁", "☹", "😮", "😯", "😲", "😳", "🥺", "😦", "😧", "😨", "😰", "😥", "😢", "😭", "😱", "😖", "😣", "😞", "😓", "😩", "😫", "🥱", "😤", "😡", "😠", "🤬", "😈", "👿", "💀", "☠", "💩", "🤡", "👹", "👺", "👻", "👽", "👾", "🤖", "😺", "😸", "😹", "😻", "😼", "😽", "🙀", "😿", "😾", "🙈", "🙉", "🙊", "💋", "💌", "💘", "💝", "💖", "💗", "💓", "💞", "💕", "💟", "❣", "💔", "❤‍🔥", "❤‍🩹", "❤", "🧡", "💛", "💚", "💙", "💜", "🤎", "🖤", "🤍", "💯", "💢", "💥", "💫", "💦", "💨", "🕳", "💣", "💬", "👁‍🗨", "🗨", "🗯", "💭", "💤", "👋", "🤚", "🖐", "✋", "🖖", "👌", "🤌", "🤏", "✌", "🤞", "🤟", "🤘", "🤙", "👈", "👉", "👆", "🖕", "👇", "☝", "👍", "👎", "✊", "👊", "🤛", "🤜", "👏", "🙌", "👐", "🤲", "🤝", "🙏", "✍", "💅", "🤳", "💪", "🦾", "🦿", "🦵", "🦶", "👂", "🦻", "👃", "🧠", "🫀", "🫁", "🦷", "🦴", "👀", "👁", "👅", "👄", "👶", "🧒", "👦", "👧", "🧑", "👱", "👨", "🧔", "🧔‍♂", "🧔‍♀", "👩", "👱‍♀", "👱‍♂", "🧓", "👴", "👵", "🙍", "🙍‍♂", "🙍‍♀", "🙎", "🙎‍♂", "🙎‍♀", "🙅", "🙅‍♂", "🙅‍♀", "🙆", "🙆‍♂", "🙆‍♀", "💁", "💁‍♂", "💁‍♀", "🙋", "🙋‍♂", "🙋‍♀", "🧏", "🧏‍♂", "🧏‍♀", "🙇", "🙇‍♂", "🙇‍♀", "🤦", "🤦‍♂", "🤦‍♀", "🤷", "🤷‍♂", "🤷‍♀", "🧑‍⚕", "👨‍⚕", "👩‍⚕", "🧑‍🎓", "👨‍🎓", "👩‍🎓", "🧑‍🏫", "👨‍🏫", "👩‍🏫", "🧑‍⚖", "👨‍⚖", "👩‍⚖", "🧑‍🌾", "👨‍🌾", "👩‍🌾", "🧑‍🍳", "👨‍🍳", "👩‍🍳", "🧑‍🔧", "👨‍🔧", "👩‍🔧", "🧑‍🏭", "👨‍🏭", "👩‍🏭", "🧑‍💼", "👨‍💼", "👩‍💼", "🧑‍🔬", "👨‍🔬", "👩‍🔬", "🧑‍💻", "👨‍💻", "👩‍💻", "🧑‍🎤", "👨‍🎤", "👩‍🎤", "🧑‍🎨", "👨‍🎨", "👩‍🎨", "🧑‍✈", "👨‍✈", "👩‍✈", "🧑‍🚀", "👨‍🚀", "👩‍🚀", "🧑‍🚒", "👨‍🚒", "👩‍🚒", "👮", "👮‍♂", "👮‍♀", "🕵", "🕵‍♂", "🕵‍♀", "💂", "💂‍♂", "💂‍♀", "🥷", "👷", "👷‍♂", "👷‍♀", "🤴", "👸", "👳", "👳‍♂", "👳‍♀", "👲", "🧕", "🤵", "🤵‍♂", "🤵‍♀", "👰", "👰‍♂", "👰‍♀", "🤰", "🤱", "👩‍🍼", "👨‍🍼", "🧑‍🍼", "👼", "🎅", "🤶", "🧑‍🎄", "🦸", "🦸‍♂", "🦸‍♀", "🦹", "🦹‍♂", "🦹‍♀", "🧙", "🧙‍♂", "🧙‍♀", "🧚", "🧚‍♂", "🧚‍♀", "🧛", "🧛‍♂", "🧛‍♀", "🧜", "🧜‍♂", "🧜‍♀", "🧝", "🧝‍♂", "🧝‍♀", "🧞", "🧞‍♂", "🧞‍♀", "🧟", "🧟‍♂", "🧟‍♀", "💆", "💆‍♂", "💆‍♀", "💇", "💇‍♂", "💇‍♀", "🚶", "🚶‍♂", "🚶‍♀", "🧍", "🧍‍♂", "🧍‍♀", "🧎", "🧎‍♂", "🧎‍♀", "🧑‍🦯", "👨‍🦯", "👩‍🦯", "🧑‍🦼", "👨‍🦼", "👩‍🦼", "🧑‍🦽", "👨‍🦽", "👩‍🦽", "🏃", "🏃‍♂", "🏃‍♀", "💃", "🕺", "🕴", "👯", "👯‍♂", "👯‍♀", "🧖", "🧖‍♂", "🧖‍♀", "🧗", "🧗‍♂", "🧗‍♀", "🤺", "🏇", "⛷", "🏂", "🏌", "🏌‍♂", "🏌‍♀", "🏄", "🏄‍♂", "🏄‍♀", "🚣", "🚣‍♂", "🚣‍♀", "🏊", "🏊‍♂", "🏊‍♀", "⛹", "⛹‍♂", "⛹‍♀", "🏋", "🏋‍♂", "🏋‍♀", "🚴", "🚴‍♂", "🚴‍♀", "🚵", "🚵‍♂", "🚵‍♀", "🤸", "🤸‍♂", "🤸‍♀", "🤼", "🤼‍♂", "🤼‍♀", "🤽", "🤽‍♂", "🤽‍♀", "🤾", "🤾‍♂", "🤾‍♀", "🤹", "🤹‍♂", "🤹‍♀", "🧘", "🧘‍♂", "🧘‍♀", "🛀", "🛌", "🧑‍🤝‍🧑", "👭", "👫", "👬", "💏", "👩‍❤‍💋‍👨", "👨‍❤‍💋‍👨", "👩‍❤‍💋‍👩", "💑", "👩‍❤‍👨", "👨‍❤‍👨", "👩‍❤‍👩", "👪", "👨‍👩‍👦", "👨‍👩‍👧", "👨‍👩‍👧‍👦", "👨‍👩‍👦‍👦", "👨‍👩‍👧‍👧", "👨‍👨‍👦", "👨‍👨‍👧", "👨‍👨‍👧‍👦", "👨‍👨‍👦‍👦", "👨‍👨‍👧‍👧", "👩‍👩‍👦", "👩‍👩‍👧", "👩‍👩‍👧‍👦", "👩‍👩‍👦‍👦", "👩‍👩‍👧‍👧", "👨‍👦", "👨‍👦‍👦", "👨‍👧", "👨‍👧‍👦", "👨‍👧‍👧", "👩‍👦", "👩‍👦‍👦", "👩‍👧", "👩‍👧‍👦", "👩‍👧‍👧", "🗣", "👤", "👥", "🫂", "👣"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "nature",
                                            "title": {
                                                "simpleText": "Natureza"
                                            },
                                            "emojiIds": ["🐵", "🐒", "🦍", "🦧", "🐶", "🐕", "🦮", "🐕‍🦺", "🐩", "🐺", "🦊", "🦝", "🐱", "🐈", "🐈‍⬛", "🦁", "🐯", "🐅", "🐆", "🐴", "🐎", "🦄", "🦓", "🦌", "🦬", "🐮", "🐂", "🐃", "🐄", "🐷", "🐖", "🐗", "🐽", "🐏", "🐑", "🐐", "🐪", "🐫", "🦙", "🦒", "🐘", "🦣", "🦏", "🦛", "🐭", "🐁", "🐀", "🐹", "🐰", "🐇", "🐿", "🦫", "🦔", "🦇", "🐻", "🐻‍❄", "🐨", "🐼", "🦥", "🦦", "🦨", "🦘", "🦡", "🐾", "🦃", "🐔", "🐓", "🐣", "🐤", "🐥", "🐦", "🐧", "🕊", "🦅", "🦆", "🦢", "🦉", "🦤", "🪶", "🦩", "🦚", "🦜", "🐸", "🐊", "🐢", "🦎", "🐍", "🐲", "🐉", "🦕", "🦖", "🐳", "🐋", "🐬", "🦭", "🐟", "🐠", "🐡", "🦈", "🐙", "🐚", "🐌", "🦋", "🐛", "🐜", "🐝", "🪲", "🐞", "🦗", "🪳", "🕷", "🕸", "🦂", "🦟", "🪰", "🪱", "🦠", "💐", "🌸", "💮", "🏵", "🌹", "🥀", "🌺", "🌻", "🌼", "🌷", "🌱", "🪴", "🌲", "🌳", "🌴", "🌵", "🌾", "🌿", "☘", "🍀", "🍁", "🍂", "🍃"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "food",
                                            "title": {
                                                "simpleText": "Comida"
                                            },
                                            "emojiIds": ["🍇", "🍈", "🍉", "🍊", "🍋", "🍌", "🍍", "🥭", "🍎", "🍏", "🍐", "🍑", "🍒", "🍓", "🫐", "🥝", "🍅", "🫒", "🥥", "🥑", "🍆", "🥔", "🥕", "🌽", "🌶", "🫑", "🥒", "🥬", "🥦", "🧄", "🧅", "🍄", "🥜", "🌰", "🍞", "🥐", "🥖", "🫓", "🥨", "🥯", "🥞", "🧇", "🧀", "🍖", "🍗", "🥩", "🥓", "🍔", "🍟", "🍕", "🌭", "🥪", "🌮", "🌯", "🫔", "🥙", "🧆", "🥚", "🍳", "🥘", "🍲", "🫕", "🥣", "🥗", "🍿", "🧈", "🧂", "🥫", "🍱", "🍘", "🍙", "🍚", "🍛", "🍜", "🍝", "🍠", "🍢", "🍣", "🍤", "🍥", "🥮", "🍡", "🥟", "🥠", "🥡", "🦀", "🦞", "🦐", "🦑", "🦪", "🍦", "🍧", "🍨", "🍩", "🍪", "🎂", "🍰", "🧁", "🥧", "🍫", "🍬", "🍭", "🍮", "🍯", "🍼", "🥛", "☕", "🫖", "🍵", "🍶", "🍾", "🍷", "🍸", "🍹", "🍺", "🍻", "🥂", "🥃", "🥤", "🧋", "🧃", "🧉", "🧊", "🥢", "🍽", "🍴", "🥄", "🔪", "🏺"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "travel",
                                            "title": {
                                                "simpleText": "Viagem"
                                            },
                                            "emojiIds": ["🌍", "🌎", "🌏", "🌐", "🗺", "🗾", "🧭", "🏔", "⛰", "🌋", "🗻", "🏕", "🏖", "🏜", "🏝", "🏞", "🏟", "🏛", "🏗", "🧱", "🪨", "🪵", "🛖", "🏘", "🏚", "🏠", "🏡", "🏢", "🏣", "🏤", "🏥", "🏦", "🏨", "🏩", "🏪", "🏫", "🏬", "🏭", "🏯", "🏰", "💒", "🗼", "🗽", "⛪", "🕌", "🛕", "🕍", "⛩", "🕋", "⛲", "⛺", "🌁", "🌃", "🏙", "🌄", "🌅", "🌆", "🌇", "🌉", "♨", "🎠", "🎡", "🎢", "💈", "🎪", "🚂", "🚃", "🚄", "🚅", "🚆", "🚇", "🚈", "🚉", "🚊", "🚝", "🚞", "🚋", "🚌", "🚍", "🚎", "🚐", "🚑", "🚒", "🚓", "🚔", "🚕", "🚖", "🚗", "🚘", "🚙", "🛻", "🚚", "🚛", "🚜", "🏎", "🏍", "🛵", "🦽", "🦼", "🛺", "🚲", "🛴", "🛹", "🛼", "🚏", "🛣", "🛤", "🛢", "⛽", "🚨", "🚥", "🚦", "🛑", "🚧", "⚓", "⛵", "🛶", "🚤", "🛳", "⛴", "🛥", "🚢", "✈", "🛩", "🛫", "🛬", "🪂", "💺", "🚁", "🚟", "🚠", "🚡", "🛰", "🚀", "🛸", "🛎", "🧳", "⌛", "⏳", "⌚", "⏰", "⏱", "⏲", "🕰", "🕛", "🕧", "🕐", "🕜", "🕑", "🕝", "🕒", "🕞", "🕓", "🕟", "🕔", "🕠", "🕕", "🕡", "🕖", "🕢", "🕗", "🕣", "🕘", "🕤", "🕙", "🕥", "🕚", "🕦", "🌑", "🌒", "🌓", "🌔", "🌕", "🌖", "🌗", "🌘", "🌙", "🌚", "🌛", "🌜", "🌡", "☀", "🌝", "🌞", "🪐", "⭐", "🌟", "🌠", "🌌", "☁", "⛅", "⛈", "🌤", "🌥", "🌦", "🌧", "🌨", "🌩", "🌪", "🌫", "🌬", "🌀", "🌈", "🌂", "☂", "☔", "⛱", "⚡", "❄", "☃", "⛄", "☄", "🔥", "💧", "🌊"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "activities",
                                            "title": {
                                                "simpleText": "Atividades"
                                            },
                                            "emojiIds": ["🎃", "🎄", "🎆", "🎇", "🧨", "✨", "🎈", "🎉", "🎊", "🎋", "🎍", "🎎", "🎏", "🎐", "🎑", "🧧", "🎀", "🎁", "🎗", "🎟", "🎫", "🎖", "🏆", "🏅", "🥇", "🥈", "🥉", "⚽", "⚾", "🥎", "🏀", "🏐", "🏈", "🏉", "🎾", "🥏", "🎳", "🏏", "🏑", "🏒", "🥍", "🏓", "🏸", "🥊", "🥋", "🥅", "⛳", "⛸", "🎣", "🤿", "🎽", "🎿", "🛷", "🥌", "🎯", "🪀", "🪁", "🎱", "🔮", "🪄", "🧿", "🎮", "🕹", "🎰", "🎲", "🧩", "🧸", "🪅", "🪆", "♠", "♥", "♦", "♣", "♟", "🃏", "🀄", "🎴", "🎭", "🖼", "🎨", "🧵", "🪡", "🧶", "🪢"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "objects",
                                            "title": {
                                                "simpleText": "Objetos"
                                            },
                                            "emojiIds": ["👓", "🕶", "🥽", "🥼", "🦺", "👔", "👕", "👖", "🧣", "🧤", "🧥", "🧦", "👗", "👘", "🥻", "🩱", "🩲", "🩳", "👙", "👚", "👛", "👜", "👝", "🛍", "🎒", "🩴", "👞", "👟", "🥾", "🥿", "👠", "👡", "🩰", "👢", "👑", "👒", "🎩", "🎓", "🧢", "🪖", "⛑", "📿", "💄", "💍", "💎", "🔇", "🔈", "🔉", "🔊", "📢", "📣", "📯", "🔔", "🔕", "🎼", "🎵", "🎶", "🎙", "🎚", "🎛", "🎤", "🎧", "📻", "🎷", "🪗", "🎸", "🎹", "🎺", "🎻", "🪕", "🥁", "🪘", "📱", "📲", "☎", "📞", "📟", "📠", "🔋", "🔌", "💻", "🖥", "🖨", "⌨", "🖱", "🖲", "💽", "💾", "💿", "📀", "🧮", "🎥", "🎞", "📽", "🎬", "📺", "📷", "📸", "📹", "📼", "🔍", "🔎", "🕯", "💡", "🔦", "🏮", "🪔", "📔", "📕", "📖", "📗", "📘", "📙", "📚", "📓", "📒", "📃", "📜", "📄", "📰", "🗞", "📑", "🔖", "🏷", "💰", "🪙", "💴", "💵", "💶", "💷", "💸", "💳", "🧾", "💹", "✉", "📧", "📨", "📩", "📤", "📥", "📦", "📫", "📪", "📬", "📭", "📮", "🗳", "✏", "✒", "🖋", "🖊", "🖌", "🖍", "📝", "💼", "📁", "📂", "🗂", "📅", "📆", "🗒", "🗓", "📇", "📈", "📉", "📊", "📋", "📌", "📍", "📎", "🖇", "📏", "📐", "✂", "🗃", "🗄", "🗑", "🔒", "🔓", "🔏", "🔐", "🔑", "🗝", "🔨", "🪓", "⛏", "⚒", "🛠", "🗡", "⚔", "🔫", "🪃", "🏹", "🛡", "🪚", "🔧", "🪛", "🔩", "⚙", "🗜", "⚖", "🦯", "🔗", "⛓", "🪝", "🧰", "🧲", "🪜", "⚗", "🧪", "🧫", "🧬", "🔬", "🔭", "📡", "💉", "🩸", "💊", "🩹", "🩺", "🚪", "🛗", "🪞", "🪟", "🛏", "🛋", "🪑", "🚽", "🪠", "🚿", "🛁", "🪤", "🪒", "🧴", "🧷", "🧹", "🧺", "🧻", "🪣", "🧼", "🪥", "🧽", "🧯", "🛒", "🚬", "⚰", "🪦", "⚱", "🗿", "🪧"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }, {
                                        "emojiPickerCategoryRenderer": {
                                            "categoryId": "symbols",
                                            "title": {
                                                "simpleText": "Símbolos"
                                            },
                                            "emojiIds": ["🏧", "🚮", "🚰", "♿", "🚹", "🚺", "🚻", "🚼", "🚾", "🛂", "🛃", "🛄", "🛅", "⚠", "🚸", "⛔", "🚫", "🚳", "🚭", "🚯", "🚱", "🚷", "📵", "🔞", "☢", "☣", "⬆", "↗", "➡", "↘", "⬇", "↙", "⬅", "↖", "↕", "↔", "↩", "↪", "⤴", "⤵", "🔃", "🔄", "🔙", "🔚", "🔛", "🔜", "🔝", "🛐", "⚛", "🕉", "✡", "☸", "☯", "✝", "☦", "☪", "☮", "🕎", "🔯", "♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓", "⛎", "🔀", "🔁", "🔂", "▶", "⏩", "⏭", "⏯", "◀", "⏪", "⏮", "🔼", "⏫", "🔽", "⏬", "⏸", "⏹", "⏺", "⏏", "🎦", "🔅", "🔆", "📶", "📳", "📴", "♀", "♂", "⚧", "✖", "➕", "➖", "➗", "♾", "‼", "⁉", "❓", "❔", "❕", "❗", "〰", "💱", "💲", "⚕", "♻", "⚜", "🔱", "📛", "🔰", "⭕", "✅", "☑", "✔", "❌", "❎", "➰", "➿", "〽", "✳", "✴", "❇", "©", "®", "™", "🔴", "🟠", "🟡", "🟢", "🔵", "🟣", "🟤", "⚫", "⚪", "🟥", "🟧", "🟨", "🟩", "🟦", "🟪", "🟫", "⬛", "⬜", "◼", "◻", "◾", "◽", "▪", "▫", "🔶", "🔷", "🔸", "🔹", "🔺", "🔻", "💠", "🔘", "🔳", "🔲", "🏁", "🚩", "🎌", "🏴", "🏳", "🏳‍🌈", "🏳‍⚧", "🏴‍☠"],
                                            "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                        }
                                    }],
                                    "categoryButtons": [{
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "UCkszU2WH9gy1mb0dV-11UJg",
                                            "icon": {
                                                "iconType": "SPONSORSHIP_STAR"
                                            },
                                            "tooltip": "Emojis personalizados",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Emojis personalizados"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "people",
                                            "icon": {
                                                "iconType": "EMOJI_PEOPLE"
                                            },
                                            "tooltip": "Pessoas",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Pessoas"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "nature",
                                            "icon": {
                                                "iconType": "EMOJI_NATURE"
                                            },
                                            "tooltip": "Natureza",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Natureza"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "food",
                                            "icon": {
                                                "iconType": "EMOJI_FOOD"
                                            },
                                            "tooltip": "Comida",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Comida"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "travel",
                                            "icon": {
                                                "iconType": "EMOJI_TRAVEL"
                                            },
                                            "tooltip": "Viagem",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Viagem"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "activities",
                                            "icon": {
                                                "iconType": "EMOJI_ACTIVITIES"
                                            },
                                            "tooltip": "Atividades",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Atividades"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "objects",
                                            "icon": {
                                                "iconType": "EMOJI_OBJECTS"
                                            },
                                            "tooltip": "Objetos",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Objetos"
                                                }
                                            }
                                        }
                                    }, {
                                        "emojiPickerCategoryButtonRenderer": {
                                            "categoryId": "symbols",
                                            "icon": {
                                                "iconType": "EMOJI_SYMBOLS"
                                            },
                                            "tooltip": "Símbolos",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Símbolos"
                                                }
                                            }
                                        }
                                    }],
                                    "searchPlaceholderText": {
                                        "runs": [{
                                            "text": "Pesquisar emojis"
                                        }]
                                    },
                                    "searchNoResultsText": {
                                        "runs": [{
                                            "text": "Nenhum emoji encontrado"
                                        }]
                                    },
                                    "pickSkinToneText": {
                                        "runs": [{
                                            "text": "Escolher tom de pele do emoji"
                                        }]
                                    },
                                    "trackingParams": "CA0QsrQCGAYiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                    "clearSearchLabel": "Limpar enquete",
                                    "skinToneGenericLabel": "Tom de pele neutro",
                                    "skinToneLightLabel": "Tom de pele claro",
                                    "skinToneMediumLightLabel": "Tom de pele médio claro",
                                    "skinToneMediumLabel": "Tom de pele médio",
                                    "skinToneMediumDarkLabel": "Tom de pele escuro médio",
                                    "skinToneDarkLabel": "Tom de pele escuro"
                                }
                            }],
                            "pickerButtons": [{
                                "liveChatIconToggleButtonRenderer": {
                                    "targetId": "emoji",
                                    "icon": {
                                        "iconType": "EMOJI"
                                    },
                                    "tooltip": "Emojis personalizados",
                                    "accessibility": {
                                        "accessibilityData": {
                                            "label": "Emojis personalizados"
                                        }
                                    },
                                    "toggledIcon": {
                                        "iconType": "KEYBOARD"
                                    },
                                    "trackingParams": "CAwQtIkEGAciEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                }
                            }],
                            "authorPhoto": {
                                "thumbnails": [{
                                    "url": "https://yt4.ggpht.com/yti/APfAmoEFATNd1nW9rJUbSMOGNvNhxF8AX7iaaAUO=s32-c-k-c0x00ffffff-no-rj",
                                    "width": 32,
                                    "height": 32
                                }, {
                                    "url": "https://yt4.ggpht.com/yti/APfAmoEFATNd1nW9rJUbSMOGNvNhxF8AX7iaaAUO=s64-c-k-c0x00ffffff-no-rj",
                                    "width": 64,
                                    "height": 64
                                }]
                            },
                            "targetId": "live-chat-message-input"
                        }
                    },
                    "itemList": {
                        "liveChatItemListRenderer": {
                            "maxItemsToDisplay": 250,
                            "moreCommentsBelowButton": {
                                "buttonRenderer": {
                                    "style": "STYLE_PRIMARY",
                                    "icon": {
                                        "iconType": "DOWN_ARROW"
                                    },
                                    "trackingParams": "CAsQ8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                    "accessibilityData": {
                                        "accessibilityData": {
                                            "label": "Mais comentários abaixo"
                                        }
                                    }
                                }
                            },
                            "enablePauseChatKeyboardShortcuts": false
                        }
                    },
                    "header": {
                        "liveChatHeaderRenderer": {
                            "overflowMenu": {
                                "menuRenderer": {
                                    "items": [{
                                        "menuServiceItemRenderer": {
                                            "text": {
                                                "runs": [{
                                                    "text": "Participantes"
                                                }]
                                            },
                                            "icon": {
                                                "iconType": "PERSON"
                                            },
                                            "serviceEndpoint": {
                                                "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                                "showLiveChatParticipantsEndpoint": {
                                                    "hack": true
                                                }
                                            },
                                            "trackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                        }
                                    }, {
                                        "menuServiceItemRenderer": {
                                            "text": {
                                                "runs": [{
                                                    "text": "Abrir chat em outra janela"
                                                }]
                                            },
                                            "icon": {
                                                "iconType": "OPEN_IN_NEW"
                                            },
                                            "serviceEndpoint": {
                                                "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                                "popoutLiveChatEndpoint": {
                                                    "url": "https://www.youtube.com/live_chat?is_popout=1\u0026v=25OFlVOt1e8"
                                                }
                                            },
                                            "trackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                        }
                                    }, {
                                        "menuServiceItemRenderer": {
                                            "text": {
                                                "runs": [{
                                                    "text": "Mostrar ou ocultar data e hora"
                                                }]
                                            },
                                            "icon": {
                                                "iconType": "ACCESS_TIME"
                                            },
                                            "serviceEndpoint": {
                                                "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                                "toggleLiveChatTimestampsEndpoint": {
                                                    "hack": true
                                                }
                                            },
                                            "trackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                        }
                                    }, {
                                        "menuNavigationItemRenderer": {
                                            "text": {
                                                "runs": [{
                                                    "text": "Enviar feedback"
                                                }]
                                            },
                                            "icon": {
                                                "iconType": "FEEDBACK"
                                            },
                                            "navigationEndpoint": {
                                                "clickTrackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                                "commandMetadata": {
                                                    "webCommandMetadata": {
                                                        "ignoreNavigation": true
                                                    }
                                                },
                                                "userFeedbackEndpoint": {
                                                    "hack": true,
                                                    "bucketIdentifier": "live_chat"
                                                }
                                            },
                                            "trackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                        }
                                    }],
                                    "trackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                                    "accessibility": {
                                        "accessibilityData": {
                                            "label": "Mais opções"
                                        }
                                    }
                                }
                            },
                            "collapseButton": {
                                "buttonRenderer": {
                                    "style": "STYLE_DEFAULT",
                                    "size": "SIZE_DEFAULT",
                                    "isDisabled": false,
                                    "accessibility": {
                                        "label": "Expandir ou recolher chat"
                                    },
                                    "trackingParams": "CAoQ8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                }
                            },
                            "viewSelector": {
                                "sortFilterSubMenuRenderer": {
                                    "subMenuItems": [{
                                        "title": "Principais mensagens",
                                        "selected": true,
                                        "continuation": {
                                            "reloadContinuationData": {
                                                "continuation": "0ofMyAN5GlhDaWtxSndvWVZVTktOR014TmtsU1NUbE9ZWFl0ZERaak0yOXNTMEozRWdzeU5VOUdiRlpQZERGbE9Cb1Q2cWpkdVFFTkNnc3lOVTlHYkZaUGRERmxPQ0FCMAFKFggAGAAgAFDWlpXfjLvyAlgDeACiAQCCAQIIBA%3D%3D",
                                                "clickTrackingParams": "CAkQxqYCIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                            }
                                        },
                                        "accessibility": {
                                            "accessibilityData": {
                                                "label": "Principais mensagens"
                                            }
                                        },
                                        "subtitle": "Algumas mensagens, como mensagens de spam, podem não estar visíveis",
                                        "trackingParams": "CAgQ48AHIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                    }, {
                                        "title": "Chat ao vivo",
                                        "selected": false,
                                        "continuation": {
                                            "reloadContinuationData": {
                                                "continuation": "0ofMyAN5GlhDaWtxSndvWVZVTktOR014TmtsU1NUbE9ZWFl0ZERaak0yOXNTMEozRWdzeU5VOUdiRlpQZERGbE9Cb1Q2cWpkdVFFTkNnc3lOVTlHYkZaUGRERmxPQ0FCMAFKFggAGAAgAFDWlpXfjLvyAlgDeACiAQCCAQIIAQ%3D%3D",
                                                "clickTrackingParams": "CAcQxqYCIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                            }
                                        },
                                        "accessibility": {
                                            "accessibilityData": {
                                                "label": "Chat ao vivo"
                                            }
                                        },
                                        "subtitle": "Todas as mensagens estão visíveis",
                                        "trackingParams": "CAYQ48AHIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                    }],
                                    "accessibility": {
                                        "accessibilityData": {
                                            "label": "Seleção do modo do chat ao vivo"
                                        }
                                    },
                                    "trackingParams": "CAUQgdoEIhMI_JaV34y78gIVNq2VAh0AQw5O"
                                }
                            }
                        }
                    },
                    "ticker": {
                        "liveChatTickerRenderer": {
                            "sentinel": true
                        }
                    },
                    "trackingParams": "CAEQl98BIhMI_JaV34y78gIVNq2VAh0AQw5O",
                    "participantsList": {
                        "liveChatParticipantsListRenderer": {
                            "title": {
                                "runs": [{
                                    "text": "Participantes"
                                }]
                            },
                            "backButton": {
                                "buttonRenderer": {
                                    "icon": {
                                        "iconType": "BACK"
                                    },
                                    "trackingParams": "CAQQ8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                    "accessibilityData": {
                                        "accessibilityData": {
                                            "label": "Voltar"
                                        }
                                    }
                                }
                            },
                            "participants": [{
                                "liveChatParticipantRenderer": {
                                    "authorName": {
                                        "simpleText": "Mix Sertanejo"
                                    },
                                    "authorPhoto": {
                                        "thumbnails": [{
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRaf1g1PfCiu7hhP5j6C6p_1Ph5py_p3q4t9Ju3=s32-c-k-c0x00ffffff-no-rj",
                                            "width": 32,
                                            "height": 32
                                        }, {
                                            "url": "https://yt4.ggpht.com/ytc/AKedOLRaf1g1PfCiu7hhP5j6C6p_1Ph5py_p3q4t9Ju3=s64-c-k-c0x00ffffff-no-rj",
                                            "width": 64,
                                            "height": 64
                                        }]
                                    },
                                    "authorBadges": [{
                                        "liveChatAuthorBadgeRenderer": {
                                            "icon": {
                                                "iconType": "OWNER"
                                            },
                                            "tooltip": "Proprietário",
                                            "accessibility": {
                                                "accessibilityData": {
                                                    "label": "Proprietário"
                                                }
                                            }
                                        }
                                    }]
                                }
                            }]
                        }
                    },
                    "popoutMessage": {
                        "messageRenderer": {
                            "text": {
                                "runs": [{
                                    "text": "Não há nada aqui. Estamos em outra janela."
                                }]
                            },
                            "trackingParams": "CAIQljsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                            "button": {
                                "buttonRenderer": {
                                    "style": "STYLE_DARK",
                                    "text": {
                                        "runs": [{
                                            "text": "Restaurar chat"
                                        }]
                                    },
                                    "serviceEndpoint": {
                                        "clickTrackingParams": "CAMQ8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4=",
                                        "popoutLiveChatEndpoint": {
                                            "url": ""
                                        }
                                    },
                                    "trackingParams": "CAMQ8FsiEwj8lpXfjLvyAhU2rZUCHQBDDk4="
                                }
                            }
                        }
                    },
                    "emojis": [{
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/CIW60IPp_dYCFcuqTgodEu4IlQ",
                        "shortcuts": [":yt:"],
                        "searchTerms": ["yt"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/m6yqTzfmHlsoKKEZRSZCkqf6cGSeHtStY4rIeeXLAk4N9GY_yw3dizdZoxTrjLhlY4r_rkz3GA=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/m6yqTzfmHlsoKKEZRSZCkqf6cGSeHtStY4rIeeXLAk4N9GY_yw3dizdZoxTrjLhlY4r_rkz3GA=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "yt"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/CN2m5cKr49sCFYbFggodDFEKrg",
                        "shortcuts": [":oops:"],
                        "searchTerms": ["oops"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/qByNS7xmuQXsb_5hxW2ggxwQZRN8-biWVnnKuL5FK1zudxIeim48zRVPk6DRq_HgaeKltHhm=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/qByNS7xmuQXsb_5hxW2ggxwQZRN8-biWVnnKuL5FK1zudxIeim48zRVPk6DRq_HgaeKltHhm=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "oops"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/X_zdXMHgJaPa8gTGt4f4Ag",
                        "shortcuts": [":buffering:"],
                        "searchTerms": ["buffering"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/foWgzjN0ggMAA0CzDPfPZGyuGwv_7D7Nf6FGLAiomW5RRXj0Fs2lDqs2U6L52Z4J2Zb-D5tCUAA=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/foWgzjN0ggMAA0CzDPfPZGyuGwv_7D7Nf6FGLAiomW5RRXj0Fs2lDqs2U6L52Z4J2Zb-D5tCUAA=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "buffering"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/1v50XorRJ8GQ8gTz_prwAg",
                        "shortcuts": [":stayhome:"],
                        "searchTerms": ["stayhome"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/u3QDxda8o4jrk_b01YtJYKb57l8Zw8ks8mCwGkiZ5hC5cQP_iszbsggxIWquZhuLRBzl5IEM2w=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/u3QDxda8o4jrk_b01YtJYKb57l8Zw8ks8mCwGkiZ5hC5cQP_iszbsggxIWquZhuLRBzl5IEM2w=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "stayhome"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/8P50XuS9Oo7h8wSqtIagBA",
                        "shortcuts": [":dothefive:"],
                        "searchTerms": ["dothefive"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/ktU04FFgK_a6yaXCS1US-ReFkLjD22XllcIMOyBRHuYKLsrxpVxsauV1gSC2RPraMJWXpWcY=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/ktU04FFgK_a6yaXCS1US-ReFkLjD22XllcIMOyBRHuYKLsrxpVxsauV1gSC2RPraMJWXpWcY=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "dothefive"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/Fv90Xq-vJcPq8gTqzreQAQ",
                        "shortcuts": [":elbowbump:"],
                        "searchTerms": ["elbowbump"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/gt39CIfizoIAce9a8IzjfrADV5CjTbSyFKUlLMXzYILxJRjwAgYQQJ9PXXxnRvrnTec7ZpfHN4k=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/gt39CIfizoIAce9a8IzjfrADV5CjTbSyFKUlLMXzYILxJRjwAgYQQJ9PXXxnRvrnTec7ZpfHN4k=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "elbowbump"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/Iv90XouTLuOR8gSxxrToBA",
                        "shortcuts": [":goodvibes:"],
                        "searchTerms": ["goodvibes"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/6LPOiCw9bYr3ZXe8AhUoIMpDe_0BglC4mBmi-uC4kLDqDIuPu4J3ErgV0lEhgzXiBluq-I8j=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/6LPOiCw9bYr3ZXe8AhUoIMpDe_0BglC4mBmi-uC4kLDqDIuPu4J3ErgV0lEhgzXiBluq-I8j=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "goodvibes"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/Rf90XtDbG8GQ8gTz_prwAg",
                        "shortcuts": [":thanksdoc:"],
                        "searchTerms": ["thanksdoc"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/Av7Vf8FxIp0_dQg4cJrPcGmmL7v9RXraOXMp0ZBDN693ewoMTHbbS7D7V3GXpbtZPSNcRLHTQw=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/Av7Vf8FxIp0_dQg4cJrPcGmmL7v9RXraOXMp0ZBDN693ewoMTHbbS7D7V3GXpbtZPSNcRLHTQw=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "thanksdoc"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/VP90Xv_wG82o8wTCi7CQAw",
                        "shortcuts": [":videocall:"],
                        "searchTerms": ["videocall"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/bP-4yir3xZBWh-NKO4eGJJglr8m4dRnHrAKAXikaOJ0E5YFNkJ6IyAz3YhHMyukQ1kJNgQAo=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/bP-4yir3xZBWh-NKO4eGJJglr8m4dRnHrAKAXikaOJ0E5YFNkJ6IyAz3YhHMyukQ1kJNgQAo=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "videocall"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/dv90XtfhAurw8gTgzar4DA",
                        "shortcuts": [":virtualhug:"],
                        "searchTerms": ["virtualhug"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/-o0Di2mE5oaqf_lb_RI3igd0fptmldMWF9kyQpqKWkdAd7M4cT5ZKzDwlmSSXdcBp3zVLJ41yg=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/-o0Di2mE5oaqf_lb_RI3igd0fptmldMWF9kyQpqKWkdAd7M4cT5ZKzDwlmSSXdcBp3zVLJ41yg=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "virtualhug"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/hf90Xv-jHeOR8gSxxrToBA",
                        "shortcuts": [":yougotthis:"],
                        "searchTerms": ["yougotthis"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/WxLUGtJzyLd4dcGaWnmcQnw9lTu9BW3_pEuCp6kcM2pxF5p5J28PvcYIXWh6uCm78LxGJVGn9g=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/WxLUGtJzyLd4dcGaWnmcQnw9lTu9BW3_pEuCp6kcM2pxF5p5J28PvcYIXWh6uCm78LxGJVGn9g=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "yougotthis"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/lP90XvOhCZGl8wSO1JmgAw",
                        "shortcuts": [":sanitizer:"],
                        "searchTerms": ["sanitizer"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/4PaPj_5jR1lkidYakZ4EkxVqNr0Eqp4g0xvlYt_gZqjTtVeyHBszqf57nB9s6uLh7d2QtEhEWEc=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/4PaPj_5jR1lkidYakZ4EkxVqNr0Eqp4g0xvlYt_gZqjTtVeyHBszqf57nB9s6uLh7d2QtEhEWEc=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "sanitizer"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/uP90Xq6wNYrK8gTUoo3wAg",
                        "shortcuts": [":takeout:"],
                        "searchTerms": ["takeout"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/ehUiXdRyvel0hba-BopQoDWTvM9ogZcMPaaAeR6IA9wkocdG21aFVN_IylxRGHtl2mE6L9jg1Do=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/ehUiXdRyvel0hba-BopQoDWTvM9ogZcMPaaAeR6IA9wkocdG21aFVN_IylxRGHtl2mE6L9jg1Do=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "takeout"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/fAF1XtDQMIrK8gTUoo3wAg",
                        "shortcuts": [":hydrate:"],
                        "searchTerms": ["hydrate"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/Plqt3RM7NBy-R_eA90cIjzMEzo8guwE0KqJ9QBeCkPEWO7FvUqKU_Vq03Lmv9XxMrG6A3Ouwpg=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/Plqt3RM7NBy-R_eA90cIjzMEzo8guwE0KqJ9QBeCkPEWO7FvUqKU_Vq03Lmv9XxMrG6A3Ouwpg=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "hydrate"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/vQF1XpyaG_XG8gTs77bACQ",
                        "shortcuts": [":chillwcat:"],
                        "searchTerms": ["chillwcat"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/ZN5h05TnuFQmbzgGvIfk3bgrV-_Wp8bAbecOqw92s2isI6GLHbYjTyZjcqf0rKQ5t4jBtlumzw=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/ZN5h05TnuFQmbzgGvIfk3bgrV-_Wp8bAbecOqw92s2isI6GLHbYjTyZjcqf0rKQ5t4jBtlumzw=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "chillwcat"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/ygF1XpGUMMjk8gSDrI2wCw",
                        "shortcuts": [":chillwdog:"],
                        "searchTerms": ["chillwdog"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/jiaOCnfLX0rqed1sISxULaO7T-ktq2GEPizX9snaxvMLxQOMmWXMmAVGyIbYeFS2IvrMpxvFcQ=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/jiaOCnfLX0rqed1sISxULaO7T-ktq2GEPizX9snaxvMLxQOMmWXMmAVGyIbYeFS2IvrMpxvFcQ=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "chillwdog"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/8gF1Xp_zK8jk8gSDrI2wCw",
                        "shortcuts": [":elbowcough:"],
                        "searchTerms": ["elbowcough"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/kWObU3wBMdHS43q6-ib2KJ-iC5tWqe7QcEITaNApbXEZfrik9E57_ve_BEPHO86z4Xrv8ikMdW0=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/kWObU3wBMdHS43q6-ib2KJ-iC5tWqe7QcEITaNApbXEZfrik9E57_ve_BEPHO86z4Xrv8ikMdW0=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "elbowcough"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/EAJ1XrS7PMGQ8gTz_prwAg",
                        "shortcuts": [":learning:"],
                        "searchTerms": ["learning"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/LiS1vw8KUXmczimKGfA-toRYXOcV1o-9aGSNRF0dGLk15Da2KTAsU-DXkIao-S7-kCkSnJwt=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/LiS1vw8KUXmczimKGfA-toRYXOcV1o-9aGSNRF0dGLk15Da2KTAsU-DXkIao-S7-kCkSnJwt=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "learning"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/JAJ1XpGpJYnW8wTupZu4Cw",
                        "shortcuts": [":washhands:"],
                        "searchTerms": ["washhands"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/66Fn-0wiOmLDkoKk4FSa9vD0yymtWEulbbQK2x-kTBswQ2auer_2ftvmrJGyMMoqEGNjJtipBA=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/66Fn-0wiOmLDkoKk4FSa9vD0yymtWEulbbQK2x-kTBswQ2auer_2ftvmrJGyMMoqEGNjJtipBA=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "washhands"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/PAJ1XsOOI4fegwOo57ewAg",
                        "shortcuts": [":socialdist:"],
                        "searchTerms": ["socialdist"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/0WD780vTqUcS0pFq423D8WRuA_T8NKdTbRztChITI9jgOqOxD2r6dthbu86P6fIggDR6omAPfnQ=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/0WD780vTqUcS0pFq423D8WRuA_T8NKdTbRztChITI9jgOqOxD2r6dthbu86P6fIggDR6omAPfnQ=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "socialdist"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCkszU2WH9gy1mb0dV-11UJg/egJ1XufTKYfegwOo57ewAg",
                        "shortcuts": [":shelterin:"],
                        "searchTerms": ["shelterin"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/KgaktgJ3tmEFB-gMtjUcuHd6UKq50b-S3PbHEOSUbJG7UddPoJSmrIzysXA77jJp5oRNLWG84Q=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/KgaktgJ3tmEFB-gMtjUcuHd6UKq50b-S3PbHEOSUbJG7UddPoJSmrIzysXA77jJp5oRNLWG84Q=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "shelterin"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/COLRg9qOwdQCFce-qgodrbsLaA",
                        "shortcuts": [":awesome:"],
                        "searchTerms": ["awesome"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/zs1an1dDkEl4e8K43-hQofoUGHJt1T-4YpxlxtXsgeTegA0jV1fVwVqVvTsnVHIz5BG1nu2C=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/zs1an1dDkEl4e8K43-hQofoUGHJt1T-4YpxlxtXsgeTegA0jV1fVwVqVvTsnVHIz5BG1nu2C=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "awesome"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/CMKC7uKOwdQCFce-qgodqbsLaA",
                        "shortcuts": [":gar:"],
                        "searchTerms": ["gar"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/v_vQSf25TeqRN_4TnwLQxUNxkUXHNan4-fgptww8MWGtt7O5yVKSD0sEpnqLP1yGy9i1Wppn5vw=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/v_vQSf25TeqRN_4TnwLQxUNxkUXHNan4-fgptww8MWGtt7O5yVKSD0sEpnqLP1yGy9i1Wppn5vw=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "gar"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/CJiQ8uiOwdQCFcx9qgodysAOHg",
                        "shortcuts": [":jakepeter:"],
                        "searchTerms": ["jakepeter"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/EDWNWcH0Yb9Ti6RWECQIoHvDWCn6HYlJBs0scB5F7_RtX7FjLUp0Z21hQbdHyksK9vWXNPuckA=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/EDWNWcH0Yb9Ti6RWECQIoHvDWCn6HYlJBs0scB5F7_RtX7FjLUp0Z21hQbdHyksK9vWXNPuckA=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "jakepeter"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/CI3h3uDJitgCFdARTgodejsFWg",
                        "shortcuts": [":wormRedBlue:"],
                        "searchTerms": ["wormRedBlue"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/QZNullRD8CZ1PZfgbRnc0bHPg3STRXkYb0BEUgW7MGTx2H1QmRr1UB4nlBh1lmA3Le1eHGH9=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/QZNullRD8CZ1PZfgbRnc0bHPg3STRXkYb0BEUgW7MGTx2H1QmRr1UB4nlBh1lmA3Le1eHGH9=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "wormRedBlue"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/CI69oYTKitgCFdaPTgodsHsP5g",
                        "shortcuts": [":wormOrangeGreen:"],
                        "searchTerms": ["wormOrangeGreen"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/UEgOZ8QIT5780FaFlRSgfQLGtIlU0O6uBCga6Lg_aFoVyU0URx7NRYwwPG4gsakwKcqXq-gQ=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/UEgOZ8QIT5780FaFlRSgfQLGtIlU0O6uBCga6Lg_aFoVyU0URx7NRYwwPG4gsakwKcqXq-gQ=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "wormOrangeGreen"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/CKzQr47KitgCFdCITgodq6EJZg",
                        "shortcuts": [":wormYellowRed:"],
                        "searchTerms": ["wormYellowRed"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/GNWsd6PB1o_O5kuB2F2DjhP0ccb85zhZNjUHIh6mvaSyGgLHIBOomgAjDaLa6CEwyu02SD5tzMQ=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/GNWsd6PB1o_O5kuB2F2DjhP0ccb85zhZNjUHIh6mvaSyGgLHIBOomgAjDaLa6CEwyu02SD5tzMQ=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "wormYellowRed"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }, {
                        "emojiId": "UCzC5CNksIBaiT-NdMJjJNOQ/CPGD8Iu8kN4CFREChAod9OkLmg",
                        "shortcuts": [":ytg:"],
                        "searchTerms": ["ytg"],
                        "image": {
                            "thumbnails": [{
                                "url": "https://yt3.ggpht.com/R4Klel1LDB5fTlNUb46IcgSv696jdWfzMdPLClIW6q7AgcMfXoMIq4kl9bXlZX23k9Ax4Aq_XT8=w24-h24-c-k-nd",
                                "width": 24,
                                "height": 24
                            }, {
                                "url": "https://yt3.ggpht.com/R4Klel1LDB5fTlNUb46IcgSv696jdWfzMdPLClIW6q7AgcMfXoMIq4kl9bXlZX23k9Ax4Aq_XT8=w48-h48-c-k-nd",
                                "width": 48,
                                "height": 48
                            }],
                            "accessibility": {
                                "accessibilityData": {
                                    "label": "ytg"
                                }
                            }
                        },
                        "isCustomEmoji": true
                    }],
                    "clientMessages": {
                        "reconnectMessage": {
                            "runs": [{
                                "text": "Chat desconectado. Aguarde enquanto tentamos reconectar."
                            }]
                        },
                        "unableToReconnectMessage": {
                            "runs": [{
                                "text": "Não é possível conectar ao chat. Tente novamente mais tarde."
                            }]
                        },
                        "fatalError": {
                            "runs": [{
                                "text": "Não é possível conectar ao chat. Tente novamente mais tarde."
                            }]
                        },
                        "reconnectedMessage": {
                            "runs": [{
                                "text": "Conectado com sucesso."
                            }]
                        },
                        "genericError": {
                            "runs": [{
                                "text": "Erro. Tente novamente."
                            }]
                        }
                    },
                    "viewerName": "Karina Souza"
                }
            },
            "trackingParams": "CAAQ0b4BIhMI_JaV34y78gIVNq2VAh0AQw5O"
        };
    </script>
    <yt-live-chat-app iframe-buyflow-launcher="">
        <ytd-live-chat-config></ytd-live-chat-config>
        <yt-iframed-gfeedback-manager></yt-iframed-gfeedback-manager>
    </yt-live-chat-app>
</body>

</html>
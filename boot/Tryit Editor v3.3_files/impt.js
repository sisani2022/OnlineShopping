__ez.analytics = (function () {

    var defaultStoreUrl = "/ezoic/imp.gif";

    if (((typeof ezJsu !== 'undefined') && ezJsu === true) || ((typeof _ez_sa !== 'undefined') && _ez_sa === true) || ((typeof window.isAmp != 'undefined') && window.isAmp === true)) {
        defaultStoreUrl = "//g.ezoic.net/ezoic/imp.gif";
    }

    function getExtraQueries() {
        return typeof _ezExtraQueries != 'undefined' ? _ezExtraQueries : "";
    }

    function storeImpression() {
        if (typeof document.visibilityState != 'undefined' && document.visibilityState == "prerender") return;
        if (typeof _ezaq == 'undefined') return;

        var img = new Image();
        img.src = defaultStoreUrl + "?e=" + encodeURIComponent(JSON.stringify(_ezaq)) + getExtraQueries();
        _ezaq.pv_event_count = (typeof _ezaq.pv_event_count == 'undefined') ? 1 : _ezaq.pv_event_count + 1;
    }

    if (typeof window.isAmp == 'undefined') {
        storeImpression();
    }

    return {
        store: storeImpression
    };
})();

var ez_tos_track_count = 0;
var ez_last_activity_count = 0;
(function (__ez_tos) {
    window.setInterval(function () {
        __ez_tos = (function (t) {
            return t[0] == 45 ? (parseInt(t[1]) + 1) + ':00' : (t[1] || '0') + ':' + (parseInt(t[0]) + 15);
        })(__ez_tos.split(':').reverse());

        ez_tos_track_count++;
        if (ez_tos_track_count > 1 && ez_tos_track_count < (ez_last_activity_count + 4) && ez_tos_track_count < 240) {
            if (window.pageTracker) {
                pageTracker._trackEvent('Time', 'Log', __ez_tos);
                if (__ez.template.isOrig == false) __ez.analytics.store();
            }
            else if (typeof(_gaq) != 'undefined') {
                _gaq.push(['e._trackEvent', 'Time', 'Log', __ez_tos]);
                _gaq.push(['f._trackEvent', 'Time', 'Log', __ez_tos]);
                if (__ez.template.isOrig == false) __ez.analytics.store();
            }

            if (typeof(_paq) != 'undefined') {
                _paq.push(['trackEvent', 'Time', __ez_tos, 'TimeOnPage']);
            }

        }
    }, 15000);
})('00');

function _ez_TOS_TrackEvent() {
    if (typeof ez_tos_track_count !== 'undefined') {
        ez_last_activity_count = ez_tos_track_count;
    }
}

__ez.evt.add(window, 'scroll', _ez_TOS_TrackEvent);
__ez.evt.add(document, 'mousemove', _ez_TOS_TrackEvent);
__ez.evt.add(document, 'keyup', _ez_TOS_TrackEvent);
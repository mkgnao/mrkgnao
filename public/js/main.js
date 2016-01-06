mkgnaoNs = mkgnaoNs || {};

mkgnaoNs.twAddJson = function(what, where) {
    var j = JSON.parse(what);
    var n = mkgnaoNs.prettyPrint(j);
    var e = document.getElementById(where);
    e.appendChild(n);
};

(function e(t, n, r) {
    function s(o, u) {
        if (!n[o]) {
            if (!t[o]) {
                var a = typeof require == "function" && require;
                if (!u && a)return a(o, !0);
                if (i)return i(o, !0);
                var f = new Error("Cannot find module '" + o + "'");
                throw f.code = "MODULE_NOT_FOUND", f
            }
            var l = n[o] = {exports: {}};
            t[o][0].call(l.exports, function (e) {
                var n = t[o][1][e];
                return s(n ? n : e)
            }, l, l.exports, e, t, n, r)
        }
        return n[o].exports
    }

    var i = typeof require == "function" && require;
    for (var o = 0; o < r.length; o++)s(r[o]);
    return s
})({
    1: [function (require, module, exports) {
        "use strict";

        var _interopRequire = function (obj) {
            return obj && obj.__esModule ? obj["default"] : obj;
        };

        var supports = _interopRequire(require("./supports"));

// Add an `is-legacy` class on browsers that don't supports flexbox.
        if (!supports.flexbox()) {
            var div = document.createElement("div");
            div.className = "Error";
            div.innerHTML = "Your browser does not support Flexbox.\n                   Parts of this site may not appear as expected.";

            document.body.insertBefore(div, document.body.firstChild);
        }

    }, {
        "./supports": 2,

    }], 2: [function (require, module, exports) {
        "use strict";

        var supports = {};
        var style = document.body.style;

        module.exports = {
            flexbox: function flexbox() {
                return supports.flexbox || (supports.flexbox = "flexBasis" in style || "msFlexAlign" in style || "webkitBoxDirection" in style);
            }
        };

    }, {}], 3: [function (require, module, exports) {
        var debounce = require('debounce');
        var defaults = require('../utilities').defaults;
        var isObject = require('../utilities').isObject;
        var toArray = require('../utilities').toArray;
        var provide = require('../provide');


        /**
         * Sets the string to use when no custom dimension value is available.
         */
        var NULL_DIMENSION = '(not set)';


        /**
         * Declares the MediaQueryListener instance cache.
         */
        var mediaMap = {};


        /**
         * Registers media query tracking.
         * @constructor
         * @param {Object} tracker Passed internally by analytics.js
         * @param {?Object} opts Passed by the require command.
         */
        function MediaQueryTracker(tracker, opts) {

            // Registers the plugin on the global gaplugins object.
            window.gaplugins = window.gaplugins || {};
            gaplugins.MediaQueryTracker = MediaQueryTracker;

            // Feature detects to prevent errors in unsupporting browsers.
            if (!window.matchMedia) return;

            this.opts = defaults(opts, {
                mediaQueryDefinitions: false,
                mediaQueryChangeTemplate: this.changeTemplate,
                mediaQueryChangeTimeout: 1000
            });

            // Exits early if media query data doesn't exist.
            if (!isObject(this.opts.mediaQueryDefinitions)) return;

            this.opts.mediaQueryDefinitions = toArray(this.opts.mediaQueryDefinitions);
            this.tracker = tracker;
            this.timeouts = {};

            this.processMediaQueries();
        }


        /**
         * Loops through each media query definition, sets the custom dimenion data,
         * and adds the change listeners.
         */
        MediaQueryTracker.prototype.processMediaQueries = function () {
            this.opts.mediaQueryDefinitions.forEach(function (dimension) {

                if (!dimension.dimensionIndex) {
                    throw new Error('Media query definitions must have a name.');
                }

                if (!dimension.dimensionIndex) {
                    throw new Error('Media query definitions must have a dimension index.');
                }

                var name = this.getMatchName(dimension);
                this.tracker.set('dimension' + dimension.dimensionIndex, name);

                this.addChangeListeners(dimension);
            }.bind(this));
        };


        /**
         * Takes a dimension object and return the name of the matching media item.
         * If no match is found, the NULL_DIMENSION value is returned.
         * @param {Object} dimension A set of named media queries associated
         *     with a single custom dimension.
         * @return {string} The name of the matched media or NULL_DIMENSION.
         */
        MediaQueryTracker.prototype.getMatchName = function (dimension) {
            var match;

            dimension.items.forEach(function (item) {
                if (getMediaListener(item.media).matches) {
                    match = item;
                }
            });
            return match ? match.name : NULL_DIMENSION;
        };


        /**
         * Adds change listeners to each media query in the dimension list.
         * Debounces the changes to prevent unnecessary hits from being sent.
         * @param {Object} dimension A set of named media queries associated
         *     with a single custom dimension
         */
        MediaQueryTracker.prototype.addChangeListeners = function (dimension) {
            dimension.items.forEach(function (item) {
                var mql = getMediaListener(item.media);
                mql.addListener(debounce(function () {
                    this.handleChanges(dimension);
                }.bind(this), this.opts.mediaQueryChangeTimeout));
            }.bind(this));
        };


        /**
         * Handles changes to the matched media. When the new value differs from
         * the old value, a change event is sent.
         * @param {Object} dimension A set of named media queries associated
         *     with a single custom dimension
         */
        MediaQueryTracker.prototype.handleChanges = function (dimension) {
            var newValue = this.getMatchName(dimension);
            var oldValue = this.tracker.get('dimension' + dimension.dimensionIndex);

            if (newValue !== oldValue) {
                this.tracker.set('dimension' + dimension.dimensionIndex, newValue);
                this.tracker.send('event', dimension.name, 'change',
                    this.opts.mediaQueryChangeTemplate(oldValue, newValue));
            }
        };


        /**
         * Sets the default formatting of the change event label.
         * This can be overridden by setting the `mediaQueryChangeTemplate` option.
         * @param {string} oldValue
         * @param {string} newValue
         * @return {string} The formatted event label.
         */
        MediaQueryTracker.prototype.changeTemplate = function (oldValue, newValue) {
            return oldValue + ' => ' + newValue;
        };


        /**
         * Accepts a media query and returns a MediaQueryListener object.
         * Caches the values to avoid multiple unnecessary instances.
         * @param {string} media A media query value.
         * @return {MediaQueryListener}
         */
        function getMediaListener(media) {
            // Returns early if the media is cached.
            if (mediaMap[media]) return mediaMap[media];

            mediaMap[media] = window.matchMedia(media);
            return mediaMap[media];
        }


        provide('mediaQueryTracker', MediaQueryTracker);

    }, {"../provide": 7, "../utilities": 8, "debounce": 9}], 4: [function (require, module, exports) {
        var defaults = require('../utilities').defaults;
        var delegate = require('delegate');
        var provide = require('../provide');


        /**
         * Registers outbound link tracking on a tracker object.
         * @constructor
         * @param {Object} tracker Passed internally by analytics.js
         * @param {?Object} opts Passed by the require command.
         */
        function OutboundLinkTracker(tracker, opts) {

            // Registers the plugin on the global gaplugins object.
            window.gaplugins = window.gaplugins || {};
            gaplugins.OutboundLinkTracker = OutboundLinkTracker;

            // Feature detects to prevent errors in unsupporting browsers.
            if (!window.addEventListener) return;

            this.opts = defaults(opts);
            this.tracker = tracker;

            // Use the beacon transport mechanism if available.
            this.tracker.set('transport', 'beacon');

            delegate(document, 'a', 'click', this.handleLinkClicks.bind(this));
        }


        /**
         * Handles all clicks on link elements. A link is considered an outbound link
         * its hostname property does not match location.hostname. When the beacon
         * transport method is not available, the links target is set to "_blank" to
         * ensure the hit can be sent.
         * @param {Event} event The DOM click event.
         */
        OutboundLinkTracker.prototype.handleLinkClicks = function (event) {

            // TODO(philipwalton): ignore outbound links with data attributes.

            var link = event.delegateTarget;
            if (link.hostname != location.hostname) {
                // Open outbound links in a new tab if the browser doesn't support
                // the beacon transport method.
                if (!navigator.sendBeacon) {
                    link.target = '_blank';
                }
                this.tracker.send('event', 'Outbound Link', 'click', link.href);
            }
        };


        provide('outboundLinkTracker', OutboundLinkTracker);

    }, {"../provide": 7, "../utilities": 8, "delegate": 13}], 5: [function (require, module, exports) {
        var defaults = require('../utilities').defaults;
        var provide = require('../provide');


// Detects support for sync, cross-domain XHR.
// We can't fully rely on feature detects because IE9 supports XHR but not with
// CORS. It does support XDomainRequests, but that doesn't have a sync option:
// https://msdn.microsoft.com/en-us/library/cc288116(v=vs.85).aspx
        var supportsSyncCorsXhr = window.XMLHttpRequest && !(Function('/*@cc_on return document.documentMode<=9@*/')());


        /**
         * Registers outbound link tracking on tracker object.
         * @constructor
         * @param {Object} tracker Passed internally by analytics.js
         * @param {?Object} opts Passed by the require command.
         */
        function SessionDurationTracker(tracker, opts) {

            // Registers the plugin on the global gaplugins object.
            window.gaplugins = window.gaplugins || {};
            gaplugins.SessionDurationTracker = SessionDurationTracker;

            // Feature detects to prevent errors in unsupporting browsers.
            if (!window.addEventListener) return;

            this.opts = defaults(opts);
            this.tracker = tracker;

            // Use the beacon transport mechanism if available.
            this.tracker.set('transport', 'beacon');

            window.addEventListener('unload', this.handleWindowUnload.bind(this));
        }


        /**
         * Handles the window unload event.
         */
        SessionDurationTracker.prototype.handleWindowUnload = function () {
            var fieldsObj = {nonInteraction: true};

            // Adds time since navigation start if supported.
            if (window.performance && performance.timing) {
                fieldsObj.eventValue = +new Date - performance.timing.navigationStart;
            }

            // Defaults to sending the hit via sync XHR if beacon isn't available and
            // cross-domain, sync XHR is available.
            if (!navigator.sendBeacon && supportsSyncCorsXhr) {
                fieldsObj.sendHitTask = this.sendSyncHit;
            }

            this.tracker.send('event', 'Window', 'unload', fieldsObj);
        };


        /**
         * Sends the hit payload data to Google Analytics via sync XHR to ensure
         * the hit gets sent before the page unloads.
         * @param {Object} model Passed internally by analytics.js
         */
        SessionDurationTracker.prototype.sendSyncHit = function (model) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://www.google-analytics.com/collect', false);
            xhr.setRequestHeader('Content-Type', 'text/plain;charset=UTF-8');
            xhr.send(model.get('hitPayload'));
        };


        provide('sessionDurationTracker', SessionDurationTracker);

    }, {"../provide": 7, "../utilities": 8}], 6: [function (require, module, exports) {
        var defaults = require('../utilities').defaults;
        var delegate = require('delegate');
        var provide = require('../provide');


        /**
         * Registers social tracking on tracker object.
         * Supports both declarative social tracking via HTML attributes as well as
         * tracking for social events when using official Twitter or Facebook widgets.
         * @constructor
         * @param {Object} tracker Passed internally by analytics.js
         * @param {?Object} opts Passed by the require command.
         */
        function SocialTracker(tracker, opts) {

            // Registers the plugin on the global gaplugins object.
            window.gaplugins = window.gaplugins || {};
            gaplugins.SocialTracker = SocialTracker;

            // Feature detects to prevent errors in unsupporting browsers.
            if (!window.addEventListener) return;

            this.opts = defaults(opts, {
                attributePrefix: 'data-'
            });

            this.tracker = tracker;

            var prefix = this.opts.attributePrefix;
            var selector = '[' + prefix + 'social-network]' +
                '[' + prefix + 'social-action]' +
                '[' + prefix + 'social-target]';

            delegate(document, selector, 'click', this.handleSocialClicks.bind(this));

            this.detectLibraryLoad('FB', 'facebook-jssdk',
                this.addFacebookEventHandlers.bind(this));

            this.detectLibraryLoad('twttr', 'twitter-wjs',
                this.addTwitterEventHandlers.bind(this));
        }


        /**
         * Handles all clicks on elements with social tracking attributes.
         * @param {Event} event The DOM click event.
         */
        SocialTracker.prototype.handleSocialClicks = function (event) {

            var link = event.delegateTarget;
            var prefix = this.opts.attributePrefix;

            this.tracker.send('social', {
                socialNetwork: link.getAttribute(prefix + 'social-network'),
                socialAction: link.getAttribute(prefix + 'social-action'),
                socialTarget: link.getAttribute(prefix + 'social-target')
            });
        };


        /**
         * A utility method that determines when a social library is finished loading.
         * @param {string} namespace The global property name added to window.
         * @param {string} domId The ID of a script element in the DOM.
         * @param {Function} done A callback to be invoked when done.
         */
        SocialTracker.prototype.detectLibraryLoad = function (namespace, domId, done) {
            if (window[namespace]) {
                done();
            }
            else {
                var script = document.getElementById(domId);
                if (script) {
                    script.onload = done;
                }
            }
        };


        /**
         * Adds event handlers for the "tweet" and "follow" events emitted by the
         * official tweet and follow buttons. Note: this does not capture tweet or
         * follow events emitted by other Twitter widgets (tweet, timeline, etc.).
         */
        SocialTracker.prototype.addTwitterEventHandlers = function () {
            try {
                twttr.ready(function () {

                    twttr.events.bind('tweet', function (event) {
                        // Ignore tweets from widgets that aren't the tweet button.
                        if (event.region != 'tweet') return;

                        var url = event.data.url || event.target.getAttribute('data-url') ||
                            location.href;

                        this.tracker.send('social', 'Twitter', 'tweet', url);
                    }.bind(this));

                    twttr.events.bind('follow', function (event) {
                        // Ignore follows from widgets that aren't the follow button.
                        if (event.region != 'follow') return;

                        var screenName = event.data.screen_name ||
                            event.target.getAttribute('data-screen-name');

                        this.tracker.send('social', 'Twitter', 'follow', screenName);
                    }.bind(this));
                }.bind(this));
            } catch (err) {
            }
        };


        /**
         * Adds event handlers for the "like" and "unlike" events emitted by the
         * official Facebook like button.
         */
        SocialTracker.prototype.addFacebookEventHandlers = function () {
            try {
                FB.Event.subscribe('edge.create', function (url) {
                    this.tracker.send('social', 'Facebook', 'like', url);
                }.bind(this));

                FB.Event.subscribe('edge.remove', function (url) {
                    this.tracker.send('social', 'Facebook', 'unlike', url);
                }.bind(this));
            } catch (err) {
            }
        };


        provide('socialTracker', SocialTracker);

    }, {"../provide": 7, "../utilities": 8, "delegate": 13}], 7: [function (require, module, exports) {
        /**
         * Provides a plugin for use with analytics.js, accounting for the possibility
         * that the global command queue has been renamed.
         * @param {string} pluginName The plugin name identifier.
         * @param {Function} pluginConstructor The plugin constructor function.
         */
        module.exports = function providePlugin(pluginName, pluginConstructor) {
            var ga = window[window.GoogleAnalyticsObject || 'ga'];
            if (typeof ga == 'function') {
                ga('provide', pluginName, pluginConstructor);
            }
        };

    }, {}], 8: [function (require, module, exports) {
        var utilities = {

            /**
             * Accepts a function and returns a wrapped version of the function that is
             * expected to be called elsewhere in the system. If it's not called
             * elsewhere after the timeout period, it's called regardless. The wrapper
             * function also prevents the callback from being called more than once.
             * @param {Function} callback The function to call.
             * @param {number} wait How many milliseconds to wait before invoking
             *     the callback.
             */
            withTimeout: function (callback, wait) {
                var called = false;
                setTimeout(callback, wait || 2000);
                return function () {
                    if (!called) {
                        called = true;
                        callback();
                    }
                };
            },


            /**
             * Accepts an object of overrides and defaults and returns a new object
             * with the values merged. For each key in defaults, if there's a
             * corresponding value in overrides, it gets used.
             * @param {Object} overrides.
             * @param {?Object} defaults.
             */
            defaults: function (overrides, defaults) {
                var result = {};

                if (typeof overrides != 'object') {
                    overrides = {};
                }

                if (typeof defaults != 'object') {
                    defaults = {};
                }

                for (var key in defaults) {
                    if (defaults.hasOwnProperty(key)) {
                        result[key] = overrides.hasOwnProperty(key) ?
                            overrides[key] : defaults[key];
                    }
                }
                return result;
            },


            isObject: function (obj) {
                return typeof obj == 'object' && obj !== null;
            },


            isArray: Array.isArray || function (arr) {
                return Object.prototype.toString.call(arr) === '[object Array]';
            },


            toArray: function (obj) {
                return utilities.isArray(obj) ? obj : [obj];
            }
        };

        module.exports = utilities;

    }, {}], 9: [function (require, module, exports) {

        /**
         * Module dependencies.
         */

        var now = require('date-now');

        /**
         * Returns a function, that, as long as it continues to be invoked, will not
         * be triggered. The function will be called after it stops being called for
         * N milliseconds. If `immediate` is passed, trigger the function on the
         * leading edge, instead of the trailing.
         *
         * @source underscore.js
         * @see http://unscriptable.com/2009/03/20/debouncing-javascript-methods/
         * @param {Function} function to wrap
         * @param {Number} timeout in ms (`100`)
         * @param {Boolean} whether to execute at the beginning (`false`)
         * @api public
         */

        module.exports = function debounce(func, wait, immediate) {
            var timeout, args, context, timestamp, result;
            if (null == wait) wait = 100;

            function later() {
                var last = now() - timestamp;

                if (last < wait && last > 0) {
                    timeout = setTimeout(later, wait - last);
                } else {
                    timeout = null;
                    if (!immediate) {
                        result = func.apply(context, args);
                        if (!timeout) context = args = null;
                    }
                }
            };

            return function debounced() {
                context = this;
                args = arguments;
                timestamp = now();
                var callNow = immediate && !timeout;
                if (!timeout) timeout = setTimeout(later, wait);
                if (callNow) {
                    result = func.apply(context, args);
                    context = args = null;
                }

                return result;
            };
        };

    }, {"date-now": 10}], 10: [function (require, module, exports) {
        module.exports = Date.now || now

        function now() {
            return new Date().getTime()
        }

    }, {}], 11: [function (require, module, exports) {
        var matches = require('matches-selector')


        module.exports = function (element, selector, checkYoSelf) {

            var parent = checkYoSelf ? element : element.parentNode


            while (parent && parent !== document) {

                if (matches(parent, selector)) return parent;

                parent = parent.parentNode

            }

        }


    }, {"matches-selector": 12}], 12: [function (require, module, exports) {


        /**

         * Element prototype.

         */



        var proto = Element.prototype;


        /**

         * Vendor function.

         */



        var vendor = proto.matchesSelector

            || proto.webkitMatchesSelector

            || proto.mozMatchesSelector

            || proto.msMatchesSelector

            || proto.oMatchesSelector;


        /**

         * Expose `match()`.

         */



        module.exports = match;


        /**

         * Match `el` to `selector`.

         *

         * @param {Element} el

         * @param {String} selector

         * @return {Boolean}

         * @api public

         */



        function match(el, selector) {

            if (vendor) return vendor.call(el, selector);

            var nodes = el.parentNode.querySelectorAll(selector);

            for (var i = 0; i < nodes.length; ++i) {

                if (nodes[i] == el) return true;

            }

            return false;

        }
    }, {}], 13: [function (require, module, exports) {
        var closest = require('closest');

        /**
         * Delegates event to a selector.
         *
         * @param {Element} element
         * @param {String} selector
         * @param {String} type
         * @param {Function} callback
         * @return {Object}
         */
        function delegate(element, selector, type, callback) {
            var listenerFn = listener.apply(this, arguments);

            element.addEventListener(type, listenerFn);

            return {
                destroy: function () {
                    element.removeEventListener(type, listenerFn);
                }
            }
        }

        /**
         * Finds closest match and invokes callback.
         *
         * @param {Element} element
         * @param {String} selector
         * @param {String} type
         * @param {Function} callback
         * @return {Function}
         */
        function listener(element, selector, type, callback) {
            return function (e) {
                e.delegateTarget = closest(e.target, selector, true);

                if (e.delegateTarget) {
                    callback.call(element, e);
                }
            }
        }

        module.exports = delegate;

    }, {"closest": 11}]
}, {}, [1])


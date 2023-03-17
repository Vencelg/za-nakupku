<?php

namespace App\Http\Controllers\Web;

use App\Exceptions\ControllerException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected $icons = [
        "style" , "accessible" , "link" , "email" , "search" , "image" , "menu" , "radio" , "tab" , "timer"
        , "article" , "code" , "details" , "input" , "label" , "map" , "source" , "title" , "circle" , "filter"
        , "stop" , "forward" , "info" , "check" , "close" , "book" , "pause" , "mail" , "home" , "laptop" , "star"
        , "save" , "phone" , "inbox" , "lock" , "cloud" , "camera" , "delete" , "tag" , "flag" , "android"
        , "copyright" , "wifi" , "sync" , "login" , "logout" , "contacts" , "edit" , "warning" , "dashboard"
        , "adjust" , "archive" , "arrow-left" , "arrow-right" , "attachment" , "block" , "bookmark" , "bookmarks"
        , "brush" , "cake" , "chat" , "chevron-left" , "chevron-right" , "credit-card" , "crop" , "facebook"
        , "fingerprint" , "folder" , "help" , "keyboard" , "language" , "layers" , "list" , "location-pin"
        , "lock-open" , "loop" , "message" , "mic" , "mouse" , "note" , "notifications-off" , "palette"
        , "pie-chart" , "print" , "publish" , "reply" , "reply-all" , "share" , "shield" , "shop" , "shopping-bag"
        , "shopping-basket" , "shopping-cart" , "shuffle" , "tablet" , "tv" , "voicemail" , "comment" , "redo"
        , "refresh" , "undo" , "airplay" , "anchor" , "bar-chart" , "bluetooth" , "cast" , "check-circle"
        , "cloud-off" , "fast-forward" , "maximize" , "mic-off" , "minimize" , "monitor" , "navigation"
        , "phone-forwarded" , "phone-missed" , "power" , "repeat" , "send" , "settings" , "smartphone" , "speaker"
        , "stop-circle" , "trending-down" , "trending-up" , "umbrella" , "watch" , "wifi-off" , "zoom-in"
        , "zoom-out" , "remove" , "power-off" , "rotate-right" , "list-alt" , "volume-off" , "volume-down"
        , "volume-up" , "photo" , "eject" , "expand" , "compress" , "folder-open" , "star-half" , "arrow-circle-up"
        , "arrow-circle-down" , "group" , "reorder" , "money" , "sort" , "rotate-left" , "gavel" , "bolt"
        , "cloud-download" , "cloud-upload" , "gamepad" , "superscript" , "subscript" , "fire-extinguisher" , "euro"
        , "support" , "history" , "tty" , "toggle-off" , "toggle-on" , "motorcycle" , "hotel" , "train" , "subway"
        , "battery-full" , "usb" , "bathtub" , "web" , "lightbulb" , "backspace" , "border-all" , "border-style"
        , "charging-station" , "directions" , "file-download" , "file-upload" , "headset" , "hot-tub" , "memory"
        , "poll" , "portrait" , "receipt" , "satellite" , "school" , "sd-card" , "sim-card" , "sms" , "soap" , "spa"
        , "store" , "stream" , "sync-alt" , "tram" , "volume-mute" , "messenger" , "favorite" , "person"
        , "equalizer" , "music-note" , "preview" , "do-not-disturb" , "room" , "closed-caption" , "elevator"
        , "foundation" , "add" , "add-circle" , "add-circle-outline" , "alarm" , "analytics" , "apps" , "arrow-back"
        , "arrow-forward" , "bookmark-outline" , "build" , "business" , "call" , "cloud-circle" , "cloud-done"
        , "create" , "flash-off" , "help-outline" , "mail-outline" , "notifications" , "pause-circle-outline"
        , "people" , "people-outline" , "person-add" , "person-outline" , "person-remove" , "play-circle-outline"
        , "qr-code" , "radio-button-off" , "radio-button-on" , "remove-circle" , "remove-circle-outline"
        , "restaurant" , "star-outline" , "today" , "videocam" , "ios-share" , "account-box" , "account-circle"
        , "alarm-off" , "album" , "align-horizontal-center" , "align-horizontal-left" , "align-horizontal-right"
        , "align-vertical-bottom" , "align-vertical-center" , "align-vertical-top" , "all-inclusive" , "animation"
        , "api" , "aspect-ratio" , "assistant" , "atm" , "autorenew" , "av-timer" , "ballot" , "battery-alert"
        , "battery-unknown" , "bluetooth-audio" , "blur-linear" , "blur-off" , "border-bottom" , "border-color"
        , "border-horizontal" , "border-left" , "border-right" , "border-top" , "border-vertical" , "brightness-1"
        , "brightness-2" , "brightness-3" , "brightness-4" , "brightness-5" , "brightness-6" , "brightness-7"
        , "brightness-auto" , "bus-alert" , "cached" , "calendar-today" , "call-made" , "call-merge" , "call-missed"
        , "call-received" , "call-split" , "camera-enhance" , "camera-front" , "camera-rear" , "cancel"
        , "cast-connected" , "check-circle-outline" , "compare" , "content-copy" , "content-cut" , "content-paste"
        , "crop-free" , "crop-landscape" , "crop-portrait" , "crop-rotate" , "crop-square" , "delete-forever"
        , "delete-outline" , "delete-sweep" , "desktop-mac" , "developer-board" , "devices" , "dialpad" , "dns"
        , "domain" , "escalator" , "ev-station" , "exit-to-app" , "fence" , "find-replace" , "fire-hydrant"
        , "fireplace" , "flare" , "flash-auto" , "flip-to-back" , "flip-to-front" , "format-align-center"
        , "format-align-justify" , "format-align-left" , "format-align-right" , "format-bold" , "format-clear"
        , "format-color-fill" , "format-color-text" , "format-indent-decrease" , "format-indent-increase"
        , "format-italic" , "format-line-spacing" , "format-list-bulleted" , "format-list-numbered"
        , "format-list-numbered-rtl" , "format-paint" , "format-size" , "format-strikethrough"
        , "format-textdirection-l-to-r" , "format-textdirection-r-to-l" , "format-underline" , "forum"
        , "fullscreen" , "fullscreen-exit" , "gesture" , "grain" , "grass" , "grid-off" , "hail" , "hdr-off"
        , "headset-off" , "hvac" , "image-search" , "invert-colors" , "invert-colors-off" , "keyboard-backspace"
        , "keyboard-return" , "keyboard-tab" , "label-off" , "label-outline" , "launch" , "lightbulb-outline"
        , "link-off" , "liquor" , "lock-clock" , "lock-outline" , "looks" , "loupe" , "margin" , "menu-open"
        , "microwave" , "moped" , "more" , "movie" , "movie-filter" , "music-off" , "nature" , "nature-people"
        , "near-me" , "nfc" , "opacity" , "open-in-new" , "panorama" , "panorama-fisheye" , "panorama-horizontal"
        , "panorama-vertical" , "panorama-wide-angle" , "phone-in-talk" , "phone-paused" , "playlist-play"
        , "point-of-sale" , "polymer" , "pool" , "priority-high" , "replay" , "restore" , "room-service"
        , "rounded-corner" , "router" , "rowing" , "scanner" , "scatter-plot" , "screen-rotation" , "sd"
        , "security" , "segment" , "select-all" , "skip-next" , "skip-previous" , "spellcheck" , "stairs"
        , "storefront" , "subdirectory-arrow-left" , "subdirectory-arrow-right" , "subtitles" , "surround-sound"
        , "swap-horizontal-circle" , "swap-vertical-circle" , "tab-unselected" , "tablet-android" , "tag-faces"
        , "terrain" , "texture" , "thumb-down" , "thumb-up" , "thumbs-up-down" , "timelapse" , "timeline"
        , "timer-10" , "timer-3" , "timer-off" , "translate" , "trending-neutral" , "tune" , "update"
        , "view-agenda" , "view-array" , "view-carousel" , "view-column" , "view-comfy" , "view-compact"
        , "view-day" , "view-headline" , "view-list" , "view-module" , "view-quilt" , "view-stream" , "view-week"
        , "wallet-giftcard" , "wallet-membership" , "wallet-travel" , "wallpaper" , "waves" , "widgets"
        , "wifi-lock" , "360" , "10k" , "10mp" , "11mp" , "12mp" , "13mp" , "14mp" , "15mp" , "16mp" , "17mp"
        , "18mp" , "19mp" , "1k" , "1k-plus" , "20mp" , "21mp" , "22mp" , "23mp" , "24mp" , "2k" , "2k-plus" , "2mp"
        , "3d-rotation" , "3k" , "3k-plus" , "3mp" , "4k" , "4k-plus" , "4mp" , "5g" , "5k" , "5k-plus" , "5mp"
        , "6-ft-apart" , "6k" , "6k-plus" , "6mp" , "7k" , "7k-plus" , "7mp" , "8k" , "8k-plus" , "8mp" , "9k"
        , "9k-plus" , "9mp" , "ac-unit" , "access-alarm" , "access-alarms" , "access-time" , "accessibility"
        , "accessibility-new" , "accessible-forward" , "account-balance" , "account-balance-wallet" , "account-tree"
        , "ad-units" , "adb" , "add-a-photo" , "add-alarm" , "add-alert" , "add-box" , "add-business" , "add-call"
        , "add-chart" , "add-comment" , "add-ic-call" , "add-link" , "add-location" , "add-location-alt"
        , "add-moderator" , "add-photo-alternate" , "add-road" , "add-shopping-cart" , "add-task" , "add-to-drive"
        , "add-to-home-screen" , "add-to-photos" , "add-to-queue" , "addchart" , "admin-panel-settings"
        , "agriculture" , "airline-seat-flat" , "airline-seat-flat-angled" , "airline-seat-individual-suite"
        , "airline-seat-legroom-extra" , "airline-seat-legroom-normal" , "airline-seat-legroom-reduced"
        , "airline-seat-recline-extra" , "airline-seat-recline-normal" , "airplanemode-active"
        , "airplanemode-inactive" , "airplanemode-off" , "airplanemode-on" , "airport-shuttle" , "alarm-add"
        , "alarm-on" , "all-inbox" , "all-out" , "alt-route" , "alternate-email" , "amp-stories" , "announcement"
        , "apartment" , "app-blocking" , "app-registration" , "app-settings-alt" , "approval" , "architecture"
        , "arrow-back-ios" , "arrow-downward" , "arrow-drop-down" , "arrow-drop-down-circle" , "arrow-drop-up"
        , "arrow-forward-ios" , "arrow-right-alt" , "arrow-upward" , "art-track" , "assessment" , "assignment"
        , "assignment-ind" , "assignment-late" , "assignment-return" , "assignment-returned"
        , "assignment-turned-in" , "assistant-direction" , "assistant-navigation" , "assistant-photo"
        , "attach-email" , "attach-file" , "attach-money" , "attractions" , "audiotrack" , "auto-awesome"
        , "auto-awesome-mosaic" , "auto-awesome-motion" , "auto-delete" , "auto-fix-high" , "auto-fix-normal"
        , "auto-fix-off" , "auto-stories" , "baby-changing-station" , "backpack" , "backup" , "backup-table"
        , "badge" , "bakery-dining" , "batch-prediction" , "battery-charging-full" , "battery-std" , "beach-access"
        , "bedtime" , "beenhere" , "bento" , "bike-scooter" , "biotech" , "block-flipped" , "bluetooth-connected"
        , "bluetooth-disabled" , "bluetooth-searching" , "blur-circular" , "blur-on" , "book-online"
        , "bookmark-border" , "border-clear" , "border-inner" , "border-outer" , "branding-watermark"
        , "breakfast-dining" , "brightness-high" , "brightness-low" , "brightness-medium" , "broken-image"
        , "browser-not-supported" , "brunch-dining" , "bubble-chart" , "bug-report" , "build-circle" , "burst-mode"
        , "business-center" , "calculate" , "calendar-view-day" , "call-end" , "call-missed-outgoing"
        , "call-to-action" , "camera-alt" , "camera-roll" , "campaign" , "cancel-presentation"
        , "cancel-schedule-send" , "car-rental" , "car-repair" , "card-giftcard" , "card-membership" , "card-travel"
        , "carpenter" , "cases" , "casino" , "cast-for-education" , "category" , "celebration" , "cell-wifi"
        , "center-focus-strong" , "center-focus-weak" , "change-history" , "chat-bubble" , "chat-bubble-outline"
        , "check-box" , "check-box-outline-blank" , "checkroom" , "child-care" , "child-friendly"
        , "chrome-reader-mode" , "circle-notifications" , "class" , "clean-hands" , "cleaning-services" , "clear"
        , "clear-all" , "close-fullscreen" , "closed-caption-disabled" , "closed-caption-off" , "cloud-queue"
        , "collections" , "collections-bookmark" , "color-lens" , "colorize" , "comment-bank" , "commute"
        , "compare-arrows" , "compass-calibration" , "computer" , "confirmation-num" , "confirmation-number"
        , "connect-without-contact" , "connected-tv" , "construction" , "contact-mail" , "contact-page"
        , "contact-phone" , "contact-support" , "contactless" , "control-camera" , "control-point"
        , "control-point-duplicate" , "coronavirus" , "corporate-fare" , "countertops" , "create-new-folder"
        , "crop-16-9" , "crop-3-2" , "crop-5-4" , "crop-7-5" , "crop-din" , "crop-original" , "dangerous"
        , "dashboard-customize" , "data-usage" , "date-range" , "deck" , "dehaze" , "delivery-dining"
        , "departure-board" , "description" , "design-services" , "desktop-access-disabled" , "desktop-windows"
        , "developer-mode" , "device-hub" , "device-thermostat" , "device-unknown" , "devices-other" , "dialer-sip"
        , "dinner-dining" , "directions-bike" , "directions-boat" , "directions-bus" , "directions-car"
        , "directions-ferry" , "directions-off" , "directions-railway" , "directions-run" , "directions-subway"
        , "directions-train" , "directions-transit" , "directions-walk" , "dirty-lens" , "disabled-by-default"
        , "disc-full" , "dnd-forwardslash" , "do-not-disturb-alt" , "do-not-disturb-off" , "do-not-disturb-on"
        , "do-not-step" , "do-not-touch" , "dock" , "domain-disabled" , "domain-verification" , "done" , "done-all"
        , "done-outline" , "donut-large" , "donut-small" , "double-arrow" , "drafts" , "drag-handle"
        , "drag-indicator" , "drive-eta" , "drive-file-move" , "drive-file-move-outline"
        , "drive-file-rename-outline" , "drive-folder-upload" , "dry" , "dry-cleaning" , "duo" , "dvr"
        , "dynamic-feed" , "dynamic-form" , "east" , "eco" , "edit-attributes" , "edit-location" , "edit-off"
        , "edit-road" , "elderly" , "electric-bike" , "electric-car" , "electric-moped" , "electric-rickshaw"
        , "electric-scooter" , "electrical-services" , "emoji-emotions" , "emoji-events" , "emoji-flags"
        , "emoji-food-beverage" , "emoji-nature" , "emoji-objects" , "emoji-people" , "emoji-symbols"
        , "emoji-transportation" , "engineering" , "enhance-photo-translate" , "enhanced-encryption" , "error"
        , "error-outline" , "escalator-warning" , "euro-symbol" , "event" , "event-available" , "event-busy"
        , "event-note" , "event-seat" , "expand-less" , "expand-more" , "explicit" , "explore" , "explore-off"
        , "exposure" , "exposure-minus-1" , "exposure-minus-2" , "exposure-neg-1" , "exposure-neg-2"
        , "exposure-plus-1" , "exposure-plus-2" , "exposure-zero" , "extension" , "face" , "face-retouching-natural"
        , "fact-check" , "family-restroom" , "fast-rewind" , "fastfood" , "favorite-border" , "favorite-outline"
        , "featured-play-list" , "featured-video" , "feedback" , "festival" , "fiber-dvr" , "fiber-manual-record"
        , "fiber-new" , "fiber-pin" , "fiber-smart-record" , "file-copy" , "file-download-done" , "file-present"
        , "filter-1" , "filter-2" , "filter-3" , "filter-4" , "filter-5" , "filter-6" , "filter-7" , "filter-8"
        , "filter-9" , "filter-9-plus" , "filter-alt" , "filter-b-and-w" , "filter-center-focus" , "filter-drama"
        , "filter-frames" , "filter-hdr" , "filter-list" , "filter-list-alt" , "filter-none" , "filter-tilt-shift"
        , "filter-vintage" , "find-in-page" , "first-page" , "fit-screen" , "fitness-center" , "flaky" , "flash-on"
        , "flight" , "flight-land" , "flight-takeoff" , "flip" , "flip-camera-android" , "flip-camera-ios"
        , "folder-shared" , "folder-special" , "follow-the-signs" , "font-download" , "food-bank"
        , "format-color-reset" , "format-quote" , "format-shapes" , "format-underlined" , "forward-10"
        , "forward-30" , "forward-5" , "forward-to-inbox" , "free-breakfast" , "functions" , "g-translate" , "games"
        , "get-app" , "gif" , "goat" , "golf-course" , "gps-fixed" , "gps-not-fixed" , "gps-off" , "grade"
        , "gradient" , "grading" , "graphic-eq" , "grid-on" , "grid-view" , "group-add" , "group-work" , "groups"
        , "handyman" , "hardware" , "hd" , "hdr-enhanced-select" , "hdr-on" , "hdr-strong" , "hdr-weak"
        , "headset-mic" , "healing" , "hearing" , "hearing-disabled" , "height" , "help-center" , "high-quality"
        , "highlight" , "highlight-alt" , "highlight-off" , "highlight-remove" , "history-edu"
        , "history-toggle-off" , "home-filled" , "home-repair-service" , "home-work" , "horizontal-distribute"
        , "horizontal-rule" , "horizontal-split" , "hourglass-bottom" , "hourglass-disabled" , "hourglass-empty"
        , "hourglass-full" , "hourglass-top" , "house" , "house-siding" , "how-to-reg" , "how-to-vote" , "http"
        , "https" , "icecream" , "image-aspect-ratio" , "image-not-supported" , "imagesearch-roller"
        , "import-contacts" , "import-export" , "important-devices" , "indeterminate-check-box" , "info-outline"
        , "insert-chart" , "insert-chart-outlined" , "insert-comment" , "insert-drive-file" , "insert-emoticon"
        , "insert-invitation" , "insert-link" , "insert-photo" , "insights" , "integration-instructions"
        , "inventory" , "invert-colors-on" , "iso" , "keyboard-arrow-down" , "keyboard-arrow-left"
        , "keyboard-arrow-right" , "keyboard-arrow-up" , "keyboard-capslock" , "keyboard-control" , "keyboard-hide"
        , "keyboard-voice" , "king-bed" , "kitchen" , "label-important" , "label-important-outline" , "landscape"
        , "laptop-chromebook" , "laptop-mac" , "laptop-windows" , "last-page" , "layers-clear" , "leaderboard"
        , "leak-add" , "leak-remove" , "leave-bags-at-home" , "legend-toggle" , "lens" , "library-add"
        , "library-add-check" , "library-books" , "library-music" , "line-style" , "line-weight" , "linear-scale"
        , "linked-camera" , "live-help" , "live-tv" , "local-activity" , "local-airport" , "local-atm"
        , "local-attraction" , "local-bar" , "local-cafe" , "local-car-wash" , "local-convenience-store"
        , "local-dining" , "local-drink" , "local-fire-department" , "local-florist" , "local-gas-station"
        , "local-grocery-store" , "local-hospital" , "local-hotel" , "local-laundry-service" , "local-library"
        , "local-mall" , "local-movies" , "local-offer" , "local-parking" , "local-pharmacy" , "local-phone"
        , "local-pizza" , "local-play" , "local-police" , "local-post-office" , "local-print-shop"
        , "local-printshop" , "local-restaurant" , "local-see" , "local-shipping" , "local-taxi" , "location-city"
        , "location-disabled" , "location-history" , "location-off" , "location-on" , "location-searching"
        , "looks-3" , "looks-4" , "looks-5" , "looks-6" , "looks-one" , "looks-two" , "low-priority" , "loyalty"
        , "luggage" , "lunch-dining" , "maps-ugc" , "mark-as-unread" , "mark-chat-read" , "mark-chat-unread"
        , "mark-email-read" , "mark-email-unread" , "markunread" , "markunread-mailbox" , "masks" , "mediation"
        , "medical-services" , "meeting-room" , "menu-book" , "merge-type" , "messenger-outline"
        , "mic-external-off" , "mic-external-on" , "mic-none" , "military-tech" , "miscellaneous-services"
        , "missed-video-call" , "mms" , "mobile-friendly" , "mobile-off" , "mobile-screen-share" , "mode-comment"
        , "mode-edit" , "model-training" , "monetization-on" , "money-off" , "monochrome-photos" , "mood"
        , "mood-bad" , "more-horiz" , "more-time" , "more-vert" , "motion-photos-off" , "motion-photos-on"
        , "motion-photos-pause" , "motion-photos-paused" , "move-to-inbox" , "movie-creation" , "mp"
        , "multiline-chart" , "multiple-stop" , "multitrack-audio" , "museum" , "music-video" , "my-library-add"
        , "my-library-books" , "my-library-music" , "my-location" , "nat" , "navigate-before" , "navigate-next"
        , "near-me-disabled" , "network-cell" , "network-check" , "network-locked" , "network-wifi" , "new-releases"
        , "next-plan" , "next-week" , "night-shelter" , "nightlife" , "nightlight-round" , "nights-stay"
        , "no-backpack" , "no-cell" , "no-drinks" , "no-encryption" , "no-flash" , "no-food" , "no-luggage"
        , "no-meals" , "no-meals-ouline" , "no-meeting-room" , "no-photography" , "no-sim" , "no-stroller"
        , "no-transfer" , "north" , "north-east" , "north-west" , "not-accessible" , "not-interested"
        , "not-listed-location" , "not-started" , "note-add" , "notes" , "notification-important"
        , "notifications-active" , "notifications-none" , "notifications-on" , "notifications-paused"
        , "now-wallpaper" , "now-widgets" , "offline-bolt" , "offline-pin" , "offline-share" , "ondemand-video"
        , "online-prediction" , "open-in-browser" , "open-in-full" , "open-with" , "outbond" , "outbox"
        , "outdoor-grill" , "outgoing-mail" , "outlet" , "outlined-flag" , "padding" , "pages" , "pageview"
        , "pan-tool" , "panorama-fish-eye" , "panorama-horizontal-select" , "panorama-photosphere"
        , "panorama-photosphere-select" , "panorama-vertical-select" , "panorama-wide-angle-select" , "park"
        , "party-mode" , "pause-circle-filled" , "pause-presentation" , "payment" , "payments" , "pedal-bike"
        , "pending" , "pending-actions" , "people-alt" , "perm-camera-mic" , "perm-contact-cal"
        , "perm-contact-calendar" , "perm-data-setting" , "perm-device-info" , "perm-device-information"
        , "perm-identity" , "perm-media" , "perm-phone-msg" , "perm-scan-wifi" , "person-add-alt"
        , "person-add-alt-1" , "person-add-disabled" , "person-pin" , "person-pin-circle" , "person-remove-alt-1"
        , "person-search" , "personal-video" , "pest-control" , "pest-control-rodent" , "pets" , "phone-android"
        , "phone-bluetooth-speaker" , "phone-callback" , "phone-disabled" , "phone-enabled" , "phone-iphone"
        , "phone-locked" , "phonelink" , "phonelink-erase" , "phonelink-lock" , "phonelink-off" , "phonelink-ring"
        , "phonelink-setup" , "photo-album" , "photo-camera" , "photo-camera-back" , "photo-camera-front"
        , "photo-filter" , "photo-libr"
    ])
    {
        $this->middleware('auth');
    }

    public function index(): \Illuminate\Contracts\Foundation\Application|
\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('main.category.list', [
            'categories' => Category::withTrashed()->get()->sortBy('id')
        ]);
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|
\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('main.category.create', [
            'icons' => $this->icons
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $newCategory = new Category([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'icon' => $request->input('icon')
        ]);
        $newCategory->save();

        return redirect()->route('category.detail', ['id' => $newCategory->id]);
    }

    public function show(
        int $id): \Illuminate\Contracts\Foundation\Application|
\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $category = Category::withTrashed()->whereId($id)->first();
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        return view('main.category.detail', [
            'category' => $category,
            'icons' => $this->icons
        ]);
    }

    public function update(int $id, UpdateCategoryRequest $request)
    {
        $category = Category::withTrashed()->whereId($id)->first();
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $category->update($request->all());
        $category->save();

        return redirect()->back()->with('success', 'Model successfully updated');
    }

    public function restore(int $id)
    {
        $category = Category::withTrashed()->whereId($id)->first();
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $category->setAttribute('deleted_at', null);
        $category->save();

        return redirect()->back()->with('success', 'Model successfully restored');
    }

    public function softDelete(int $id)
    {
        $category = Category::withTrashed()->whereId($id)->first();
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $category->delete();

        return redirect()->back()->with('success', 'Model successfully deleted');
    }

    public function delete(int $id)
    {
        $category = Category::withTrashed()->whereId($id)->first();
        if (!($category instanceof Category)) {
            throw new ControllerException('Category with id: ' . $id . ' not found', 400);
        }

        $category->forceDelete();

        return redirect()->route('category');
    }
}

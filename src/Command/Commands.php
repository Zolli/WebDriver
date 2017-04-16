<?php

namespace Zolli\WebDriver\Command;

/**
 * Class that contains all available commands
 *
 * @package Zolli\WebDriver
 * @subpackage Comamnds
 *
 * @copyright    Copyright 2017, Zoltán Borsos
 * @license      https://github.com/Zolli/WebDriver/blob/master/LICENSE.md
 */
class Commands
{

    const QUERY_STATUS = 'queryStatus';
    const CREATE_SESSION = 'createSession';
    const GET_SESSIONS = 'getSessions';
    const GET_SESSION_BY_ID = 'getSessionById';
    const DELETE_SESSION_BY_ID = 'deleteSessionById';
    const SET_SESSION_TIMEOUTS = 'setSessionTimeouts';
    const SET_SESSION_TIMEOUT_ASYNC_SCRIPT = 'setSessionAsyncScriptTimeout';
    const SET_SESSION_TIMEOUT_IMPLICIT_WAIT = 'setSessionImplicitWaitTimeout';
    const GET_WINDOW_HANDLE = 'getWindowHandle';
    const GET_WINDOWS_HANDLES = 'getWindowsHandles';
    const GET_SESSION_URL = 'getCurrentSessionUrl';
    const NAVIGATE_TO_URL = 'navigateToUrl';
    const NAVIGATE_FORWARD = 'navigateForward';
    const NAVIGATE_BACK = 'navigateBack';
    const NAVIGATE_REFRESH = 'navigateRefresh';
    const EXECUTE_SCRIPT = 'executeScript';
    const EXECUTE_SCRIPT_ASYNC = 'executeScriptAsync';
    const TAKE_SCREENSHOT = 'takeScreenshot';
    const GET_ALL_IME_ENGINES = 'getAllImeEngines';
    const GET_ACTIVE_IME_ENGINE = 'getActiveImeEngineName';
    const GET_ACTIVATED_IME_ENGINE = 'getActivatedImeEngine';
    const DETACH_CURRENT_IME_ENGINE = 'detachCurrentImeEngine';
    const ATTACH_IME_ENGINE = 'attachImeEngine';
    const CHANGE_FOCUS = 'changeFocusToOtherFrame';
    const CHANGE_FOCUS_TO_PARENT = 'changeFocusToParent';
    const CHANGE_FOCUS_TO_WINDOW = 'changeFocusToWindow';
    const CLOSE_CURRENT_WINDOW = 'closeCurrentWindow';
    const SET_WINDOW_SIZE = 'setWindowSize';
    const GET_WINDOW_SIZE = 'getWindowSize';
    const SET_WINDOW_POSITION = 'setWindowPosition';
    const GET_WINDOW_POSITION = 'getWindowPosition';
    const SET_WINDOW_MAXIMIZED = 'setWindowMaximized';
    const GET_ALL_COOKIES = 'getAllCookies';
    const SET_COOKIE = 'setCookie';
    const DELETE_ALL_COOKIE = 'deleteAllCookie';
    const DELETE_NAMED_COOKIE = 'deleteNamedCookie';
    const GET_PAGE_SOURCE = 'getPageSource';
    const GET_PAGE_TITLE = 'getPageTitle';
    const SEARCH_ELEMENT_FROM_ROOT = 'searchElementFromRoot';
    const SEARCH_ELEMENTS_FROM_ROOT = 'searchElementsFromRoot';
    const GET_CURRENTLY_FOCUSED_ELEMENT = 'getCurrentlyFocusedElement';
    const SEARCH_ELEMENT_FROM_ANOTHER = 'searchElementFromAnother';
    const SEARCH_ELEMENTS_FROM_ANOTHER = 'searchElementsFromAnother';
    const CLICK_ON_ELEMENT = 'clickOnElement';
    const SUBMIT_FORM_ELEMENT = 'submitFormElement';
    const GET_TEXT_FROM_ELEMENT = 'getTextFromElement';
    const SEND_KEY_STROKES_TO_ELEMENT = 'sendKeyStrokesToElement';
    const SEND_KEY_STROKES_TO_ACTIVE_ELEMENT = 'sendKeyStrokesToActiveElement';
    const GET_ELEMENT_TAG_NAME = 'getElementTagName';
    const CLEAR_INPUT_VALUE = 'clearInputValue';
    const CHECK_ELEMENT_SELECTED = 'checkElementSelected';
    const CHECK_ELEMENT_ENABLED = 'checkElementEnabled';
    const GET_ELEMENT_ATTRIBUTE = 'getElementAttribute';
    const CHECK_ELEMENTS_EQUALS = 'checkElementsEquals';
    const CHECK_ELEMENT_DISPLAYED = 'checkElementDisplayed';
    const GET_ELEMENT_LOCATION = 'getElementLocation';
    const GET_ELEMENT_SIZE = 'getElementSize';
    const GET_ELEMENT_COMPUTED_CSS_PROPERTY = 'getElementComputedCssProperty';
    const GET_BROWSER_ORIENTATION = 'getBrowserOrientation';
    const SET_BROWSER_ORIENTATION = 'setBrowserOrientation';
    const GET_JAVASCRIPT_ALERT_TEXT = 'getJavascriptAlertText';
    const SEND_KEYSTROKES_TO_JAVASCRIPT_PROMPT = 'sendKeystrokesToJavascriptPrompt';
    const ACCEPT_JAVASCRIPT_ALERT = 'acceptJavascriptAlert';
    const DISMISS_JAVASCRIPT_ALERT = 'dismissJavascriptAlert';
    const MOUSE_MOVE = 'mouseMove';
    const MOUSE_CLICK = 'mouseClick';
    const MOUSE_CLICK_AND_HOLD = 'mouseClickAndHold';
    const MOUSE_RELEASE_BUTTON = 'mouseReleaseButton';
    const MOUSE_DOUBLE_CLICK = 'mouseDoubleClick';
    const TOUCH_SINGLE_TAP = 'touchSingleTap';
    const TOUCH_MOVE_DOWN = 'touchMoveDown';
    const TOUCH_MOVE_UP = 'touchMoveUp';
    const TOUCH_MOVE = 'touchMove';
    const TOUCH_SCROLL = 'touchScroll';
    const TOUCH_DOUBLE_TAP = 'touchDoubleTap';
    const TOUCH_LONG_TAP = 'touchLongTap';
    const TOUCH_FLICK = 'touchFlick';
    const GET_CURRENT_GEO_LOCATION = 'getCurrentGeoLocation';
    const SET_CURRENT_GEO_LOCATION = 'setCurrentGeoLocation';
    const LOCAL_STORAGE_GET_ALL_KEYS = 'localStorageGetAllKeys';
    const LOCAL_STORAGE_SET_KEY = 'localStorageSetKey';
    const LOCAL_STORAGE_CLEAR = 'localStorageClear';
    const LOCAL_STORAGE_GET_ITEM = 'localStorageGetItem';
    const LOCAL_STORAGE_REMOVE_ITEM = 'localStorageRemoveItem';
    const LOCAL_STORAGE_GET_SIZE = 'localStorageGetSize';
    const SESSION_STORAGE_GET_ALL_KEYS = 'sessionStorageGetAllKeys';
    const SESSION_STORAGE_SET_KEY = 'sessionStorageSetKey';
    const SESSION_STORAGE_CLEAR = 'sessionStorageClear';
    const SESSION_STORAGE_GET_ITEM = 'sessionStorageGetItem';
    const SESSION_STORAGE_REMOVE_ITEM = 'sessionStorageRemoveItem';
    const SESSION_STORAGE_GET_SIZE = 'sessionStorageGetSize';
    const GET_LOG_BY_TYPE = 'getLogByType';
    const GET_AVAILABLE_LOG_TYPES = 'getAvailableLogTypes';
    const GET_APPLICATION_CACHE_STATUS = 'getApplicationCacheStatus';

}

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
 *
 * @codeCoverageIgnore
 */
class Commands
{

    const QUERY_STATUS = 'queryStatus';
    const CREATE_SESSION = 'createSession'; //Implemented
    const GET_SESSIONS = 'getSessions';
    const GET_SESSION_BY_ID = 'getSessionById';
    const DELETE_SESSION_BY_ID = 'deleteSessionById'; //Implemented
    const SET_SESSION_TIMEOUTS = 'setSessionTimeouts'; //Implemented
    const SET_SESSION_TIMEOUT_ASYNC_SCRIPT = 'setSessionAsyncScriptTimeout'; //Implemented
    const SET_SESSION_TIMEOUT_IMPLICIT_WAIT = 'setSessionImplicitWaitTimeout'; //Implemented
    const GET_WINDOW_HANDLE = 'getWindowHandle'; // Implemented
    const GET_WINDOWS_HANDLES = 'getWindowsHandles';
    const GET_SESSION_URL = 'getCurrentSessionUrl'; // Implemented
    const NAVIGATE_TO_URL = 'navigateToUrl'; // Implemented
    const NAVIGATE_FORWARD = 'navigateForward'; // Implemented
    const NAVIGATE_BACK = 'navigateBack'; // Implemented
    const NAVIGATE_REFRESH = 'navigateRefresh'; // Implemented
    const EXECUTE_SCRIPT = 'executeScript';
    const EXECUTE_SCRIPT_ASYNC = 'executeScriptAsync';
    const TAKE_SCREENSHOT = 'takeScreenshot'; // Implemented
    const GET_ALL_IME_ENGINES = 'getAllImeEngines'; //-
    const GET_ACTIVE_IME_ENGINE = 'getActiveImeEngineName'; //-
    const GET_ACTIVATED_IME_ENGINE = 'getActivatedImeEngine'; //-
    const DETACH_CURRENT_IME_ENGINE = 'detachCurrentImeEngine'; //-
    const ATTACH_IME_ENGINE = 'attachImeEngine'; //-
    const CHANGE_FOCUS = 'changeFocusToOtherFrame'; //-
    const CHANGE_FOCUS_TO_PARENT = 'changeFocusToParent'; //-
    const CHANGE_FOCUS_TO_WINDOW = 'changeFocusToWindow'; //-
    const CLOSE_CURRENT_WINDOW = 'closeCurrentWindow'; // Implemented
    const SET_WINDOW_SIZE = 'setWindowSize'; //Implemented
    const GET_WINDOW_SIZE = 'getWindowSize'; //Implemented
    const SET_WINDOW_POSITION = 'setWindowPosition'; //Implemented
    const GET_WINDOW_POSITION = 'getWindowPosition'; //Implemented
    const SET_WINDOW_MAXIMIZED = 'setWindowMaximized'; //- Not supported
    const GET_ALL_COOKIES = 'getAllCookies'; //Implemented
    const SET_COOKIE = 'setCookie'; //Implemented
    const DELETE_ALL_COOKIE = 'deleteAllCookie'; //Implemented
    const DELETE_NAMED_COOKIE = 'deleteNamedCookie'; //Implemented
    const GET_PAGE_SOURCE = 'getPageSource'; //Implemented
    const GET_PAGE_TITLE = 'getPageTitle'; //Implemented
    const SEARCH_ELEMENT_FROM_ROOT = 'searchElementFromRoot'; //Implemented
    const SEARCH_ELEMENTS_FROM_ROOT = 'searchElementsFromRoot'; //Implemented
    const GET_CURRENTLY_FOCUSED_ELEMENT = 'getCurrentlyFocusedElement';
    const SEARCH_ELEMENT_FROM_ANOTHER = 'searchElementFromAnother';
    const SEARCH_ELEMENTS_FROM_ANOTHER = 'searchElementsFromAnother';
    const CLICK_ON_ELEMENT = 'clickOnElement'; //Implemented
    const SUBMIT_FORM_ELEMENT = 'submitFormElement'; //Implemented
    const GET_TEXT_FROM_ELEMENT = 'getTextFromElement'; //Implemented
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

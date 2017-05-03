/**
 * @file
 */

function getDeviceType() {
    var Breakpoints = window.breakpointSettings.Breakpoints;
    var DeviceMapping = window.breakpointSettings.DeviceMapping;
    var compareWidth = window.innerWidth;

    if (compareWidth <= Breakpoints[DeviceMapping.tablet]) {
        adIntegrationDeviceType = 'smartphone';
    }

    if (compareWidth <= Breakpoints[DeviceMapping.desktop]) {
        adIntegrationDeviceType = 'tablet';
    }
    if (!adIntegrationDeviceType) {
        adIntegrationDeviceType = 'desktop';
    }

    return adIntegrationDeviceType;
}

window.deviceIsMobile = function () {
  'use strict';

  return (getDeviceType() === 'smartphone');
};

window.deviceIsTablet = function () {
  'use strict';

  return (getDeviceType() === 'tablet');
};

window.deviceIsDesktop = function () {
  'use strict';

  return (getDeviceType() === 'desktop');
};

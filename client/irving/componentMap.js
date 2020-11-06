import createThemedComponentMap from '@irvingjs/styled-components/componentMap';
import { componentMap as WordPressComponentMap } from '@irvingjs/wordpress';
import { IntegrationsManager } from '@irvingjs/integrations';

import themes from 'themes.js';

export default {
  ...createThemedComponentMap(themes),
  ...WordPressComponentMap,
  'irving/integrations': IntegrationsManager,
};

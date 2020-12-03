import createThemedComponentMap from '@irvingjs/styled-components/componentMap';
import {
  AdminBar,
  componentMap as WordPressComponentMap,
} from '@irvingjs/wordpress';
import { IntegrationsManager } from '@irvingjs/integrations';

import themes from 'themes.js';

// Custom components
import PostContainer from './compontents/post-container';

export default {
  ...createThemedComponentMap(themes),
  ...WordPressComponentMap,
  'irving/admin-bar': AdminBar,
  'irving/integrations': IntegrationsManager,
  'twentytwentyone/post-container': PostContainer,
};

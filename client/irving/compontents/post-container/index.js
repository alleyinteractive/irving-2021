import React from 'react';
import PropTypes from 'prop-types';
import withThemes from '@irvingjs/styled/components/hoc/withThemes';
import groupChildren from 'utils/groupChildren';
import * as defaultStyles from './themes/default';

/**
 * Content single.
 */
const PostContainer = (props) => {
  const {
    children,
    className,
    id,
    theme,
  } = props;

  const {
    ArticleWrapper,
  } = theme;

  // Deconstruct children by the group prop.
  const {
    postContent,
    postFooter,
    postHeader,
  } = groupChildren(children);

  return (
    <ArticleWrapper id={id} className={className}>
      {postHeader}
      {postContent}
      {postFooter}
    </ArticleWrapper>
  );
};

PostContainer.defaultProps = {
  children: [],
  className: '',
  id: '',
  theme: defaultStyles,
};

PostContainer.propTypes = {
  /**
   * Children of the component.
   */
  children: PropTypes.arrayOf(PropTypes.node),
  /**
   * ClassNames for the wrapper.
   */
  className: PropTypes.string,
  /**
   * ID for the wrapping div.
   */
  id: PropTypes.string,
  /**
   * Theme (styles) to apply to the component.
   */
  theme: PropTypes.object,
};

export const themeMap = {
  default: defaultStyles,
};

export { PostContainer as PureComponent };

export const StyledComponent = withThemes(themeMap)(PostContainer);

export default StyledComponent;

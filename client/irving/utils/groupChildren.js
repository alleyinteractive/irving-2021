/**
 * Map an array of children into an object using the `group` prop.`
 *
 * @param {array} children An array of React components.
 * @returns {object} Mapping of children by group.
 */
const groupChildren = (children) => {
  const mapping = {
    rest: [], // Array containing ungrouped children.
  };

  // If the `group` prop exists, and the group has been allow-listed, push the
  // child component.
  children.forEach((child) => {
    const { group } = child.props;

    if (group) {
      const currentGroup = mapping[group] || [];
      mapping[group] = currentGroup.concat(child);
    } else {
      mapping.rest = mapping.rest.concat(child);
    }
  });

  return mapping;
};

export default groupChildren;

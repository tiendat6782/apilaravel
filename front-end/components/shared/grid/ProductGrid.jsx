import React from "react";

const ProductGrid = ({ children }) => {
  return <div className="grid grid-cols-2 gap-3">{children}</div>;
};

export default ProductGrid;

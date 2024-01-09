import React from "react";

const ProductGrid = ({ children }) => {
  return (
    <div className="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-4">{children}</div>
  );
};

export default ProductGrid;

import React from "react";

const CoverContainer = ({ children }) => {
  return (
    <div className="relative flex h-screen w-screen items-center justify-center">
      {children}
    </div>
  );
};

export default CoverContainer;

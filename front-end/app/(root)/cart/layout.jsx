import { ContentBreaker } from "@/components/shared/Breaker";
import React from "react";

const layout = ({ children }) => {
  return (
    <div>
      <p className="text_primary text-2xl font-semibold">Giỏ hàng</p>
      <ContentBreaker />
      {children}
    </div>
  );
};

export default layout;

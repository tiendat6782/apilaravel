import React from "react";

import Navbar from "../shared/navbar/Navbar";

const ProductLayout = ({ children }) => {
  return (
    <div className="mx-auto flex min-h-screen w-full max-w-[1200px] flex-col justify-between px-2">
      <Navbar />
      <main className="relative w-full grow ">
        <p className="text_primary text-2xl font-semibold">Sản phẩm</p>
        {children}
      </main>
    </div>
  );
};

export default ProductLayout;

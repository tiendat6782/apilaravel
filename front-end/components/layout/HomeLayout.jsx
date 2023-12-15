import React from "react";
import Navbar from "../shared/navbar/Navbar";

const HomeLayout = ({ children }) => {
  return (
    <div className="min-h-screen  w-full max-w-[1200px]">
      <Navbar />
      {children}
    </div>
  );
};

export default HomeLayout;

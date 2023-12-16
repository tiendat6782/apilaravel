import React from "react";
import Navbar from "../shared/navbar/Navbar";
import Footer from "../shared/footer/Footer";

const HomeLayout = ({ children }) => {
  return (
    <div className="mx-auto flex min-h-screen w-full max-w-[1200px] flex-col justify-between">
      <Navbar />
      <main className="relative w-full grow overflow-x-hidden">
        {" "}
        {children}
      </main>
      <Footer />
    </div>
  );
};

export default HomeLayout;

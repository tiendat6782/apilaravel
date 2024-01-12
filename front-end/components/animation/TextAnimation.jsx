"use client";
import React from "react";
import { motion } from "framer-motion";
const variants = {
  hidden: { opacity: 0 },
  visible: { opacity: 1, transition: { duration: 0.5 } },
};

const TextAnimation = ({ children }) => {
  return (
    <motion.div variants={variants} initial="hidden" animate="visible">
      {children}
    </motion.div>
  );
};

export default TextAnimation;
